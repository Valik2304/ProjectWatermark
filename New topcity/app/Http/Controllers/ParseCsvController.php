<?php

namespace App\Http\Controllers;


use App\Http\Requests\CsvParseRequest;
use App\Jobs\CategoryProductJob;
use App\Jobs\CategoryTreeJob;
use App\Jobs\FileToCategoryProductsJob;
use App\Jobs\ProductJob;
use App\Jobs\CategoryJob;
use App\Jobs\ParseJob;
use App\Models\Category;
use App\TestCategory;

use DB;
use Illuminate\Http\Request;


class ParseCsvController extends Controller
{
//    public function parse()
//    {
//        $nodes = Category::get()->toTree();
//
//
////        return view('new',compact('nodes'));
//        $file = fopen("AAAAA.txt","a");
//        $traverse = function ($categories, $file, $prefix = '{') use (&$traverse) {
//            foreach ($categories as $category) {
//                $str = '{' . $category->id . $prefix .$category->name.',' .PHP_EOL;
//                fwrite($file,$str);
//                $traverse($category->children, $file,$prefix.'{');
//            }
//        };
//        $traverse($nodes,$file);
//        fclose($file);
//        return 'OK';
//
//
//    }




    public function parse(Request $request)
    {
//        dd($request->csv_file->getClientOriginalName());
       /* $path = \Storage::disk('public')->putFileAs(
            'category/csv', $request->file('csv_file'),$request->csv_file->getClientOriginalName()
        );

        $file = public_path('storage/'.$path);
        $this->dispatch(new FileToCategoryProductsJob($file,3000000));
        return "SUCCES";*/
        /*$path_file_article_catalog = $request->file('file_article_catalog')->store('FilesCSV1');
        $path_file_article_data = $request->file('file_article_data')->store('FilesCSV1');
        $path_file_catalog_program = $request->file('file_catalog_program')->store('FilesCSV1');


        $file_article_catalog = storage_path('app/' . $path_file_article_catalog);
        $file_article_data = storage_path('app/' . $path_file_article_data);
        $file_catalog_program = storage_path('app/' . $path_file_catalog_program);

        dispatch(new ParseJob($file_article_catalog,$file_article_data,$file_catalog_program));
        return "OKE";*/
        /*$path = \Storage::disk('public')->putFileAs(
            'category/main_csv', $request->file('csv_file'),$request->csv_file->getClientOriginalName()
        );
        */


        $value = $request->get('value');
        switch ($value) {
            case 1:
                $file = storage_path('app/public/category/main_csv/' . 'Article_Data.csv');
                dispatch(new ProductJob($file));
                break;
            case 2:
//                dispatch(new CategoryJob($file));
//                $this->parseCategory($file);
                break;
            case 3:
                $file = storage_path('app/public/category/main_csv/' . 'TOPCITY_CAALOG_ARTICLE_SITE.csv');
                dispatch(new CategoryProductJob($file));
                break;
            case 4:
//                $this->parseTree($file);
                break;
            default:
                return response()->json('Invalid operation!', 400);
        }
        return response()->json('Successful parsing CSV file. Congratulations!', 200);
    }


    public function parseCategory($file)
    {
//        $this->checkValidCSV($file, 2);
        dispatch(new CategoryJob($file));
    }


    public function parseProduct($file,$id)
    {
//        $this->checkValidCSV($file, 3);
//        dispatch(new ProductJob($file));
        dispatch(new FileToCategoryProductsJob($file,$id));
    }


    public function parseProductRef($file)
    {
        $this->checkValidCSV($file, 2);
        dispatch(new CategoryProductJob($file));
    }


    public function parseTree($file)
    {
//        $this->checkValidCSV($file, 2);
        dispatch(new CategoryTreeJob($file));
    }


    public function checkValidCSV($file, $count)
    {
        $handle = fopen($file, "r");
        $header = fgetcsv($handle, 0, ",");
        $valid = count($header) == $count;
        fclose($handle);

        if (!$valid) {
            abort(400,'Invalid structure CSV file');
        }
    }

    public function parseProductForCategory(CsvParseRequest $request)
    {

        $path = $request->file('csv_file')->store('csv_file');
        $category_id = $request->get('category_id');
        $file = storage_path('app/' . $path);
        $handle = fopen($file, "r");
        $header = fgetcsv($handle, 1000, ",");
        fclose($handle);

        $countheader = count($header);
        $corectCsvFile = $countheader < 3;

        if ($corectCsvFile) {
            dispatch(new ParseJob($file, $category_id));
        } else {
            return "Неправильная структура";
        }


        return 'OK';
    }
}
