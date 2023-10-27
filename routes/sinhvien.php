<?php
    // use Illuminate\Support\Facades\Artisan;
    use Illuminate\Support\Facades\Route;
    // use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\auth\studentController;
use App\Http\Controllers\HomeController;

    Route::get('/dang-nhap', [studentController::class, 'login'])->name('student.login');
    Route::post('/dang-nhap/xu-ly', [studentController::class, 'loginProcess'])->name('student.loginProcess');
    Route::get('/quen-mat-khau', [studentController::class, 'forgotPassword'])->name('student.forgotPassword');
    Route::post('/quen-mat-khau/xu-ly', [studentController::class, 'forgotPasswordProcess'])->name('student.forgotPasswordProcess');
    Route::get('/dang-xuat', [studentController::class, 'logout'])->name('student.logout');

    Route::group(['middleware' => 'checkStudent'], function(){
        
        Route::get('/', [studentController::class, 'home'])->name('student.info.index');
        Route::get('/sua-thong-tin', [studentController::class, 'edit'])->name('student.info.edit');
        Route::post('/sua-thong-tin/xu-ly', [studentController::class, 'editProcess'])->name('student.info.editProcess');
        Route::get('/doi-mat-khau', [studentController::class, 'changePassword'])->name('student.info.changePassword');
        Route::post('/doi-mat-khau/xu-ly', [studentController::class, 'changePasswordProcess'])->name('student.info.changePasswordProcess');
        //
        Route::get('xem-chuong-trinh-hoc', [HomeController::class, 'viewSubject'])->name('student.viewSubject');
        Route::get("/chat-app",  [HomeController::class, 'chat'])->name('student.chat');

        Route::get("/dang-ki-hoc",  [HomeController::class, 'subjectRegister'])->name('student.subjectRegister');
        
        Route::get("/dang-ki-hoc/dang-ki/{id}",  [HomeController::class, 'subjectRegisterProcess'])->name('student.subjectRegisterProcess');
        Route::get("/dang-ki-hoc/huy-dang-ki/{id}",  [HomeController::class, 'subjectRegisterCancel'])->name('student.subjectRegisterCancel');

    });