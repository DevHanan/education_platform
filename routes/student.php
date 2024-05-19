<?php

use App\Http\Controllers\Student\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController ;
Route::get('student-login-by-id/{id}', [AuthController::class, 'login'])->name('student-login');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localize', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
      

        Route::name('student.')->prefix('student/')->middleware(['auth:students-login'])->group(function () {
            Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('dashboard.index');
            Route::post('logout', [AuthController::class, 'logout'])->name('student-logout');

        });
    }
);