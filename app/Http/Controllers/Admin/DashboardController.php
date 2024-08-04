<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Instructor;
use App\Models\Student;
use App\Models\Subscription;
use App\Models\Course;
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
      $this->route = 'admin.dashboard';
      $this->view = 'admin';
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
      $instructors = Instructor::sum('total_balance');
      $subscriptions = Subscription::sum('paid');
      $data['platform_profit'] = $subscriptions - $instructors;

      /** Most selling courses  */
      $courses = Course::withCount('subscriptions')
         ->orderBy('subscriptions_count', 'desc')
         ->take(10)
         ->get();
      $data['labels'] = $courses->pluck('name');
      $data['subscriptions_count'] = $courses->pluck('subscriptions_count');


      /** subscription charts */
      // Get the last 7 days of subscriptions
      $subscriptions = Subscription::where('created_at', '>=', now()->subDays(7))->get();
      $subscriptionsByDay = $subscriptions->groupBy(function ($subscription) {
         return $subscription->created_at->format('Y-m-d');
      });

      $data['subscriptionslabels'][] = array();
         $data['subscriptionscount'][] = array();
      foreach ($subscriptionsByDay as $day => $subscriptions) {
         $data['subscriptionslabels'][] = $day;
         $data['subscriptionscount'][] = $subscriptions->count();
      }

      /**  */

      /** Student Chart  */
      $students = Student::withCount('subscriptions')->orderBy('subscriptions_count', 'desc')->take(10)->get();
      $data['studentname'] = $students->pluck('name');
      $data['studentSubscriptionCount'] = $students->pluck('subscriptions_count');
      /**  */


      return view($this->view . '.index', $data);
   }
}
