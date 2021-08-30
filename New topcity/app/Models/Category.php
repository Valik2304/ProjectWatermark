<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use TCG\Voyager\Traits\Translatable;


class Category extends Model
{
    use NodeTrait;
    use Translatable;
    protected $translatable = [
        'name',
        'description',
        'seo_title',
        'seo_description'
        ];

    protected $guarded = [];

    protected $table = 'category';

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

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
