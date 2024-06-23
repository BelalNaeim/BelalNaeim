<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\SiteSettingsController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Dashboard\GalleryController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\FileController;
use App\Http\Controllers\Dashboard\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|

*/

Route::get( '/change-language/{locale}',     [ LocaleController::class, 'switchLang' ] )->name( 'change.language' );

Route::group(
    [ array( 'prefix' => [ 'translations', 'admin' ] ), 'middleware' =>[ 'auth', 'prevent-back-history' ] ],

    function () {
        Route::get( '/home', [ HomeController::class, 'index' ] )->name( 'home' );
        // Route::resource( 'admins', AdminController::class );
        Route::resource( 'sliders', SliderController::class );
        Route::resource( 'services', ServiceController::class );
        Route::resource( 'galleries', GalleryController::class );
        Route::resource( 'users', UserController::class );
        Route::resource( 'files', FileController::class );
        Route::resource( 'orders', OrderController::class );
        // Profile Routes

        Route::get( '/account/setting', [ ProfileController::class, 'index' ] )->name( 'profile.index' );

        Route::post( '/profile/store', [ ProfileController::class, 'ProfileUpdate' ] )->name( 'profile.update' );

        Route::get( 'settings', [ SiteSettingsController::class, 'index' ] )->name( 'settings.index' );
        Route::put( 'settings/{setting}', [ SiteSettingsController::class, 'update' ] )->name( 'settings.update' );
    }
);

//Login and Logout Routes
Route::get( '/admin', [ AuthController::class, 'showLoginForm' ] )->name( 'admin.showlogin' )->middleware( 'guest' );
;
Route::post( 'admin/login', [ AuthController::class, 'doLogin' ] )->name( 'admin.login' );

Route::get( 'admin/logout', [ AuthController::class, 'logout' ] )->name( 'admin.logout' );

