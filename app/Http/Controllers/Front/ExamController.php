<?php

namespace App\Http\Controllers\Front;

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
        $question = BankQuestion::where('id', $QuizQuestion[0])->first();
        unset($QuizQuestion[0]);
        return view('front.quizuestion', compact('question', 'section', 'QuizQuestion'));
    }

    public function question(Request $request)
    {
        $section = QuizSection::find($request->section_id);

        if (!isset($request->QuizQuestion)) {
            $studentanswers = StudentQuestion::where('section_id', $request->section_id)->where('quiz_id', $request->quiz_id)->get();
           return redirect()->route('questions.reviews',[optional($section->quiz)->id,$section->id])->with(['section', 'studentanswers']);
            // return view('front.reviewquestionanswer', compact('section', 'studentanswers'));
        } else {
            StudentQuestion::create($request->all());
            $question = BankQuestion::where('id', $request->QuizQuestion[0])->first();
            $QuizQuestion = $request->QuizQuestion;
            unset($QuizQuestion[0]);
            return view('front.quizuestion', compact('question', 'section', 'QuizQuestion'));
        }
    }


    public function questionreviews(Request $request){
        
        $questions = StudentQuestion::where(function($q)use($request){
            $q->where('quiz_id',$request->id);
            if($request->section_id)
            $q->where('section_id',$request->section_id);
        })->get();
        return view('front.reviewquestionanswer', compact('questions'));

    }
}
