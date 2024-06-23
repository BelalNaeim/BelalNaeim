<?php

namespace App\Notifications;

use App\Notifications\Channels\DatabaseOTPChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class VerifyEmail extends Notification implements ShouldQueue
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
        $channels = [DatabaseOTPChannel::class];

        if (config('app.env') == 'production') {
            $channels[] = 'mail';
        }

        return $channels;
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(Lang::get('Verify Email Address'))
            ->line(Lang::get('Please copy the code below to verify your email address.'))
            ->line($this->otp)
            ->line(Lang::get('If you did not create an account, no further action is required.'));
    }
}
