<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/newemployee', function () {
    return view('newemployee');
});
Route::post('/login','AuthController@login')->name('login');

Route::get('/customer-register', function () {
    return view('customer-register');
});
Route::get('/header', function () {
    return view('header');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/syukkin', function () {
    return view('syukkin');
});
Route::get('/itiran', function () {
    return view('itiran');
});
