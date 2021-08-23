<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\CuaHangController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\QuanTriVienController;
use App\Http\Controllers\ThanhVienController;
use Illuminate\Support\Facades\Auth;
use Rescources\Views;


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
Route::match(['get', 'post'], '/test1', [SanPhamController::class, 'test1']);

Route::get('/', [SanPhamController::class, 'welcome']);
Route::get('/trang-chu', [SanPhamController::class, 'home']);
Route::get('/aboutme', [SanPhamController::class, 'aboutme']);

Route::prefix('user')->group(function () {
    Route::get('/dang-ky-user', [AuthController::class, 'DangKyUser']);
    Route::post('/dang-ky-user',[AuthController::class,'DangKyUserStore']);
    Route::get('/dang-nhap', [AuthController::class, 'DangNhap']);
    Route::post('/dang-nhap', [AuthController::class, 'XacNhanDangNhap']);
    Route::get('/dang-xuat', [AuthController::class, 'DangXuat']);
});

Route::prefix('thanh-vien')->group(function () {
    Route::match(['get', 'post'], '/dang-ky', [ThanhVienController::class, 'dangkythanhvien']);
    Route::match(['get', 'post'], '/cap-nhat-ho-so/{id}', [ThanhVienController::class, 'capnhathosothanhvien']);
    Route::get('/ho-so', [ThanhVienController::class, 'xemhoso']);
    Route::get('/ho-so/xem_don-hang/{id}', [ThanhVienController::class, 'xemdonhang']);
    Route::get('/dang-nhap', [ThanhVienController::class, 'dangnhap']);
    Route::post('/dang-nhap', [ThanhVienController::class, 'xacnhandangnhap']);
    Route::get('/dang-xuat', [ThanhVienController::class, 'dangxuat']);
});


Route::prefix('san-pham')->group(function () {
    Route::get('/danh-sach', [SanPhamController::class, 'index']);
    Route::get('/tim-kiem', [SanPhamController::class, 'search']);
    Route::get('/danh-sach/{id}', [SanPhamController::class, 'show']);
   
});



Route::prefix('loai-san-pham')->group(function () {
    Route::get('/danh-sach', [LoaiSanPhamController::class, 'index']);
    Route::get('/danh-sach/{id}', [LoaiSanPhamController::class, 'show'])->where('id', '[0-9]+');
});

Route::prefix('tin-tuc')->group(function () {
    Route::get('/', [TinTucController::class, 'index']);
    Route::get('/them-tin-tuc', [TinTucController::class, 'create']);
    Route::post('/them-tin-tuc', [TinTucController::class, 'store']);
    Route::get('/{id}', [TinTucController::class, 'show'])->where('id', '[0-9]+');
});

Route::prefix('lien-he')->group(function () {
    Route::get('/', [LienHeController::class, 'create']);
    Route::post('/', [LienHeController::class, 'store']);
});

Route::prefix('khach-hang')->group(function () {
    Route::get('/gio-hang', [KhachHangController::class, 'XemGioHang']);
    Route::post('/them-vao-gio-hang/{id}', [KhachHangController::class, 'ThemGioHang']);
    Route::post('/cap-nhat-gio-hang', [KhachHangController::class, 'CapNhatGioHang']);
    Route::delete('/xoa-mat-hang/{id}', [KhachHangController::class, 'XoaMatHang']);
    Route::get('/tien-hanh-dat-hang', [KhachHangController::class, 'TienHanhDatHang']);
    Route::post('/tien-hanh-dat-hang', [KhachHangController::class, 'storeTienHanhDatHang']);
    Route::get('/don-dat-hang/{id}', [KhachHangController::class, 'DonDatHang']); 
    Route::post('/nhap-ma-giam-gia', [KhachHangController::class, 'NhapCoupon']); 
    Route::get('/xoa-ma-giam-gia', [KhachHangController::class, 'XoaCoupon']); 
});


