<?php

use App\Http\Controllers\GetListStaffController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\testController;
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

Route::get('/test',[testController::class,'index']);

Route::get('/home', [homeController::class,'index']);

Route::get('/newemployee', function () {
    return view('newemployee');
});
//ログイン処理する
Route::post('/login','AuthController@login')->name('login');

Route::get('/login',function(){
    return view('login');
});
// 顧客を登録する
Route::get('/customer-register', function () {
    return view('customer-register');
});

Route::get('/header', function () {
    return view('header');
});
// 登録
Route::get('/register', function () {
    return view('register');
});
// 出勤退勤
Route::get('/syukkin', function () {
    return view('syukkin');
});
// // 一覧表示。
// Route::get('/itiran', function () {
//     return view('itiran');
// });

Route::get('/itiran' ,[GetListStaffController::class,'index']);
Route::post('/getInfoStaff/{id}', [GetListStaffController::class,'GetListStaff']);
