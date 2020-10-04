<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/test', function(){
    \Auth::logout();
});
Route::get('/', 'homeController@get')->name('index');

Route::get('/Login', 'homeController@login')->name('login');
Route::name('login')->post('/Login/{pokemon?}', 'Auth\AuthController@login');
Route::get('/Register', 'homeController@register')->name('register');
Route::name('Register')->post('/Register', 'Auth\AuthController@register');

Route::name('logout')->get('/Logout' , 'Auth\AuthController@logout');

Route::group(['middleware' => ['auth']], function(){
    Route::name('view.pokemon')->get('/get/Pokemon/{pokemon}', 'PokemonController@get');
});
