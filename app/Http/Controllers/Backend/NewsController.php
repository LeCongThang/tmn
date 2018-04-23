<?php

namespace App\Http\Controllers\Backend;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;
use File;

class NewsController extends Controller
{
    //
    public function index(){
        try{
            $news=News::join('news_category','news.category_id','=','news_category.id')
            ->where('news_category.status',1)
            ->where('news.status',1)
                ->orderByDesc('news.updated_at')
                ->select('news.*','news_category.title_vi as category_vi','news_category.title_en as category_en')
                ->get();

            return view('backend.news.index',[
                'news'=>$news
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function create(){
        try{
            $category=NewsCategory::where('status',1)->get();
            return view('backend.news.create',[
                'category'=>$category
            ]);
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
            if (empty($request->get('count_view')))
                return redirect()->back()->with('error','Vui lòng không để trống lượt xem')->withInput();
            if (empty($request->get('tags')))
                return redirect()->back()->with('error','Vui lòng không để trống tags')->withInput();
            if (empty($request->get('short_des_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống mô tả ngắn tiếng việt')->withInput();
            if (empty($request->get('short_des_en')))
                return redirect()->back()->with('error','Vui lòng không để trống mô tả ngắn tiếng anh')->withInput();
            if (empty($request->hasFile('image')))
                return redirect()->back()->with('error','Vui lòng không để trống hình ảnh')->withInput();
            $news=new News();
            $news->title_vi=$request->title_vi;
            $news->title_en=$request->title_en;
            $news->description_vi=$request->description_vi;
            $news->description_en=$request->description_en;
            $news->tags=$request->tags;
            $news->count_view=$request->count_view;
            $news->category_id=$request->category_id;
            $news->short_des_vi=$request->short_des_vi;
            $news->short_des_en=$request->short_des_en;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = 'news-' .time().'.'. $image->getClientOriginalExtension();
                $destinationPath = public_path('images/news/'.$filename);
                Image::make($image->getRealPath())->resize(400,300)->save($destinationPath);
                $news->image = $filename;
            }
            if($news->save()){
                return redirect('admin/news')->with('success','Thêm tin tức thành công!');
            }else{
                if(File::exists(public_path('images/news/'.$news->image))) {
                    File::delete(public_path('images/news/'.$news->image));
                }
                return redirect()->back()->with('error','Thêm tin tức thất bại!');
            }


        }catch (\Exception $e){
            return redirect()->back()->with('error','Thêm tin tức thất bại!');
        }
    }
    public function edit($id){
        try{
            $news=News::find($id);
            $category=NewsCategory::where('status',1)->get();
            if($news){
                return view('backend.news.detail',[
                    'news'=>$news,
                    'category'=>$category

                ]);
            }else{
                return redirect()->back()->with(['error'=>'Tin tức không tồn tại!!']);
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
            if (empty($request->get('count_view')))
                return redirect()->back()->with('error','Vui lòng không để trống lượt xem')->withInput();
            if (empty($request->get('tags')))
                return redirect()->back()->with('error','Vui lòng không để trống tags')->withInput();
            if (empty($request->get('short_des_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống mô tả ngắn tiếng việt')->withInput();
            if (empty($request->get('short_des_en')))
                return redirect()->back()->with('error','Vui lòng không để trống mô tả ngắn tiếng anh')->withInput();
            $news=News::find($id);
            if($news){
                $image_old=$news->image;
                $flag=0;
                if ($request->hasFile('image')) {
                    $flag=1;
                    $image = $request->file('image');
                    $filename = 'news-' .time().'.'. $image->getClientOriginalExtension();
                    $destinationPath = public_path('images/news/'.$filename);
                    Image::make($image->getRealPath())->resize(400,300)->save($destinationPath);
                    $news->image = $filename;
                }
                $news->title_vi=$request->title_vi;
                $news->title_en=$request->title_en;
                $news->description_vi=$request->description_vi;
                $news->description_en=$request->description_en;
                $news->tags=$request->tags;
                $news->count_view=$request->count_view;
                $news->category_id=$request->category_id;
                $news->short_des_vi=$request->short_des_vi;
                $news->short_des_en=$request->short_des_en;
                if($news->save()){
                    if($flag==1){

                        if(File::exists(public_path('images/news/'.$image_old))) {
                            File::delete(public_path('images/news/'.$image_old));
                        }
                    }
                    return redirect()->back()->with('success','Cập nhật tin tức thành công!');
                }else{
                    if($flag==1){
                        if(File::exists(public_path('images/news/'.$news->image))) {
                            File::delete(public_path('images/news/'.$news->image));
                        }
                    }
                    return redirect()->back()->with('error','Cập nhật Tin tức không thành công!');
                }
            }else{

                return redirect()->back()->with('error','Tin tức không tồn tại!');
            }

        }catch (\Exception $e){
            dd($e);
            return redirect()->back()->with('error','Cập nhật Tin tức không thành công!');
        }
    }
    public function Delete($id){
        try{
            $news=News::find($id);
            return view('backend.news.delete',[
                'news'=>$news
            ]);
        }catch (\Exception $e){

        }
    }
    public function destroy($id){
        try{
            $news=News::find($id);
            if($news){
                $news->status=0;
                if($news->save()){
                    if(File::exists(public_path('images/news/'.$news->image))) {
                        File::delete(public_path('images/news/'.$news->image));
                    }
                    return redirect()->back()->with('success','Xóa tin tức thành công!');
                }else{
                    return redirect()->back()->with('error','Xóa tin tức thất bại!');
                }
            }else{
                return redirect()->back()->with('error','Tin tức không tồn tại!');
            }
        }catch (\Exception $e){

        }
    }
}
