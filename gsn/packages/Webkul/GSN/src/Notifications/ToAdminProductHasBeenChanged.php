<?php

namespace Webkul\GSN\Notifications;

use Webkul\GSN\Notifications\Bases\GsnBaseNotification;
use Webkul\GSN\Notifications\Channels\GSNNotificationChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Webkul\Product\Models\Product;
use Webkul\Product\Models\ProductFlat;
use Webkul\User\Models\Admin;

class ToAdminProductHasBeenChanged extends GsnBaseNotification
{
    use Queueable;
    public function __construct(private Product $product, private Admin $admin)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [GSNNotificationChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->view("gsn::notifications.UpdateProduit", ["username" => $notifiable->name]);
    }
    public function toCustomApi($notifiable): void
    {
        $endpoint = env("ENV_MAIL_LINK");

        $response_mail_api = Http::withHeaders([
            "auth_token" => env("TOKEN_CNOEC")
        ])->post($endpoint, [
                    'email' => $notifiable->email,
                    'name' => $notifiable->name,
                    'from' => "guide-solutions@contact.experts-comptables.org",
                    'reply_to_email' => $notifiable->email,
                    "to" => $notifiable->email,
                    'reply_to_name' => $notifiable->name,
                    "subject" => "Une fiche a été modifiée",
                    "code_template" => "gsmModificationSheet",
                    "element_personnalisation" => [
                        "login_link" => url("/admin/login"),
                        "username" => $notifiable->name,
                        "editeur_name" => $this->admin->name,
                        "fiche_name" => $this->product->product_flats->first()->name
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
