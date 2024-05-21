<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class mail_contract extends Notification
{
    use Queueable;
    private $contract_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contract_id)
    {
        $this->contract_id = $contract_id;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = 'http://127.0.0.1:8000/InvoicesDetails/'.$this->contract_id;
        return (new MailMessage)
            ->subject('اضافة عقد تشغيل جديدة')
            ->line('اضافة عقد جديدة')
            ->action('عرض العقد', $url)
            ->line('شكرا لاستخدامك مورا سوفت لادارة الفواتير');
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
