<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    //
    public function m_video(){
        $data=Video::where('status',1)->orderBy('updated_at','desc')->paginate(7);
        if(count($data)!=0){
            foreach ($data as $key=>$item){
                $data[$key]=$item->responseVideo();
            }
            return $data;
        }
        return $data;
    }
    public function index(){
        session(['active'=>5]);
        GetLanguage();
        $video=$this->m_video();
        return view('frontend.video',[
            'video'=>$video
        ]);
    }
    public function video_detail($id){
        $data=Video::find($id);
        if($data){
            $data=$data->responseVideo();
        }
        return $data;
    }
    public function detail($id,$slug){
        session(['active'=>5]);
        GetLanguage();
        $video=$this->video_detail($id);
        if($video){
            return view('frontend.video-detail',[
                'video'=>$video
            ]);
        }else{
            return redirect()->back();
        }
    }
}
