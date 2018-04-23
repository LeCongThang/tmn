<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;
use File;

class ServiceController extends Controller
{
    //
    public function index(){
        try{
            $service=Service::where('status',1)->orderByDesc('updated_at')->get();

            return view('backend.service.index',[
                'service'=>$service
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function create(){
        try{
            return view('backend.service.create');
        }catch (\Exception $e){

        }
    }
    public function store(Request $request){
        try{
            if (empty($request->get('title_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống tiêu đề tiếng việt')->withInput();
            if (empty($request->get('title_en')))
                return redirect()->back()->with('error','Vui lòng không để trống tiêu đề tiếng anh')->withInput();
            if (empty($request->get('description_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống nội dung tiếng việt')->withInput();
            if (empty($request->get('description_en')))
                return redirect()->back()->with('error','Vui lòng không để trống nội dung tiếng anh')->withInput();
            if (empty($request->get('tags')))
                return redirect()->back()->with('error','Vui lòng không để trống tags')->withInput();
            if (empty($request->get('short_des_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống mô tả ngắn tiếng việt')->withInput();
            if (empty($request->get('short_des_en')))
                return redirect()->back()->with('error','Vui lòng không để trống mô tả ngắn tiếng anh')->withInput();
            if (empty($request->hasFile('image')))
                return redirect()->back()->with('error','Vui lòng không để trống hình ảnh')->withInput();
            $service=new Service();
            $service->title_vi=$request->title_vi;
            $service->title_en=$request->title_en;
            $service->description_vi=$request->description_vi;
            $service->description_en=$request->description_en;
            $service->tags=$request->tags;
            $service->short_des_vi=$request->short_des_vi;
            $service->short_des_en=$request->short_des_en;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = 'service-' .time().'.'. $image->getClientOriginalExtension();
                $destinationPath = public_path('images/service/'.$filename);
                Image::make($image->getRealPath())->resize(400,300)->save($destinationPath);
                $service->image = $filename;
            }
            if($service->save()){
                return redirect('admin/service')->with('success','Thêm Dịch vụ thành công!');
            }else{
                if(File::exists(public_path('images/service/'.$service->image))) {
                    File::delete(public_path('images/service/'.$service->image));
                }
                return redirect()->back()->with('error','Thêm Dịch vụ thất bại!');
            }

        }catch (\Exception $e){
            dd($e);
            return redirect()->back()->with('error','Thêm Dịch vụ thất bại!');
        }
    }
    public function edit($id){
        try{
            $service=Service::find($id);
            if($service){
                return view('backend.service.detail',[
                    'service'=>$service

                ]);
            }else{
                return redirect()->back()->with(['error'=>'Dịch vụ không tồn tại!!']);
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
            if (empty($request->get('description_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống nội dung tiếng việt')->withInput();
            if (empty($request->get('description_en')))
                return redirect()->back()->with('error','Vui lòng không để trống nội dung tiếng anh')->withInput();
            if (empty($request->get('tags')))
                return redirect()->back()->with('error','Vui lòng không để trống tags')->withInput();
            if (empty($request->get('short_des_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống mô tả ngắn tiếng việt')->withInput();
            if (empty($request->get('short_des_en')))
                return redirect()->back()->with('error','Vui lòng không để trống mô tả ngắn tiếng anh')->withInput();
            $service=Service::find($id);
            if($service){
                $image_old=$service->image;
                $flag=0;
                if ($request->hasFile('image')) {
                    $flag=1;
                    $image = $request->file('image');
                    $filename = 'service-' .time().'.'. $image->getClientOriginalExtension();
                    $destinationPath = public_path('images/service/'.$filename);
                    Image::make($image->getRealPath())->resize(400,300)->save($destinationPath);
                    $service->image = $filename;
                }
                $service->title_vi=$request->title_vi;
                $service->title_en=$request->title_en;
                $service->description_vi=$request->description_vi;
                $service->description_en=$request->description_en;
                $service->tags=$request->tags;
                $service->short_des_vi=$request->short_des_vi;
                $service->short_des_en=$request->short_des_en;

                $service->save();
                if($service->save()){
                    if($flag==1){

                        if(File::exists(public_path('images/service/'.$image_old))) {
                            File::delete(public_path('images/service/'.$image_old));
                        }
                    }
                    return redirect()->back()->with('success','Cập nhật Dịch vụ thành công!');
                }else{
                    if($flag==1){
                        if(File::exists(public_path('images/service/'.$service->image))) {
                            File::delete(public_path('images/service/'.$service->image));
                        }
                    }
                    return redirect()->back()->with('error','Cập nhật Dịch vụ không thành công!');
                }
            }else{
                return redirect()->back()->with('error','Dịch vụ không tồn tại!');
            }

        }catch (\Exception $e){
            return redirect()->back()->with('error','Cập nhật Dịch vụ không thành công!');
        }
    }
    public function Delete($id){
        try{
            $service=Service::find($id);
            return view('backend.service.delete',[
                'service'=>$service
            ]);
        }catch (\Exception $e){

        }
    }
    public function destroy($id){
        try{
            $service=Service::find($id);
            if($service){
                $service->status=0;
                if($service->save()){
                    return redirect()->back()->with('success','Xóa Dịch vụ thành công!');
                }else{
                    return redirect()->back()->with('error','Xóa Dịch vụ thất bại!');
                }
            }else{
                return redirect()->back()->with('error','Dịch vụ không tồn tại!');
            }
        }catch (\Exception $e){

        }
    }
}
