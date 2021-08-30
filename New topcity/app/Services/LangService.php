<?php

namespace App\Services;


use App\Http\Middleware\LocaleMiddleware;
use Illuminate\Support\Arr;

class LangService
{
    public function getCurrentLang()
    {
        $languages = config('voyager.multilingual.locales');
        $language = null;
        foreach($languages as $lang){
            if($lang == \App::getLocale()){
                $language = $lang;
            }
        }
        /* if (\App::getLocale() == 'en') {
             $language = 'Eng';
         } elseif (\App::getLocale() == 'ru') {
             $language = 'Рус';
         } else {
             $language = 'Укр';
         }*/
        return $language;
    }

    public function getLanguages()
    {

        $languages = config('voyager.multilingual.locales');;
        foreach($languages as $key => $lang){
            if (\App::getLocale() == $lang) {
                $languages = Arr::except($languages,$key);
            }
        }
        return $languages;
    }

    public function getLangUrl($uri)
    {
        return url(LocaleMiddleware::getLocale() . $uri);
    }
//
//    public function getTrans()
//    {
//        $
//
//        return
//    }

}
