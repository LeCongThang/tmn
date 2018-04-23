<?php


/*
 * Frontend
 */
$lang = InitLanguage(1);
Route::group(['namespace' => 'Frontend', 'middleware' => 'frontend'], function () {
    Route::get('/','HomeController@index');
    Route::get('language/{lang}','HomeController@ChangeLanguage');

    Route::get('gioi-thieu','AboutController@index' );

    Route::get('tin-tuc','NewsController@index');
    Route::get('tin-tuc/{id}/{slug}','NewsController@detail');

    Route::get('bo-suu-tap','GalleryController@index');
    Route::get('bo-suu-tap/{id}','GalleryController@detail');

    Route::get('dich-vu','ServiceController@index');
    Route::get('dich-vu/{id}/{slug}','ServiceController@detail');

    Route::get('lien-he','HomeController@Contact');

    Route::get('video','VideoController@index');
    Route::get('video/{id}/{slug}','VideoController@detail');

    Route::post('submit-contact','HomeController@SubmitContact');

    Route::post('contact/send-message','ContactController@SendMessage');
});




/*
 * Backend
 */
Route::get('/folder/{folder}','Backend\FinderController@Folder');
Route::post('/uploadfile/{folder}','Backend\FinderController@UploadFile');
Route::get('/deletefile/{folder}/{filename}','Backend\FinderController@RemoveFile');


$prefix_admin = 'admin';

Route::get($prefix_admin, function () use ($prefix_admin) {
    return redirect("$prefix_admin/login");
});

Route::get("$prefix_admin/login",'Backend\LoginController@getLogin');
Route::post("$prefix_admin/login",'Backend\LoginController@postLogin');
Route::get("$prefix_admin/logout",'Backend\LoginController@getLogout');

Route::post("$prefix_admin/forget-password",'Backend\LoginController@postForgetPassword');
Route::get("$prefix_admin/change-password",'Backend\LoginController@getChangePassword');
Route::post("$prefix_admin/change-password",'Backend\LoginController@postChangePassword');

Route::group(['namespace' => 'Backend','middleware'=>'backend','prefix'=>$prefix_admin],function(){
    Route::get('profile','LoginController@getProfile');
    Route::resource('contact','ContactController');
    Route::get('contact/delete/{id}','ContactController@Delete');

    Route::put('user/{id}','UserController@update');

    Route::group(['middleware'=>'supper-admin','prefix'=>'/'],function (){
        Route::resource('user','UserController');
//        Route::get('setting','SettingController@getList');
//        Route::post('setting','SettingController@postUpdate');
//        Route::post('setting/clear-cache','SettingController@postClearCache');
    });
    Route::resource('about','AboutUsController');
    Route::resource('banner','BannerController');
    Route::resource('config','SettingController');
    Route::resource('slider','SliderController');
    Route::get('slider/delete/{id}','SliderController@Delete');

    Route::resource('video','VideoController');
    Route::get('video/delete/{id}','VideoController@Delete');
    Route::get('video/check/{id}','VideoController@Check');

    Route::get('service/delete/{id}','ServiceController@Delete');
    Route::resource('service','ServiceController');

    //gallery
    Route::get('gallery/delete/{id}','GalleryController@Delete');
    Route::resource('gallery','GalleryController');



    Route::resource('product','ProductController');
    Route::get('product/delete/{id}','ProductController@Delete');

    Route::resource('news','NewsController');
    Route::get('news/delete/{id}','NewsController@Delete');

    Route::resource('category','NewsCategoryController');
    Route::get('category/delete/{id}','NewsCategoryController@Delete');


    Route::group(['prefix'=>'ajax'],function(){
        Route::post('uploadImage','Controller@uploadImage');
    });
});



