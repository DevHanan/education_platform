<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizSection;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class ExamController extends Controller
{

    public function getExam($id)
    {
        $quiz = Quiz::find($id);
        if ($quiz->has_levels)
            return view('front.quizdepartment', compact('quiz'));
        else
            return view('front.quizuestion', compact('quiz'));
    }


    public function getExamLevelQuestion($id){
        $section = QuizSection::find($id);
          $QuizQuestion = QuizQuestion::where('quiz_id',$section->quiz_id)->paginate('1');
          return view('front.quizuestion', compact('QuizQuestion','section'));

    }
}
