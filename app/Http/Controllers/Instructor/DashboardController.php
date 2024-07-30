<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Auth;
use Carbon\Carbon;
use DB;
class DashboardController extends Controller
{
   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      // Module Data
      $this->title = 'الإحصائيات';
      $this->route = 'instructor.dashboard';
      $this->view = 'instructor';
   }

   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
     
     $data['title'] = $this->title;
      $data['route'] = $this->route;
      $data['view'] = $this->view;

      $login_id = auth()->guard('instructors-login')->user()->id;
      $coursesIDS = Course::whereHas('instructors', function ($query)use($login_id) {
         $query->where('instructor_id', $login_id);
     })->pluck('id')->ToArray();
     $data['student_count'] = Student::whereHas('subscriptions',function($q)use($coursesIDS){
               $q->whereIn('course_id',$coursesIDS);
     })->count();
      return view($this->view.'.index', $data);

   }
}
