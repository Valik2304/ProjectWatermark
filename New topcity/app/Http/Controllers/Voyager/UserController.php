<?php

namespace App\Http\Controllers\Voyager;

use App\Models\Specification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class UserController extends VoyagerBaseController
{
    public function profile(Request $request)
    {
        return Voyager::view('voyager::profile');
    }

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
        $specification_menus = Specification::query()
            ->where('user_id', $dataTypeContent->id)
            ->toBase()
            ->get();


        \Cart::instance('cart'.$dataTypeContent->id.'zip')->restore('cart'.$dataTypeContent->id.'zip');

        foreach ($specification_menus as $key => &$specification) {
            $specification->content = json_decode($specification->content);
            $specification->created_at = Carbon::parse($specification->created_at)->format('d.m.Y');
            unset($specification->user_id);
        }

        $zips = getCartZipArr(100,100,'cart'.$dataTypeContent->id.'zip');
        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable','specification_menus','zips'));
    }


    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        if (app('VoyagerAuth')->user()->getKey() == $id) {
            $request->merge([
                'role_id'                              => app('VoyagerAuth')->user()->role_id,
                'user_belongsto_role_relationship'     => app('VoyagerAuth')->user()->role_id,
                'user_belongstomany_role_relationship' => app('VoyagerAuth')->user()->roles->pluck('id')->toArray(),
            ]);
        }

        return parent::update($request, $id);
    }
}
