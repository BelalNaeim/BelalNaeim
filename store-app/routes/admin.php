<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\LanguageController;
use App\http\Controllers\Dashboard\CategoryController;



Route::get('lang/change/{lang}', [LanguageController::class, 'change'])->name('changeLang');


/*web <Routes>*/
Route::get('/index',[IndexController::class , 'index'])->name('admin');

#settings
Route::get('settings',[SettingController::class , 'index'])->name('dashboard.settings.index');
Route::put('setting/update/{setting}',[SettingController::class , 'update'])->name('dashboard.settings.update');

#Categories

Route::resource('categories',CategoryController::class);




