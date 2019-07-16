<?php
use App\Http\Controllers\postsController;

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

Route::get('/posts', 'postsController@index')->name('posts.index');
Route::get('/posts/new', 'postsController@create')->name('posts.from');
Route::post('/posts', 'postsController@store')->name('posts.store');
Route::get('/posts/{id}', 'postsController@edit')->name('posts.edit');
Route::put('/posts/update/{id}', 'postsController@update')->name('posts.update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
