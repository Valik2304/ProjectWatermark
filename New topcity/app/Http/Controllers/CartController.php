<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $collect = getCartArr();

        if (\request()->ajax()) {
            return response()->json([
                'body' => $collect,
                'count' => cartCount()
            ]);
        }

        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Product $product
     * @return Response
     */
    public function store(Request $request)
    {
        $article_new = $request->article_new;
        $article = $request->article;
        $category_id = $request->category_id;

        $product = Product::select(['id', 'name', 'price'])->where('article', $article)->firstOrFail();

        /*  $duplicates = Cart::instance(getInstanceCart())->search(function ($cartItem, $rowId) use ($product, $article_new) {
              return $cartItem->id === $product->id && $cartItem->options->article_new == $article_new;
          });

          if ($duplicates->isNotEmpty()) {
              return response()->json(['success_message' => 'Item is already in your cart!']);
          }*/

        if ($article_new) {
            Cart::instance(getInstanceCart())->add($product->id, $product->name, 1, $product->price, ['category' => $category_id, 'article_new' => $article_new])
                ->associate('App\Models\Product');
        } else {
            Cart::instance(getInstanceCart())->add($product->id, $product->name, 1, $product->price, ['category' => $category_id])
                ->associate('App\Models\Product');
        }
        Cart::instance(getInstanceCart())->store(getInstanceCart());

        $collect = getCartArr();
        $count = $collect->count();

        return response()->json([
            'success_message' => 'Item was added to your cart!',
            'body' => $collect,
            'count' => $count,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => 'Quantity must be between integer.',
                'success' => false],
                400);
        }
        /*
                if ($request->quantity > $request->productQuantity) {
                    session()->flash('errors', collect(['We currently do not have enough items in stock.']));
                    return response()->json(['success' => false], 400);
                }*/

        Cart::instance(getInstanceCart())->update($id, (integer)$request->quantity);

        Cart::instance(getInstanceCart())->store(getInstanceCart());

        return response()->json([
            'success' => true,
            'count' => cartCount(),
            'success_message' => 'Quantity was updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Cart::instance(getInstanceCart())->remove($id);

        Cart::instance(getInstanceCart())->store(getInstanceCart());

        return response()->json([
            'count' => cartCount(),
            'success_message' => 'Item has been removed!'
        ]);
    }


    /**
     * Switch item for shopping cart to Zip.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function switchToZip(Request $request)
    {
        if ($request->switchToZip) {
            $items = Cart::instance(getInstanceCart())->content();
            Cart::instance(getInstanceCart())->destroy();
            Cart::instance(getInstanceCart())->store(getInstanceCart());

            foreach ($items as $item) {
                if ($item->options->article_new) {
                    Cart::instance(getInstanceCartZip())->add($item->id, $item->name, $item->qty, $item->price, ['category' => $item->options->category, 'article_new' => $item->options->article_new, 'created_at' => Carbon::now()])
                        ->associate('App\Models\Product');
                } else {
                    Cart::instance(getInstanceCartZip())->add($item->id, $item->name, $item->qty, $item->price, ['category' => $item->options->category, 'created_at' => Carbon::now()])
                        ->associate('App\Models\Product');
                }
            }
            Cart::instance(getInstanceCartZip())->store(getInstanceCartZip());


            return response()->json([
                'success_message' => 'Item has been Saved For Zips!',
            ]);

        } else {
            return response()->json('You forget parameters', 400);
        }
    }

    public function translation()
    {
        return response()->json(__('cart'));
    }


    public function cartCount()
    {
        $count = cartCount();
        return response()->json(compact('count'));
    }


    public function addToCartFromSpec(Request $request)
    {

        $products_data = $request->get('product_data');

        $product_ids = array_column($products_data, 'id');
        $product_ids = array_unique(array_map('intval', $product_ids));

        $products = Product::query()->select(['id', 'article', 'name', 'price'])->findOrFail($product_ids)->keyBy('id');

//dd($products,$products_data);
        $i = 0;
//        dd($products_data);
        foreach ($products_data as $product) {
//            dd($product);
            if ($product['article'] == $products[$product['id']]->article) {
                $i++;
                \Cart::instance(getInstanceCart())
                    ->add(
                        $product['id'],
                        $products[$product['id']]->name,
                        1,
                        $products[$product['id']]->price,
                        [
                            'category' => $product['category_id']
                        ]
                    );
            } else {
                $i++;
                \Cart::instance(getInstanceCart())
                    ->add(
                        $product['id'],
                        $products[$product['id']]->name,
                        1,
                        $products[$product['id']]->price,
                        [
                            'category' => $product['category_id'],
                            'article_new' => $product['article'],

                        ]
                    );
            }
        }
        Cart::instance(getInstanceCart())->store(getInstanceCart());

        $collect = getCartArr();


        return response()->json([
            'message' => 'Success add to CART',
            'body' => $collect,
            'count' => cartCount()
        ]);


    }
    /*\Cart::instance('cart')->content()->each(function ($item,$key){
        \Cart::instance(getInstanceCart())->add($product->id, $product->name, 1, $product->price, ['category' => $category_id, 'article_new' => $article_new])
    });*/
}
