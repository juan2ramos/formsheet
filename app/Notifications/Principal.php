<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Channels\CentralDB;

class Principal extends Notification
{
    use Queueable;
    private $data;
    /**
     * Create a new notification instance.
     *
     * @param $data
     */
    public function __construct(Array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', CentralDB::class];
    }

    public function toSendCentral($notifiable)
    {
        return [$notifiable];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return $this->normalizeData();
    }

    private function normalizeData()
    {
        $mail = new MailMessage;
        $mail->subject('Nuevo solicitud de servicio viaje fuera de la ciudad');

        foreach ($this->data as $key => $item) {
            $mail->line($key . ' : ' . $item);
        }
        return $mail;
    }

    public function toSlack()
    {
        return (new SlackMessage())->content('Un nuevo form se ha creado');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
