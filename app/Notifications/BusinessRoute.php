<?php

namespace App\Notifications;

use App\Channels\CentralDB;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BusinessRoute extends Notification
{
    use Queueable;
    private $data;
    private $cars = [
        '1'=> '6 Pasajeros',
        '2'=> '11 Pasajeros',
        '3'=> '15 Pasajeros',
        '4'=> '19 Pasajeros',
        '5'=> '23 Pasajeros',
        '6'=> '30 Pasajeros',
        '7'=> '40 Pasajeros',
        '8'=> '42 Pasajeros',
    ];
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
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack', 'mail', CentralDB::class];
    }

    public function toSendCentral($notifiable)
    {
        return [$notifiable];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return $this->normalizeData();
    }

    private function normalizeData()
    {
        $mail = new MailMessage;
        $mail->subject('Nuevo solicitud de servicio ruta empresarial');
        unset($this->data['_token']);
        $this->data['car'] = $this->cars[$this->data['car']];
        foreach ($this->data['worries'] as $key => $item) {
            $mail->line($key . ' : ' . $item);
        }
        unset($this->data['worries']);
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
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
