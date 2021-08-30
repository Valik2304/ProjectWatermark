<?php

namespace App\Http\Controllers\Voyager;


use App\Jobs\DiscountJob;
use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use TCG\Voyager\Events\BreadDataDeleted;
use Validator;
use App\Models\Product;
use App\Models\Category;
//use App\CategoryProduct;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class NewsController extends VoyagerBaseController
{
    //***************************************
    //
    //                   /\
    //                  /  \
    //                 / /\ \
    //                / ____ \
    //               /_/    \_\
    //
    //
    // Add a new item of our Data Type BRE(A)D
    //
    //****************************************

    public function create(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? new $dataType->model_name()
            : false;

        foreach ($dataType->addRows as $key => $row) {
            $dataType->addRows[$key]['col_width'] = $row->details->width ?? 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }
        $discount_id = NewsCategory::where('slug', 'discount')->first()->id;

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'discount_id'));
    }

    public function store(Request $request)
    {
        if(!$this->validProductId($request)){
            return back()->withErrors('На такий продукт вже створена акція');
        };

//        dump($request->all(),$request->title_i18n, json_decode($request->title_i18n)->uk);
        if (!json_decode($request->title_i18n)->uk || !json_decode($request->excerpt_i18n)->uk || !json_decode($request->description_i18n)->uk)
        {
            return back()->withErrors('Ви не ввели укр. переклад. Введіть дані про статтю Українською мовою!');
        }

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));
        $requestNew = $request;
        $requestNew['slug'] = Str::slug($request->title);
        if (DB::table('news')->where('slug',$requestNew['slug'])->first()){
            return back()->withErrors('Такака назва новини вже існує!');
        }

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
        $data = $this->insertUpdateData($requestNew, $slug, $dataType->addRows, new $dataType->model_name());

        event(new BreadDataAdded($dataType, $data));


        $this->updateProduct($request,'create');

        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message'    => __('voyager::generic.successfully_added_new')." {$dataType->display_name_singular}",
                'alert-type' => 'success',
            ]);
    }


    //***************************************
    //                ______
    //               |  ____|
    //               | |__
    //               |  __|
    //               | |____
    //               |______|
    //
    //  Edit an item of our Data Type BR(E)AD
    //
    //****************************************

    public function edit(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses($model))) {
                $model = $model->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $model = $model->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$model, 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        foreach ($dataType->editRows as $key => $row) {
            $dataType->editRows[$key]['col_width'] = isset($row->details->width) ? $row->details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }
        $discount_id = NewsCategory::where('slug', 'discount')->first()->id;

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable','discount_id'));
    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {




        if(!$this->validProductId($request)){
            return back()->withErrors('На такий продукт вже створена акція');
        };
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();


        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $model = app($dataType->model_name);
        if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
            $model = $model->{$dataType->scope}();
        }
        if ($model && in_array(SoftDeletes::class, class_uses($model))) {
            $data = $model->withTrashed()->findOrFail($id);
        } else {
            $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
        }

        // Check permission
        $this->authorize('edit', $data);
        $requestNew = $request;
        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id)->validate();
        $this->insertUpdateData($requestNew, $slug, $dataType->editRows, $data);

        event(new BreadDataUpdated($dataType, $data));

        $this->updateProduct($request,'update');

        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                'alert-type' => 'success',
            ]);
    }


    //***************************************
    //                _____
    //               |  __ \
    //               | |  | |
    //               | |  | |
    //               | |__| |
    //               |_____/
    //
    //         Delete an item BREA(D)
    //
    //****************************************

    public function destroy(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('delete', app($dataType->model_name));

        // Init array of IDs
        $ids = [];
        if (empty($id)) {
            // Bulk delete, get IDs from POST
            $ids = explode(',', $request->ids);
        } else {
            // Single item delete, get ID from URL
            $ids[] = $id;
        }
        foreach ($ids as $id) {
            $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

            $product_id = $data->product_id;
            if ($product_id){
                $price = \DB::table('products')
                    ->where('id', $product_id)
                    ->value('old_price');

                \DB::table('products')
                    ->where('id', $product_id)
                    ->update([
                        'old_price'=>0,
                        'price'=>$price
                    ]);
            }
            $model = app($dataType->model_name);
            if (!($model && in_array(SoftDeletes::class, class_uses($model)))) {
                $this->cleanup($dataType, $data);
            }
        }

        $displayName = count($ids) > 1 ? $dataType->display_name_plural : $dataType->display_name_singular;

        $res = $data->destroy($ids);
        $data = $res
            ? [
                'message'    => __('voyager::generic.successfully_deleted')." {$displayName}",
                'alert-type' => 'success',
            ]
            : [
                'message'    => __('voyager::generic.error_deleting')." {$displayName}",
                'alert-type' => 'error',
            ];

        if ($res) {
            event(new BreadDataDeleted($dataType, $data));
        }



        return redirect()->route("voyager.{$dataType->slug}.index")->with($data);
    }


    public function getProducts()
    {
        $products = Product::query()->where('article','like','%'.request()->search.'%')->paginate(20);
        return $products;
    }

    public function updateProduct($request,$method)
    {
        \Cache::tags('catalog')->flush();
        if($method == 'update') {
            $product_id = $request->product_id;
            if ($product_id) {
                $new_price = $request->new_price;
                \DB::table('products')
                    ->where('id', $product_id)
                    ->update([
                        'price' => $new_price
                    ]);
            }
        }else{
            $product_id = $request->product_id;
            if ($product_id) {
                $new_price = $request->new_price;
                $old_price = \DB::table('products')
                    ->where('id', $product_id)
                    ->value('price');

                \DB::table('products')
                    ->where('id', $product_id)
                    ->update([
                        'old_price' => $old_price,
                        'price' => $new_price
                    ]);
            }

        }
    }

    public function validProductId($request)
    {
//        dd($request->all());
        if($request->_method == 'PUT'){

            $product_id = (int)$request->product_id;
                $news_product_id = \DB::table('news')
                    ->where('slug', $request->slug)->value('product_id');
            if($product_id == $news_product_id) return true;
        }
            $product_id = (int)$request->product_id;
//        dd($product_id);
            if ($product_id) {
                $news = \DB::table('news')
                    ->where('product_id', $product_id)->get();
//            dd(count($news));
                if (count($news) > 0) {
                    return false;
                }
            }

        return true;
    }


    public function upload_discount(Request $request)
    {

            $path = \Storage::disk('public')->putFileAs(
                'news/csv', $request->file('csv_file'),$request->csv_file->getClientOriginalName()
            );
            $this->dispatch(new DiscountJob(public_path('storage/'.$path)));

            return redirect()
                ->route("voyager.news.index")
                ->with([
                    'message'    => __('voyager::generic.successfully_added_new'),
                    'alert-type' => 'success',
                ]);

    }



}