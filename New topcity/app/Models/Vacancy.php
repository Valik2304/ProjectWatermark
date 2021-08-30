<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Vacancy extends Model
{
    use Translatable;
    protected $translatable = [
        'name',
        'description',
        'type',
        'address'
    ];

    protected $fillable =[
        'name',
        'description',
    ];
}
