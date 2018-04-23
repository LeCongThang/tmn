<?php

function fadeEffect()
{
    $fade = ['fadeInLeft', 'fadeInRight', 'fadeInUp', 'fadeInDown'];
    return $fade[shuffle($fade)];
}

function InitLanguage($index = 2)
{
    $lang = Request::segment($index);
    $l = (strlen($lang)!=2) ? 'vi' : $lang;
    session(['lang' => $l]);
    App::setLocale($l);
    return $lang;
}

function changeLanguage($lang = 'vi', $index = false)
{
    $curl = url()->current();
    $root = url()->asset('');

    $kq = str_replace($root, '', $curl);

    $l = substr($kq, 0, 3);
    if ($index)
        return $root . $lang;
    if ($l == 'vi/' || $l == 'en/') {
        $theURL = $lang . '/' . substr($kq, 3);
    } else {
        $theURL = $lang . '/' . $kq;
    }
    return $theURL;
}

function urlLang($href)
{
    return asset(App::getLocale() . '/' . $href);
}

function GetLanguage(){
    if(session()->get('lang')){
        $lang=session()->get('lang');
        App::setLocale($lang);
    }else{
        $lang= App::getLocale();
        session(['lang'=>$lang]);
    }
}
