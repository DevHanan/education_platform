<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\StudentExam;
use App\Models\Quiz;
use App\Models\Course;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class ExamController extends Controller
{


    public function listresult(Request $request)
    {

        $title = 'عرض نتائج اختبارات الطلاب';
        $login_id = auth()->guard('instructors-login')->user()->id;
        $data['ids'] = Course::whereHas('instructors', function ($query) use ($login_id) {
            $query->where('instructor_id', $login_id);
        })->pluck('id')->ToArray();
        $quizzes_ids = Quiz::whereIn('course_id', $data['ids'])->latest()->pluck('id')->ToArray();
        $rows = StudentExam::whereIn('quiz_id',$quizzes_ids)->latest()->paginate(20);
        return view('instructor.listresult', compact('rows', 'title'));
    }

    public function studentexam($id)
    {
        $title = 'عرض تفاصيل اختبار';
        $row = StudentExam::find($id);
        return view('instructor.showresult', compact('row', 'title'));
    }
}
