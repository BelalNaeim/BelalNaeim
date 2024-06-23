<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ServerController;
use App\Http\Controllers\Dashboard\ApplicationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->middleware(['auth','prevent-back-history'])->group( function () {
        Route::get('/', function () {
                return view('dashboard.index');
        })->name('dashboard');
        Route::resource('/servers', ServerController::class);
        Route::resource('/applications', ApplicationController::class);
        Route::get('/setting', [SettingController::class,'setting_view'])->name('setting');
        Route::post('/setting/app_status', [SettingController::class,'app_status'])->name('app.status');
        Route::get('/logout', [SettingController::class,'signOut'])->name('admin.logout');
        Route::post('/change/password', [SettingController::class, 'ChangePassword'])->name('change.password');

        });




require __DIR__.'/auth.php';




