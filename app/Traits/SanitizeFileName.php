<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait SanitizeFileName {
    
    public function sanitize($file){
        $filenameWithExt = $file->getClientOriginalName();
        $path_info = pathinfo($filenameWithExt);
        return str::slug(time() .'-'. $path_info['filename']).'.'.$path_info['extension'];
    }
}



 