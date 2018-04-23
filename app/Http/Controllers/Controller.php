<?php

namespace App\Http\Controllers;

use App\More;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage(Request $request)
    {
        $data = [];
        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            foreach ($file as $f)
            {
                $folder_path = empty($request->get('folder_path')) ? More::$FolderPathImageTalent : $request->get('folder_path');
                $result = MoveFile($f,$folder_path);
                if($result['success'])
                    $data[] = $result['file_name'];
            }
        }
        return responseJSON($data);
    }
    public function GetLanguage(){
        if(session()->get('lang')){
            $lang=session()->get('lang');
            App::setLocale($lang);
        }else{
            $lang= App::getLocale();
            session(['lang'=>$lang]);
        }
    }
}
