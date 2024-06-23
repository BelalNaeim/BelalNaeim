<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Settings\AboutUsSetting;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

/**
 * @group General
 */
class ApiController extends Controller
{
    /**
     * Authenticated user.
     *
     * @var Authenticatable|User|null $user
     */
    public Authenticatable|User|null $user;

    /**
     * This is API Guard.
     *
     * @var string $guard
     */
    public string $guard;

    public function __construct()
    {
        $this->guard = 'api';
        $this->user = auth($this->guard)->user();
    }

    /**
     * Returns Application Needed Data
     *
     * @unauthenticated
     * @return JsonResponse
     */
    public function data(): JsonResponse
    {
        $about = new AboutUsSetting;
        $data = [
            'about_ar' => $about->about_ar,
            'about_en' => $about->about_en,
        ];

        return response()->json($data);
    }

    /**
     * Finds and Sets current user to User with username.
     *
     * @param $username
     * @param array $select
     * @return void|null
     * @throws ValidationException
     */
    protected function setUserTo($username, array $select = ['*'])
    {
        $query = User::query()->select($select);

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $query->where('email', $username);
        } else {
            $query->where('phone', $this->normalizePhoneNumber($username));
        }

        $this->user = $query->first();
    }

    /**
     * Normalizing Phone Number to DB Saving.
     *
     * @param string $phone
     * @return string|null
     * @throws ValidationException
     */
    protected function normalizePhoneNumber(string $phone): ?string
    {
        if (\Str::startsWith($phone, '+')) {
            $phone = substr($phone, 1);
        }

        if (\Str::startsWith($phone, '222')) {
            $phone = substr($phone, 3);
        }

        if (\Str::startsWith($phone, '0')) {
            $phone = substr($phone, 1);
        }

        if (is_numeric($phone)) return $phone;

        throw ValidationException::withMessages([
            'phone' => __('validation.invalid', ['attribute' => 'mobile']),
        ]);
    }
}
