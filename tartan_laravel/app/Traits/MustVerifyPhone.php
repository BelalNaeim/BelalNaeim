<?php

namespace App\Traits;

use App\Notifications\VerifyPhone;

trait MustVerifyPhone
{
    /**
     * Determine if the user has verified their phone address.
     *
     * @return bool
     */
    public function hasVerifiedPhone()
    {
        return !is_null($this->phone_verified_at);
    }

    /**
     * Determine if the user has verified their phone address.
     *
     * @return bool
     */
    public function hasVerificationCode(string $phone, string $code)
    {
        $otp = $this->otps()
            ->valid()
            ->where('target', $phone)
            ->where('code', $code)
            ->first();

        if (!$otp) return false;

        $otp->update([
            'used_at' => now()
        ]);

        return true;
    }

    /**
     * Mark the given user's phone as verified.
     *
     * @return bool
     */
    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    /**
     * Send the phone verification notification.
     *
     * @return void
     */
    public function sendPhoneVerificationNotification()
    {
        $this->notify(new VerifyPhone);
    }

    /**
     * Get the phone address that should be used for verification.
     *
     * @return string
     */
    public function getPhoneForVerification()
    {
        return $this->phone;
    }
}
