<?php

namespace Webkul\GSN\Notifications\Channels;

use Webkul\GSN\Notifications\Bases\GsnBaseNotification;

class GSNNotificationChannel
{

    public function send($notifiable, GsnBaseNotification $notification)
    {
        $notification->toCustomApi($notifiable);
    }
}
