<?php
use App\Http\Controllers\PageController;

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

Route::get ('/', 'PageController@home');
Route::get ('/dashboard', 'PageController@dashboard');
Route::get ('/posts/{post}', 'PostsController@show');
Route::post('/posts/create', 'PostsController@create')->middleware('auth');
Route::get ('/users/{username}', 'UsersController@show')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
