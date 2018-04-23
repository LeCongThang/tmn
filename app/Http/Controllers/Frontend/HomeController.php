<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use App\Models\Gallery;
use App\Models\NewsCategory;
use App\Models\SystemConfig;
use App\Models\About;
use App\Models\Slider;
use App\Models\Video;
use App\Models\News;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    //
    public static function footer(){
        $system=SystemConfig::first();
        return view('frontend.partial.footer',['system'=>$system->responseSystem()])->render();
    }
    public static function meta(){
        $system=SystemConfig::first();
        return view('frontend.partial.head',['system'=>$system->responseSystem()])->render();
    }
    public static function menu(){
        $system=SystemConfig::first();
        return view('frontend.partial.menu',['system'=>$system->responseSystem()])->render();
    }
    public static function slider(){
        $slider=Slider::where('status',1)
            ->where('is_delete',0)
            ->orderBy('sort_order','asc')
            ->get();
        return view('frontend.partial.slider',[
            'slider'=>$slider
        ])->render()    ;
    }

    public function ChangeLanguage($lang){
        App::setLocale($lang);
        session(['lang'=>$lang]);
        return redirect()->back();
    }
    public function m_about(){
        $about=About::first();
        if($about){
            return $about->responseAbout();
        }
        return $about;
    }
    public function m_video_home(){
        $video=Video::where('status',1)->where('is_show',1)->first();
        if($video){
            return $video->responseVideo();
        }
        return $video;
    }
    public function m_news_home(){
        $data=News::where('status',1)->orderBy('updated_at','desc')->limit(4)->get();
        if(count($data)!=0){
            foreach ($data as $key=>$item){
                $data[$key]=$item->responseNews();
            }
            return $data;
        }
        return $data;
    }
    public function m_service_home(){
        $data=Service::where('status',1)->orderBy('updated_at','desc')->limit(2)->get();
        if(count($data)!=0){
            foreach ($data as $key=>$item){
                $data[$key]=$item->responseService();
            }
            return $data;
        }
        return $data;
    }
    public function m_gallery_home(){
        $data=Gallery::where('status',1)->where('is_delete',0)->orderBy('updated_at','desc')->limit(3)->get();
        if(count($data)!=0){
            foreach ($data as $key=>$item){
                $data[$key]=$item->responseGallery();
            }
            return $data;
        }
        return $data;
    }
    public function index(){
        GetLanguage();
        session(['active'=>7]);
        $about=$this->m_about();
//        $video=$this->m_video_home();
        $news=$this->m_news_home();
        $service=$this->m_service_home();
        $gallery=$this->m_gallery_home();
        $system=SystemConfig::first();
        if($system){
            $system->count_view_web=$system->count_view_web + 1;
            $system->save();
        }
//        dd($video);
        return view('frontend.index',[
            'about'=>$about,
//            'video'=>$video,
            'service'=>$service,
            'news'=>$news,
            'gallery'=>$gallery
        ]);
    }
    public function SubmitContact(Request $request){
        try{
            $contact=new Contact();
            $contact->name=$request->name;
            $contact->phone=$request->phone;
            $contact->email=$request->email;
            $contact->message=$request->message;
            if($contact->save()){
                return redirect()->back()->with('contact',1);
            }else{
                return redirect()->back()->with('contact',0);
            }
        }catch (\Exception $ex){
            return redirect()->back()->with('contact',0);
        }
    }

    public function News(){
        return view('frontend.news');
    }
    public function NewsDetail(){
        return view('frontend.news-detail');
    }
    public function Gallery(){
        return view('frontend.gallery');
    }
    public function Service(){
        return view('frontend.service');
    }
    public function Contact(){
        session(['active'=>6]);
        $system=SystemConfig::first();
        return view('frontend.contact',[
            'system'=>$system->responseSystem()
        ]);
    }
    public function Video(){
        return view('frontend.video');
    }
}
