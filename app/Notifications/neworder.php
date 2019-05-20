<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class neworder extends Notification
{
    use Queueable;

    private $product;

    public function __construct(\App\order $order){
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable){
        return [
            'product_id' => $this->order->id,
            'user_id'   =>  $this->order->record_by,
            'title'=> 'لقد تم طلب جديد من قبل',
            'data'=> 'order',
            'date' =>  $this->order->created_at,
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}