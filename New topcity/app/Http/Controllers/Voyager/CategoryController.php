<?php

namespace App\Http\Controllers\Voyager;


use App\Jobs\FileToCategoryProductsJob;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Product;
use App\Models\Category;
//use App\CategoryProduct;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class CategoryController extends VoyagerBaseController
{
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
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope' . ucfirst($dataType->scope))) {
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
        $nodes = $this->getCatalog();
        //dd($nodes);

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'nodes'));
    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        \Cache::tags('catalog')->flush();
//dd($request->all());
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        if ($request->file) {
            $path = \Storage::disk('public')->putFileAs(
                'category/csv', $request->file('file'), $request->file->getClientOriginalName()
            );

            $file = public_path('storage/' . $path);
            DB::table('category')->where('id', $id)->update(['upload_file' => $path]);
            dispatch(new FileToCategoryProductsJob($file, $id));
            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message' => __('voyager::generic.successfully_updated') . " {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $model = app($dataType->model_name);
        if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope' . ucfirst($dataType->scope))) {
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

        if ($request->get('category') > 0) {
            $data->parent_id = $request->get('category');
            $data->save();

        } else {
            $data->parent_id = null;
            $data->save();
        }
        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message' => __('voyager::generic.successfully_updated') . " {$dataType->display_name_singular}",
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
        $nodes = $this->getCatalog();

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'nodes'));
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
//        dd($request->all());
        \Cache::tags('catalog')->flush();
        //dd($request->all());
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
//        $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

        //event(new BreadDataAdded($dataType, $data));
        $translations_name = json_decode($request->get('name_i18n'));
        $translations_seo_description = json_decode($request->get('seo_description_i18n'));
        $translations_seo_title = json_decode($request->get('seo_title_i18n'));
        $data['name'] = $translations_name->uk;
        $data['seo_title'] = $translations_seo_title->uk;
        $data['seo_description'] = $translations_seo_description->uk;
        $data['slug'] = $request->get('slug');
        $parent_id = $request->get('category');

        $category_new = null;
        if ($request->category > 0) {
            $node = new Category($data);
            $node->parent_id = $parent_id;
            $node->save();
            $category_new = $node;

        } else {
            $category_new = Category::create($data);
        }
//dd(),$request->all());
        foreach (json_decode($request->get('name_i18n')) as $key => $value) {


            $trans = $category_new->translate($key);
            $trans->seo_title = $translations_seo_title->$key;
            $trans->seo_description = $translations_seo_description->$key;
            $trans->name = $value;

            $trans->save();


        }


//        dd($node);
        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message' => __('voyager::generic.successfully_added_new') . " {$dataType->display_name_singular}",
                'alert-type' => 'success',
            ]);
    }

    public function getCatalog()
    {
        $nodes = Category::get()->toTree();
        return $nodes;
    }


    /*public function truncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('category')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return redirect()
            ->route("voyager.category.index")
            ->with([
                'message'    =>'Truncate Done',
                'alert-type' => 'success',
            ]);
    }*/


}
