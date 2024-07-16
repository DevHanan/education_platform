<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankQuestion;
use App\Models\Quiz;
use App\Models\QuizSection;
use App\Models\QuizQuestion;
use App\Models\StudentQuestion;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class ExamController extends Controller
{


    public function listresult(Request $request){
        
        $data['title'] = 'عرض نتائج اختبارات الطلاب';
         $data['rows'] = Quiz::whereHas('studentTest')->get();
        return view('admin.exams.listresult', compact('data'));

    }
}
