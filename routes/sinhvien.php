<?php
    use Illuminate\Support\Facades\Artisan;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\auth\studentController;


    Route::get('/dang-nhap', [studentController::class, 'login'])->name('student.login');
    Route::post('/dang-nhap/xu-ly', [studentController::class, 'loginProcess'])->name('student.loginProcess');
    Route::get('/quen-mat-khau', [studentController::class, 'forgotPassword'])->name('student.forgotPassword');
    Route::post('/quen-mat-khau/xu-ly', [studentController::class, 'forgotPasswordProcess'])->name('student.forgotPasswordProcess');
    Route::get('/dang-xuat', [studentController::class, 'logout'])->name('student.logout');

    Route::group(['middleware' => 'checkStudent'], function(){
        Route::get('/', [studentController::class, 'home'])->name('student.home');
    });