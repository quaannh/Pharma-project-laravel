<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APISanPhamController;
use App\Http\Controllers\APILoaiSanPhamController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('san-pham',[APISanPhamController::class,'index']);
Route::get('san-pham/{id}',[APISanPhamController::class,'show']);
Route::post('san-pham',[APISanPhamController::class,'store']);
Route::put('san-pham/{id}',[APISanPhamController::class,'update']);
Route::delete('san-pham/{id}',[APISanPhamController::class,'destroy']);

Route::get('loai-san-pham',[APILoaiSanPhamController::class,'index']);
Route::get('loai-san-pham/{id}',[APILoaiSanPhamController::class,'show']);
Route::post('loai-san-pham',[APILoaiSanPhamController::class,'store']);
Route::put('loai-san-pham/{id}',[APILoaiSanPhamController::class,'update']);
Route::delete('loai-san-pham/{id}',[APILoaiSanPhamController::class,'destroy']);

