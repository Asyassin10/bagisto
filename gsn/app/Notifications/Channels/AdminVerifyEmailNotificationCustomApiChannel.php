<?php

namespace App\Notifications\Channels;

use App\Notifications\AdminVerifyEmailNotification;

class AdminVerifyEmailNotificationCustomApiChannel
{
    public function send($notifiable, AdminVerifyEmailNotification $notification)
    {
        $notification->toCustomApi($notifiable);
    }
}
