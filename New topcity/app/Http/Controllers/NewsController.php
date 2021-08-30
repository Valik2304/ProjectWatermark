<?php

namespace App\Http\Controllers;


use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = null)
    {
        $pagination = 10;
        $language = \App::getLocale();
        if ($category) {
            $allnews = News::query()
                ->select([
                    'id',
                    'title',
                    'slug',
                    'excerpt',
                    'image',
                    'news_category_id',
                    'product_id',
                    'created_at'
                ])
                ->where('active',1)
                ->with(['category' => function ($q) use ($language) {
                    $q->select(['id', 'slug', 'name'])
                        ->withTranslation($language);
                }])
                ->whereHas('category', function ($query) use ($category) {
                    $query->where('slug', $category);
                });

            if ($allnews->count() == 0) abort(404, "news with {$category}   not found");
        } else {
            $allnews = News::query()
                ->select([
                    'id',
                    'title',
                    'slug',
                    'excerpt',
                    'image',
                    'news_category_id',
                    'product_id',
                    'created_at'
                ])
                ->where('active',1)
                ->with(['category' => function ($q) use ($language) {
                    $q->select(['id', 'slug', 'name'])
                        ->withTranslation($language);
                }])
                ->whereHas('category', function ($query) {
                    $query->where('slug','!=','industry-solutions');
                });
        }

        if ($language != 'uk') {
            $allnews = $allnews->whereHas('translations', function ($q) use ($language) {
                $q->where('locale', $language)->where('title', '!=', '');
            });
        }


        $allnews = $allnews->orderBy('created_at', 'desc')->withTranslation($language)->with('product:id,price,old_price')
            ->paginate($pagination);


        $newsCategories = NewsCategory::select(['id', 'name', 'slug'])->where('slug','!=','industry-solutions')->withTranslation(\App::getLocale())->get();

        if (request()->ajax()) {
            return response()->json([
                'body' => view('news.presult', compact('allnews', 'newsCategories'))->render(),
                'next' => $allnews->appends(request()->except('_token'))->nextPageUrl()
            ]);

        }


        $link = $allnews->appends(request()->except('_token'))->nextPageUrl();
        $category_current = $newsCategories->where('slug', $category)->first();
        $title = $category_current == null ? __('news.seo.title') : $category_current->getTranslatedAttribute('name', $language);

        return view('news.index',
            compact(
                'title',
                'allnews',
                'newsCategories',
                'link',
                'category_current'
            ));
    }

    /**
     * Display the specified resource.
     *
     * @param $category
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($category, $slug)
    {

        $language = \App::getLocale();

        $news = News::where('slug', $slug)
            ->where('active',1)
            ->with(['category' => function ($q) use ($language) {
                $q->select(['id', 'slug', 'name'])
                    ->withTranslation($language);
            }])
            ->withTranslation($language)
            ->firstOrFail();


        if ($news->getTranslatedAttribute('excerpt', $language, false) == '') {
            abort(404);
        }
        $title = $news->getTranslatedAttribute('seo_title', $language, false) ?? $news->getTranslatedAttribute('title', $language, false);
        $description = $news->getTranslatedAttribute('seo_description', $language, false) ?? Str::limit($news->getTranslatedAttribute('excerpt', $language, false), 255, '');

        return view('news.show', compact('news', 'description', 'title'));
    }

    public function industry_solutions()
    {
        $pagination = 10;
        $language = \App::getLocale();
            $allnews = News::query()
                ->select([
                    'id',
                    'title',
                    'slug',
                    'excerpt',
                    'image',
                    'news_category_id',
                    'product_id',
                    'created_at'
                ])
                ->where('active',1)
                ->with(['category' => function ($q) use ($language) {
                    $q->select(['id', 'slug', 'name'])
                        ->withTranslation($language);
                }])
                ->whereHas('category', function ($query) {
                    $query->where('slug', 'industry-solutions');
                });


        if ($language != 'uk') {
            $allnews = $allnews->whereHas('translations', function ($q) use ($language) {
                $q->where('locale', $language)->where('title', '!=', '');
            });
        }


        $allnews = $allnews->orderBy('created_at', 'desc')->withTranslation($language)->with('product:id,price,old_price')
            ->paginate($pagination);


        $category = NewsCategory::select(['id', 'name', 'slug', 'description'])->where('slug','industry-solutions')->withTranslation(\App::getLocale())->first();

        if (request()->ajax()) {
            return response()->json([
                'body' => view('news.presult', compact('allnews'))->render(),
                'next' => $allnews->appends(request()->except('_token'))->nextPageUrl()
            ]);

        }


        $link = $allnews->appends(request()->except('_token'))->nextPageUrl();
//        $category_current = $newsCategories->where('slug', $category)->first();
        $title = $category->getTranslatedAttribute('name', $language);

        return view('news.industry-solution',
            compact(
                'title',
                'allnews',
                'link',
                'category'
            ));
    }
}
