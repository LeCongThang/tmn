<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    //
    public function m_gallery_home(){
        $data=Gallery::where('status',1)->where('is_delete',0)->orderBy('updated_at','desc')->paginate(10);
        if(count($data)!=0){
            foreach ($data as $key=>$item){
                $data[$key]=$item->responseGallery();
            }
            return $data;
        }
        return $data;
    }
    public function index(){
        session(['active'=>4]);
        GetLanguage();
        $gallery=$this->m_gallery_home();
        return view('frontend.gallery',[
            'gallery'=>$gallery
        ]);
    }
    public function gallery_detail($id){
        $data=Gallery::find($id);
        if($data){
            $data=$data->responseGallery();
        }
        return $data;
    }
    public function image($id){
        $data=GalleryImage::where('gallery_id',$id)->get();
        if(count($data)!=0){
            foreach ($data as $key=>$item){
                $data[$key]=$item->responseGalleryImage();
            }
        }
        return $data;
    }
    public function detail($id){
        session(['active'=>4]);
        GetLanguage();
        $galley=$this->gallery_detail($id);
        $image=$this->image($id);
        if($galley){
            return view('frontend.gallery-detail',[
                'galley'=>$galley,
                'image'=>$image
            ]);
        }else{
            return redirect()->back();
        }
    }
}
