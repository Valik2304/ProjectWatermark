<?php

namespace App\Http\Controllers;


use App\Mail\AdminOrderPlaced;
use App\Mail\AdminOrderPlacedSpecific;
use App\Mail\OrderPlaced;
use App\Mail\OrderPlacedLegalPerson;
use App\Mail\OrderPlacedPriceSpecific;
use App\Models\Category;
use App\Models\DeliveryAddress;
use App\Models\LegalEntity;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\OrderProduct;
use App\Models\OrderStatus;
use App\Models\Product;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Models\LiqPay;


class CheckoutController extends Controller
{
    public $liqpay_public_key;
    public $liqpay_private_key;


    public function __construct()
    {
        $this->liqpay_public_key = setting('site.liqpay_public_key');
        $this->liqpay_private_key = setting('site.liqpay_private_key');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $order_payments = OrderPayment::withTranslation(app()->getLocale())->get();

        $collect = getCartArr(65, 55);
        if ($collect->count() == 0) return view('checkout.cart-empty');

        $conditional = $collect->every(function ($value, $key) {
            return $value['price'] > 0;
        });

        $total = getTotal($collect);
        $user = auth()->user();

        if ($user) {
            $user = User::select(['id', 'name', 'email', 'phone'])->where('id', $user->id)->with('legal_entities', 'delivery_addresses')->first();
            return view('checkout.index', compact('user', 'collect', 'total', 'conditional', 'order_payments'));
        } else {
//            dd($user);
            return view('checkout.index', compact('collect', 'total', 'conditional', 'order_payments'));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CheckoutRequest $request
     * @return Response
     */
    public function store(CheckoutRequest $request)
    {

        $data_order = $this->addToOrdersTables($request);
        $order_in_stock = array_key_exists('order_in_stock', $data_order) ? $data_order['order_in_stock'] : null;
        $order_not_in_stock = array_key_exists('order_not_in_stock', $data_order) ? $data_order['order_not_in_stock'] : null;


        Cart::instance(getInstanceCart())->destroy();
        Cart::instance(getInstanceCart())->store(getInstanceCart());


        if (array_key_exists('user', $data_order)) {
            if ($order_in_stock) Mail::send(new OrderPlaced($order_in_stock, $data_order['user']));
            if ($order_not_in_stock) Mail::send(new OrderPlacedPriceSpecific($order_not_in_stock, $data_order['user']));
        } else {
            if ($request->legal_person) {
                if ($order_in_stock) Mail::send(new OrderPlacedLegalPerson($order_in_stock));
                if ($order_not_in_stock) Mail::send(new OrderPlacedPriceSpecific($order_not_in_stock));
            } else {
                if ($order_in_stock) Mail::send(new OrderPlaced($order_in_stock));
                if ($order_not_in_stock) Mail::send(new OrderPlacedPriceSpecific($order_not_in_stock));
            }
        }


        /* if ($order_in_stock) Mail::to('illyaostrovsky.99@gmail.com')->send(new AdminOrderPlaced($order_in_stock));
         if ($order_not_in_stock) Mail::to('illyaostrovsky.99@gmail.com')->send(new AdminOrderPlacedSpecific($order_not_in_stock));*/

        if ($order_in_stock) Mail::to([
            'zakaz@topsity.com.ua',
            'logistic_m@topsity.com.ua',
            'logistic@topsity.com.ua'
        ])->send(new AdminOrderPlaced($order_in_stock));

        if ($order_not_in_stock) Mail::to(['zakaz@topsity.com.ua',
                                           'logistic_m@topsity.com.ua',
                                           'logistic@topsity.com.ua'
        ])->send(new AdminOrderPlacedSpecific($order_not_in_stock));
        // TODO Новий функціонал "к-сть" не затестений до кінця, після тестів розкоментувати строчки вище і закоментувати строчки з поштою illyaostrovsky.99@gmail.com

        if ($request->legal_person && $order_in_stock) {
            return view('thank-you', ['order_id' => $order_in_stock->id]);
        }

        if ($request->payment_name == 'liqpay' && $order_in_stock) {
            return $this->liqpay($order_in_stock);
        }

        return view('thank-you');

    }

    /**
     * Quick checkout
     *
     * @param CheckoutRequest $request
     * @return Response
     */
    public function quick_store(Request $request)
    {
        $products = Product::where('article', $request->article)->get();
        $image = '';
        $image_w = 93;
        $image_h = 79;
        $imageService = new \App\Services\ImageService();
        if ($products[0]->image) {
            $image = url('/') . $imageService->resizeImage('/storage/'/*'/storage/products/'*/ . $products[0]->image, $image_w, $image_h) /*. '.JPG'*/
            ;
        } else {
            $image = url('/') . $imageService->resizeImage('/img/no-image.png', $image_w, $image_h);
        }
        $products[0]->category = $products[0]->categories->first()->name;
        $products[0]->image = $image;
        $products[0]->qty = 1;
        $content['products'] = $products;
        $order_payment_id = 0;
        $order_status_id = OrderStatus::where('key', 'quick_order')->first()->id;
        $order = $order = Order::create([
            'user_id'         => auth()->user() ? auth()->user()->id : null,
            'billing_email'   => 'швидке замовленя',
            'billing_name'    => $request->name,
            'billing_phone'   => $request->phone,
            'billing_city'    => 'швидке замовлення',
            'billing_total'   => 0,
            'content'         => json_encode($content),
            'billing_address' => 'швидке замовлення',
            'order_status_id' => $order_status_id,
            'quick_order'     => true,
        ]);


        return response()->json(['success' => true, 'message' => 'Quick order success']);

    }


    protected function addToOrdersTables($request)
    {
        $data = getCartForCheckout(84, 84, $request->legal_person || $request->payment_name == 'c_o_d' ? true : false);
        \Cache::tags('catalog')->flush();
        if (count($data['in_stock']) == 0 && count($data['not_in_stock']) == 0) {
            return view('checkout.cart-empty');
        }
        $data_order = [];
        $user = Auth::user();

        if (!$user) {
            $user_db = User::query()->where('email', $request->email)->orWhere('phone', $request->phone)->first();
            if (!$user_db) {
                $user = registerUser($request->email, $request->name, $request->phone);
                $data_order['user'] = $user;
            } else {
                $user = $user_db;
            }
        }

        $delivery = $this->getDelivery($request, $user);

        $content_in_stock['products'] = $data['in_stock'];
        $content_not_in_stock['products'] = $data['not_in_stock'];

        $not_in_stock_key = $request->legal_person ? 'specific_price_check' : 'specific_price';
        $in_stock_key = $request->legal_person ? 'pay_legal_person' : $request->payment_name == 'c_o_d' ? 'new' : 'pay_with_liqpay';


        if ($request->legal_person) {
            $content_in_stock['legal_person'] = LegalEntity::where('id', $request->legal_person)->toBase()->first();
            $content_not_in_stock['legal_person'] = $content_in_stock['legal_person'];

        }



        $order_payment_id = DB::table('order_payments')->where('key', $request->payment_name)->value('id');
        // Insert into orders table
        if (count($data['in_stock']) > 0) {
            $order_in_stock = Order::create([
                'user_id'          => $user->id,
                'billing_email'    => $request->email,
                'billing_name'     => $request->name,
                'billing_phone'    => $request->phone,
                'billing_city'     => $delivery['billing_city'],
                'custom_delivery'     => $request->has('name_custom_delivery_address')?  $request->get('name_custom_delivery_address'): '',
                'billing_total'    => getTotal($data['in_stock']),
                'content'          => json_encode($content_in_stock),
                'billing_address'  => $delivery['billing_address'],
                'order_payment_id' => $order_payment_id,
                'order_status_id'  => DB::table('order_statuses')->where('key', $in_stock_key)->value('id'),
            ]);
            $data_order['order_in_stock'] = $order_in_stock;

        }

        if (count($data['not_in_stock']) > 0) {
            $order_not_in_stock = Order::create([
                'user_id'          => $user->id,
                'billing_email'    => $request->email,
                'billing_name'     => $request->name,
                'billing_phone'    => $request->phone,
                'billing_city'     => $delivery['billing_city'],
                'custom_delivery'     => $request->has('name_custom_delivery_address')?  $request->get('name_custom_delivery_address'): '',
                'billing_total'    => 0,
                'content'          => json_encode($content_not_in_stock),
                'billing_address'  => $delivery['billing_address'],
                'order_payment_id' => $order_payment_id,
                'order_status_id'  => DB::table('order_statuses')->where('key', $in_stock_key)->value('id'),
            ]);
            $data_order['order_not_in_stock'] = $order_not_in_stock;
        }


        return $data_order;
    }


    public function getDelivery($request, $user)
    {


        if ($request->radiobutton == 'nova_poshta_address') {
            $billing_city = $request->nova_poshta_city;
            $billing_address = $request->nova_poshta_branch;
        } elseif ($request->radiobutton == 'pickup'){
            $billing_city = 'Самовивіз';
            $billing_address = 'Самовивіз';
        } else {
            if ($request->delivery_address) {
                $delivery_address = DeliveryAddress::where('id', $request->delivery_address)->toBase()->first();
                $billing_city = $delivery_address->city;
                $billing_address = $delivery_address->address;
            } elseif ($request->new_city && $request->new_address) {
                $delivery_address = DeliveryAddress::create([
                    'city'    => $request->new_city,
                    'address' => $request->new_address,
                    'user_id' => $user->id
                ]);
                $billing_city = $delivery_address->city;
                $billing_address = $delivery_address->address;
            }

        }


        return [
            'billing_city'    => $billing_city,
            'billing_address' => $billing_address,
        ];
    }

    public function getLiqPay(Order $order)
    {

        $url = url('/');
        $language = app()->getLocale();
        $liqp = [
            'version'     => '3',
            'action'      => 'pay',
            'amount'      => $order->billing_total, //Ціна
            'currency'    => 'UAH',
            'description' => 'Оплата за замовлення №' . $order->id,
            'order_id'    => $order->id,
            'language'    => $language,
            'result_url'  => $url,
            'server_url'  => $url . '/confirm_pay'
        ];
        $public_key = $this->liqpay_public_key;//config('liqpay.public_key');
        $private_key = $this->liqpay_private_key;//config('liqpay.private_key');
        $liqpay = new LiqPay($public_key, $private_key);
        $liqpay_script = $liqpay->cnb_widget($liqp);

        return $liqpay_script;
    }

    public function liqpay(Order $order)
    {
        return view('checkout.liqpay', [
            'liqpay_script' => $this->getLiqPay($order),
        ]);
    }


    public function callbackLiqpay(Request $request)
    {
        $input = $request->all();
        $data = $input['data'];
        $signature = $input['signature'];

        $public_key = $this->liqpay_public_key;//config('liqpay.public_key');
        $private_key = $this->liqpay_private_key;//config('liqpay.private_key');
        $liqpay = new \App\Models\LiqPay($public_key, $private_key);

        if (!$liqpay->check_signature($signature, $data)) {
            \Log::error('Сигнатури не співпадають!');
            \Log::error($signature);
            \Log::error(LiqPay::decode_params($data));
            return response()->json('ERROR', 422);
        }

        $data = LiqPay::decode_params($data);
        /*\Log::error($data);*/

        $order = Order::findOrFail(intval($data['order_id']));
        if ($order) {
            if ($data['status'] == 'success') {
                $content = json_decode($order->content)->products;
                foreach ($content as $item) {


                    $product = Product::query()->select(['id', 'qty'])->where('id', $item->id)->firstOrFail();

                    $old_qty = $product->qty;

                    if ($old_qty >= $item->qty) {
                        Product::query()->where('id', $item->id)->update(['qty' => $old_qty - $item->qty]);
                    } else {
                        \Log::error('LIQPAY error: client buy product but product qty is 0!!!!!');
                    }

                }

                $order_status_id = OrderStatus::where('key', 'success_liqpay')->first()->id;
                $updated = $order->update([
                    'order_status_id' => $order_status_id,

                ]);

            } else {
                $order_status_id = OrderStatus::where('key', 'liqpay_error')->first()->id;
                $updated = $order->update([
                    'order_status_id' => $order_status_id,
                ]);
                return \response()->json('Error', 500);

            }

        }

        return \response()->json('success', 200);
    }

    public function check(Request $request, $id)
    {
        $user_id = auth()->id();
        $order = Order::query()
            ->where('user_id', $user_id)
            ->where('id', $id)
            ->first();
        if ($order) {
            $content = json_decode($order->content);
            return view('checkout.check')->with([
                'order_id'           => $order->id,
                'order_date'         => Carbon::parse($order->created_at)->format('d.m.Y'),
                'order_legal_person' => $content->legal_person,
                'order_products'     => $content->products,
                'order_total'        => $order->billing_total,

            ]);
        } else {
            return abort(404);
        }


    }
}
