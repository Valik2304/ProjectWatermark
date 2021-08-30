<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class News extends Model
{

    use Translatable;
    protected $translatable = [
        'title',
        'excerpt',
        'description',
        'seo_title',
        'seo_description'
    ];

    protected $fillable = [
        'title',
        'excerpt',
        'description',
        'image',
        'product_id',

    ];



    public function category()
    {
        return $this->belongsTo(NewsCategory::class,'news_category_id','id');
    }

    public  function product()
    {
        return $this->belongsTo(Product::class);
    }
}
