<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $table = 'video';
    public function responseVideo(){
        $lang=session()->get('lang');
        return [
            'id'=>$this->id,
            'embed_link'=>$this->embed_link,
            'image'=>$this->image,
            'title'=>$this["title_$lang"],
            'description'=>$this["description_$lang"]
        ];
    }
}
