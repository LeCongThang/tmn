<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $table = 'gallery';
    public function responseGallery(){
        $lang=session()->get('lang');
        return [
            'id'=>$this->id,
            'title'=>$this["title_$lang"],
            'image'=>$this->image($this->id),

        ];
    }
    public function image($id)
    {
        $data= GalleryImage::where('gallery_id',$id)->first();
        if($data){
            $data=$data->responseGalleryImage();
        }
        return $data;
    }

}
