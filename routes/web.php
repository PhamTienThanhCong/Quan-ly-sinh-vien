<?php

use App\Http\Controllers\auth\adminController;
use App\Http\Controllers\auth\SocialController;
use App\Http\Controllers\auth\studentController;
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

// Route::get('/', function(){
//     return view('auth.login');
// });
// Auth login forgot password
Route::get('/dang-nhap', [studentController::class, 'login'])->name('student.login');
Route::post('/dang-nhap/xu-ly', [studentController::class, 'loginProcess'])->name('student.loginProcess');
Route::get('/quen-mat-khau', [studentController::class, 'forgotPassword'])->name('student.forgotPassword');
Route::post('/quen-mat-khau/xu-ly', [studentController::class, 'forgotPasswordProcess'])->name('student.forgotPasswordProcess');
Route::get('/dang-xuat', [studentController::class, 'logout'])->name('student.logout');

Route::get('quan-tri-vien/dang-nhap', [adminController::class, 'login'])->name('admin.login');
Route::post('quan-tri-vien/dang-nhap/xu-ly', [adminController::class, 'loginProcess'])->name('admin.loginProcess');
Route::get('quan-tri-vien/quen-mat-khau', [adminController::class, 'forgotPassword'])->name('admin.forgotPassword');
Route::post('quan-tri-vien/quen-mat-khau/xu-ly', [adminController::class, 'forgotPasswordProcess'])->name('admin.forgotPasswordProcess');
Route::get('quan-tri-vien/dang-xuat', [adminController::class, 'logout'])->name('admin.logout');

Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirectToProvider'])->name('google.redirect');
Route::get('/callback/{provider}', [SocialController::class, 'handleProviderCallback'])->name('google.callback');

Route::get('quan-tri-vien', [adminController::class, 'home'])->name('admin.home');