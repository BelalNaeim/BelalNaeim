<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\ExerciseController;
use App\Http\Controllers\Dashboard\FoodSystemController;
use App\Http\Controllers\Dashboard\TrainerController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [AuthController::class,'showLogin'])->name('login');
Route::post('/doLogin',[AuthController::class,'customLogin'])->name('dologin');
Route::prefix('dashboard')->middleware(['auth','prevent-back-history'])->group( function () {
Route::get('/',function(){
    return view('dashboard.index');
})->name('home');
    Route::get('/setting', [SettingController::class,'setting_view'])->name('setting');
    Route::post('websetting/update', [SettingController::class,'updateSetting'])->name('update.websetting');
     Route::get('/logout', [AuthController::class,'logout'])->name('logout');
     Route::resource('/exercieses', ExerciseController::class);
     Route::resource('/foodSystems', FoodSystemController::class);
     Route::resource('/users', UserController::class);
     Route::resource('/trainers', TrainerController::class);

});
