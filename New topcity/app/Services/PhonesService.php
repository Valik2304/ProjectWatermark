<?php

namespace App\Services;




use App\Models\Phone;

class PhonesService
{
    public function getAll()
    {
        $phones = \Cache::rememberForever('footer_phones', function() {
            return Phone::query()->withTranslation(['en','ru','uk'])->get();
        });

        return $phones;
    }

}
