<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminOrderPlacedSpecific extends Mailable
{
    use Queueable, SerializesModels;


    public $order;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Нове замовлення з сайту "ТОВ Топсітісервіс"')
            ->markdown('emails.orders.admin-placed-price-specific');
    }
}
