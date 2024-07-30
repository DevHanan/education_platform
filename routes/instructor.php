<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\AuthController;
use App\Http\Controllers\Instructor\DashboardController as InstructorDashboardController;
use App\Http\Controllers\Instructor\StudentController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\ProfitController;
use App\Http\Controllers\Instructor\QuizController;
use App\Http\Controllers\Instructor\ExamController;



Route::get('login-by-id/{id}', [AuthController::class, 'login'])->name('instructor-login');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localize', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::name('instructor.')->prefix('instructor/')->middleware(['auth:instructors-login'])->group(function () {

            Route::get('dashboard', [InstructorDashboardController::class, 'index'])->name('dashboard.index');
            Route::post('logout', [AuthController::class, 'logout'])->name('instructor-logout');
            Route::get('my-students', [StudentController::class, 'list'])->name('students');
            Route::get('my-courses', [CourseController::class, 'list'])->name('courses');
            Route::get('myprofits', [ProfitController::class, 'myProfit'])->name('myprofits');
            Route::get('request-profit', [ProfitController::class, 'addRequest'])->name('requestProfit');
            Route::post('store-request-profit', [ProfitController::class, 'storeRequest'])->name('storeRequest');
            Route::get('list-request-profit', [ProfitController::class, 'listRequest'])->name('listRequest');
            Route::get('list-paid-request-profit', [ProfitController::class, 'listPaidRequest'])->name('listPaidRequest');

            Route::get('quizzes', [QuizController::class, 'list'])->name('quizzes');
            Route::get('quizz/{id}', [QuizController::class, 'show'])->name('quizz');


            Route::get('studentsexamresults', [ExamController::class, 'listresult'])->name('studentsexamresults');
            Route::get('student-exam/{id}', [ExamController::class, 'studentexam'])->name('studentexam');


            Route::get('profile', [AuthController::class, 'getProfile'])->name('getProfile');
            Route::post('profile', [AuthController::class, 'profile'])->name('instructorProfile');
        });

       
    }
);