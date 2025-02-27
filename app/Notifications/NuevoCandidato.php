<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;
    public $id_vacante;
    public $nombre_vacante;
    public $usuario_id;
    /**
     * Create a new notification instance.
     */
    public function __construct($id_vacante,$nombre_vacante,$usuario_id)
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
        $url = url('/notificaciones');
        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato')
                    ->line('Convocatoria'.$this->nombre_vacante)
                    ->action('Notification Action', $url)
                    ->line('Gracias por usar DevJobs');
    }

    //almacene las notificaciones en la bd
    public function toDatabase(object $notifiable){
            return [
                'id_vacante' => $this->id_vacante,
                'nombre_vacante' => $this->nombre_vacante,
                'usuario_id'  => $this->usuario_id
            ];
    }
}
