<?php

namespace App\Notifications;

use App\Notifications\Channels\CustomApiChannel;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class EditorAccountCreationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        private string $email,
        private string $password
    ) {
    }


    public function via(object $notifiable)
    {
        return [CustomApiChannel::class];
    }
    public function toCustomApi($notifiable): void
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
                        "password" => $this->password
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

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $signedUrl = URL::temporarySignedRoute(
            'verification.verify', // named route
            Carbon::now()->addMinutes(10),
            ['id' => $notifiable->id, 'hash' => sha1($notifiable->email)],
            false
        );
        return (new MailMessage)
            ->line('Voilà ton email : ' . $this->email)
            ->line(line: 'Voilà ton mot de passe : ' . $this->password)
            ->line("ton compte pour le moment n'est pas active , veuillez cliquer sur le button pour l'activer")
            ->salutation(salutation: "")
            ->greeting("Bonjour")
            ->action('activer mon compte', url: env("APP_URL") . $signedUrl);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