Route::group(['prefix'=>'admin','middleware'=>'adminlogin'], function() {

    Route::get('/', [QuanTriVienController::class, 'index']);
    
    Route::get('/dashboard/danh-sach', [QuanTriVienController::class, 'dashboard']);

    Route::get('/san-pham/danh-sach', [QuanTriVienController::class, 'viewproduct']);
    Route::get('/san-pham/danh-sach/them-san-pham', [QuanTriVienController::class, 'createproduct']);
    Route::post('/san-pham/danh-sach/them-san-pham', [QuanTriVienController::class, 'storeproduct']);
    Route::get('/san-pham/danh-sach/cap-nhat/{id}', [QuanTriVienController::class, 'editproduct']);
    Route::put('/san-pham/danh-sach/cap-nhat/{id}', [QuanTriVienController::class, 'updateproduct']);
    Route::get('/san-pham/xoa/{id}', [QuanTriVienController::class, 'destroyproduct']);

    Route::get('/loai-san-pham/danh-sach', [QuanTriVienController::class, 'viewcategory']);
    Route::get('/loai-san-pham/danh-sach/them-loai-san-pham', [QuanTriVienController::class, 'createcategory']);
    Route::post('/loai-san-pham/danh-sach/them-loai-san-pham', [QuanTriVienController::class, 'storecategory']);
    Route::get('/loai-san-pham/danh-sach/cap-nhat/{id}', [QuanTriVienController::class, 'editcategory']);
    Route::put('/loai-san-pham/danh-sach/cap-nhat/{id}', [QuanTriVienController::class, 'updatecategory']);
    Route::get('/loai-san-pham/xoa/{id}', [QuanTriVienController::class, 'destroycategory']);

    Route::get('/slider/danh-sach', [QuanTriVienController::class, 'viewslider']);
    Route::get('/slider/danh-sach/them-slider', [QuanTriVienController::class, 'createslider']);
    Route::post('/slider/danh-sach/them-slider', [QuanTriVienController::class, 'storeslider']);
    Route::get('/slider/danh-sach/cap-nhat/{id}', [QuanTriVienController::class, 'editslider']);
    Route::put('/slider/danh-sach/cap-nhat/{id}', [QuanTriVienController::class, 'updateslider']);
    Route::get('/slider/xoa/{id}', [QuanTriVienController::class, 'destroyslider']);

    
    Route::get('/tin-tuc/danh-sach', [QuanTriVienController::class, 'viewnews']);
    Route::get('/tin-tuc/danh-sach/them-tin-tuc', [QuanTriVienController::class, 'createnews']);
    Route::post('/tin-tuc/danh-sach/them-tin-tuc', [QuanTriVienController::class, 'storenews']);
    Route::get('/tin-tuc/danh-sach/cap-nhat/{id}', [QuanTriVienController::class, 'editnews']);
    Route::put('/tin-tuc/danh-sach/cap-nhat/{id}', [QuanTriVienController::class, 'updatenews']);
    Route::get('/tin-tuc/xoa/{id}', [QuanTriVienController::class, 'destroynews']);

    Route::get('/report/danh-sach', [QuanTriVienController::class, 'report']);

    Route::get('/order/danh-sach', [QuanTriVienController::class, 'vieworder']);
    Route::get('/order/danh-sach/xem-chi-tiet/{id}', [QuanTriVienController::class, 'vieworderdetail']);
    Route::get('/order/danh-sach/cap-nhat/{id}', [QuanTriVienController::class, 'editorder']);
    Route::put('/order/danh-sach/cap-nhat/{id}', [QuanTriVienController::class, 'updateorder']);

    Route::get('/stock/danh-sach', [QuanTriVienController::class, 'viewstock']);
    Route::match(['get', 'post'],'/stock/danh-sach/nhap-kho', [QuanTriVienController::class, 'createreceipt']);
   

    Route::get('/coupons/danh-sach', [QuanTriVienController::class, 'viewcoupon']);
    Route::match(['get', 'post'], '/coupons/them-ma-giam-gia', [QuanTriVienController::class, 'addcoupon']);
    Route::match(['get', 'post'], '/coupons/danh-sach/cap-nhat/{id}', [QuanTriVienController::class, 'editcoupon']);
    Route::get('/coupons/xoa/{id}', [QuanTriVienController::class, 'destroycoupon']);

    Route::get('/member/danh-sach', [QuanTriVienController::class, 'viewmenber']);
    Route::get('/member/danh-sach/xem-chi-tiet/{id}', [QuanTriVienController::class, 'viewmenberdetail']);

    Route::get('/mess/danh-sach', [QuanTriVienController::class, 'viewmessenger']);
    Route::match(['get', 'post'],'/mess/danh-sach/tra-loi/{id}', [QuanTriVienController::class, 'sendmessenger']);
    Route::get('/log/danh-sach', [QuanTriVienController::class, 'viewlog']);
    
   


});

