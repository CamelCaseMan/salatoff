<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Mail\OrderAdminMail;
use App\Mail\OrderClientMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendOrderEmailNotification
{
    /**
     * @param NewOrder $event
     */
    public function handle(NewOrder $event)
    {
        //Отправляем письмо админу
        Mail::to(config('shop.admin_email'))
            ->send(new OrderAdminMail($event->order));

        //Отправляем письмо клиенту, если указал почту
        if (!empty($event->order->email))
            Mail::to($event->order->email)
                ->send(new OrderClientMail($event->order));
    }
}
