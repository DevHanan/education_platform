<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentExam;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class ExamController extends Controller
{


    public function listresult(Request $request){
        
        $title = 'عرض نتائج اختباراتى';
        $login_id = auth()->guard('students-login')->user()->id;
        $rows = StudentExam::where('student_id',$login_id)->latest()->paginate(20);
        return view('student.exams.listresult', compact('rows','title'));

        
    }

    public function studentexam($id){
        $title = 'عرض تفاصيل اختبار  ';
        $login_id = auth()->guard('students-login')->user()->id;
        $row = StudentExam::where('id',$id)->where('student_id',$login_id)->first();
        return view('student.exams.showresult', compact('row','title'));
    }
}
