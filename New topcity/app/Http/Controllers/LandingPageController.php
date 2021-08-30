<?php

namespace App\Http\Controllers;


use App\Models\About;
use App\Models\Category;
use App\Models\MainSlider;
use App\Models\News;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = MainSlider::query()
            ->select([
                'id',
                'title',
                'image',
                'image_ru',
                'image_en',
                'link'
            ])
            ->orderBy('created_at', 'desc')
            ->withTranslation(\App::getLocale())
            ->get();


        $industry_solutions = News::query()
            ->select([
                'id',
                'title',
                'slug',
                'excerpt',
                'image',
                'news_category_id',
                'created_at'
            ])
            ->with('category:id,name,slug')
            ->whereHas('category', function ($query) {
                $query->where('slug', 'industry-solutions');
            })
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->withTranslation(\App::getLocale())
            ->get();


        $siemens_news = News::query()
            ->select([
                'id',
                'title',
                'slug',
                'excerpt',
                'image',
                'news_category_id',
                'created_at'
            ])
            ->with([
                'category' => function ($q) {
                    $q->select(['id', 'slug', 'name'])
                        ->withTranslation(\App::getLocale());
                }
            ])
            ->whereHas('category', function ($query) {
                $query->where('slug', 'siemens-news');
            })
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->withTranslation(\App::getLocale())
            ->get();


        $categories = Category::query()
            ->whereNull('parent_id')
            ->with([
                'children' => function ($query) {
                    $query->withTranslation(\App::getLocale());
                }
            ])
            ->withTranslation(\App::getLocale())
            ->get();


        $video = About::query()->select(['video'])->first()->video;
        $video_exists = null;
        if (isset($video[0]) && !empty(json_decode($video)[0])) {
            $video = 'storage/' . json_decode($video)[0]->download_link;
            $video_exists = \File::exists(public_path($video));
        }


        return view('landing-page.index',
            compact(
                'industry_solutions',
                'siemens_news',
                'categories',
                'video',
                'video_exists',
                'sliders'
            ));
    }
}