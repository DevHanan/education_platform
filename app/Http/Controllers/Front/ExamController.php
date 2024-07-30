<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BankQuestion;
use App\Models\PassingAttempt;
use App\Models\Quiz;
use App\Models\QuizSection;
use App\Models\QuizQuestion;
use App\Models\StudentExam;
use App\Models\StudentExamdetail;
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
        StudentExam::create([
            'quiz_id' => $quiz->id, 'student_id' => auth()->guard('students-login')->user()->id,
            'totalmark' => $quiz->total_mark
        ]);
        return view('front.quizuestion', compact('quiz', 'question', 'QuizQuestion', 'questionnumber'));
    }



    public function getquestion($id, $quiz_id)
    {
        $question = BankQuestion::where('id', $id)->first();
        $studentanswer = StudentExamdetail::where('question_id', $id)->where('quiz_id', $quiz_id)->first();
        $answer = 'answer_' . $studentanswer->answer;
        $quiz = Quiz::find($quiz_id);
        $QuizQuestion  = [];
        $questionnumber = 1;
        return view('front.quizuestion', compact('quiz', 'question', 'questionnumber', 'QuizQuestion', 'studentanswer', 'answer'));
    }


    public function question(Request $request)
    {

        $quiz = Quiz::find($request->quiz_id);
        $questionnumber = $request->questionnumber + 1;
        $authid = auth()->guard('students-login')->user()->id;
        $student_exam_id = StudentExam::where('quiz_id', $quiz->id)->where('student_id', $authid)->latest()->first();
        $question = BankQuestion::find($request->question_id);

        $correctanswer = 'answer'. $question->correct_answer;

        if ($question->$correctanswer == $request->answer)
            $mark = $question->mark;
        else 
        $mark = 0;
        if ($request->question_id && !isset($request->QuizQuestion)) {

         
            StudentExamdetail::updateOrCreate(
                
                    [
                   'student_exam_id' => $student_exam_id->id,
                    'student_id'     => $student_exam_id->student_id,
                    'quiz_id' => $request->quiz_id,
                    'question_id'    => $request->question_id,
                    ],[
                    'answer'     => $request->answer,
                    'status'     =>  $request->answer != null ? '1' : '0',
                    'mark' => $mark
                ]
            );
            $studentanswers = StudentExamdetail::where('quiz_id', $request->quiz_id)->where('quiz_id', $request->quiz_id)->get();
            return redirect()->route('questions.reviews', [$quiz->id])->with(['studentanswers']);
        } elseif (!isset($request->QuizQuestion)) {
            $studentanswers = StudentExamdetail::where('quiz_id', $request->quiz_id)->where('quiz_id', $request->quiz_id)->get();
            return redirect()->route('questions.reviews', [$quiz->id])->with(['studentanswers']);
        } else {
            StudentExamdetail::updateOrCreate(
                
                    [
                   'student_exam_id' => $student_exam_id->id,
                    'student_id'     => $student_exam_id->student_id,
                    'quiz_id' => $request->quiz_id,
                    'question_id'    => $request->question_id,
                    ],[
                    'answer'     => $request->answer,
                    'status'     =>  $request->answer != null ? '1' : '0',
                    'mark' => $mark
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
            $studentanswers = StudentExamdetail::where('section_id', $request->section_id)->where('quiz_id', $request->quiz_id)->get();
            return redirect()->route('questions.reviews', [optional($section->quiz)->id, $section->id])->with(['section', 'studentanswers']);
            // return view('front.reviewquestionanswer', compact('section', 'studentanswers'));
        } else {
            StudentExamdetail::create($request->all());
            $question = BankQuestion::where('id', $request->QuizQuestion[0])->first();
            $QuizQuestion = $request->QuizQuestion;
            unset($QuizQuestion[0]);
            return view('front.quizuestion', compact('question', 'section', 'QuizQuestion'));
        }
    }


    public function questionreviews(Request $request)
    {

        $title = 'مراجعة الاجابات';
        $questions = StudentExamdetail::with('question')->where(function ($q) use ($request) {
            $q->where('quiz_id', $request->id);
            if ($request->section_id)
                $q->where('section_id', $request->section_id);
        })->where('student_id',auth()->guard('students-login')->user()->id)->get();
        $quiz = Quiz::find($request->id);
        return view('front.reviewquestionanswer', compact('questions', 'title', 'quiz'));
    }


    public function approveexam(Request $request)
    {
        StudentExamdetail::where(['quiz_id' => $request->quiz_id, 
        'student_id' => auth()->guard('students-login')->user()->id])->update(['approved' => '1']);
        $quiz = Quiz::find($request->quiz_id);
        $questions = StudentExamdetail::where(function ($q) use ($request) {
            $q->where('quiz_id', $request->quiz_id);
            
            if ($request->section_id)
                $q->where('section_id', $request->section_id);
        })->where('student_id',auth()->guard('students-login')->user()->id)->get();
        $studentMark = 0;
        foreach($questions as $question)
        $studentMark += $question->mark;
        $studentexam = StudentExam::where(['quiz_id' => $request->quiz_id, 
        'student_id' => auth()->guard('students-login')->user()->id])->first();

        $studentexam->update(['studentmark' => $studentMark]);

        $title = 'مراجعه نهائية';
        return view('front.quizfinalreview', compact('questions', 'title', 'quiz','studentexam'));
    }


    public function questiondetails($id){
        $student_id = auth()->guard('students-login')->user()->id;
        $question = StudentExamdetail::where(['question_id'=>$id,'student_id'=>$student_id])->first();
        return $question;
        return view('front.review_question_answer', compact('question'));

    }
}
