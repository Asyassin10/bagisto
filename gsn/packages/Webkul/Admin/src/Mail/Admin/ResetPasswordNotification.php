<?php

namespace Webkul\Admin\Mail\Admin;

use App\Notifications\Channels\ResetPasswordCustomApiChannel;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class ResetPasswordNotification extends ResetPassword
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    public function via($notifiable): array
    {
        //return ['mail'];

        return [ResetPasswordCustomApiChannel::class];
    }
    public function toResetPasswordCustomApiChannel($notifiable): void
    {
        $endpoint = env("ENV_MAIL_LINK");
        /* $signedUrl = URL::temporarySignedRoute(
            'verification.verify', // named route
            Carbon::now()->addMinutes(10),
            ['id' => $notifiable->id, 'hash' => sha1($notifiable->email)],
            false
        ); */
        $response_mail_api = Http::withHeaders([
            "auth_token" => env("TOKEN_CNOEC")
        ])->post($endpoint, [
                    'email' => $notifiable->email,
                    'name' => $notifiable->name,
                    'from' => "guide-solutions@contact.experts-comptables.org",
                    'reply_to_email' => $notifiable->email,
                    "to" => $notifiable->email,
                    'reply_to_name' => $notifiable->name,
                    "subject" => "Récupérer le mot de passe",
                    "code_template" => "gsmReinit",
                    "element_personnalisation" => [
                        "username" => $notifiable->name,
                        "link_reset" => env("APP_URL") . "/admin/reset-password/" . $this->token
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
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }
        $endpoint = env("ENV_MAIL_LINK");
        /* $signedUrl = URL::temporarySignedRoute(
            'verification.verify', // named route
            Carbon::now()->addMinutes(10),
            ['id' => $notifiable->id, 'hash' => sha1($notifiable->email)],
            false
        ); */
        $response_mail_api = Http::withHeaders([
            "auth_token" => env("TOKEN_CNOEC")
        ])->post($endpoint, [
                    'email' => $notifiable->email,
                    'name' => $notifiable->name,
                    'from' => "guide-solutions@contact.experts-comptables.org",
                    'reply_to_email' => $notifiable->email,
                    "to" => $notifiable->email,
                    'reply_to_name' => $notifiable->name,
                    "subject" => "Récupérer le mot de passe",
                    "code_template" => "gsmReinit",
                    "element_personnalisation" => [

                        "userName" => $notifiable->name,
                        "token" => $this->token
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

        /* return (new MailMessage)
            ->from(core()->getSenderEmailDetails()['email'], core()->getSenderEmailDetails()['name'])
            ->view('admin::emails.admin.forget-password', [
                'userName'  => $notifiable->name,
                'token'     => $this->token,
            ]); */
    }
}
