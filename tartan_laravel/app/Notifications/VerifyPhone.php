<?php

namespace App\Notifications;

use App\Notifications\Channels\DatabaseOTPChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class VerifyPhone extends Notification implements ShouldQueue
{
    use Queueable;

    public int $otp;

    public function __construct()
    {
        $this->otp = rand(100000, 999999);
    }

    /**
     * Get the notification's channels.
     *
     * @param mixed $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return [DatabaseOTPChannel::class];
    }

    public function toWhatsapp($notifiable): array
    {
        return [
            'type' => 'text',
            'message' => urlencode("Your OTP For " . config('app.name') . " Application is {$this->otp}"),
            'phones' => ['222' . $notifiable->phone],
        ];
    }
}
