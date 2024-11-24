<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject('New Order Created')
            ->greeting('Hello Admin,')
            ->line('A new order has been created by user: ' . $this->order->user->name)
            ->line('Order ID: ' . $this->order->id)
            ->line('Pickup Time: ' . $this->order->pickup_time)
            ->action('View Orders', url('/admin/orders'))
            ->line('Thank you for using our application!');
    }
}
