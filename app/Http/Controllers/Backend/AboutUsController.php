<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;
use File;


class AboutUsController extends Controller
{
    //
    public function index(){

        try{
            $about=About::get();
            return view('backend.about.index',[
                'about'=>$about
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function create(){
        try{
            return view('backend.about.create');
        }catch (\Exception $e){

        }
    }
    public function store(Request $request){
        try{

            if (empty($request->get('short_des_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống giới mô tả ngắn tiếng việt')->withInput();
            if (empty($request->get('short_des_en')))
                return redirect()->back()->with('error','Vui lòng không để trống giới mô tả ngắn tiếng anh')->withInput();
            if (empty($request->hasFile('image_big')))
                return redirect()->back()->with('error','Vui lòng không để trống hình ảnh lớn')->withInput();
            if (empty($request->get('info_head_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu phần trên tiếng việt')->withInput();
            if (empty($request->get('info_head_en')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu phần trên tiếng anh')->withInput();
            if (empty($request->get('info_footer_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu phần dưới tiếng việt')->withInput();
            if (empty($request->get('info_footer_en')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu phần dưới tiếng anh')->withInput();
            $about=new About();
            $about->short_des_vi=$request->short_des_vi;
            $about->short_des_en=$request->short_des_en;
            $about->info_footer_vi=$request->info_footer_vi;
            $about->info_footer_en=$request->info_footer_en;
            $about->info_head_vi=$request->info_head_vi;
            $about->info_head_en=$request->info_head_en;
            if ($request->hasFile('image_big')) {
                $image = $request->file('image_big');
                $filename1 = 'image-big-' .time().'.'. $image->getClientOriginalExtension();
                $destinationPath = public_path('images/about/'.$filename1);
                Image::make($image->getRealPath())->resize(600,400)->save($destinationPath);
                $about->image_big = $filename1;
            }
            if($about->save()){
                return redirect('admin/about')->with('success','Thêm thông tin thành công!');
            }else{

                if(File::exists(public_path('images/about/'.$about->image_big))) {
                    File::delete(public_path('images/about/'.$about->image_big));
                }
                return redirect()->back()->with('error','Thêm tin tức thất bại!');
            }
        }catch (\Exception $e){
            dd($e);
            return redirect()->back()->with('error','Thêm thông tin thất bại!');
        }
    }
    public function show($id){
        try{
            $about=About::first();
            if($about){
                return view('backend.about.detail',[
                    'about'=>$about,
                ]);
            }else{
                return redirect()->back()->with(['error'=>'About không tồn tại!!']);
            }
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function update($id,Request $request){
        try{
            if (empty($request->get('short_des_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống giới mô tả ngắn tiếng việt')->withInput();
            if (empty($request->get('short_des_en')))
                return redirect()->back()->with('error','Vui lòng không để trống giới mô tả ngắn tiếng anh')->withInput();
            if (empty($request->get('info_head_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu phần trên tiếng việt')->withInput();
            if (empty($request->get('info_head_en')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu phần trên tiếng anh')->withInput();
            if (empty($request->get('info_footer_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu phần dưới tiếng việt')->withInput();
            if (empty($request->get('info_footer_en')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu phần dưới tiếng anh')->withInput();
            $about=About::find($id);
            if($about){
                $about->short_des_vi=$request->short_des_vi;
                $about->short_des_en=$request->short_des_en;
                $about->info_footer_vi=$request->info_footer_vi;
                $about->info_footer_en=$request->info_footer_en;
                $about->info_head_vi=$request->info_head_vi;
                $about->info_head_en=$request->info_head_en;
                $image_big_old=$about->image_big;
                $flag2=0;
                if ($request->hasFile('image_big')) {
                    $flag2=1;
                    $image = $request->file('image_big');
                    $filename1 = 'image-big-' .time().'.'. $image->getClientOriginalExtension();
                    $destinationPath = public_path('images/about/'.$filename1);
                    Image::make($image->getRealPath())->resize(600,400)->save($destinationPath);
                    $about->image_big = $filename1;
                }
                if($about->save()){
                    if($flag2==1){

                        if(File::exists(public_path('images/about/'.$image_big_old))) {
                            File::delete(public_path('images/about/'.$image_big_old));
                        }
                    }
                    return redirect()->back()->with('success','Cập nhật about thành công!');
                }else{
                    if($flag2==1){

                        if(File::exists(public_path('images/about/'.$about->image_big))) {
                            File::delete(public_path('images/about/'.$about->image_big));
                        }
                    }
                    return redirect()->back()->with(['error'=>'Cập nhật about thất bại!!']);
                }
            }else{

                return redirect()->back()->with(['error'=>'about không tồn tại!!']);
            }
        }catch (\Exception $e){
            dd($e);
            return redirect('error.html');
        }
    }
}
