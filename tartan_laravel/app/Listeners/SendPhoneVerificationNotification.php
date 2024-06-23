<?php

namespace App\Listeners;

use App\Contracts\MustVerifyPhone;
use Illuminate\Auth\Events\Registered;

class SendPhoneVerificationNotification
{
    /**
     * Handle the event.
     *
     * @param Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        if ($event->user instanceof MustVerifyPhone && !$event->user->hasVerifiedPhone()) {
            $event->user->sendPhoneVerificationNotification();
        }
    }
}
