<?php

namespace App\Http\Controllers\Images;

use App\Image1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddImageController extends Controller
{
    public function execute(Request $request){


        if ($request->isMethod('post')){

            $input = $request->except('_token');

            $messages = [
                'required' => "Поле :attribute обов'язкове до заповнення"
            ];
            $validator = Validator::make($input,[
                'name' => 'required|max:255',
                'images' => 'required|max:255',
                'watermark' => 'required|max:255',
                'text' => 'required',

            ],$messages);

            if ($validator->fails()){
                return redirect()->route('imagesAdd')->withErrors($validator)->withInput();
            }

            if ($request->hasFile('images')){

                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/images',$input['images']);

            }

            $image = new Image1();
            $image->fill($input);

            if ($image->save()){
                return redirect('/images')->with('status','Запис додано');
            }


        }


//-------------------------------------------------------------------------------------------
        if (view()->exists('images.images_add')){
            $data = [
                'title' => 'Нова Сторінка'
            ];
            return view('images.images_add',$data);

        }
        //abort(404, 'щось не так');
    }
}
