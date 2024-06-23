<?php

use Illuminate\Support\Facades\Route;
use App\category;
use App\books;
use App\author;
use App\User;
use App\publisher;
use App\Http\Middleware\Authenticate;
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
    return view('homee');
});
Route::get('/login', 'BooksController@register');
Route::get('/home', 'BooksController@index')->name('home');
Route::get('/homee', 'BooksController@create')->name('homee');
Route::get('/section', 'categoryController@sec')->name('section');
Route::get('/section1', 'categoryController@sec1')->name('section1');
Route::get('/section2', 'categoryController@sec2')->name('section2');
Route::get('/section3', 'categoryController@sec3')->name('section3');
Route::get('/section4', 'categoryController@sec4')->name('section4');
Route::get('/books', 'BooksController@book')->name('books');
Route::get('/uploadpage', 'BooksController@uploadpage');
Route::post('/uploadbook', 'BooksController@store');
Route::get('/books', 'BooksController@show');
Route::get('/download/{file}', 'BooksController@download');
Route::get('/view/{id}', 'BooksController@view');
Route::get(
    '/books/{id}/category',
    function ($id) {
        $posts = category::find($id)->books;
        return $posts;
    }
);
Route::get(
    '/books/{id}/publisher',
    function ($id) {
        $posts = publisher::find($id)->books;
        return $posts;
    }
);
Route::get(
    '/find/{id}/author',
    function ($id) {
        $pro = books::find($id)->authors;
        return $pro;
    }
);
Route::get(
    '/find/{id}/books',
    function ($id) {
        $pro = author::find($id)->books;
        return $pro;
    }
);
Route::get(
    '/find/{id}/user',
    function ($id) {
        $lol = books::find($id)->users;
        return $lol;
    }
);
Route::get(
    '/find/{id}/userr',
    function ($id) {
        $lol = User::find($id)->books;
        return $lol;
    }
);
//Route::redirect('/', '/kolia/public/index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
