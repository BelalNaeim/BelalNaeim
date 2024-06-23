<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\SiteController;
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

Route::get('data', [ApiController::class, 'data']);

Route::post('contact', [SiteController::class, 'submitContactUs']);

Route::post('auth/signup', [AuthController::class, 'signup']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/re-verify', [AuthController::class, 'reSendVerification'])->middleware('throttle:5,1');
Route::post('auth/verify', [AuthController::class, 'verify']);
Route::post('auth/forget', [AuthController::class, 'forgetPassword'])->middleware('throttle:5,1');
Route::post('auth/reset', [AuthController::class, 'resetPassword']);

Route::get('playgrounds', [IndexController::class, 'index']);

Route::any('playgrounds/check-time', [ReservationController::class, 'checkAvailableTimings']);

Route::middleware('auth:api')->group(function () {
    Route::get('auth/user', [AuthController::class, 'getUser']);
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::post('auth/update', [AuthController::class, 'updateProfile']);

    Route::post('playgrounds/reserve', [ReservationController::class, 'reserve']);
    Route::post('auth/reservations', [ReservationController::class, 'getReservations']);
    Route::post('auth/reservations/cancel', [ReservationController::class, 'cancelReservation']);
});
