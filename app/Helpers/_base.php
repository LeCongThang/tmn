<?php

function Date2String($inputDate,$formatOut='d/m/Y')
{
    return \Carbon\Carbon::parse($inputDate)->format($formatOut);
}

function genNameFile($extension = 'jpg',$prefix='')
{
    return uniqid($prefix,true).'.'.strtolower($extension);
}

function MoveFile($img,$filePath = 'uploads/product_image',$data_type_accept = array('gif','png' ,'jpg','bmp','jpeg'),$keep_original_name=true)
{
    if(!is_file($img)){
        return [
            "success"=>false,
            "message"=>"File lỗi"
        ];
    }

    $ext = $img->getClientOriginalExtension();
    if(!in_array(strtolower($ext),$data_type_accept))
        return [
            "success"=>false,
            "message"=>"Định dạng file không hỗ trợ, định dạng cho phép: " . implode(',',$data_type_accept)
        ];

    $filename = genNameFile($ext);
    if($keep_original_name)
        $filename = convertString($img->getClientOriginalName(),'_',MB_CASE_LOWER).'@^@'.$filename;

    if($img->move($filePath, $filename))
        return [
            "success"=>true,
            "file_name"=>$filename,
            "full_path"=>"$filePath/$filename"
        ];

    return [
        "success"=>false,
        "message"=>"Lỗi không upload được file"
    ];
}

function summary($source_string, $max_len=30)
{
    if(strlen($source_string)<$max_len) return $source_string;
    $html = substr($source_string,0,$max_len);
    $html = substr($html,0,strrpos($html,' '));
    return $html.'...';
}