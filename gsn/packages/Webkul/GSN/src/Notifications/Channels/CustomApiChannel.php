<?php

namespace Webkul\GSN\Notifications\Channels;

use Webkul\GSN\Notifications\EditorAccountCreationNotification;
use Illuminate\Notifications\Notification;

class CustomApiChannel
{
    public function send($notifiable, EditorAccountCreationNotification $notification)
    {
        $notification->toCustomApi($notifiable);
    }
}
