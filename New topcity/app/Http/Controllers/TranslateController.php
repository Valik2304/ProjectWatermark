<?php

namespace App\Http\Controllers;

use App\Jobs\TranslateJob;
use App\Jobs\TranslateProductJob;
use Illuminate\Http\Request;

class TranslateController extends Controller
{
    public function translateToRu(Request $request)
    {
        $file[] = storage_path('app/public/category/translate_csv/' . 'Data_ArticleTexts_UK_40.csv');
        $file[] = storage_path('app/public/category/translate_csv/' . 'Data_ArticleTexts_UK_40-80.csv');
        $file[] = storage_path('app/public/category/translate_csv/' . 'Data_ArticleTexts_UK_80-120.csv');
        $file[] = storage_path('app/public/category/translate_csv/' . 'Data_ArticleTexts_UK_120-160.csv');
        $file[] = storage_path('app/public/category/translate_csv/' . 'Data_ArticleTexts_UK_160-200.csv');
        $file[] = storage_path('app/public/category/translate_csv/' . 'Data_ArticleTexts_UK_200-240.csv');
        $file[] = storage_path('app/public/category/translate_csv/' . 'Data_ArticleTexts_UK_240-280.csv');

        foreach ($file as $item)
        {
            $this->dispatch(new TranslateProductJob($item));
        }

        return 'OKEY';
    }
}
