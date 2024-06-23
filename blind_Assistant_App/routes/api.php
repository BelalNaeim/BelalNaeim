<?php

use App\Http\Controllers\Api\MoneyController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/getAllMonies', [MoneyController::class,'getAllMonies']);

Route::get('/getMoneyById/{id}', [MoneyController::class,'getMoneyById']);

Route::get('/getWelcomeVoice', [SettingController::class,'getWelcomeVoice']);
Route::get('/getStartVoice', [SettingController::class,'getStartVoice']);
Route::get('/getSuccessVoice', [SettingController::class,'getSuccessVoice']);
Route::get('/getProblemVoice', [SettingController::class,'getProblemVoice']);

Route::get('moniesVoice/{id}/download', [MoneyController::class,'download'])->name('moneyVoice.download');
Route::get('welcomeVoice/download', [SettingController::class,'downloadWelcomeVoice'])->name('welcomeVoice.download');
Route::get('startVoice/download', [SettingController::class,'downloadStartVoice'])->name('startVoice.download');
Route::get('successVoice/download', [SettingController::class,'downloadSuccessVoice'])->name('successVoice.download');
Route::get('problemVoice/download', [SettingController::class,'downloadProblemVoice'])->name('problemVoice.download');
