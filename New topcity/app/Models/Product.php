<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{
    use SearchableTrait/*, Searchable*/;

    use Translatable;
    protected $translatable = [
        'name',
        'details',
        'description',
        'seo_title',
        'seo_description'
    ];

    protected $fillable = [
        'name',
        'article',
        'details',
        'price',
        'slug',
        'quantity',

    ];



    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class)->withPivot('value');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function presentPrice()
    {
        return '$'.number_format($this->price / 100, 2);
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        $extraFields = [
            'categories' => $this->categories->pluck('name')->toArray(),
        ];

        return array_merge($array, $extraFields);
    }
}
