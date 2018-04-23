<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //
    public function m_news(){
        $data=News::where('status',1)->orderBy('updated_at','desc')->paginate(2);
        if(count($data)!=0){
            foreach ($data as $key=>$item){
                $data[$key]=$item->responseNews1();
            }
            return $data;
        }
        return $data;
    }
    public function m_news_category(){
        $data=NewsCategory::join('news','news_category.id','=','news.category_id')
            ->where('news.status',1)
            ->where('news_category.status',1)
            ->select('news_category.*')
            ->distinct()
            ->limit(2)->get();
        if(count($data)!=0){
            foreach ($data as $key=>$item){
                $c=$item->responseNewsCategory();
                $news=News::where('category_id',$c['id'])->where('status',1)->orderBy('updated_at','desc')->limit(3)->get();
                if(count($news)!=0){
                    foreach ($news as $key1=>$item1){
                        $news[$key1]=$item1->responseNews();
                    }
                }
                $c['news']=$news;
                $data[$key]=$c;
            }
        }
        return $data;
    }
    public static function banner(){
        $data=Banner::where('type',2)
            ->first();
        return view('frontend.partial.banner',[
            'banner'=>$data->responseBanner()
        ])->render();
    }
    public function index(){
        session(['active'=>2]);
        GetLanguage();
        $news=$this->m_news();
        $category=$this->m_news_category();
        return view('frontend.news',[
            'news'=>$news,
            'category'=>$category
        ]);
    }

    public function news_detail($id){
        $data=News::find($id);
        if($data){
//            $data->count_view=$data->count_view + 1;
//            $data->save();
            News::where('id', '=', $id)
                ->update(['count_view' => $data->count_view + 1], ['timestamps' => false]);
            $data=$data->responseNews();
        }
        return $data;
    }
    public function detail($id,$slug){
        session(['active'=>2]);
        GetLanguage();
        $news=$this->news_detail($id);
        if($news){
            return view('frontend.news-detail',[
                'news'=>$news
            ]);
        }else{
            return redirect()->back();
        }
    }
}
