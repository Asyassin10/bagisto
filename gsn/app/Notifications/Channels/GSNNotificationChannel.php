<?php

namespace App\Notifications\Channels;

use App\Notifications\Bases\GsnBaseNotification;

class GSNNotificationChannel
{

    public function send($notifiable, GsnBaseNotification $notification)
    {
        $notification->toCustomApi($notifiable);
    }
}
