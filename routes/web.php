<?php

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
use App\Notifications\BlogEdited;
use App\Events\BlogCreated;
use App\Project;



route::resource('Account','AccountController');

Route::get('/', 'PagesController@home');
Route::get('/index', 'ImageUController@index');

Route::get('/time', 'TimeLineController@time');
Route::get('/map', 'MappingController@Map');
route::delete('/images/{$folders}', 'ImageUController@destroy');
Auth::routes();


Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@postLogin');
Route::get('login/token/{token}', 'AuthController@authenticate' );

route::resource('/image','ImageUController');






