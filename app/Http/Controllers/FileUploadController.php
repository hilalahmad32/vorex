<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{
    public static function storeImage($requestImage)
    {
        $fileDisk = 'private';
        $filePath = 'Uploads/' . date('Y') . '/' . date('m');
        $fileServer_name = md5($requestImage->getRealPath());
        if ($requestImage->storeAs($filePath, $fileServer_name, $fileDisk)) {
            $url = asset($filePath . $fileServer_name);
            return $url;
        }
    }
}
