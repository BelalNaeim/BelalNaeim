<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SliderController;
;
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

Route::get('/', [ProjectController::class,'index'])->name('home');

Route::get('/single_product/{id}',[ProjectController::class,'single_product'])->name('single_product');
Route::get('/single_product',function(){
return redirect('/');
});



Route::get('/about',function(){
    return view('about');
})->name('about');

Route::get('/products',[ProjectController::class,'products'])->name('products');
Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::post('/add_to_cart', [CartController::class,'add_to_cart'])->name('add_to_cart');
Route::get('add_to_cart',function(){
return redirect('/');
});
Route::post('/remove_from_cart', [CartController::class,'remove_from_cart'])->name('remove_from_cart');
Route::get('remove_from_cart',function(){
return redirect('/');
});
Route::post('/edit_product_quantity', [CartController::class,'edit_product_quantity'])->name('edit_product_quantity');
Route::get('edit_product_quantity',function(){
return redirect('/');
});

Route::get('/checkout',[CartController::class,'checkout'])->name('checkout')->middleware('auth');

Route::post('/place_order',[CartController::class,'place_order'])->name('place_order');

Route::get('/payment',[PaymentController::class,'index'])->name('PayIndex');
Route::get('callback',[PaymentController::class,'callback'])->name('callback');
Route::get('error',[PaymentController::class,'cancel'])->name('error');

Route::get('PaymentError',[PaymentController::class,'error'])->name('PayError');

Route::get('/category/single/{categoryId}', [ProjectController::class,'category_products']);

Route::post('/process_search', [ProjectController::class,'process_search'])->name('process_search');
Route::get('/process_search',function(){
    return redirect('/');
});

//login Register

Route::get('/login-register',[UsersController::class,'loginRegister'])->name('login-register');
Route::post('/register',[UsersController::class,'registerUser'])->name('register-user');
Route::post('/login', [UsersController::class,'loginUser'])->name('login-user');
//logout user
Route::get('/logout', [UsersController::class,'logout'])->name('logout');

//admin=======
Route::get('admin/home', [AdminController::class,'index']);
Route::get('admin', [LoginController::class,'showLoginForm'])->name('admin.login');
Route::post('admin', [LoginController::class,'login']);
        // Password Reset Routes...
Route::get('admin/password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');
Route::post('admin-password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('admin.password.email');
Route::get('admin/reset/password/{token}', [ResetPasswordController::class,'showResetForm'])->name('admin.password.reset');
Route::post('admin/update/reset', [ResetPasswordController::class,'reset'])->name('admin.reset.update');
Route::get('/admin/Change/Password',[AdminController::class,'ChangePassword'])->name('admin.password.change');
Route::post('/admin/password/update',[AdminController::class,'Update_pass'])->name('admin.password.update');
Route::get('admin/logout', [AdminController::class,'logout'])->name('admin.logout');

// categories
Route::get('admin/categories', [CategoryController::class,'category'])->name('categories');
Route::post('admin/store/category', [CategoryController::class,'storecategory'])->name('store.category');
Route::get('delete/category/{id}', [CategoryController::class,'Deletecategory']);
Route::get('edit/category/{id}', [CategoryController::class,'Editcategory']);
Route::post('update/category/{id}', [CategoryController::class,'Updatecategory']);

//Admin SiteSetting Routes
 Route::get('admin/site/setting', [SettingController::class,'SiteSetting'])->name('admin.site.setting');
 Route::post('admin/sitesetting', [SettingController::class,'UpdateSiteSetting'])->name('update.site.setting');

//Product All Routes
Route::get('admin/product/all', [ProductController::class,'index'])->name('all.product');
Route::get('admin/product/add', [ProductController::class,'create'])->name('add.product');
Route::post('admin/product/store/', [ProductController::class,'store'])->name('store.product');
Route::get('active/product/{id}', [ProductController::class,'active']);
Route::get('inactive/product/{id}', [ProductController::class,'inactive']);
Route::get('delete/product/{id}', [ProductController::class,'DeleteProduct']);
Route::get('view/product/{id}', [ProductController::class,'viewProduct']);
Route::get('edit/product/{id}', [ProductController::class,'EditProduct']);
Route::post('update/product/withoutphoto/{id}', [ProductController::class,'UpdateProductWithoutPhoto']);
Route::post('update/product/photo/{id}', [ProductController::class,'UpdateProductPhoto']);

//slider Route
Route::get('/slider/all', [SliderController::class,'index'])->name('slider.all');
Route::get('/slider/create', [SliderController::class,'create'])->name('slider.create');
Route::post('/slider/store/', [SliderController::class,'store'])->name('store.slider');
Route::get('/slider/edit/{id}', [SliderController::class,'edit'])->name('slider.edit');
Route::post('/slider/update/{id}', [SliderController::class,'update'])->name('update.slider');




