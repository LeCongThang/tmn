<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //
    public function about(){
        $about=About::first();
        if($about){
            return $about->responseAbout();
        }
        return $about;
    }
    public static function banner(){
        $data=Banner::where('type',session()->get('active'))
            ->first();
        return view('frontend.partial.banner',[
            'banner'=>$data->responseBanner()
        ])->render();
    }
    public function index(){
        session(['active'=>1]);
        GetLanguage();
        $about=$this->about();
        return view('frontend.about',[
            'about'=>$about
        ]);
    }
}
