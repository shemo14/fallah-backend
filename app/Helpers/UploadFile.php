<?php

namespace App\Helpers;

class UploadFile
{
    public static function uploadBase64(String $base64, String $path) : string
    {
        $image     = base64_decode($base64);
        $imgName = uniqid() . '-' . time() . '-' . str_random(10) . '.jpg';
        $p = 'images/' . $path;
        file_put_contents(public_path($p) . $imgName, $image);
        return (string) $imgName;
    }

    public static function uploadImage ($image, String $path) : string
    {
        $extension = $image->getClientOriginalExtension();
        $imgName = uniqid() . '-' . time() . '-' . str_random(10) . '.' . $extension;
        $p = 'images/' . $path;
        $image->move($p, $imgName);
        return (string) $imgName;
    }

    public static function uploadFile ($image, String $path) : string
    {
        $extension = $image->getClientOriginalExtension();
        $fileName = uniqid() . '-' . time() . '-' . str_random(10) . '.' . $extension;
        $p = 'files/' . $path;
        $image->move(public_path($p), $fileName);
        return (string) $fileName;
    }
}