<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Sale;
use App\Models\Order;
use App\Models\Product;
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

      $instructor = auth()->guard('instructors-login')->user();
     $data['student_count']  = $instructor->courses()->withCount('students')->sum('student_id');

     return $data['student_count'];
      return view($this->view.'.index', $data);

   }
}
