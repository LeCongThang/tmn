<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use File;


class GalleryController extends Controller
{
    //
    public function index(){
        try{
            $gallery=Gallery::orderByDesc('updated_at')->get();
            if(count($gallery)!=0){
                foreach ($gallery as $item){
                    $image=GalleryImage::where('gallery_id',$item->id)
                        ->value('image');
                    $item->image=$image;
                }
            }
            return view('backend.gallery.index',[
                'gallery'=>$gallery
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function create(){
        try{
            return view('backend.gallery.create');
        }catch (\Exception $e){
        }
    }
    public function store(Request $request){
        $arr_image=array();
        try{
            $gallery=new Gallery();
            if (empty($request->get('title_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống tiêu đề tiếng việt')->withInput();
            if (empty($request->get('title_en')))
                return redirect()->back()->with('error','Vui lòng không để trống tiêu đề tiếng anh')->withInput();
            if (empty($request->get('description_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu tiếng việt')->withInput();
            if (empty($request->get('description_en')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu tiếng anh')->withInput();
            if (empty($request->hasFile('image')))
                return redirect()->back()->with('error','Vui lòng không để trống hình ảnh')->withInput();

            if (count($request->file('image'))>5)
                return redirect()->back()->with('error','Số lượng hình tối đa là 5')->withInput();
//
            $gallery->title_vi=$request->title_vi;
            $gallery->title_en=$request->title_en;
            $gallery->description_vi=$request->description_vi;
            $gallery->description_en=$request->description_en;
            $gallery->status=$request->status;

            $result=DB::transaction(function() use ($gallery, $request,$arr_image){
                $gallery->save();
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $i=0;
                    foreach ($image as $file) {
                        $gallery_image=new GalleryImage();
                        $gallery_image->gallery_id=$gallery->id;
                        $file_name = md5(Carbon::now()).$i. '.jpg';
                        $destinationPath = public_path('images/gallery/'.$file_name);
                        Image::make($file->getRealPath())->resize(300, 400)->save($destinationPath);
                        $gallery_image->image = $file_name;
                        $gallery_image->save();
                        array_push($arr_image,$file_name);
                        $i++;
                    }
                }
                return redirect('admin/gallery')->with('success','Thêm gallery thành công!');
            });
            return $result;
        }catch (\Exception $e){
            if(count($arr_image)!=0){
                foreach ($arr_image as $item){
                    if(File::exists(public_path('images/gallery/'.$item))) {
                        File::delete(public_path('images/gallery/'.$item));
                    }
                }

            }
            return redirect()->back()->with('error','Thêm sản phẩm thất bại!');
        }
    }
    public function edit($id){
        try{
            $gallery=Gallery::find($id);
            if($gallery){
                $image=GalleryImage::where('gallery_id',$id)
                    ->get();
                return view('backend.gallery.detail',[
                    'gallery'=>$gallery,
                    'image'=>$image
                ]);
            }else{
                return redirect()->back()->with(['error'=>'Gallery không tồn tại!!']);
            }
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function update($id, Request $request){
        $arr_image_insert=array();
        try{
            if (empty($request->get('title_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống tiêu đề tiếng việt')->withInput();
            if (empty($request->get('title_en')))
                return redirect()->back()->with('error','Vui lòng không để trống tiêu đề tiếng anh')->withInput();
            if (empty($request->get('description_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu tiếng việt')->withInput();
            if (empty($request->get('description_en')))
                return redirect()->back()->with('error','Vui lòng không để trống giới thiệu tiếng anh')->withInput();
            if ($request->hasFile('image')){
                if (count($request->file('image'))>5)
                    return redirect()->back()->with('error','Số lượng hình tối đa là 5')->withInput();
            }
            $gallery=Gallery::find($id);
            if($gallery){
                $arr_image=array();
                $gallery->title_vi=$request->title_vi;
                $gallery->title_en=$request->title_en;
                $gallery->description_vi=$request->description_vi;
                $gallery->description_en=$request->description_en;
                $gallery->status=$request->status;
                $result=DB::transaction(function() use ($gallery, $request,$arr_image,$arr_image_insert){
                    if (!empty($request->get('arrImage'))){
                        $arr=explode(",",substr($request->arrImage, 0, -1));
                        foreach ($arr as $img){
                            $image1=GalleryImage::find($img);
                            if($image1){
                                array_push($arr_image,$image1->image);
                                $image1->delete();
                            }
                        }
                    }
                    $gallery->save();
                    if ($request->hasFile('image')) {
                        $image = $request->file('image');
                        $i=0;
                        foreach ($image as $file) {
                            $gallery_image=new GalleryImage();
                            $gallery_image->gallery_id=$gallery->id;
                            $file_name = md5(Carbon::now()).$i. '.jpg';
                            $destinationPath = public_path('images/gallery/'.$file_name);
                            Image::make($file->getRealPath())->resize(300, 400)->save($destinationPath);
                            $gallery_image->image = $file_name;
                            $gallery_image->save();
                            array_push($arr_image_insert,$file_name);
                            $i++;
                        }
                    }
                    if(count($arr_image)!=0){
                        foreach ($arr_image as $item){
                            if(File::exists(public_path('images/gallery/'.$item))) {
                                File::delete(public_path('images/gallery/'.$item));
                            }
                        }

                    }
                    return redirect('admin/gallery')->with('success','Cập nhật gallery thành công!');
                });
                return $result;
            }else{
                if(count($arr_image_insert)!=0){
                    foreach ($arr_image_insert as $item){
                        if(File::exists(public_path('images/gallery/'.$item))) {
                            File::delete(public_path('images/gallery/'.$item));
                        }
                    }
                }
                return redirect()->back()->with('error','Gallery không tồn tại!');
            }

        }catch (\Exception $e){
            dd($e);
            return redirect()->back()->with('error','Cập nhật gallery thất bại!!');
        }
    }
    public function Delete($id){
        try{
            $gallery=Gallery::find($id);
            $image=GalleryImage::where('gallery_id',$id)
                ->value('image');
            return view('backend.gallery.delete',[
                'gallery'=>$gallery,
                'image'=>$image
            ]);
        }catch (\Exception $e){

        }
    }
    public function destroy($id){
        try{
            $gallery=Gallery::find($id);
            if($gallery){
                $result=DB::transaction(function() use ($gallery,$id){

                    $img=GalleryImage::where('gallery_id',$id)->get();
                    if(count($img)){
                        foreach ($img as $im){
                            if(File::exists(public_path('images/gallery/'.$im->image))) {
                                File::delete(public_path('images/gallery/'.$im->image));
                            }
                            $im->delete();
                        }
                    }
                    $gallery->delete();
                    return redirect()->back()->with('success','Xóa gallery thành công!');
                });
                return $result;
            }else{
                return redirect()->back()->with('error','Gallery  không tồn tại!');
            }
        }catch (\Exception $e){
            dd($e);
            return redirect()->back()->with('error','Xóa gallery thất bại!');
        }
    }
}
