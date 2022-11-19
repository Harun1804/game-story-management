<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Image
{
    public function upload($file, $dirpath)
    {
        $file->storeAs('public/'.$dirpath, $file->hashName());
        return $file->hashName();
    }

    public function remove($file, $dirpath)
    {
        Storage::disk('local')->delete('public/'.$dirpath.'/'.basename($file));
    }
}

