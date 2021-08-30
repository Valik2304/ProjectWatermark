<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LisDev\Delivery\NovaPoshtaApi2;


class NovaPoshtaController extends Controller
{
    public function index()
    {
        $np = new \LisDev\Delivery\NovaPoshtaApi2(
            '214579deffeb8b59e91021856949e9df',
            'en');
        $cities = $np->getCities();
        return response()->json($cities['data']);

    }

    public function show(Request $request)
    {
        $np = new \LisDev\Delivery\NovaPoshtaApi2(
            '214579deffeb8b59e91021856949e9df',
            'en');
        $wareHouse = $np->getWarehouses($request->ref);
        return response()->json($wareHouse['data']);

    }



}
