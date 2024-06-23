<?php
   use Illuminate\Support\Facades\Route;
   
    Route::get('search','ProjectController@search');
    Route::get('/after_register','AuthController@after_register')->name('after.register');
    Route::post('/doLogin','AuthController@customLogin')->name('dologin');
    Route::get('/register','AuthController@getRegister')->name('register');
    Route::post('/doRegister','AuthController@doRegister')->name('front.register');
    Route::get('/front.logout', 'AuthController@logout')->name('front.logout');
    
    Route::prefix('Front')->name('front.')->middleware(['approved','prevent-back-history'])->group(function()
    {
        Route::resource('/projects','ProjectController');
         Route::get('/location/{id}','ProjectController@projectLocation');
        Route::resource('/states','StatesController');
        Route::get('/getAraeProjects/{id}','StatesController@getAraeProjects');
        Route::get('/sProjects/{id}','ProjectController@getProjects');
        Route::get('/showProjects/{id}','ServiceController@showProjects');
        Route::resource('/categories','SectorController');
        Route::resource('/services','ServiceController');
        Route::resource('/news','NewsController');

    }); //end of front routes