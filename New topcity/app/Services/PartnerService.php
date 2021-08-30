<?php

namespace App\Services;

use App\Models\Partner;


class PartnerService
{
    public function getAll()
    {
        $pagination = 4;
        $partners = Partner::select(['id','image','link'])->get();
        $partners_count = $partners->count();
        $conditional = $partners->count() % $pagination;
        if($conditional != 0){
            for ($i = 0, $index = 0; $i < $pagination - $conditional; $i++) {
                $partners[] = $partners[$index++];
                if ($index >= $partners_count) $index = 0;
            }
            return $partners;
        }
        return $partners;
    }
}
