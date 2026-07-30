<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;


    protected $token;


    /**
     * Création de la notification
     */
    public function __construct($token)
    {
        $this->token = $token;
    }



    /**
     * Les canaux utilisés
     */
    public function via($notifiable)
    {
        return ['mail'];
    }





    /**
     * Contenu de l'email
     */
    public function toMail($notifiable)
    {

        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->email
        ], false));


        return (new MailMessage)

            ->subject('Réinitialisation de votre mot de passe - ProxiBouaké')


            ->greeting('Bonjour '.$notifiable->name.' 👋')


            ->line('Vous avez demandé la réinitialisation de votre mot de passe sur ProxiBouaké.')


            ->line('Cliquez sur le bouton ci-dessous pour choisir un nouveau mot de passe.')


            ->action('Réinitialiser mon mot de passe', $url)


            ->line('Ce lien est valable pendant 60 minutes.')


            ->line('Si vous n’êtes pas à l’origine de cette demande, vous pouvez ignorer cet email.')


            ->salutation('L’équipe ProxiBouaké');
    }
}