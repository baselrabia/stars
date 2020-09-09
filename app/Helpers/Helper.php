<?php

/**
 * Upload
 */

use Illuminate\Support\Facades\DB;

if (!function_exists('upload')) {
    function upload($file, $path)
    {
        $baseDir = 'uploads/' . $path;
        $name = sha1(time() . $file->getClientOriginalName());
        $extension = $file->getClientOriginalExtension();
        $fileName = "{$name}.{$extension}";
        $file->move(public_path() . '/' . $baseDir, $fileName);
        return "{$baseDir}/{$fileName}";
    }
}
/**
 * Store Media
 */
if (!function_exists('storeMedia')) {
    function storeMedia($path, $id ,$model)
    {
        DB::table('medias')->insert(
            [
                'file' => $path,
                'mediable_id' => $id,
                'mediable_type' => $model
            ]
        );
    }
}

