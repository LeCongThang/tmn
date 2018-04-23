<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    //
    protected $table = 'news_category';
    public function responseNewsCategory(){
        $lang=session()->get('lang');
        return [
            'id'=>$this->id,
            'title'=>$this["title_$lang"]
        ];
    }
}
