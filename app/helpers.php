<?php

use Illuminate\Http\UploadedFile;

if (!function_exists('uploadImage')) {
    function uploadImage(UploadedFile $file, $destinationPath)
    {
        $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
        $file->move(public_path($destinationPath), $filename);
        return $filename;
    }
}
