<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    //
    protected $table = 'gallery_image';
    protected $timestamp = false;
    public function responseGalleryImage(){
        return [
            'id'=>$this->id,
            'image'=>$this->image
        ];
    }
}
