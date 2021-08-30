<?php

namespace App\Http\Controllers\Voyager;


use App\Jobs\FileToCategoryProductsJob;
use App\Jobs\UploadProducts;
use App\Models\CategoryProduct;
use App\Models\Characteristic;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;

class ProductsController extends VoyagerBaseController
{
    use BreadRelationshipParser;
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

        $allCategories = Category::all();

        $product = Product::find($id);
        $categoriesForProduct = $product->categories()->get();
        $characteristics = Characteristic::query()->get();
        $characteristics_product = $product->characteristics->keyBy('id');
        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable','categoriesForProduct','allCategories','characteristics','characteristics_product'));
    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        \Cache::tags('catalog')->flush();
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

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id)->validate();
        $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

        event(new BreadDataUpdated($dataType, $data));

        CategoryProduct::where('product_id', $id)->delete();

        // Re-insert if there's at least one category checked
        $this->updateProductCategories($request, $id);

        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                'alert-type' => 'success',
            ]);
    }

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
        $allCategories = Category::all();
        $categoriesForProduct = collect([]);

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable','categoriesForProduct','allCategories'));
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        \Cache::tags('catalog')->flush();
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
        $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

        event(new BreadDataAdded($dataType, $data));

        $this->updateProductCategories($request, $data->id);

        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message'    => __('voyager::generic.successfully_added_new')." {$dataType->display_name_singular}",
                'alert-type' => 'success',
            ]);
    }

    public function update_characteristics(Request $request,$id)
    {

//        dd($request->all());
        foreach ($request->get('characteristics') as $key => $characteristic)
        {
            if ($characteristic) {
                DB::table('characteristic_product')->updateOrInsert(['characteristic_id' => $key, 'product_id' => $id, 'value' => $characteristic]);
            }
        }
        return redirect()
            ->route("voyager.products.index")
            ->with([
                'message'    => __('voyager::generic.successfully_updated') . ' Характеристик',
                'alert-type' => 'success',
            ]);
    }


    protected function updateProductCategories(Request $request, $id)
    {
        if ($request->category) {
            foreach ($request->category as $category) {
                CategoryProduct::create([
                    'product_id' => $id,
                    'category_id' => $category,
                ]);
                $ids = Category::ancestorsAndSelf($category)->pluck('id')->toArray();
                DB::table('category')->whereIn('id', $ids)->update(['hide' => 0]);
            }
            $langs = ['uk', 'ru', 'en'];
            foreach ($langs as $language) {
                \Cache::forget('catalog_html_' . $language);
            }
        }
    }


    public function upload_products(Request $request)
    {

        if ($request->file) {
            $path = \Storage::disk('public')->putFileAs(
                'products/csv', $request->file('file'), $request->file->getClientOriginalName()
            );

            $file = public_path('storage/' . $path);
//            dd($file);
            dispatch(new UploadProducts($file));
            return redirect()
                ->route("voyager.products.index")
                ->with([
                    'message' => 'Успішно завантажений файл з товарами! Очікуйте завантаження товарів на сайт!',
                    'alert-type' => 'success',
                ]);
        }
    }
}
