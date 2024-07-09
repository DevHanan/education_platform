<?php

namespace App\Providers;

use App\Models\AboutSetting;
use App\Models\Setting;
use App\Models\Course;
use App\Models\Country;
use App\Models\CourseType;
use App\Models\Student;
use App\Models\Track;
use App\Models\PaymentType;
use App\Models\Level;
use App\Models\Instructor;
use App\Models\LandingSetting;
use App\Models\Lecture;
use App\Models\Subscription;
use App\Models\Ticket;
use App\Models\Policy;
use App\Models\Question;
use App\Models\Team;
use App\Models\BankGroup;
use App\Models\Faculty;
use App\Models\Review;
use View;


use Illuminate\Support\ServiceProvider;
use PHPUnit\Framework\Constraint\Count;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = Setting::where('status', '1')->first();
        $courses = Course::active()->latest()->get();
        $lectures = Lecture::active()->latest()->get();
        $faculities  = Faculty::active()->get();
        $courseTypes = CourseType::get();
        $countries = Country::active()->get();
        $tracks = Track::active()->get();
        $paymenttypes = PaymentType::where('active','1')->get();
        $externelPayment = PaymentType::where('active','1')->where('type','externel')->first();
        $students = Student::get();
        $levels = Level::get();
        $instructors = Instructor::get();
        $tickets = Ticket::get();
        $teams = Team::active()->get();
        $about = AboutSetting::first();
        $questions = Question::active()->get();
        $most_required = Course::active()->latest()->get();
        $recommened_courses = Course::recommened()->latest()->get();
        $subscriptions = Subscription::all();
        $landingSetting = LandingSetting::first();
        $latest  = Course::whereDate('start_date', '>=', now()->addDays($landingSetting->start_soon_period))->latest()->take(6)->get();
        $bankgroup = BankGroup::active()->latest()->get();
        $reviews = Review::active()->latest()->get();
        



        $policies = Policy::active()->get();

        View::share([
            'faculities' => $faculities,
            'externelPayment' => $externelPayment,
            'bankgroups' => $bankgroup,
            'latest' =>$latest,
            'setting' => $setting, 'courses' => $courses,
            'tracks' => $tracks, 'countries' => $countries,
            'paymenttypes' => $paymenttypes, 'students' => $students,
            'courseTypes' => $courseTypes, 'levels' => $levels, 'instructors' => $instructors,
            'policies' => $policies, 'tickets' => $tickets, 'teams' => $teams,
            'about' => $about ,'questions'=> $questions,'most_required'=>$most_required,
            'recommened_courses'=> $recommened_courses,'subscriptions'=>$subscriptions,
            'landing_setting' => $landingSetting,'lectures'=>$lectures,
            'reviews' => $reviews


        ]);
    }
}
