<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class OrderPayment extends Model
{
    use Translatable;
    protected $translatable = [
        'name',
    ];

    protected $guarded = [];
}
