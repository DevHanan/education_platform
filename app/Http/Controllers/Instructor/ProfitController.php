<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Models\Course;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Toastr;


class ProfitController extends Controller
{
    use ApiResponse, FileUploader;

    public function myProfit(Request $request)
    {
        $data['title'] = trans('admin.finances.instructor_profit');
        $login_id = auth()->guard('instructors-login')->user()->id;
        $data['rows'] =Course::with(['instructors' => function ($query)use($login_id) {

            $query->where('instructor_id', $login_id)->select('instructor_id', 'course_prectange', 'course_price');
        }])->paginate(10);
        
        return view('instructor.profits', $data);
    }


    // public function studentPayment(Request $request){
    //     $data['title'] = trans('admin.finances.students_payment');
    //     $data['rows']  = Subscription::where(function($q)use($request){
    //         if ($request->student_id)
    //         $q->Where('student_id',  $request->student_id );
    //         if ($request->course_id)
    //         $q->Where('course_id',  $request->course_id );
    //         if ($request->track_id)
    //         $q->Where('track_id',  $request->track_id );
    //     })->get();
    //     return view('instrucotr.studentPayments', $data);
    // }


    public function addRequest(){
        $data['title'] = trans('admin.finances.students_payment');
        return view('instructor.requestPayment', $data);

    }


    
    public function listRequest(){
        $data['title'] = trans('admin.finances.list_reuests');
        
        $data['rows']=Withdrawal::where('status','!=','1')->where('instructor_id',auth()->guard('instructors-login')->user()->id)->latest()->paginate(10);
        return view('instructor.listRequestPayment', $data);

    }


    public function listPaidRequest(){
        $data['title'] = trans('admin.finances.instructor_paid');
        
        $data['rows']=Withdrawal::where('status','1')->where('instructor_id',auth()->guard('instructors-login')->user()->id)->latest()->paginate(10);
        return view('instructor.listRequestPayment', $data);

    }
    

    public function storeRequest(Request $request){
        $request->validate([
            'amount' => 'required'
        ]);
        if( $request->amount > auth()->guard('instructors-login')->user()->current_balance || $request->amount <= 0 ){
            Toastr::error(__('القيمة المطلوبه أكبر من القيمة المتاحة'), __('admin.msg_failed'));
            return redirect()->back();
        }else{
       
            Withdrawal::create(['status'=>'0','instructor_id'=>auth()->guard('instructors-login')->user()->id,
                                'date' => Carbon::today(),'value' => $request->amount
        ]);
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->back();

            }
            }
    }

    

