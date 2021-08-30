<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class TeamMember extends Model
{
    use Translatable;
    protected $translatable = [
        'name',
        'description',
    ];

    protected $fillable =[
        'name',
        'description',
        'image'
    ];
}
