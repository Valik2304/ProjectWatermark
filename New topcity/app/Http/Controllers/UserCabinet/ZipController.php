<?php

namespace App\Http\Controllers\UserCabinet;


use App\Models\Product;
use Carbon\Carbon;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class ZipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $zips = getCartZipArr();


        if (request()->sort == 'name') {
            $zips = $zips->sortBy('name');
        } elseif (request()->sort == 'date') {
            $zips = $zips->sortBy(function ($obj, $key) {
                return $obj['created_at']->getTimestamp();
            });
        } elseif (request()->sort == 'qty') {
            $zips = $zips->sortByDesc('qty');
        }

        return view('user-cabinet/zip', compact('zips'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $request->article;
        $category_id = $request->category_id;
        $article_new = $request->article_new;
        $item = Product::where('article', $article)->firstOrFail();

        if ($article_new) {
            Cart::instance(getInstanceCartZip())->add($item->id, $item->name, 1, $item->price, ['category' => $category_id, 'article_new' => $article_new, 'created_at' => Carbon::now()])
                ->associate('App\Models\Product');
        } else {
            Cart::instance(getInstanceCartZip())->add($item->id, $item->name, 1, $item->price, ['category' => $category_id, 'created_at' => Carbon::now()])
                ->associate('App\Models\Product');
        }

        Cart::instance(getInstanceCartZip())->store(getInstanceCartZip());
        return response()->json(['success_message' => 'Item has been Saved For Zip!']);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Cart::instance(getInstanceCartZip())->remove($id);

        Cart::instance(getInstanceCartZip())->store(getInstanceCartZip());

        return redirect()->route('zip.index');
//        return response()->json(['success_message' => 'Item has been removed!']);
    }


    /**
     * Switch item for shopping cart to Zip.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function switchToCart(Request $request)
    {
        $ids = $request->rowIds;
        if ($ids) {
            $items = Cart::instance(getInstanceCartZip())->content()->whereIn('rowId', $ids);
            foreach ($ids as $id) {
                Cart::instance(getInstanceCartZip())->remove($id);
            }
            Cart::instance(getInstanceCartZip())->store(getInstanceCartZip());

            foreach ($items as $item) {
                if ($item->options->article_new) {
                    Cart::instance(getInstanceCart())->add($item->id, $item->name, $item->qty, $item->price, ['category' => $item->options->category, 'article_new' => $item->options->article_new])
                        ->associate('App\Models\Product');
                } else {
                    Cart::instance(getInstanceCart())->add($item->id, $item->name, $item->qty, $item->price, ['category' => $item->options->category])
                        ->associate('App\Models\Product');
                }
            }
            Cart::instance(getInstanceCart())->store(getInstanceCart());

            $collect = getCartArr();
            $count = $collect->count();


            return response()->json([
                'success_message' => 'Items has been Saved For Cart!',
                'body'            => $collect,
                'count'           => $count,
            ]);

        } else {
            return response()->json('You forget parameters', 400);
        }
    }


}
