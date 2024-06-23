<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Artisan;
//     use Illuminate\Support\Facades\Auth;

//     Route::get('/foo', function() {
//         Artisan::call('view:clear');
//         Artisan::call('route:clear');
//         Artisan::call('cache:clear');
//         Artisan::call('config:clear');
//         return "View compiled files removed";
// });


Route::group(['middleware' => ['approved','prevent-back-history']],function(){
Route::get('/frontHome', 'Front\ProjectController@usersHome')->name('front.home');
});
Route::get('/','Front\AuthController@showLogin')->name('front.login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

