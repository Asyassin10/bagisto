<?php

namespace App\Broadcasting;

use Carbon\Carbon;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class CustomApiChannel
{
    /**
     * Create a new channel instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function send($notifiable, Notification $notification): void
    {

        $endpoint = env("ENV_MAIL_LINK");
        $signedUrl = URL::temporarySignedRoute(
            'verification.verify', // named route
            Carbon::now()->addMinutes(10),
            ['id' => $notifiable->id, 'hash' => sha1($notifiable->email)],
            false
        );
        $response_mail_api = Http::withHeaders([
            "auth_token" => env("TOKEN_CNOEC")
        ])->post($endpoint, [
                    'email' => $notifiable->email,
                    'name' => $notifiable->name,
                    'from' => "guide-solutions@contact.experts-comptables.org",
                    'reply_to_email' => $notifiable->email,
                    "to" => $notifiable->email,
                    'reply_to_name' => $notifiable->name,
                    "subject" => "Votre compte sur GSN a été créé",
                    "code_template" => env("CREATION_EDITEUR_TEMPLATE_ID"),
                    "element_personnalisation" => [
                        "url_host" => env("APP_URL"),
                        "url" => env("APP_URL") . $signedUrl,
                        "email" => $notifiable->email,
                        "name" => $notifiable->name,
                        "password" => $notifiable->password
                    ]
                ]);
        Log::info('Mail API Response:', ['body' => $response_mail_api->body()]);

        // Log the status code and other details if needed
        Log::info('Mail API Status Code:', ['status' => $response_mail_api->status()]);

        // If you want to log in case of failure
        if ($response_mail_api->failed()) {
            Log::error('Mail API Call Failed', [
                'status' => $response_mail_api->status(),
                'body' => $response_mail_api->body(),
            ]);
        }
    }
}
