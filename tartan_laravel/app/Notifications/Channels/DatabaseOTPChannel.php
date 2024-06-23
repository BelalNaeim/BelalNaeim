<?php

namespace App\Notifications\Channels;

use App\Notifications\VerifyEmail;
use App\Notifications\VerifyPhone;
use Illuminate\Notifications\Notification;

class DatabaseOTPChannel
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param Notification $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        if ($notification instanceof VerifyEmail) {
            $target = $notifiable->email;
        } elseif ($notification instanceof VerifyPhone) {
            $target = $notifiable->phone;
        }

        $notifiable->otps()->create([
            'target' => $target ?? null,
            'code' => $notification->otp,
            'expired_at' => now()->addMinutes(10),
        ]);
    }
}
