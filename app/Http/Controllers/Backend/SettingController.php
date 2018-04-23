<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SystemConfig;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function index()
    {
        $setting = SystemConfig::first();
        return view('backend.system.index',compact('setting'));
    }
    public function update(Request $request){
        try{
            if (empty($request->get('count_view_web')))
                return redirect()->back()->with('error','Vui lòng không để trống số lần truy cập web')->withInput();
            if (empty($request->get('email')))
                return redirect()->back()->with('error','Vui lòng không để trống email')->withInput();
            if (empty($request->get('phone')))
                return redirect()->back()->with('error','Vui lòng không để trống số điện thoại')->withInput();
            if (empty($request->get('address_vi')))
                return redirect()->back()->with('error','Vui lòng không để trống địa chỉ tiếng việt')->withInput();
            if (empty($request->get('address_en')))
                return redirect()->back()->with('error','Vui lòng không để trống địa chỉ tiếng anh')->withInput();
            if (empty($request->get('site_map')))
                return redirect()->back()->with('error','Vui lòng không để trống site map')->withInput();
            if (empty($request->get('facebook')))
                return redirect()->back()->with('error','Vui lòng không để trống đường dẫn facebook')->withInput();
            if (empty($request->get('zalo')))
                return redirect()->back()->with('error','Vui lòng không để trống đường dẫn zalo')->withInput();
            if (empty($request->get('viber')))
                return redirect()->back()->with('error','Vui lòng không để trống đường dẫn viber')->withInput();
            if (empty($request->get('google')))
                return redirect()->back()->with('error','Vui lòng không để trống đường dẫn google')->withInput();
            if (empty($request->get('meta_title')))
                return redirect()->back()->with('error','Vui lòng không để trống meta title')->withInput();
            if (empty($request->get('meta_keysword')))
                return redirect()->back()->with('error','Vui lòng không để trống meta keysword')->withInput();
            if (empty($request->get('meta_des')))
                return redirect()->back()->with('error','Vui lòng không để trống meta description')->withInput();
            if (empty($request->get('google_analytics')))
                return redirect()->back()->with('error','Vui lòng không để trống google analytics')->withInput();
            $setting = SystemConfig::first();
            if($setting){
                $setting->count_view_web=$request->count_view_web;
                $setting->email=$request->email;
                $setting->phone=$request->phone;
                $setting->address_vi=$request->address_vi;
                $setting->address_en=$request->address_en;
                $setting->site_map=$request->site_map;
                $setting->facebook=$request->facebook;
                $setting->zalo=$request->zalo;
                $setting->skype=$request->skype;
                $setting->viber=$request->viber;
                $setting->google=$request->google;
                $setting->meta_title=$request->meta_title;
                $setting->meta_keysword=$request->meta_keysword;
                $setting->meta_des=$request->meta_des;
                $setting->google_analytics=$request->google_analytics;
                $setting->save();
                return redirect()->back()->with(['success'=>'Cập nhật thành công!!']);
            }else{
                $setting=new SystemConfig();
                $setting->count_view_web=$request->count_view_web;
                $setting->email=$request->email;
                $setting->phone=$request->phone;
                $setting->address_vi=$request->address_vi;
                $setting->address_en=$request->address_en;
                $setting->site_map=$request->site_map;
                $setting->facebook=$request->facebook;
                $setting->zalo=$request->zalo;
                $setting->viber=$request->viber;
                $setting->skype=$request->skype;
                $setting->google=$request->google;
                $setting->meta_title=$request->meta_title;
                $setting->meta_keysword=$request->meta_keysword;
                $setting->meta_des=$request->meta_des;
                $setting->google_analytics=$request->google_analytics;
                $setting->save();
                return redirect()->back()->with(['success'=>'Cập nhật thành công!!']);
            }
        }catch (\Exception $e){
            dd($e);
            return redirect()->back()->with(['error'=>'Cập nhật thất bại!!']);
        }
    }

}
