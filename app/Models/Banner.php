<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $table = 'banner';
    public function responseBanner(){
        $lang=session()->get('lang');
        return [
            'id'=>$this->id,
            'image'=>$this->image,
            'title'=>$this["title_$lang"]
        ];
    }
}
