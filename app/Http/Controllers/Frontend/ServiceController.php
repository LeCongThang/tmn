<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //
    public function service(){
        $service=Service::where('status',1)->orderBy('updated_at','desc')->paginate(4);
        if(count($service)!=0){
            foreach ($service as $key=>$item){
                $service[$key]=$item->responseService();
            }
        }
        return $service;
    }

    public function index(){
        session(['active'=>3]);
        GetLanguage();
        $service=$this->service();
        return view('frontend.service',[
            'service'=>$service
        ]);
    }
    public function service_detail($id){
        $data=Service::find($id);
        if($data){
            $data=$data->responseService();
        }
        return $data;
    }
    public function detail($id,$slug){
        session(['active'=>3]);
        GetLanguage();
        $service=$this->service_detail($id);
        if($service){
            return view('frontend.service-detail',[
                'service'=>$service
            ]);
        }else{
            return redirect()->back();
        }
    }
}
