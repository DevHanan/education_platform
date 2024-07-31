<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Toastr;


class ProfitController extends Controller
{
    use ApiResponse, FileUploader;

    public function courseProfit(Request $request)
    {
        $data['title'] = trans('admin.finances.course_profit');
        $data['rows'] = Course::whereHas('subscriptions')->where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->paginate(10);
        return view('admin.finicals.courseprofit', $data);
    }


    public function studentPayment(Request $request){
        $data['title'] = trans('admin.finances.students_payment');
        $data['rows']  = Subscription::where(function($q)use($request){
            if ($request->student_id)
            $q->Where('student_id',  $request->student_id );
            if ($request->course_id)
            $q->Where('course_id',  $request->course_id );
            if ($request->track_id)
            $q->Where('track_id',  $request->track_id );
        })->get();
        return view('admin.finicals.studentPayments', $data);
    }

  


    public function listRequest(){
        $data['title'] = trans('admin.finances.list_reuests');
        
        $data['rows']=Withdrawal::latest()->paginate(10);
        return view('admin.finicals.listRequest', $data);

    }


    public function listPaidRequest(){
        $data['title'] = trans('admin.finances.instructor_paid');
        
        $data['rows']=Withdrawal::where('status','1')->latest()->paginate(10);
        return view('admin.finicals.listpaidRequest', $data);

    }

    public function instructorProfits(){
            $data['title'] = trans('admin.finances.instructors_profit');        
            $data['rows']=Instructor::with('subscriptions')->latest()->paginate(10);
            return view('admin.finicals.instructorProfits', $data);
    }

    }

    

