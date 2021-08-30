<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * @param string $url
 * @return string
 */
function getFacebookShareLink(string $url)
{
    return 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
}

/**
 * @param string $url
 * @return string
 */
function getTwitterShareLink(string $url)
{
    return 'http://twitter.com/share?text=&url=' . $url . '&hashtags=';
}

function getMonth($value)
{
    $month = [
        1  => 'Січень',
        2  => 'Лютий',
        3  => 'Березень',
        4  => 'Квітень',
        5  => 'Травень',
        6  => 'Червень',
        7  => 'Липень',
        8  => 'Серпень',
        9  => 'Вересень',
        10 => 'Жовтень',
        11 => 'Листопад',
        12 => 'Грудень',
    ];
    return $month[intval($value)];
}

function euro_exchange_rate()
{
    return \Cache::get('euro_exchange_rate');
}

function presentPrice($price)
{
    $EUR = euro_exchange_rate();
    $price = round_up($price); // remove $EUR *
    return $price;
}

function presentPriceString($price)
{
    $EUR = euro_exchange_rate();
    $price = round_up($price); // remove $EUR *
    return $price . ' ₴';
}

function presentDate($date)
{
    return Carbon::parse($date)->format('M d, Y');
}

function productImage($path)
{
    return $path && file_exists('storage/' . $path) ? asset('storage/' . $path) : asset('img/not-found.jpg');
}

function getStockLevel($price, $old_price, $qty)
{

    $status = $qty > 0 ? __('general.in_stock') : __('general.under_the_order');
    if ($price > 0) {
        if ($old_price > 0) {
            $stockLevel = '<span class="card-availability">' . $status . '</span>
                                     <span class="card-price"><span class="old-card-price">' . presentPriceString($old_price) . '</span>' . presentPriceString($price) . ' </span>';
        } else {
            $stockLevel = '<span class="card-availability">' . $status . '</span>
                                     <span class="card-price">' . presentPriceString($price) . ' </span>';
        }
    } else {
        $stockLevel = '<span class="card-availability disable-card">' . __('general.under_the_order') . '</span>';
    }
    return $stockLevel;
}

function getDOT($n)
{
    return strpos($n, '.') == true;
}

function round_up($value)
{

    $b = $value;
    $value *= 100.0;
    $d = $value - (integer)($value);
    $value = (integer)$value;
    if ($d > 0.001) $value++;
    return $value / 100.0;
}

function getInstanceCart()
{
    $user = Auth::user()->id ?? '';
    return 'cart' . $user;
}

function getInstanceCartZip()
{
    return getInstanceCart() . 'zip';
}


function getInstanceCartSpecMenu()
{
    return getInstanceCart() . 'zip';
}

function getTotal($content)
{
    $total = $content->reduce(function ($total, $item) {
        return $total + (1.0 * ($item['qty'] * $item['price']));
    }, 0);
    return $total;
}


function getCartZipArr($image_w = 93, $image_h = 79, $instance = 'default')
{
    if ($instance === 'default') $instance = getInstanceCartZip();
    $imageService = new \App\Services\ImageService();
    $category_product = Cart::instance($instance)->content()->pluck('options.category', 'id');
    $categoryIds = $category_product->unique();
    $categories = Category::select(['id', 'name'])->find($categoryIds)->keyBy('id');
    $productIds = Cart::instance($instance)->content()->pluck('id');
    $products = Product::findOrFail($productIds)->keyBy('id');
    $cart = Cart::instance($instance)->content();

    $collect = collect();
    $baseUrl = url('/');
    foreach ($cart as $item) {
        $id = $item->id;
        $rowId = $item->rowId;
        $name = $products[$item->id]->name;
        if ($products[$item->id]->image) {
            $image = $baseUrl . $imageService->resizeImage('/storage/'/*'/storage/products/'*/ . $products[$item->id]->image, $image_w, $image_h) /*. '.JPG'*/
            ;
        } else {
            $image = $baseUrl . $imageService->resizeImage('/img/no-image.png', $image_w, $image_h);
        }
        $category = $categories[$item->options->category]->name;
        $price = presentPrice($item->price);
        $qty = $item->qty;
        $article = $item->options->article_new ?? $products[$item->id]->article;
        $created_at = $item->options->created_at;
        $collect->push([
            'id'         => $id,
            'rowId'      => $rowId,
            'name'       => $name,
            'image'      => $image,
            'category'   => $category,
            'price'      => $price,
            'qty'        => $qty,
            'article'    => $article,
            'created_at' => $created_at
        ]);
    }
    return $collect;
}

