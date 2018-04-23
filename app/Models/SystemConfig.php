<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemConfig extends Model
{
    //
    protected $table = 'system_config';

    public function responseSystem(){
        $lang=session()->get('lang');
        return [
            'id'=>$this->id,
            'count_view_web'=>$this->count_view_web,
            'meta_des'=>$this->meta_des,
            'meta_title'=>$this->meta_title,
            'meta_keysword'=>$this->meta_keysword,
            'google_analytics'=>$this->google_analytics,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'address'=>$this["address_$lang"],
            'site_map'=>$this->site_map,
            'facebook'=>$this->facebook,
            'zalo'=>$this->zalo,
            'skype'=>$this->skype,
            'viber'=>$this->viber,
            'google'=>$this->google,
        ];
    }
}
