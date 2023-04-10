<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The password reset token.
     */
    public string $token;

    /**
     * Create a notification instance.
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = $this->resetUrl($notifiable);
        $count = config('auth.passwords.users.expire');

        return (new MailMessage())
            ->subject(trans('Reset Password Notification'))
            ->markdown('mail.auth.reset-password', compact('url', 'count'));
    }

    /**
     * Get the reset URL for the given notifiable.
     */
    protected function resetUrl(mixed $notifiable): string
    {
        return config('app.frontend_url')."/password-reset/$this->token?email={$notifiable->email}";
    }
}