function getCartArr($image_w = 61, $image_h = 61)
{
    $imageService = new \App\Services\ImageService();
    $category_product = Cart::instance(getInstanceCart())->content()->pluck('options.category', 'id');

    $categoryIds = $category_product->unique();

    $categories = Category::select(['id', 'name'])->find($categoryIds)->keyBy('id');


    $productIds = Cart::instance(getInstanceCart())->content()->pluck('id');

    $products = Product::findOrFail($productIds)->keyBy('id');

    $cart = Cart::instance(getInstanceCart())->content();
    $collect = collect();
    $baseUrl = url('/');
    foreach ($cart as $item) {
        $id = $item->id;
        $rowId = $item->rowId;
        $name = $products[$item->id]->name;
        if ($products[$item->id]->image) {
            $image = $baseUrl . $imageService->resizeImage('/storage/'/*'/storage/products/'*/ . $products[$item->id]->image, $image_w, $image_h) /*. '.JPG'*/
            ;
        } else {
            $image = $baseUrl . $imageService->resizeImage('/img/no-image.jpg', $image_w, $image_h);
        }
        $category = $categories[$item->options->category]->name;
        $price = presentPrice($item->price);
        $qty = $item->qty;
        $article = $item->options->article_new ?? $products[$item->id]->article;
        $collect->push([
            'id'       => $id,
            'rowId'    => $rowId,
            'name'     => $name,
            'image'    => $image,
            'category' => $category,
            'price'    => $price,
            'qty'      => $qty,
            'article'  => $article
        ]);
    }
    return $collect;
}

function getCartForCheckout($image_w = 61, $image_h = 61, $legal_person = false)
{
    $imageService = new \App\Services\ImageService();
    $category_product = Cart::instance(getInstanceCart())->content()->pluck('options.category', 'id');

    $categoryIds = $category_product->unique();

    $categories = Category::select(['id', 'name'])->find($categoryIds)->keyBy('id');


    $productIds = Cart::instance(getInstanceCart())->content()->pluck('id');

    $products = Product::findOrFail($productIds)->keyBy('id');


    $in_stock = $products->filter(function ($value, $key) {
        return $value->qty > 0 && $value->price > 0;
    })->pluck('id');

    $not_in_stock = $products->filter(function ($value, $key) {
        return $value->qty == 0 || $value->price == 0;
    })->pluck('id');


    $cart = Cart::instance(getInstanceCart())->content();
    $not_in_stock_cart = collect();
    $in_stock_cart = collect();


    $baseUrl = url('/');
    foreach ($cart as $item) {
        $id = $item->id;
        $rowId = $item->rowId;
        $name = $products[$item->id]->name;
        if ($products[$item->id]->image) {
            $image = $baseUrl . $imageService->resizeImage('/storage/' . $products[$item->id]->image, $image_w, $image_h);
        } else {
            $image = $baseUrl . $imageService->resizeImage('/img/no-image.jpg', $image_w, $image_h);
        }
        $category = $categories[$item->options->category]->name;
        $price = presentPrice($item->price);
        $qty = $item->qty;
        $article = $item->options->article_new ?? $products[$item->id]->article;
        if ($products[$item->id]->qty > 0 && $products[$item->id]->price > 0 && $products[$item->id]->qty >= $item->qty) {
            if ($legal_person) {
                Product::query()->where('id', $item->id)->update(['qty' => $products[$item->id]->qty - $item->qty]);
            }
            $in_stock_cart->push([
                'id'       => $id,
                'rowId'    => $rowId,
                'name'     => $name,
                'image'    => $image,
                'category' => $category,
                'price'    => $price,
                'qty'      => $qty,
                'article'  => $article
            ]);
        } else {
            $not_in_stock_cart->push([
                'id'       => $id,
                'rowId'    => $rowId,
                'name'     => $name,
                'image'    => $image,
                'category' => $category,
                'price'    => $price,
                'qty'      => $qty,
                'article'  => $article
            ]);
        }
    }

//    $not_in_stock = $collect->whereIn('id', $not_in_stock);
//    $in_stock = $collect->whereIn('id', $in_stock);
//    dd(count($in_stock_cart));

    $data = [
        'in_stock'     => $in_stock_cart,
        'not_in_stock' => $not_in_stock_cart,
    ];
    return $data;
}

function cartCount()
{
    $count = \Cart::instance(getInstanceCart())->content()->reduce(function ($carry, $item) {
        return $carry + $item->qty;
    });
    return $count == null ? 0 : $count;
}


function registerUser($email, $name, $phone)
{
    $password = Str::random();
    $user = User::create([
        'name'     => $name,
        'email'    => $email,
        'phone'    => $phone,
        'password' => bcrypt($password),
    ]);
    auth()->login($user);
    $user->password = $password;
    return $user;
}

function cacheRememberForSeconds($name,$closure_function,$seconds = 21600)
{

    return \Cache::tags('catalog')->remember($name, $seconds , $closure_function);

}


