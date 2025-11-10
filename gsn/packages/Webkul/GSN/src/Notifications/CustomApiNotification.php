<?php

namespace Webkul\GSN\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CustomApiNotification extends Notification
{
    protected $message;
    protected $subject;
    protected $recipientEmail;
    protected $senderEmail;
    protected $senderName;
    protected $replyToEmail;
    protected $replyToName;
    protected $templateCode;
    protected $personalization;

    public function __construct($recipientEmail, $subject, $message, $senderEmail, $senderName, $replyToEmail, $replyToName, $templateCode, $personalization = [])
    {
        $this->recipientEmail = $recipientEmail;
        $this->subject = $subject;
        $this->message = $message;
        $this->senderEmail = $senderEmail;
        $this->senderName = $senderName;
        $this->replyToEmail = $replyToEmail;
        $this->replyToName = $replyToName;
        $this->templateCode = $templateCode;
        $this->personalization = $personalization;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['customapi'];
    }

    /**
     * Send the notification via the Custom API channel.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Http\Client\Response
     */
    public function toCustomApi($notifiable)
    {
        $messageBody = view('emails.custom', [
            'subject' => $this->subject,
            'message' => $this->message,
        ])->render();

        $payload = [
            'from' => $this->senderEmail,
            'name' => $this->senderName,
            'to' => $this->recipientEmail,
            'subject' => $this->subject,
            'reply_to_email' => $this->replyToEmail,
            'reply_to_name' => $this->replyToName,
            'code_template' => $this->templateCode,
            'element_personnalisation' => json_encode(array_merge([
                'content' => $messageBody,
            ], $this->personalization))
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.customapi.key'),
            'Content-Type' => 'application/json',
        ])->post('https://ws-rec.experts-comptables.org:8042/email/sendEmail', $payload);

        if ($response->failed()) {
            Log::error('Failed to send notification via Custom API', ['response' => $response->body()]);
        }

        return $response;
    }
}
