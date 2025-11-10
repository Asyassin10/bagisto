<?php

namespace App\Notifications\Channels;

use App\Notifications\EditorAccountCreationNotification;
use Illuminate\Notifications\Notification;

class CustomApiChannel
{
    public function send($notifiable, EditorAccountCreationNotification $notification)
    {
        $notification->toCustomApi($notifiable);
    }
}
