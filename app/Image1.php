<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image1 extends Model
{
    //
    protected $fillable = [
        'name', 'images', 'watermark', 'text'
    ];
}
