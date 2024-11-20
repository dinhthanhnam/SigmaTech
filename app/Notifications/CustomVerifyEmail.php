<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends VerifyEmail
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the mail message.
     */
    public function toMail($notifiable): MailMessage
    {
        // Tạo URL xác thực
        $verificationUrl = $this->verificationUrl($notifiable);

        // Trả về nội dung email dạng Markdown
        return (new MailMessage)
            ->subject('Xác thực Email đăng ký')
            ->markdown('emails.email_verify', [
                'url' => $verificationUrl,
                'user' => $notifiable,
            ]);
    }

    /**
     * Generate the verification URL.
     */
    protected function verificationUrl($notifiable): string
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
