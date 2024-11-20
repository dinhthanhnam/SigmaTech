<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class CustomResetPasswordEmail extends ResetPasswordNotification
{
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function toMail($notifiable)
    {
        $resetUrl = $this->resetUrl($notifiable); // Lấy URL reset mật khẩu đã tùy chỉnh

        // Trả về nội dung email dạng Markdown
        return (new MailMessage)
            ->subject('Yêu cầu đặt lại mật khẩu')
            ->markdown('emails.email_reset_password', [
                'url' => $resetUrl,
                'user' => $notifiable,
            ]);
    }

    protected function resetUrl($notifiable)
    {
        // Tùy chỉnh URL tại đây nếu cần
        return URL::temporarySignedRoute(
            'password.reset',
            now()->addMinutes(60), // URL sẽ hết hạn sau 60 phút
            [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ]
        );
    }
}
