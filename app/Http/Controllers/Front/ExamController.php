<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BankQuestion;
use App\Models\PassingAttempt;
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
        $first_question = QuizQuestion::where('quiz_id', $id)->first();
        $quiz = Quiz::find($id);
        $question = BankQuestion::where('id', $first_question->question_id)->first();
        $QuizQuestion = QuizQuestion::where('quiz_id', $id)->pluck('question_id')->ToArray();
        $questionnumber = 1;
        return view('front.quizuestion', compact('quiz', 'question', 'QuizQuestion', 'questionnumber'));
    }



    public function getquestion($id)
    {
        $question = BankQuestion::where('id', $id)->first();
        return $question->bank_group_id;
        $quiz = Quiz::find($question->bank_group_id);
        $questionnumber = 1;
        return view('front.quizuestion', compact('quiz', 'question', 'questionnumber'));
    }


    public function question(Request $request)
    {
        $quiz = Quiz::find($request->quiz_id);
        $questionnumber = $request->questionnumber + 1;
        if (!isset($request->QuizQuestion)) {
            $studentanswers = StudentQuestion::where('quiz_id', $request->quiz_id)->where('quiz_id', $request->quiz_id)->get();
            return redirect()->route('questions.reviews', [$quiz->id])->with(['studentanswers']);
        } else {
            StudentQuestion::updateOrCreate(
                [
                    'student_id'     => $request->student_id,
                    'quiz_id' => $request->quiz_id,
                    'question_id'    => $request->question_id,
                ],
                [
                    'answer'     => $request->answer,
                    'status'     => $request->answer ? '1':'0'
                ]
            );
            $question = BankQuestion::where('id', $request->QuizQuestion[0])->first();
            $QuizQuestion = $request->QuizQuestion;
            unset($QuizQuestion[0]);
            return view('front.quizuestion', compact('question', 'quiz', 'QuizQuestion', 'questionnumber'));
        }
    }

    public function getExamWithLevel($id)
    {
        $quiz = Quiz::find($id);
        // add attempt to pass exam 
        PassingAttempt::create(['student_id' => auth()->guard('students-login')->user()->id, 'quiz_id' => $id]);
        if ($quiz->has_levels)
            return view('front.quizdepartment', compact('quiz'));
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





    public function question1(Request $request)
    {
        $section = QuizSection::find($request->section_id);

        if (!isset($request->QuizQuestion)) {
            $studentanswers = StudentQuestion::where('section_id', $request->section_id)->where('quiz_id', $request->quiz_id)->get();
            return redirect()->route('questions.reviews', [optional($section->quiz)->id, $section->id])->with(['section', 'studentanswers']);
            // return view('front.reviewquestionanswer', compact('section', 'studentanswers'));
        } else {
            StudentQuestion::create($request->all());
            $question = BankQuestion::where('id', $request->QuizQuestion[0])->first();
            $QuizQuestion = $request->QuizQuestion;
            unset($QuizQuestion[0]);
            return view('front.quizuestion', compact('question', 'section', 'QuizQuestion'));
        }
    }


    public function questionreviews(Request $request)
    {

        $title = 'مراجعة الاجابات';
        $questions = StudentQuestion::where(function ($q) use ($request) {
            $q->where('quiz_id', $request->id);
            if ($request->section_id)
                $q->where('section_id', $request->section_id);
        })->get();
        $quiz = Quiz::find($request->id);
        return view('front.reviewquestionanswer', compact('questions','title','quiz'));
    }
}
