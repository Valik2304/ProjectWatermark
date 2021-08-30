<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class NewsCategory extends Model
{
    use Translatable;
    protected $translatable = [
        'name',
        'description'
    ];

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
