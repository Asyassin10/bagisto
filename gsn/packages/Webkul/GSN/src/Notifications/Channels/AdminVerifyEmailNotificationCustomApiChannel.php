<?php

namespace Webkul\GSN\Notifications\Channels;

use Webkul\GSN\Notifications\AdminVerifyEmailNotification;

class AdminVerifyEmailNotificationCustomApiChannel
{
    public function send($notifiable, AdminVerifyEmailNotification $notification)
    {
        $notification->toCustomApi($notifiable);
    }
}
