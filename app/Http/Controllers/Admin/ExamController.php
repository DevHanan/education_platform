<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentExam;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class ExamController extends Controller
{


    public function listresult(Request $request){
        
        $title = 'عرض نتائج اختبارات الطلاب';
        $rows = StudentExam::latest()->paginate(20);
        return view('admin.exams.listresult', compact('rows','title'));

    }
}
