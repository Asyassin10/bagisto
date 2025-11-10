<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Webkul\Admin\Mail\Admin\ResetPasswordNotification;

class ResetPasswordCustomApiChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, ResetPasswordNotification $notification)
    {
        $notification->toResetPasswordCustomApiChannel($notifiable);

        // Send notification to the $notifiable instance...
    }
}
