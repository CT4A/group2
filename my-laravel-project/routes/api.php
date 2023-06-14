<?php

use App\Http\Controllers\keepbottleController;
use App\Http\Controllers\syukkinController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//出勤退勤登録
Route::post('/syukkin/start',   [syukkinController::class,'attend']);
Route::post('/syukkin/end',     [syukkinController::class,'leave']);


