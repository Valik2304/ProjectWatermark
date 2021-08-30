<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopSearchCurrentCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use App\TestProduct;
use DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;


class ShopController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = app()->getLocale();
//        \Cache::tags('catalog')->flush();
        $pagination = 10;

        /*      $products = Product::select(['id', 'name', 'article', 'details', 'price', 'image'])
                  ->has('categories')
                  ->with('categories')
                  ->withTranslation($language);*/


        if (request()->sort == 'all') {
            $products = cacheRememberForSeconds(
                'category_for_show_main' . 'language_' . $language . 'sort_all' . '_page#' . request()->get('page'),
                function () use ($language, $pagination) {
                    return Product::with('categories')->select(['id', 'name', 'article', 'details', 'price', 'image', 'qty'])
                        ->has('categories')
                        ->with('categories')
                        ->withTranslation($language)->orderBy('price', 'desc')->paginate($pagination);
                });
        } elseif (request()->sort == 'in_stock') {
            $products = cacheRememberForSeconds(
                'category_for_show_main' . 'language_' . $language . 'in_stock' . '_page#' . request()->get('page'),
                function () use ($language, $pagination) {
                    return Product::with('categories')->select(['id', 'name', 'article', 'details', 'price', 'image', 'qty'])
                        ->has('categories')
                        ->with('categories')
                        ->withTranslation($language)->where('price', '>', 0)->orderBy('price', 'desc')->paginate($pagination);
                });
        } else {
            $products = cacheRememberForSeconds(
                'category_for_show_main' . 'language_' . $language . 'not_sort' . '_page#' . request()->get('page'),
                function () use ($language, $pagination) {
                    return Product::with('categories')->select(['id', 'name', 'article', 'details', 'price', 'image', 'qty'])
                        ->has('categories')
                        ->with('categories')
                        ->withTranslation($language)->orderBy('price', 'desc')->paginate($pagination);
                });
        }


        //        $products->map(function ($item) {
        //            return $item->image = /*url('/') .*/ 'storage/products/' . $item->image . '.JPG';
        //        });
        $products->map(function ($item) {
            if (empty($item->image)) {
                return $item->image = 'storage/' . 's';
            } else {
                return $item->image = 'storage/' . $item->image;
            }
        });

        $dataAjax = compact('products');


        if (request()->ajax()) {
            return response()->json([
                'body' => view('catalog.presult', $dataAjax)->render(),
                'next' => $products->appends(request()->except(['_token']))->nextPageUrl()
            ]);

        }

        $link = $products->appends(request()->except('_token'))->nextPageUrl();

        $title = __('catalog.seo.title');
        $description = __('catalog.seo.description');
        $category_slug = 'null';
        $category_current = 0;
        return view('catalog.index', compact('products', 'link', 'category_current', 'title', 'description', 'category_slug'));

    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function show(Category $category)
    {
//                \Cache::tags('catalog')->flush();
        $language = \App::getLocale();
        $categories_current = cacheRememberForSeconds(
            'categories_current' . $category->id . 'language_' . $language,
            function () use ($category, $language) {
                return Category::where('id', $category->id)
                    ->with(['ancestors' => function ($q) use ($language) {
                        $q->withTranslation($language);
                    }])->withTranslation($language)->first();
            });


        $pagination = 10;

        $categoryId = $category->getKey();
        $categories = $products = cacheRememberForSeconds('categories_descendants' . $category->id,
            function () use ($category) {
                return $category->descendants()->pluck('id');
            });
        $categories[] = $categoryId;


        if (request()->sort == 'all') {
            $products = cacheRememberForSeconds(
                'category_for_show_' . $categoryId . 'language_' . $language . 'sort_all' . '_page#' . request()->get('page'),
                function () use ($categories, $language, $pagination) {
                    return Product::with('categories')->whereHas('categories', function ($query) use ($categories) {
                        $query->whereIn('category_id', $categories);
                    })->withTranslation($language)->orderBy('price', 'desc')->paginate($pagination);
                });
        } elseif (request()->sort == 'in_stock') {
            $products = cacheRememberForSeconds(
                'category_for_show_' . $categoryId . 'language_' . $language . 'sort_in_stock' . '_page#' . request()->get('page'),
                function () use ($categories, $language, $pagination) {
                    return Product::with('categories')->whereHas('categories', function ($query) use ($categories) {
                        $query->whereIn('category_id', $categories);
                    })->withTranslation($language)->where('price', '>', 0)->orderBy('price', 'desc')->paginate($pagination);
                });
        } else {
            $products = cacheRememberForSeconds(
                'category_for_show_' . $categoryId . 'language_' . $language . 'sort_not' . '_page#' . request()->get('page'),
                function () use ($categories, $language, $pagination) {
                    return Product::with('categories')->whereHas('categories', function ($query) use ($categories) {
                        $query->whereIn('category_id', $categories);
                    })->withTranslation($language)->orderBy('price', 'desc')->paginate($pagination);
                });
        }


        $products->map(function ($item) {
            if (empty($item->image)) {
                return $item->image = 'storage/' . 's';
            } else {
                return $item->image = 'storage/' . $item->image;
            }
        });

        $dataAjax = compact('products', 'categoryId');

        if (request()->ajax()) {
            return response()->json([
                'body' => view('catalog.presult', $dataAjax)->render(),
                'next' => $products->appends(request()->except(['_token']))->nextPageUrl()
            ]);

        }

        $link = $products->appends(request()->except('_token'))->nextPageUrl();

        $category_slug = $category->slug;
        $category_id = $category->id;
        $category_current = $category_id;
        $category_file = $category->upload_file;


        $title = $categories_current->getTranslatedAttribute('seo_title', $language) != ''? $categories_current->getTranslatedAttribute('seo_title', $language): $categories_current->getTranslatedAttribute('name', $language);

        $description = $categories_current->getTranslatedAttribute('seo_description', $language);

        return view('catalog.index', compact(
            'products',
            'link',
            'title',
            'category_slug',
            'category_id',
            'categories_current',
            'category_current',
            'category_file',
            'description'
        ));

    }

    public function showProduct($category, $product)
    {
        $language = [\App::getLocale(), 'uk'];
        $product = Product::where('id', $product)->with(['characteristics', 'comments', 'categories'])->withTranslation($language)->first();
        /*$category = Category::select(['id', 'name'])->where('slug', $category)->withTranslation($language)->first();*/
        /*$product->image = 'storage/products/' . $product->image . '.JPG';*/

        if (empty($product->image)) {
            $product->image = 'd';
        } else {
            $product->image = /*url('/') .*/
                'storage/' . $product->image;
        }
        if ($product->categories->where('slug', $category)->count() == 0) abort(404);
        $categories_current = Category::where('slug', $category)
            ->with(['ancestors' => function ($q) use ($language) {
                $q->withTranslation($language);
            }])->withTranslation($language)->first();
        $category = $categories_current;

        $title = $product->getTranslatedAttribute('seo_title', $language) ?? $product->getTranslatedAttribute('name', $language);
        $description = $product->getTranslatedAttribute('seo_description', $language) ?? Str::limit($product->getTranslatedAttribute('details', $language), 255, '');

        return view('catalog.product', compact('category', 'product', 'categories_current', 'title', 'description'));
    }


    public function search(Request $request)
    {
        $check = $request->get('checkbox');

        $language = app()->getLocale();
        $pagination = 10;

        $queries = preg_split('/\r\n|\r|\n/', $request->get('query'));
        $products = Product::query()->has('categories')->where(function ($q) use ($queries, $check) {
            foreach ($queries as $query) {
                if ($check) {
                    if ($query === reset($queries)) {
                        $q = $q->where('article', $query);
                    }
                    $q = $q->orWhere('article', $query);
                } else {
                    $query = preg_replace('/[^\S\r\n]+/', ' ', $query);
                    $query = str_replace(' ', '%', $query);
                    if ($query === reset($queries)) {
                        $q = $q->where('article', 'like', '%' . $query . '%');
                        $q = $q->orWhere('name', 'like', '%' . $query . '%');
                    }
                    $q = $q->orWhere('article', 'like', '%' . $query . '%');
                    $q = $q->orWhere('name', 'like', '%' . $query . '%');

                }
            }
        });
        $products = $products->withTranslation($language);
        $products = $products->orderBy('price', 'desc')->paginate($pagination);


        $products->map(function ($item) {
            if (empty($item->image)) {
                return $item->image = 'storage/' . 's';
            } else {
                return $item->image = 'storage/' . $item->image;
            }
        });

        if (request()->ajax()) {
            return response()->json([
                'body' => view('catalog.presult', compact('products'))->render(),
                'next' => $products->appends(request()->input())->nextPageUrl()
            ]);

        }

        $category_current = 0;
        $link = $products->appends(request()->input())->nextPageUrl();
        $title = __('general.search_result');
        $description = __('general.search_result');

        return view('catalog.search', compact('products', 'link', 'title', 'description', 'category_current'));
    }

    public function searchCurrentCategory(Request $request)
    {
        $language = app()->getLocale();
        $pagination = 10;
        $search_query = $request->get('query');
        $category_id = $request->get('category_id');

        $products = Product::query()->has('categories')->where(function ($q) use ($search_query) {
            $q->where('article', 'like', "%$search_query%")
                ->orWhere('name', 'like', "%$search_query%")
                ->orWhere('details', 'like', "%$search_query%");
        });

        if ($category_id) {
            $category_ids = Category::descendantsAndSelf($category_id)->pluck('id');

            $products = $products->whereHas('categories', function ($query) use ($category_ids) {
                $query->whereIn('category_id', $category_ids);
            });
        }
        $products = $products->withTranslation($language)->paginate(10);

//        $products->map(function ($item) {
//            return $item->image = /*url('/') .*/ 'storage/products/' . $item->image . '.JPG';
//        });
        $products->map(function ($item) {
            if (empty($item->image)) {
                return $item->image = 'storage/' . 's';
            } else {
                return $item->image = 'storage/' . $item->image;
            }
        });


        if (request()->ajax()) {
            return response()->json([
                'body' => view('catalog.presult', compact('products'))->render(),
                'next' => $products->appends(request()->input())->nextPageUrl()
            ]);

        }

    }

}
