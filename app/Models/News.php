<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{
    //
    protected $table = 'news';
    public function responseNews(){
        $lang=session()->get('lang');
        return [
            'id'=>$this->id,
            'image'=>$this->image,
            'tags'=>$this->tags,
            'count_view'=>$this->count_view,
            'short_des'=>$this["short_des_$lang"],
            'title'=>$this["title_$lang"],
            'description'=>$this["description_$lang"],
            'date'=>$this->parseDate($this->updated_at,$lang),
        ];
    }
    public function parseDate($date, $lang){
        if($lang=='vi'){
            $month="Tháng ";
            $date=Carbon::parse($date);
            return $date->day.' '. $month.$date->month.', '.$date->year;
        }else{
            setlocale(LC_TIME, 'English');
            return $date->formatLocalized('%B %d, %Y');
        }
    }
    public function responseNews1(){
        $lang=session()->get('lang');
        return [
            'id'=>$this->id,
            'image'=>$this->image,
            'count_view'=>$this->count_view,
            'short_des'=>$this["short_des_$lang"],
            'title'=>$this["title_$lang"],
            'description'=>$this["description_$lang"],
            'date'=>$this->parseDate($this->updated_at,$lang),
            'day'=>Carbon::parse($this->updated_at)->day,
            'month'=>$this->parseMonth($this->updated_at,$lang),
            'year'=>Carbon::parse($this->updated_at)->year
        ];
    }
    public function parseMonth($date, $lang){
        if($lang=='vi'){
            $month="Tháng ";
            $date=Carbon::parse($date);
            return $month.$date->month;
        }else{
            setlocale(LC_TIME, 'English');
            return $date->formatLocalized('%B');
        }
    }
}
