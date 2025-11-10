<?php

namespace App\Notifications;

use App\Notifications\Channels\AdminVerifyEmailNotificationCustomApiChannel;
use App\Notifications\Channels\CustomApiChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AdminVerifyEmailNotification extends Notification
{

    protected $expiration;

    public function __construct()
    {
        // Set the expiration time for the URL
        $this->expiration = Carbon::now()->addMinutes(1);
    }

    public function via($notifiable)
    {
        return [AdminVerifyEmailNotificationCustomApiChannel::class];
    }

    public function toCustomApi($notifiable): void
    {
        $endpoint = env("ENV_MAIL_LINK");
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', // named route
            Carbon::now()->addMinutes(10),
            ['id' => $notifiable->id, 'hash' => sha1($notifiable->email)]
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
                    "code_template" => "gsmCheck",
                    "element_personnalisation" => [
                        "verify_link" => $verificationUrl,
                        "username" => $notifiable->name,
                        "url_host" => env("APP_URL")
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
    /*  public function toMail($notifiable)
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', // named route
            Carbon::now()->addMinutes(10),
            ['id' => $notifiable->id, 'hash' => sha1($notifiable->email)]
        );

        return (new MailMessage)
            ->subject('Veuillez vérifier votre adresse e-mail')
            ->greeting('Bonjour ' . $notifiable->name . ',')
            ->line('Nous vous remercions pour votre inscription sur [Guide des solutions numériques]. Pour compléter votre inscription, veuillez vérifier votre adresse e-mail en cliquant sur le lien ci-dessous :')
            ->action('Vérifier mon e-mail', $verificationUrl)
            ->line('Ce lien est valide pendant 10 minutes. Si vous n\'avez pas demandé cette inscription, vous pouvez ignorer cet e-mail.')
            ->line('Nous vous remercions pour votre attention.')
            ->salutation('Cordialement, L\'équipe de [Nom de l\'application]')
            ->line('Si vous avez des questions ou avez besoin d\'aide, n\'hésitez pas à nous contacter à [adresse email de support].');
    } */

    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            $this->expiration,
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
