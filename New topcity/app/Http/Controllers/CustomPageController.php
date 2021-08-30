<?php

namespace App\Http\Controllers;

use App\Models\CustomPage;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomPage  $customPage
     * @return \Illuminate\Http\Response
     */
    public function show(CustomPage $customPage)
    {
        return view('custom-page',compact('customPage'));
    }

}
