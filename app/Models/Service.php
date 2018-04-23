<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = 'service';
    public function responseService(){
        $lang=session()->get('lang');
        return [
            'id'=>$this->id,
            'image'=>$this->image,
            'tags'=>$this->tags,
            'short_des'=>$this["short_des_$lang"],
            'title'=>$this["title_$lang"],
            'description'=>$this["description_$lang"]
        ];
    }
}
