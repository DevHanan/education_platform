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
        
        $questions = StudentQuestion::all();
        return view('admin.exams.listresult', compact('questions'));

    }
}
