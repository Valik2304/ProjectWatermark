<?php

namespace App\Http\Controllers\Images;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imageken;

class ImageController extends Controller
{
    //
    public function execute(Request $request){

        if (view()->exists('images.images')){

            $image = Imageken::all();

            $data = [
                'title' => 'Інфа з Бази ',
                'image' => $image
            ];

            return view('images.images',$data);
        }
    }
}
