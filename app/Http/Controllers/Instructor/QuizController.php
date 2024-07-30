<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use Auth;
use Carbon\Carbon;
use DB;
class QuizController extends Controller
{
   public function __construct()
   {
      // Module Data
      $this->title = 'الاختبارت';
      $this->route = 'instructor.quizzes';
   }

   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function list()
   {
     
     $data['title'] = $this->title;
      $data['route'] = $this->route;
      $login_id = auth()->guard('instructors-login')->user()->id;
      $data['ids'] = Course::whereHas('instructors', function ($query)use($login_id) {
         $query->where('instructor_id', $login_id);
     })->pluck('id')->ToArray();
     $data['rows'] = Quiz::whereIn('course_id',$data['ids'])->latest()->paginate(10);

      return view('instructor.quizzes', $data);

   }


   
   public function show($id)
   {
     
     $data['title'] = $this->title;
      $data['route'] = $this->route;
     $data['row'] = Quiz::find($id);
      return view('instructor.quizz', $data);

   }
}
