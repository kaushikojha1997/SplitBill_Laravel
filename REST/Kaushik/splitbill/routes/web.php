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
use Illuminate\Http\Request;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/v1/register/signup','SignUpController@register');

Route::post('/v1/auth/login','LoginController@login')->middleware('auth.basic.once');


Route::post('/v1/bill/add','BillController@add')->middleware('auth.basic.once');
Route::put('/v1/bill/update/{id}','BillController@update')->middleware('auth.basic.once');
Route::delete('/v1/bill/delete/{id}','BillController@destroy')->middleware('auth.basic.once');
Route::get('/v1/bill/find/{id}','BillController@show')->middleware('auth.basic.once');

