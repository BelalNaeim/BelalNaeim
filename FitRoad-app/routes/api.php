<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExerciseController;
use App\Http\Controllers\Api\FoodSystemController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TrainerController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the 'api' middleware group. Enjoy building your API!
|
*/

Route::post( '/auth/register', [ AuthController::class, 'sign_up' ] );

Route::post( '/auth/login', [ AuthController::class, 'login' ] );

Route::get( '/exercises', [ ExerciseController::class, 'index' ] );

Route::get( '/exercises/{id}', [ ExerciseController::class, 'show' ] );

Route::get( 'exercises/video/{id}/download', [ ExerciseController::class, 'download' ] )->name( 'EcxerciseVideo.download' );

Route::get( '/foodsystems', [ FoodSystemController::class, 'index' ] );

Route::get( '/foodsystems/{id}', [ FoodSystemController::class, 'show' ] );

Route::get( '/trainers', [ TrainerController::class, 'index' ] );

Route::get( '/trainers/{id}', [ TrainerController::class, 'show' ] );

Route::get( '/settings', [ SettingController::class, 'Setting' ] );

Route::apiResource( 'user', UserController::class );

