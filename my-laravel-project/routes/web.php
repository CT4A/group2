<?php

use App\Http\Controllers\employeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GetListStaffController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\keepbottleController;

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
// Route::post('/customer-register','customer');

Route::get('/header', function () {
    return view('header');
});
// 登録
Route::get('/shift-register', function () {
    return view('shift-register');
});
Route::post('/registerSchedule', [registerController::class,'register']);

// 出勤退勤
Route::get('/syukkin', function () {
    return view('syukkin');
});

// // 一覧表示。
Route::get('/itiran', function () {
    return view('itiran');
});

//社員一覧
Route::get('/list-staff' ,[EmployeeController::class,'index']);
Route::post('/getInfoStaff/{id}', [EmployeeController::class,'GetListStaff']);

//社員登録
Route::get('/emp-register', function () {
    return view('emp-register');
});
Route::post('/emp-register',[ EmployeeController::class,'register']);

// 顧客一覧
Route::get('/list-customer' ,[CustomerController::class,'index']);
Route::post('/getInfoCustomer/{id}', [CustomerController::class,'GetListCustomer']);
Route::post('/customer-register', [CustomerController::class,'register']);

//出勤退勤履歴
Route::get('/history', function () {
    return view('history');
});

//キープボトル一覧
Route::get('/keepbottle-list', function () {
    return view('keepbottle-list');
});
Route::get('/keepbottle-register', function () {
    return view('keepbottle-register');
});
Route::get('/keepbottle-list', [keepbottleController::class,'index']);

//予約
Route::get('/reserve-register', function () {
    return view('reserve-register');
});

// 給料明細
Route::get('/pay-statement', function () {
    return view('pay-statement');
});