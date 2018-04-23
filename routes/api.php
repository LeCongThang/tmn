<?php

$lang = InitLanguage(2);
Route::group(['namespace' => 'Api', 'middleware' => 'api', 'prefix' => $lang], function () {

});