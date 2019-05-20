<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class newproduct extends Notification
{
    use Queueable;

    private $product;

    public function __construct(\App\product $product){
        $this->product = $product;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable){
        return [
            'product_id' => $this->product->id,
            'user_id'   =>  $this->product->record_by,
            'title'=> 'لقد تم إضافة منتج جديد من قبل',
            'data'=> 'product',
            'date' =>  $this->product->created_at,
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}