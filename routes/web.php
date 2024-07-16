<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ExamController;
Route::get('/file/download/{filename?}', [FileController::class, 'download'])->name('file.download');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localize', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('default');

Route::get('/about-us', [HomeController::class, 'about']);
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::post('courses',[HomeController::class, 'courses'])->name('searchcourses');
Route::get('/blogs', [HomeController::class, 'blogs']);
Route::get('/policies', [HomeController::class, 'policy']);
Route::get('/contactus', [HomeController::class, 'contactus']);
Route::get('/books', [HomeController::class, 'books']);
Route::get('/book', [HomeController::class, 'book']);
Route::get('/blogs', [HomeController::class, 'blogs']);
Route::get('/blog/{id}', [HomeController::class, 'blog']);

Route::get('/masarat', [HomeController::class, 'calcMasarat']);

Route::get('/course/{id}', [HomeController::class, 'course']);
Route::get('/lecture/{id}', [HomeController::class, 'lecture']);


Route::get('/checkcoupon', [HomeController::class, 'checkCoupon']);

Route::get('/signin', [HomeController::class, 'signin']);
Route::get('/signup', [HomeController::class, 'signup']);
Route::get('/cart/{id}', [HomeController::class, 'cart']);
Route::post('/course-comment', [HomeController::class, 'comment']);

Route::get('/signup/step1', [RegisterController::class, 'getsignstep1']);
Route::post('/signup/step1', [RegisterController::class, 'register']);
Route::post('signup/verify-email', [RegisterController::class, 'verifyEmail']);
Route::get('/signup/step2', [RegisterController::class, 'getsignstep2']);
Route::post('/signup/step2', [RegisterController::class, 'signstep2']);

Route::get('/signup/step3', [RegisterController::class, 'getsignstep3']);
Route::post('/signup/step3', [RegisterController::class, 'signstep3']);

Route::get('/signup/verify', [RegisterController::class, 'signVerify']);
Route::get('/signup/complete', [RegisterController::class, 'signcomplete']);

Route::post('/signin', [RegisterController::class, 'signin']);



Route::get('/questions', [HomeController::class, 'questions']);
Route::post('/subscribe', [HomeController::class, 'subscribe']);

Route::post('/contactus', [HomeController::class, 'saveMessage']);
Route::post('/post-maillist', [HomeController::class, 'mailList']);



Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
});

Route::get('/exam/{id}', [ExamController::class, 'getExam']);
Route::get('/exam-level-question/{id}', [ExamController::class, 'getExamLevelQuestion']);
Route::post('/question/{id}', [ExamController::class, 'question']);
Route::get('/question/review/{id}', [ExamController::class, 'questionreviews']);

Route::get('language/{language}', [LangController::class, 'changeLanguage'])->name('language');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });