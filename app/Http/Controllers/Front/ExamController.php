<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BankQuestion;
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


    public function getExamLevelQuestion($id)
    {
        $section = QuizSection::find($id);
        //get all questions id for this quiz 
        $QuizQuestion = QuizQuestion::where('quiz_id', $section->quiz_id)->pluck('question_id')->ToArray();
        //get all questions 
        $i = 0;
        $question = BankQuestion::where('id', $QuizQuestion[$i])->first();
        if (++$i < count($QuizQuestion))
            $second = BankQuestion::where('id', $QuizQuestion[$i])->first();
        elseif ($i ==  count($QuizQuestion))
            $last = BankQuestion::where('id', $QuizQuestion[$i])->first();
        else
            $second = '';
        return view('front.quizuestion', compact('question', 'section', 'second'));
    }
}
