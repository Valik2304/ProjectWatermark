<?php

namespace App\Services;

use Intervention\Image\ImageManager;

class ImageService
{
    public function resizeImage($path, $w = 600, $h = 350, $crop = true)
    {
        $savePath = str_replace('.JPG', "_{$w}x{$h}.JPG", $path);
        $savePath = str_replace('.jpg', "_{$w}x{$h}.jpg", $savePath);
        $savePath = str_replace('.png', "_{$w}x{$h}.png", $savePath);
        $savePath = str_replace('.webP', "_{$w}x{$h}.webP", $savePath);
        $savePath = str_replace('.webp', "_{$w}x{$h}.webp", $savePath);


        $savePathFull = public_path() . '/' . $savePath;
        $pathFull = public_path() . '/' . $path;

        if (!extension_loaded('imagick')) {
            return file_exists($pathFull) ? $path : asset('img/no-image.jpg');
        }

//        die();
//        dd(!file_exists($savePathFull));
        if (!file_exists($savePathFull)) {
            $manager = new ImageManager(array('driver' => 'imagick'));
            if (file_exists($pathFull)) {
                if ($crop) {
                    $manager->make($pathFull)->resize($w, $h, function ($constraint) {
                        $constraint->aspectRatio();
                    })->resizeCanvas($w, $h)->save($savePathFull);
                }else{
                    $manager->make($pathFull)->fit($w, $h)
                        ->save($savePathFull);
                }

            } else {
                $savePathFull = public_path() . '/' . "img/no-image_{$w}x{$h}.jpg";
                $pathFull = public_path() . '/' . 'img/no-image.jpg';
                $manager->make($pathFull)->resize($w, $h, function ($constraint) {
                    $constraint->aspectRatio();
                })->resizeCanvas($w, $h)->save($savePathFull);
                $savePath = "/img/no-image_{$w}x{$h}.jpg";
            }
        }
        return $savePath;
    }
}