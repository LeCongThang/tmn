<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
    protected $table = 'about';
    public function responseAbout(){
        $lang=session()->get('lang');
        return [
            'id'=>$this->id,
            'image_small'=>$this->image_small,
            'image_big'=>$this->image_big,
            'short_des'=>$this["short_des_$lang"],
            'info_head'=>$this["info_head_$lang"],
            'info_footer'=>$this["info_footer_$lang"]
        ];
    }
}
