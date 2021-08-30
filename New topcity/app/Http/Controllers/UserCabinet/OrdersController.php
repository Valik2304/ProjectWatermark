<?php

namespace App\Http\Controllers\UserCabinet;

use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use LiqPay;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = app()->getLocale();
        $user_id = auth()->id();
        $orders = Order::query()
            ->where('user_id', $user_id)
            ->with([
                'status' => function ($q) use ($language) {
                    $q->withTranslation($language);
                },
                'payment'
            ])
            ->get();

        $orders->map(function ($item) {
            return $item->content = json_decode($item->content);
        });

        return view('user-cabinet.order-history', compact('orders'));
    }
}
