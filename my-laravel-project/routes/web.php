<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\bottleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\keepbottleController;
use App\Http\Controllers\resrveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\shiftController;
use App\Http\Controllers\syukkinController;
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
Route::get('test', function () {
    return view('test');
})->middleware('auth');

//login
Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'login']);

//check login
Route::middleware(['auth'])->group(function () {
    //logout
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
    // 顧客一覧
    Route::get('list-customer' ,[CustomerController::class,'index'])->name('list-customer');
    Route::post('/getInfoCustomer/{id}', [CustomerController::class,'GetListCustomer']);
    Route::post('/customer-register', [CustomerController::class,'register']);
    // 顧客を登録する
    Route::get('/customer-register', [CustomerController::class,'indexRegister'])->name('indexCusRegister');
    //社員一覧
    Route::get('list-staff' ,[EmployeeController::class,'index'])->name('list-staff');
    Route::post('/getInfoStaff/{id}', [EmployeeController::class,'GetListStaff']);
    // 登録
    Route::get('/shift-register', [shiftController::class,'index'])->name('indexShiftRegister');
    Route::post('/shift-register', [shiftController::class,'register']);
    Route::post('/registerSchedule', [registerController::class,'register']);
    // 出勤退勤
    Route::get('/syukkin', [syukkinController::class,'index']);
    Route::post('/syukkin/start', [syukkinController::class,'attend']);
    Route::post('/syukkin/end', [syukkinController::class,'leave']);
    //出勤用社員一覧
    Route::get('/list-attend', function () {
        return view('list-attend');
    });
    //社員登録
    Route::get('emp-register', function () {
        return view('emp-register');
    })->name('indexEmpRegister');
    Route::post('/emp-register',[ EmployeeController::class,'register']);
    //出勤退勤履歴
    Route::get('/history', [employeeController::class,'indexHistory'])->name('history');
    //キープボトル一覧
    Route::get('/keepbottle-list', function () {
        return view('keepbottle-list');
    })->name('keepbottle-list');
    //キープボトル登録
    Route::get('/keepbottle-register', [keepbottleController::class,'indexRegister'])->name('indexKeepRegister');
    Route::post('/keepbottle-register', [keepbottleController::class,'RegisterLiquorLink']);
    Route::get('/keepbottle-list', [keepbottleController::class,'indexList'])->name('keepbottle-list');
    Route::post('/getLiquorType/{liquor_name}', [keepbottleController::class,'GetLiquorType']);
    // ボトル登録
    Route::get('/bottle-register', [bottleController::class,'index'])->name('indexRegister');
    Route::post('/bottle-register', [bottleController::class,'RegisterBottle']);
    // ボトル一覧
    Route::get('/list-bottle',function () {
        return view('list-bottle');
    });
    Route::post('/list-bottle', [bottleController::class,'RegisterBottle']);
    //予約
    Route::get ('/reserve-register',  [resrveController::class,'index'])->name('indexResRegister');
    Route::post('/reserve-register',  [resrveController::class,'register']);
    // 給料明細
    Route::get('/pay-statement', [EmployeeController::class,'indexPay']);
    Route::post('/getPayStaff/{id}', [EmployeeController::class,'personPay']);
    
    // パスワード変更
    Route::get('/pass-change', function () {
        return view('pass-change');
    });
    //お知らせ追加画面
    Route::get('/news', [newsController::class,'index']);
    Route::post('/news', [newsController::class,'register']);
    // お知らせ登録
    Route::get('/news-register', function () {
        return view('news-register');
    })->name('indexNewsRegister');
    
    // 伝票登録
    Route::get('/bill-register', [BillController::class,'index'])->name('indexBillRegister');
    Route::post('/bill-register', [BillController::class,'register']);
    // 伝票一覧
    Route::get('list-bill', function () {
        return view('list-bill');
    })->name('list-bill');
    //カレンダー仕事
    Route::get('full-calendar',[FullCalendarController::class,'index']);
    Route::get('get_events', [FullCalendarController::class, 'getEvents']);
});
