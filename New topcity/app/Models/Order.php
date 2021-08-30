<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'custom_delivery',
        'billing_email',
        'billing_name',
        'billing_address',
        'billing_city',
        'billing_phone',
        'billing_total',
        'content',
        'order_payment_id',
        'order_status_id',
        'quick_order'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function status()
    {
        return $this->belongsTo(OrderStatus::class,'order_status_id','id','order_statuses');
    }

    public function payment()
    {
        return $this->belongsTo(OrderPayment::class,'order_payment_id','id','order_payments');
    }

}
