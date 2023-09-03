<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class TwilioChannel
{
    public function send($notifiable, Notification $notification)
    {
        config('app.env') == 'production' ? $notification->toTwilio($notifiable) : $notification->toFile($notifiable);
    }
}
