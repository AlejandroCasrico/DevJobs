<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;
    private $id_vacante;
    private $nombre_vacante;
    private $usuario_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_vacante, $nombre_vacante,$usuario_id)
    {
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {

        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url =  url('/candidatos/'.$this->id_vacante);
        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato en tu vacante')
                    ->line('La vacante es'.$this->nombre_vacante)
                    ->action('ver notificaciones', $url)
                    ->line('Gracias por usar devjobs!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    //almacena las noti en las bases de datos


}