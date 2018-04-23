<?php

namespace App\Http\Controllers\Backend;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;

class VideoController extends Controller
{
    //
    public function index(){
        try{
            $video=Video::where('status',1)->orderByDesc('updated_at')->get();
            return view('backend.video.index',[
                'video'=>$video
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function create(){
        try{
            return view('backend.video.create');
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

            if (empty($request->get('embed_link')))
                return redirect()->back()->with('error','Vui lòng không để trống đường dẫn video')->withInput();
            if (empty($request->get('image')))
                return redirect()->back()->with('error','Vui lòng lấy link hình ảnh')->withInput();
            $video=new Video();
            $video->title_vi=$request->title_vi;
            $video->title_en=$request->title_en;
            $video->description_vi=$request->description_vi;
            $video->description_en=$request->description_en;
            $video->embed_link=$request->embed_link;
            $video->image=$request->image;
            $video->save();
            return redirect('admin/video')->with('success','Thêm video thành công!');
        }catch (\Exception $e){
            dd($e);
            return redirect()->back()->with('error','Thêm video thất bại!');
        }
    }
    public function edit($id){
        try{
            $video=Video::find($id);
            if($video){
                return view('backend.video.detail',[
                    'video'=>$video

                ]);
            }else{
                return redirect()->back()->with(['error'=>'video không tồn tại!!']);
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
            if (empty($request->get('embed_link')))
                return redirect()->back()->with('error','Vui lòng không để trống dẫn video')->withInput();
            if (empty($request->get('image')))
                return redirect()->back()->with('error','Vui lòng lấy link hình ảnh')->withInput();
            $video=Video::find($id);
            if($video){

                $video->title_vi=$request->title_vi;
                $video->title_en=$request->title_en;
                $video->description_vi=$request->description_vi;
                $video->description_en=$request->description_en;
                $video->embed_link=$request->embed_link;
                $video->image=$request->image;

                $video->save();
                return redirect()->back()->with('success','Cập nhật video thành công!');

            }else{
                return redirect()->back()->with('error','video không tồn tại!');
            }

        }catch (\Exception $e){
            return redirect()->back()->with('error','video không tồn tại!');
        }
    }
    public function Delete($id){
        try{
            $video=Video::find($id);
            return view('backend.video.delete',[
                'video'=>$video
            ]);
        }catch (\Exception $e){

        }
    }
    public function destroy($id){
        try{
            $video=Video::find($id);
            if($video){
                $video->status=0;
                if($video->save()){
                    return redirect()->back()->with('success','Xóa video thành công!');
                }else{
                    return redirect()->back()->with('error','Xóa video thất bại!');
                }
            }else{
                return redirect()->back()->with('error','video không tồn tại!');
            }
        }catch (\Exception $e){

        }
    }
    public function Check($id){
        try{
            $video=Video::find($id);
            if($video){
                $ch=Video::where('is_show',1)->first();
                if($ch){
                    $ch->is_show=0;
                    $ch->save();
                }
                $video->is_show=1;
                if($video->save()){
                    return redirect()->back()->with('success','Cập nhật thành công!');
                }else{
                    return redirect()->back()->with('error','Cập nhật video thất bại!');
                }
            }else{
                return redirect()->back()->with('error','video không tồn tại!');
            }
        }catch (\Exception $e){

        }
    }
}
