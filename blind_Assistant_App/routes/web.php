<?php

use App\Http\Controllers\Dashboard\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\MoneyController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
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
Route::resource('monies', MoneyController::class)
        ->missing(function (Request $request) {
            return Redirect::route('monies.index');
     });
     Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::get('/setting', [SettingController::class,'setting_view'])->name('setting');
Route::post('/change/password', [SettingController::class, 'ChangePassword'])->name('change.password');
Route::post('/upload/welcome_voice', [SettingController::class,'upload_welcomeVoice'])->name('upload.welcomeVoice');
Route::post('/upload/start_voice', [SettingController::class,'upload_startVoice'])->name('upload.startVoice');
Route::post('/upload/success_voice', [SettingController::class,'upload_successVoice'])->name('upload.successVoice');
Route::post('/upload/problem_voice', [SettingController::class,'upload_problemVoice'])->name('upload.problemVoice');
});