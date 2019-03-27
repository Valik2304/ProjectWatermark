<?php

namespace App\Http\Controllers\Images;
use App\Imageken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

//use Intervention\Image\ImageManagerStatic;
//use Intervention\Image\ImageManager;

class AddImageController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function execute(Request $request){


        if ($request->isMethod('post')){

            $input = $request->except('_token');

            $messages = [
                'required' => "Поле :attribute обов'язкове до заповнення"
            ];

            $validator = Validator::make($input,[
                'name' => 'required|max:255',
                'images' => 'max:255',
                'text' => 'max:255',
            ],$messages);


            if ($validator->fails()){
                return redirect()->route('imagesAdd')->withErrors($validator)->withInput();
            }



            $path = public_path().'/img';

            $file = $request->file('images');

            $filename =  $file->getClientOriginalName();

            $watermark = Image::make('upload/image.png');




            $imaGE = imageCreateFromJpeg($input['images']);

            $color = imagecolorat($imaGE, 10, 10);

            $red = ($color >> 16) & 0xFF;
            $green = ($color >> 8) & 0xFF;
            $blue = $color & 0xFF;

             "RGB($red, $green, $blue)";

            imageDestroy($imaGE);


            $color = 1 - ( 0.299 * $red + 0.587 * $green + 0.114 * $blue)/255;
            //dd($color);
            if ($color < 0.5) {

                if (Input::get('my_radio') === '1'){
                    $img = Image::make($file)
                        ->resize(300, 250)
                        ->insert($watermark->resize(50,50)->opacity(70));
                    $img->save($path.'/'.$filename);
                }
                elseif (Input::get('my_radio') !== '1'){
                    $img = Image::make($file)
                        ->resize(300, 250)
                        // ->insert($watermark->resize(50,50)->opacity(40))
                        ->text($input['text'],100, 100, function ($font) {
                            $font->file(5);
                            $font->size(50);
                            $font->color('#000000');
                            $font->align('center');
                            $font->valign('top');
                            $font->angle(45);
                        });
                    $img->save($path.'/'.$filename);
                }

            }
            else {

                if (Input::get('my_radio') === '1'){
                    $img = Image::make($file)
                        ->resize(300, 250)
                        ->insert($watermark->resize(50,50)->opacity(40));
                    $img->save($path.'/'.$filename);
                }
                elseif (Input::get('my_radio') !== '1'){
                    $img = Image::make($file)
                        ->resize(300, 250)
                        // ->insert($watermark->resize(50,50)->opacity(40))
                        ->text($input['text'],100, 100, function ($font) {
                            $font->file(5);
                            $font->size(50);
                            $font->color('#fdf6e3');
                            $font->align('center');
                            $font->valign('top');
                            $font->angle(45);
                        });
                    $img->save($path.'/'.$filename);
                }

            }




            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }


            //$img->save($path.'/'.$filename);

            $image = Imageken::create([
                'name' => $filename,
                'images' =>'img/'.$filename,
                'text' => $input['text']

            ]);

            if ($image){
                return redirect('/images')->with('status','Запис додано');
            }

            /*$images = new Image();
            $images->fill($input);

            if ($images->save()){
                return redirect('/images')->with('status','Запис додано');
            }*/


        }


//--------------------------------------------------------------------------------------------------------------------------------------


        if (view()->exists('images.images_add')){
            $data = [
                'title' => 'Нова Інфа'
            ];
            return view('images.images_add',$data);

        }
    }
}
