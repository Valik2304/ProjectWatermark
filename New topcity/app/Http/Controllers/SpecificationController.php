<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Specification;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use stdClass;

class SpecificationController extends Controller
{

    public function index()
    {
        $user_id = auth()->id();
        $specification_menus = Specification::query()
            ->where('user_id', $user_id)
            ->toBase()
            ->get();


        if (count($specification_menus) == 0) return response()->json(['specification_menus' => []]);
        foreach ($specification_menus as $key => &$specification) {
            $specification->content = json_decode($specification->content);
            $specification->created_at = Carbon::parse($specification->created_at)->format('d.m.Y');
            unset($specification->user_id);
        }

        $archive = $specification_menus->where('archive', 1)->values();
        $specification_menus = $specification_menus->where('archive', 0)->values();
        if(request()->get('sort') == 'name'){

            $archive = $archive->sortBy('name')->values();
            $specification_menus = $specification_menus->sortBy('name')->values();

        } elseif (request()->get('sort') == 'date') {

            $archive = $archive->sortByDesc('date')->values();
            $specification_menus = $specification_menus->sortByDesc('date')->values();

        } elseif (request()->get('sort') == 'content') {

            $archive = $archive->sortBy('content')->values();
            $specification_menus = $specification_menus->sortBy('content')->values();
        }

        /*$specification_menus = $specification_menus->sortBy('content');*/
        return response()->json(compact('specification_menus', 'archive'));

    }


    public function add_menu()
    {
        $name = Str::ucfirst(__('specification_menu.name'));
        $specification = auth()->user()
            ->specifications()->create([
                'name' => $name,
                'content' => json_encode(collect())
            ]);

        $specification->content = json_decode($specification->content);

        if ($specification) {
            return response()->json(['success' => true, 'specification_menu' => $specification]);
        } else {
            return response()->json(['success' => false, 'message' => 'specification failed']);
        }

    }


    public function search(Request $request)
    {

        $query_search = $request->get('query');
        $products = Product::query()
            ->select(['id', 'article'])
            ->has('categories')
            ->where('article', 'like', '%' . $query_search . '%')
            ->take(10)
            ->get();
        if (request()->ajax()) {
            return response()->json(compact('products'));
        }
        return abort(404);
    }

    public function add_specification(Request $request)
    {
//        return $request->all();
        $user_id = auth()->id();
        $spec_menu = Specification::query()
            ->where('id', $request->get('specification_menu_id'))
            ->where('user_id', $user_id)
            ->first();

        if (!$spec_menu) return response()->json(['success' => false,'message' => 'specification menu not found'], 404);

        $content = collect(json_decode($spec_menu->content));
        $product = Product::query()
            ->select(['id', 'article', 'name'])
            ->has('categories')
            ->where('id', $request->get('product_id'))
            ->firstOrFail();



        if (!$product) return response()->json(['success' => false,'message' => 'product not found'], 404);

        $product->category_id = $product->categories()->first()->id;
        $product = (object)$product->getAttributes();

        $article_new = $request->get('article_new');
        if ($article_new) $product->article = $article_new;


        if ($content->where('article', $product->article)->count() != 0) return \response()->json(['duplicate_value' => true], 409);
        $content->add($product);


        $spec_menu->content = json_encode($content);
        $spec_menu->save();

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }


    public function update(Request $request, Specification $specification)
    {
        $data = $request->all();
        $specification->update($data);
        if ($specification) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false], 500);
        }
    }


    public function destroy(Specification $specification)
    {
        $conditional = $specification->delete();
        if ($conditional) {
            $user_id = auth()->id();
            $specification_menus = Specification::query()
                ->where('user_id', $user_id)
                ->toBase()
                ->get();


            if (count($specification_menus) == 0) return response()->json(['specification_menus' => []]);
            foreach ($specification_menus as $key => &$specification) {
                $specification->content = json_decode($specification->content);
                $specification->created_at = Carbon::parse($specification->created_at)->format('d.m.Y');
                unset($specification->user_id);
            }
            $specification_menus = $specification_menus->where('archive', 0)->values();
            return response()->json(compact('specification_menus'));
        } else {
            return response()->json('Something went wrong', 500);
        }
    }

    public function destroy_specification_item(Specification $specification, $specification_item)
    {
        $content = collect(json_decode($specification->content));
        $conditional = $content->where('id', $specification_item)->first();
        if ($conditional) {
            $specification_items = $content->where('id', '!=', $specification_item)->values();
            $specification->content = json_encode($specification_items);
            $specification->save();
            return response()->json(compact('specification_items'));
        } else {
            return response()->json('Product not found', 404);
        }

    }


    public function switchToArchive(Specification $specification)
    {
        $specification->archive = 1;
        $specification->save();
        unset($specification->archive);
        unset($specification->user_id);
        $specification->content = $specification->content = json_decode($specification->content);

        return response()->json([
            'success' => true,
            'specification' => $specification
        ]);
    }


    public function switchToSpecification(Specification $specification)
    {
        $specification->archive = 0;
        $specification->save();
        unset($specification->archive);
        unset($specification->user_id);
        $specification->content = $specification->content = json_decode($specification->content);
        return response()->json([
            'success' => true,
            'specification' => $specification
        ]);
    }

}
