<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imageken extends Model
{
    //
    protected $table = 'images';
    protected $fillable = [
        'name', 'images', 'text'
    ];

}
