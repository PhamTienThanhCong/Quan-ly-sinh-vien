<?php

use App\Http\Controllers\auth\adminController;
use App\Http\Controllers\auth\SocialController;
use App\Http\Controllers\ChuyenNganhController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\KhoaControllller;
use App\Http\Controllers\KiHocController;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\UpdateFileController;
use Illuminate\Support\Facades\Artisan;
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

// Auth login forgot password
Route::get('quan-tri-vien/dang-nhap', [adminController::class, 'login'])->name('admin.login');
Route::post('quan-tri-vien/dang-nhap/xu-ly', [adminController::class, 'loginProcess'])->name('admin.loginProcess');
Route::get('quan-tri-vien/quen-mat-khau', [adminController::class, 'forgotPassword'])->name('admin.forgotPassword');
Route::post('quan-tri-vien/quen-mat-khau/xu-ly', [adminController::class, 'forgotPasswordProcess'])->name('admin.forgotPasswordProcess');
Route::get('quan-tri-vien/dang-xuat', [adminController::class, 'logout'])->name('admin.logout');

Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirectToProvider'])->name('google.redirect');
Route::get('/callback/{provider}', [SocialController::class, 'handleProviderCallback'])->name('google.callback');

// Route quản trị viên (admin) using middleware CheckAdmin 
Route::group(['prefix' => 'quan-tri-vien', 'middleware' => ['checkAdmin']], function(){
    Route::get('/', [adminController::class, 'myAccount'])->name('admin.home');
    Route::get('/thong-tin-ca-nhan', [adminController::class, 'myAccount'])->name('admin.profile');

    Route::get('/khoa-khoa/quan-ly-khoa', [KhoaControllller::class, 'index'] )->name('admin.danh_sach_khoa');
    Route::get('/khoa-khoa/quan-ly-khoa/them-khoa', [KhoaControllller::class, 'create'])->name('admin.them_khoa');
    Route::post('/khoa-khoa/quan-ly-khoa/them-khoa/xu-ly', [KhoaControllller::class, 'store'])->name('admin.them_khoa_process');
    Route::get('/khoa-khoa/quan-ly-khoa/sua-khoa/{id}', [KhoaControllller::class, 'edit'])->name('admin.sua_khoa');
    Route::post('/khoa-khoa/quan-ly-khoa/sua-khoa/xu-ly/{ma_khoa}', [KhoaControllller::class, 'update'])->name('admin.sua_khoa_process');

    Route::get('/khoa-khoa/quan-ly-chuyen-nganh', [ChuyenNganhController::class, 'index'])->name('admin.chuyen_nganh');
    Route::get('/khoa-khoa/quan-ly-chuyen-nganh/them-chuyen-nganh', [ChuyenNganhController::class, 'create'])->name('admin.chuyen_nganh.them');
    Route::post('/khoa-khoa/quan-ly-chuyen-nganh/them-chuyen-nganh/xu-ly', [ChuyenNganhController::class, 'store'])->name('admin.chuyen_nganh.them_process');
    Route::get('/khoa-khoa/quan-ly-chuyen-nganh/sua-chuyen-nganh/{id}', [ChuyenNganhController::class, 'edit'])->name('admin.chuyen_nganh.sua');
    Route::post('/khoa-khoa/quan-ly-chuyen-nganh/sua-chuyen-nganh/xu-ly/{ma_chuyen_nganh}', [ChuyenNganhController::class, 'update'])->name('admin.chuyen_nganh.sua_process');

    // giang vien
    Route::get('/quan-ly-giang-vien', [GiangVienController::class, 'index'])->name('admin.giang_vien.index');
    Route::get('/quan-ly-giang-vien/them-giang-vien', [GiangVienController::class, 'create'])->name('admin.giang_vien.create');
    Route::post('/quan-ly-giang-vien/them-giang-vien/xu-ly', [GiangVienController::class, 'store'])->name('admin.giang_vien.store');
    Route::get('/quan-ly-giang-vien/chi-tiet-giang-vien/{id}', [GiangVienController::class, 'show'])->name('admin.giang_vien.show');
    Route::get('/quan-ly-giang-vien/sua-giang-vien/{id}', [GiangVienController::class, 'edit'])->name('admin.giang_vien.edit');
    Route::post('/quan-ly-giang-vien/sua-giang-vien/xu-ly/{id}', [GiangVienController::class, 'update'])->name('admin.giang_vien.update');
    Route::get('/quan-ly-giang-vien/xoa-giang-vien/{id}', [GiangVienController::class, 'destroy'])->name('admin.giang_vien.destroy');

    // sinh vien
    Route::get('/quan-ly-sinh-vien/khoa-moi', [SinhVienController::class, 'index1'])->name('admin.sinh_vien.khoa_moi'); 
    Route::get('/quan-ly-sinh-vien/sinh-vien', [SinhVienController::class, 'index'])->name('admin.sinh_vien.khoa'); 
    Route::get('/quan-ly-sinh-vien/them-sinh-vien', [SinhVienController::class, 'create'])->name('admin.sinh_vien.create');
    Route::post('/quan-ly-sinh-vien/them-sinh-vien/xu-ly', [SinhVienController::class, 'store'])->name('admin.sinh_vien.store');
    Route::get('/quan-ly-sinh-vien/chi-tiet-sinh-vien/{id}', [SinhVienController::class, 'show'])->name('admin.sinh_vien.show');
    
    // import csv
    Route::post('/quan-ly-sinh-vien/import-csv', [SinhVienController::class, 'importCSV'])->name('admin.sinh_vien.import_csv');


    // Quản lý môn học
    Route::get('/quan-ly-mon-hoc/danh-sach-mon-hoc', [MonHocController::class, 'index'])->name('admin.mon_hoc.index');
    Route::get('/quan-ly-mon-hoc/them-mon-hoc', [MonHocController::class, 'create'])->name('admin.mon_hoc.create');
    Route::post('/quan-ly-mon-hoc/them-mon-hoc/xu-ly', [MonHocController::class, 'store'])->name('admin.mon_hoc.store');
    Route::get('/quan-ly-mon-hoc/sua-mon-hoc/{id}', [MonHocController::class, 'edit'])->name('admin.mon_hoc.edit');
    Route::post('/quan-ly-mon-hoc/sua-mon-hoc/xu-ly/{id}', [MonHocController::class, 'update'])->name('admin.mon_hoc.update');
    Route::get('/quan-ly-mon-hoc/xoa-mon-hoc/{id}', [MonHocController::class, 'destroy'])->name('admin.mon_hoc.destroy');
    
    // quản lý kì học
    Route::get('/quan-ly-ki-hoc/tong-quan', [KiHocController::class, 'index'])->name('admin.ki_hoc.index');
    Route::get('/quan-ly-ki-hoc/them-ki-hoc', [KiHocController::class, 'create'])->name('admin.ki_hoc.create');
    Route::post('/quan-ly-ki-hoc/them-lop-hoc-tu-dong/{id}', [KiHocController::class, 'add_class'])->name('admin.ki_hoc.add_class');
    // Route::get('/quan-ly-ki-hoc/quan-ly-lop-dang-ki', [KiHocController::class, 'view_class'])->name('admin.ki_hoc.view_class');
    Route::get('/quan-ly-ki-hoc/quan-ly-lop/{id}', [KiHocController::class, 'view_class'])->name('admin.ki_hoc.view_class.detail');

    Route::get("/chat-app",  [KiHocController::class, 'chat'])->name('admin.chat');

    // update file
    Route::get('/file/update/{table}', [UpdateFileController::class, 'index'])->name('admin.upload.index');
    Route::post('/file/update/{table}', [UpdateFileController::class, 'upload'])->name('admin.upload.update');
    
    
});

// route clear cache, config, route, view
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('config:cache');

});