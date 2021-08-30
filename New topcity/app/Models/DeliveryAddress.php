<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    protected $fillable = [
        'city',
        'address',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
