<?php

namespace App\Http\Controllers\Backend;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;
use File;

class NewsCategoryController extends Controller
{
    //
    public function index(){
        try{
            $category=NewsCategory::where('status',1)->orderByDesc('updated_at')->get();
            return view('backend.category.index',[
                'category'=>$category
            ]);
        }catch (\Exception $e){
            dd($e);
            return redirect()->back();
        }
    }
    public function create(){
        try{
            return view('backend.category.create');
        }catch (\Exception $e){

        }
    }
    public function store(Request $request){
        try{
            if (empty($request->get('title_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống tiêu đề tiếng việt')->withInput();
            if (empty($request->get('title_en')))
                return redirect()->back()->with('error','Vui lòng không để trống tiêu đề tiếng anh')->withInput();
            $category=new NewsCategory();
            $category->title_vi=$request->title_vi;
            $category->title_en=$request->title_en;
            if($category->save()){
                return redirect('admin/category')->with('success','Thêm loại tin tức thành công!');
            }else{
                return redirect()->back()->with('error','Thêm loại tin tức thất bại!');
            }


        }catch (\Exception $e){
            return redirect()->back()->with('error','Thêm loại tin tức thất bại!');
        }
    }
    public function edit($id){
        try{
            $category=NewsCategory::find($id);
            if($category){
                return view('backend.category.detail',[
                    'category'=>$category

                ]);
            }else{
                return redirect()->back()->with(['error'=>'Loại Tin tức không tồn tại!!']);
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
            $category=NewsCategory::find($id);
            if($category){
                $category->title_vi=$request->title_vi;
                $category->title_en=$request->title_en;
                if($category->save()){
                    return redirect()->back()->with('success','Cập nhật loại tin tức thành công!');
                }else{
                    return redirect()->back()->with('error','Cập nhật loại Tin tức không thành công!');
                }
            }else{

                return redirect()->back()->with('error','Loại Tin tức không tồn tại!');
            }

        }catch (\Exception $e){
            return redirect()->back()->with('error','Cập nhật loại Tin tức không thành công!');
        }
    }
    public function Delete($id){
        try{
            $category=NewsCategory::find($id);
            return view('backend.category.delete',[
                'category'=>$category
            ]);
        }catch (\Exception $e){

        }
    }
    public function destroy($id){
        try{
            $category=NewsCategory::find($id);
            if($category){
                $category->status=0;
                if($category->save()){
                    return redirect()->back()->with('success','Xóa loại tin tức thành công!');
                }else{
                    return redirect()->back()->with('error','Xóa loại tin tức thất bại!');
                }
            }else{
                return redirect()->back()->with('error','Loại Tin tức không tồn tại!');
            }
        }catch (\Exception $e){

        }
    }
}
