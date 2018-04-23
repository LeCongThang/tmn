<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;
use File;

class BannerController extends Controller
{
    //
    public function index(){
        try{
            $banner=Banner::orderByDesc('updated_at')->get();
            return view('backend.banner.index',[
                'banner'=>$banner
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function create(){
        try{
            return view('backend.banner.create');
        }catch (\Exception $e){

        }
    }
    public function store(Request $request){
        try{
            if (empty($request->get('title_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống tiêu đề tiếng việt')->withInput();
            if (empty($request->get('title_en')))
                return redirect()->back()->with('error','Vui lòng không để trống tiêu đề tiếng anh')->withInput();
            $banner=new Banner();
            $banner->title_vi=$request->title_vi;
            $banner->title_en=$request->title_en;
            $banner->type=$request->type;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = 'banner-' .time().'.'. $image->getClientOriginalExtension();
                $destinationPath = public_path('images/banner/'.$filename);
                Image::make($image->getRealPath())->resize(800,200)->save($destinationPath);
                $banner->image = $filename;
            }
            if($banner->save()){
                return redirect('admin/banner')->with('success','Thêm banner thành công!');
            }else{
                if(File::exists(public_path('images/banner/'.$banner->image))) {
                    File::delete(public_path('images/banner/'.$banner->image));
                }
                return redirect()->back()->with('error','Thêm banner thất bại!');
            }


        }catch (\Exception $e){
            dd($e);
            return redirect()->back()->with('error','Thêm banner thất bại!');
        }
    }
    public function edit($id){
        try{
            $banner=Banner::find($id);
            if($banner){
                return view('backend.banner.detail',[
                    'banner'=>$banner

                ]);
            }else{
                return redirect()->back()->with(['error'=>'Banner không tồn tại!!']);
            }
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function update($id, Request $request){
        try{
            if (empty($request->get('title_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống tiêu đề tiếng việt')->withInput();
            if (empty($request->get('title_en')))
                return redirect()->back()->with('error','Vui lòng không để trống tiêu đề tiếng anh')->withInput();
            $banner=Banner::find($id);
            if($banner){
                $image_old=$banner->image;
                $flag=0;
                if ($request->hasFile('image')) {
                    $flag=1;
                    $image = $request->file('image');
                    $filename = 'banner-' .time().'.'. $image->getClientOriginalExtension();
                    $destinationPath = public_path('images/banner/'.$filename);
                    Image::make($image->getRealPath())->resize(800,200)->save($destinationPath);
                    $banner->image = $filename;
                }
                $banner->title_vi=$request->title_vi;
                $banner->title_en=$request->title_en;
                if($banner->save()){
                    if($flag==1){

                        if(File::exists(public_path('images/banner/'.$image_old))) {
                            File::delete(public_path('images/banner/'.$image_old));
                        }
                    }
                    return redirect()->back()->with('success','Cập nhật tin tức thành công!');
                }else{
                    if($flag==1){
                        if(File::exists(public_path('images/banner/'.$banner->image))) {
                            File::delete(public_path('images/banner/'.$banner->image));
                        }
                    }
                    return redirect()->back()->with('error','Cập nhật Tin tức không thành công!');
                }
            }else{

                return redirect()->back()->with('error','Tin tức không tồn tại!');
            }

        }catch (\Exception $e){
            return redirect()->back()->with('error','Cập nhật Tin tức không thành công!');
        }
    }
}
