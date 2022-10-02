<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordReset extends Notification
{
    use Queueable;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Recuperação de senha')
            ->greeting('Esqueceu sua senha?')
            ->line('Clique no botão abaixo e siga as instruções para recuperar seu acesso.') // Here are the lines you can safely override
            ->action('Recuperar Senha', url('password/reset', $this->token))
            ->line('Caso você não tenha solicitado esta alteração, por favor, desconsidere esse e-mail.')
            ->salutation('Obrigado, equipe Bankprime.');
    }
}
