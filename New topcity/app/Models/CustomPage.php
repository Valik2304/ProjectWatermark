<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CustomPage extends Model
{
    use Translatable;
    protected $translatable = [
        'title',
        'description',
        'seo_title',
        'seo_description'
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'seo_title',
        'seo_description',
    ];


    /**
     * Получить ключ маршрута для модели.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
