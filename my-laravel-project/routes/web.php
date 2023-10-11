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
use App\Http\Controllers\EditorCustomer;
use App\Http\Controllers\testController;
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
Route::get('test',[testController::class,'index']);

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
    //顧客編集
    Route::get('customer-editor' ,[CustomerController::class,'indexCusEditor']);
    Route::post('customer-editor' ,[CustomerController::class,'editor']);
    
    // 顧客を登録する
    Route::get('/customer-register', [CustomerController::class,'indexRegister'])->name('indexCusRegister');
    //社員一覧
    Route::get('list-staff' ,[EmployeeController::class,'index'])->name('list-staff');
<<<<<<< HEAD
    Route::post('/getInfoStaff/{id}', [EmployeeController::class,'GetListStaff']);
    Route::get('/emp-editor' ,[EmployeeController::class,'indexEmpEditor']);
    Route::post('/emp-editor' ,[EmployeeController::class,'editor']);
    
=======
    // Route::get('/getInfoStaff/{id}', [EmployeeController::class,'GetListStaff']);
    Route::post('/getInfoStaff/{id}',[EmployeeController::class,'GetListStaff']);
>>>>>>> 7eaaae2e491d6968acf70e02438885b1d5b0d15d
    //社員プロフィール
    Route::get('staffProfile' ,[EmployeeController::class,'indexstaffProfile'])->name('staffProfile');
    // Route::post('/getInfoStaff/{id}', [EmployeeController::class,'GetListStaff']);
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
<<<<<<< HEAD
    Route::post('/emp-register',[ EmployeeController::class,'changePass']);
=======
    //社員編集
    Route::get("emp-editor",function(){
        return view("emp-editor");
    })->name("indxEmpEditor");
    Route::post('/emp-register',[ EmployeeController::class,'register']);
>>>>>>> 7eaaae2e491d6968acf70e02438885b1d5b0d15d
    //出勤退勤履歴
    Route::get('/history', [employeeController::class,'indexHistory'])->name('history');
    Route::post('/history',[employeeController::class,'graphHistory']);

    //キープボトル
    Route::get('/keepbottle-register', [keepbottleController::class,'indexRegister'])->name('indexKeepRegister');
    Route::post('/keepbottle-register', [keepbottleController::class,'RegisterLiquorLink']);
    Route::get('/keepbottle-list', [keepbottleController::class,'indexList'])->name('keepbottle-list');
    Route::post('/getLiquorType/{liquor_name}', [keepbottleController::class,'GetLiquorType']);
    Route::post('/getInfoKeepBottle', [keepbottleController::class,'GetInfoKeepBottle']);
    Route::get('/keepBottleEditor', [keepbottleController::class,'indexEditor']);
    
    
    // ボトル登録
    Route::get('/bottle-register', [bottleController::class,'index'])->name('indexRegister');
    Route::post('/bottle-register', [bottleController::class,'RegisterBottle']);
<<<<<<< HEAD
    
        // Route::post('/editor', [bottleController::class,'RegisterBottle']);
    // ボトル一覧
    Route::get('/list-bottle', function () {
        return view('bottle-list');
    })->name('list-bottle'); 
    // Route::post('/list-bottle', [bottleController::class,'RegisterBottle']);
=======
    // キープボトル編集
    Route::get("keepbottle-editor",[keepbottleController::class,"indexRegister"])->name("IndexKeepBottleEditor");
    Route::get('/KeepBottle-editor',function(){
        return view('KeepBottle-editor');
    });

        // Route::post('/editor', [bottleController::class,'RegisterBottle']);
    // ボトル一覧
    Route::get('/list-bottle', [bottleController::class,'indexList'])->name('list-bottle');
    Route::post('list-bottle',[bottleController::class,'indexList']) ;
    Route::post('/GetInfoBottle/{id}', [bottleController::class,'GetInfoBottle']);
    //ボトル編集
    Route::get("bottle-editor",[bottleController::class,"indexList"])->name('IndexBottleEditor');
    Route::get("bottle-editor",function(){
        return view("bottle-editor");
    })->name("IndexBottleEditor");
>>>>>>> 7eaaae2e491d6968acf70e02438885b1d5b0d15d
    //予約
    Route::get ('/reserve-register',  [resrveController::class,'index'])->name('indexResRegister');
    Route::post('/reserve-register',  [resrveController::class,'register']);
    // 給料明細
    // Route::get('/pay-statement', [EmployeeController::class,'indexPay'])->name('payStatement');
    Route::get('/pay-statement', function(){
        return view('pay-statement');
    })->name('payStatement');
    Route::post('/pay-statement', [EmployeeController::class,'personPay']);
    // Route::get('/pay-statement', [EmployeeController::class,'indexPay']);
    // Route::post('/getPayStaff/{id}', [EmployeeController::class,'personPay']);
    // パスワード変更
    Route::get('/pass-change', function () {
        return view('pass-change');
    })->name('passChange');
    Route::post("/passChange",[EmployeeController::class,'changePass']);
    //お知らせ追加画面
    Route::get('/news', [newsController::class,'index'])->name("news");
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
    Route::get('/full-calendar',[FullCalendarController::class,'index']);
    Route::get('get_events', [FullCalendarController::class, 'getEvents']);
});
