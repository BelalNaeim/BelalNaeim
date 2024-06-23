<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ServerController;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\SettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout']);
Route::post('/signup', [AuthController::class, 'sign_up']);

Route::resource('/server', ServerController::class);
Route::resource('/apps', ApplicationController::class);
Route::post('/setting/app_status', [SettingController::class,'app_status'])->name('api.app.status');
Route::get('/setting/get_app_status', [SettingController::class,'get_app_status'])->name('api.get.app.status');

Route::get('apps/{uuid}/download', [ApplicationController::class,'download'])->name('apps.download');




