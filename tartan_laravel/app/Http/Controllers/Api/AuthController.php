<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

/**
 * @group Auth
 */
class AuthController extends ApiController
{
    /**
     * Get User Details
     *
     * @authenticated
     * @param Request $request
     * @return JsonResponse
     */
    public function getUser(Request $request): JsonResponse
    {
        return response()->json($this->user);
    }

    /**
     * Logging Out User.
     *
     * @authenticated
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
//        auth($this->guard)->logout();
        return response()->json(['message' => __('auth.logged_out')]);
    }

    /**
     *  SignUp User and return JWT Token
     *
     * @bodyParam name string required User Name Example: John Doe
     * @bodyParam email string required_without:phone User Email Example: medical@aquadic.com
     * @bodyParam phone string required_without:email User Phone Example: +201101782890
     * @bodyParam password string required User Password Example: JamesBond007
     *
     * @unauthenticated
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function signUp(Request $request): JsonResponse
    {
        $data = $this->validate($request, [
            'name' => 'required|string|min:3|max:191',
            'email' => 'required_without:phone|email|unique:users',
            'phone' => 'required_without:email|string|unique:users',
            'password' => ['required', 'string', Password::min(4)],
        ]);

        if (isset($data['phone'])) {
            $normalizedPhone = $this->normalizePhoneNumber($data['phone']);

            if (User::where('phone', $normalizedPhone)->exists()) {
                throw ValidationException::withMessages([
                    'phone' => __('validation.unique', ['attribute' => 'mobile']),
                ]);
            }
        }

        $this->user = User::create([
            'name' => $data['name'],
            'email' => $data['email'] ?? null,
            'phone' => $normalizedPhone ?? null,
            'password' => Hash::make($data['password']),
        ]);

        event(new Registered($this->user));

        $token = $this->user->createToken('authToken')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $this->user,
        ], 201);
    }

    /**
     *  Login User and return JWT Token
     *
     * @bodyParam username string required User Email/Phone Example: medical@aquadic.com
     * @bodyParam password string required User Password Example: JamesBond007
     *
     * @unauthenticated
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request): JsonResponse
    {
        $data = $this->validate($request, [
            'username' => 'required|min:3|max:191',
            'password' => ['required', 'string', Password::min(4)],
        ]);

        $this->setUserTo($data['username'], ['id', 'password']);

        if (!$this->user || !Hash::check($data['password'], $this->user->password)) {
            return response()->json([
                'message' => __('auth.failed'),
            ], 401);
        }

        $token = $this->user->createToken('authToken')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $this->user->refresh(),
        ]);
    }

    /**
     * Re-Send Verification Code to User Phone / Email
     *
     * @unauthenticated
     * @bodyParam email string required_without:phone User Email Example: medical@aquadic.com
     * @bodyParam phone string required_without:email User Phone Example: +201101782890
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function reSendVerification(Request $request): JsonResponse
    {
        $data = $this->validate($request, [
            'email' => 'required_without:phone|email',
            'phone' => 'required_without:email|string',
        ]);

        $this->setUserTo($data['email'] ?? $data['phone'], ['id', 'email', 'phone', 'email_verified_at', 'phone_verified_at']);

        if (!$this->user) {
            return response()->json([
                'message' => __('auth.failed'),
            ], 401);
        }

        if (isset($data['email']) && !$this->user->hasVerifiedEmail()) {
            $this->user->sendEmailVerificationNotification();
        }

        if (isset($data['phone']) && !$this->user->hasVerifiedPhone()) {
            $this->user->sendPhoneVerificationNotification();
        }

        return response()->json([
            'message' => __('auth.verification-resent'),
            'email_verified' => $this->user->hasVerifiedEmail(),
            'phone_verified' => $this->user->hasVerifiedPhone(),
        ]);
    }

    /**
     * Verify User Phone / Email
     *
     * @unauthenticated
     * @bodyParam email string required_without:phone User Email Example: medical@aquadic.com
     * @bodyParam phone string required_without:email User Phone Example: +201101782890
     * @bodyParam code string required User Phone Code Example: 123456
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function verify(Request $request): JsonResponse
    {
        $data = $this->validate($request, [
            'email' => 'required_without:phone|email',
            'phone' => 'required_without:email|string',
            'code' => 'required|string|min:6|max:6',
        ]);

        $this->setUserTo($data['email'] ?? $data['phone'], ['id']);

        if (!$this->user) {
            return response()->json([
                'message' => __('auth.failed'),
            ], 401);
        }

        if (isset($data['email']) && !$this->user->hasVerifiedEmail()) {
            if (!$this->user->hasVerificationCode($data['email'], $data['code'])) {
                return response()->json([
                    'message' => __('auth.invalid-code'),
                ], 401);
            }

            $this->user->markEmailAsVerified();
            event(new Verified($this->user));
        }

        if (isset($data['phone']) && !$this->user->hasVerifiedPhone()) {
            if (!$this->user->hasVerificationCode($this->normalizePhoneNumber($data['phone']), $data['code'])) {
                return response()->json([
                    'message' => __('auth.invalid-code'),
                ], 401);
            }

            $this->user->markPhoneAsVerified();
            event(new Verified($this->user));
        }

        return response()->json([
            'message' => __('auth.verified'),
        ]);
    }

    /**
     * Forget Password
     *
     * @unauthenticated
     * @bodyParam email string required User Email Example: medical@aquadic.com
     * @bodyParam phone string required User Phone Example: +201101782890
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function forgetPassword(Request $request): JsonResponse
    {
        $data = $this->validate($request, [
            'email' => 'required_without:phone|email',
            'phone' => 'required_without:email|string',
        ]);

        $this->setUserTo($data['email'] ?? $data['phone'], ['id', 'email', 'phone']);

        if (!$this->user) {
            return response()->json([
                'message' => __('auth.failed'),
            ], 401);
        }

        if (isset($data['email'])) {
            $this->user->sendEmailVerificationNotification();
        }

        if (isset($data['phone'])) {
            $this->user->sendPhoneVerificationNotification();
        }

        return response()->json([
            'message' => __('auth.forget-password'),
        ]);
    }

    /**
     * Reset Password
     *
     * @unauthenticated
     * @bodyParam email string required_without:phone User Email Example: medical@aquadic.com
     * @bodyParam phone string required_without:email User Phone Example: +201101782890
     * @bodyParam code string required User Phone Code Example: 123456
     * @bodyParam password string required User Password Example: 123456
     * @bodyParam password_confirmation string required User Password Confirmation Example: 123456
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function resetPassword(Request $request): JsonResponse
    {
        $data = $this->validate($request, [
            'email' => 'required_without:phone|email',
            'phone' => 'required_without:email|string',
            'code' => 'required_with:phone|string|min:6|max:6',
            //'password' => 'required|string|min:6|max:256|confirmed',
        ]);

        $this->setUserTo($data['email'] ?? $data['phone'], ['id']);

        if (!$this->user) {
            return response()->json([
                'message' => __('auth.failed'),
            ], 401);
        }

        if (isset($data['email'])) {
            if (!$this->user->hasVerificationCode($data['email'], $data['code'])) {
                return response()->json([
                    'message' => __('auth.invalid-code'),
                ], 401);
            }

            $this->user->forceFill([
           //     'password' => Hash::make($data['password']),
                'email_verified_at' => now(),
            ])->save();

            event(new PasswordReset($this->user));
        }

        if (isset($data['phone'])) {
            if (!$this->user->hasVerificationCode($this->normalizePhoneNumber($data['phone']), $data['code'])) {
                return response()->json([
                    'message' => __('auth.invalid-code'),
                ], 401);
            }

            $this->user->forceFill([
            //    'password' => Hash::make($data['password']),
                'phone_verified_at' => now(),
            ])->save();

            event(new PasswordReset($this->user));
        }

        $this->user->refresh();

        return response()->json([
            'message' => __('auth.reset-password'),
            'user' => $this->user,
            'token' => $this->user->createToken('authToken')->plainTextToken,
            'email_verified' => $this->user->hasVerifiedEmail(),
            'phone_verified' => $this->user->hasVerifiedPhone(),
        ]);
    }

    /**
     * Update Profile
     *
     * @authenticated
     * @bodyParam name string required User Name Example: John Doe
     * @bodyParam description string sometimes Description of Doctors Example: Best Doctor Ever.
     * @bodyParam profession string sometimes Profession of Doctors Example: Diet Doctor
     * @bodyParam work_times array required Work Times for Doctors
     * @bodyParam email string sometimes User Email Example: medical@aquadic.com
     * @bodyParam phone string sometimes User Phone Example: +201101782890
     * @bodyParam password string nullable User Password Example: 123456
     * @bodyParam password_confirmation nullable User Password Confirmation Example: 123456
     * @throws ValidationException
     */
    public function updateProfile(Request $request): JsonResponse
    {
        $data = $this->validate($request, [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $this->user->id,
            'phone' => 'sometimes|string|unique:users,phone,' . $this->user->id,
            'password' => 'nullable|string|min:6|max:256|confirmed',
            'old_password' => 'required_with:password|string|min:6|max:256',
        ]);

        $this->user->update([
            'name' => $data['name'] ?? $this->user->name,
        ]);

        if (isset($data['password'])) {
            if (!Hash::check($data['old_password'], $this->user->password)) {
                return response()->json([
                    'message' => __('auth.password-mismatch'),
                ], 401);
            }

            $this->user->forceFill([
                'password' => Hash::make($data['password']),
            ])->save();

            event(new PasswordReset($this->user));
        }

        if (isset($data['phone']) && $this->user->phone !== $this->normalizePhoneNumber($data['phone'])) {
            $normalizedPhone = $this->normalizePhoneNumber($data['phone']);

            if (User::where('phone', $normalizedPhone)->exists()) {
                throw ValidationException::withMessages([
                    'phone' => __('validation.unique', ['attribute' => 'mobile']),
                ]);
            }

            // TODO: Send SMS.
            $this->user->forceFill([
                'phone' => $normalizedPhone,
            ])->save();
        }

        if (isset($data['email']) && $this->user->email !== $data['email']) {
            // TODO: Send Email.
            $this->user->forceFill([
                'email' => $data['email'],
            ])->save();

//            event(new EmailChanged($this->user));
        }

        $this->user->refresh();

        return response()->json([
            'message' => __('auth.update-profile'),
            'user' => $this->user,
            'email_verified' => $this->user->hasVerifiedEmail(),
            'phone_verified' => $this->user->hasVerifiedPhone(),
        ]);
    }
}
