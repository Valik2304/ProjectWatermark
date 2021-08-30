<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedsController extends Controller
{
    public function index()
    {
        return view('vendor.voyager.feed.index');
    }


    public function generate()
    {
        \Artisan::call('feeds:generate');
        return redirect()->route('feed.index');
    }
}
