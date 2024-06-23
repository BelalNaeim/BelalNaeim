<?php

namespace App\Http\Traits;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Str;

/**
* Trait FileUploaderTrait
* @author Ahmed Mohamed
*/
trait FileUploaderTrait {
    /**
    * function server Local storage files
    * @param $file
    * @return string
    */

    public function uploadFile( UploadedFile $image, $path ) {
        $extension = $image->getClientOriginalExtension();
        $name = pathinfo( $image->getClientOriginalName(), PATHINFO_FILENAME );
        $image_name = Str::slug( date( 'Y-m-d-h-i-s' ) . $name . Str::random() ) . '.' . $extension;
        $image->move( $path, $image_name );

        return $image_name;
    }

}
