<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;
use File;

class SliderController extends Controller
{
    //
    public function index(){
        try{
            $slider=Slider::where('is_delete',0)->orderByDesc('updated_at')->get();

            return view('backend.slider.index',[
                'slider'=>$slider
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function create(){
        try{
            return view('backend.slider.create');
        }catch (\Exception $e){

        }
    }
    public function store(Request $request){
        try{
            if (empty($request->get('sort_order')))
                return redirect()->back()->with('error','Vui lòng không để trống thứ tự hiển thị')->withInput();
            if (empty($request->get('link')))
                return redirect()->back()->with('error','Vui lòng không để trống link')->withInput();
            if (empty($request->hasFile('image')))
                return redirect()->back()->with('error','Vui lòng không để trống hình ảnh')->withInput();
            if (empty($request->get('description_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu tiếng việt')->withInput();
            if (empty($request->get('description_en')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu tiếng anh')->withInput();
            $slider=new Slider();
            $slider->sort_order=$request->sort_order;
            $slider->link=$request->link;
            $slider->status=$request->status;
            $slider->description_vi=$request->description_vi;
            $slider->description_en=$request->description_en;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = 'slider-' .time().'.'. $image->getClientOriginalExtension();
                $destinationPath = public_path('images/slider/'.$filename);
                Image::make($image->getRealPath())->resize(900, 500)->save($destinationPath);
                $slider->image = $filename;
            }
            if($slider->save()){
                return redirect('admin/slider')->with('success','Thêm Slider thành công!');
            }else{
                if(File::exists(public_path('images/slider/'.$slider->image))) {
                    File::delete(public_path('images/slider/'.$slider->image));
                }
                return redirect()->back()->with('error','Thêm slider thất bại!');
            }


        }catch (\Exception $e){
            dd($e);
            return redirect()->back()->with('error','Thêm Slider thất bại!');
        }
    }
    public function edit($id){
        try{
            $slider=Slider::find($id);
            if($slider){
                return view('backend.slider.detail',[
                    'slider'=>$slider

                ]);
            }else{
                return redirect()->back()->with(['error'=>'Slider không tồn tại!!']);
            }
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function update($id, Request $request){
        try{
            if (empty($request->get('sort_order')))
                return redirect()->back()->with('error','Vui lòng không để trống thứ tự hiển thị')->withInput();
            if (empty($request->get('link')))
                return redirect()->back()->with('error','Vui lòng không để trống link')->withInput();
            if (empty($request->get('description_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu tiếng việt')->withInput();
            if (empty($request->get('description_en')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu tiếng anh')->withInput();
            $slider=Slider::find($id);
            if($slider){
                $image_old=$slider->image;
                $flag=0;
                if ($request->hasFile('image')) {
                    $flag=1;
                    $image = $request->file('image');
                    $filename = 'slider-' .time().'.'. $image->getClientOriginalExtension();
                    $destinationPath = public_path('images/slider/'.$filename);
                    Image::make($image->getRealPath())->resize(900, 500)->save($destinationPath);
                    $slider->image = $filename;
                }
                $slider->sort_order=$request->sort_order;
                $slider->link=$request->link;
                $slider->status=$request->status;
                $slider->description_vi=$request->description_vi;
                $slider->description_en=$request->description_en;
                if($slider->save()){
                    if($flag==1){
                        if(File::exists(public_path('images/slider/'.$image_old))) {
                            File::delete(public_path('images/slider/'.$image_old));
                        }
                    }
                    return redirect()->back()->with('success','Cập nhật Slider thành công!');
                }else{
                    if($flag==1){
                        if(File::exists(public_path('images/slider/'.$slider->image))) {
                            File::delete(public_path('images/slider/'.$slider->image));
                        }
                    }
                    return redirect()->back()->with('error','Cập nhật slider không thành công!');
                }
            }else{
                return redirect()->back()->with('error','Slider không tồn tại!');
            }

        }catch (\Exception $e){
            dd($e);
            return redirect()->back()->with('error','Slider không tồn tại!');
        }
    }
    public function Delete($id){
        try{
            $slider=Slider::find($id);
            return view('backend.slider.delete',[
                'slider'=>$slider
            ]);
        }catch (\Exception $e){

        }
    }
    public function destroy($id){
        try{
            $slider=Slider::find($id);
            if($slider){
                $slider->is_delete=1;
                if($slider->save()){
                    if(File::exists(public_path('images/slider/'.$slider->image))) {
                        File::delete(public_path('images/slider/'.$slider->image));
                    }
                    return redirect()->back()->with('success','Xóa Slider thành công!');
                }else{
                    return redirect()->back()->with('error','Xóa Slider thất bại!');
                }
            }else{
                return redirect()->back()->with('error','Slider không tồn tại!');
            }
        }catch (\Exception $e){

        }
    }
}
