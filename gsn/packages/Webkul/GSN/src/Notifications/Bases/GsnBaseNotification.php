<?php

namespace Webkul\GSN\Notifications\Bases;


use Illuminate\Notifications\Notification;


class GsnBaseNotification extends Notification
{
    public function toCustomApi($notifiable) {}
}
