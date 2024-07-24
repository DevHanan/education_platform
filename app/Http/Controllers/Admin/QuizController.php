<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Quiz;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CourseExport;
use App\Models\BankGroup;
use App\Models\QuizBankGroup;
use App\Models\QuizQuestion;
use App\Models\QuizSection;
use App\Models\BankQuestion;

use Toastr;



class QuizController extends Controller
{
    use ApiResponse;
    use  FileUploader;


    public function __construct()
    {
        // Module Data
        $this->title = trans('admin.quizzes.title');
        $this->route = 'admin.quizzes';
        $this->view = 'admin.quizzes';
        $this->path = 'quizzes';
        $this->access = 'quizzes';
        $this->middleware('permission:quizzes-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:quizzes-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:quizzes-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:quizzes-delete',   ['only' => ['delete']]);
    }


    public function index(Request $request)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['rows'] = Quiz::where(function ($q) use ($request) {

            if ($request->name)
                $q->Where('name', 'like', '%' . $request->name  . '%');
        })->paginate(10);

        return view($this->view . '.index', $data);
    }



    public function create()
    {
        $data['title'] = trans('admin.quizzes.add');
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        return view($this->view . '.create', $data);
    }

    public function store(Request $request)
    {
        
        if(!isset($request->banks) ){
            Toastr::success(__('admin.plz_select_one_bank'), __('admin.msg_error'));
            return redirect()->back();

        }
        $active = $request->active ? '1' : '0';
        $has_levels = $request->has_levels ? '1' : '0';
        $request->merge(['active' => $active, 'has_levels' => $has_levels]);

        $quiz = Quiz::create($request->all());

        // if ($request->banks)
        //     for ($i = 0; $i < count($request['banks']); $i++)
        //         if ($request->banks[$i] !== null) {
        //             QuizBankGroup::create([
        //                 'quiz_id'  => $quiz->id,
        //                 'bank_group_id' => $request['banks'][$i],
        //                 'random'  => $request['random'][$i],
        //                 'question_number' => $request['questionNumber'][$i]
        //             ]);
        //         }

        if ($request->banks) {
            // insert selected questions not random 
            if ($request->questions) {
                foreach ($request->questions as $id)
                    QuizQuestion::create(['section_id' => '', 'quiz_id' => $quiz->id, 'question_id' => $id]);
            }

            // Random bank question if exist 
            for ($i = 0; $i < count($request->random); $i++) {
                if ($request->random[$i] == 1) {
                    $question_num = $request->questionNumber[$i];
                    $bank_id = $request->banks[$i];
                    $randomIds = BankQuestion::where('bank_group_id', $bank_id)->inRandomOrder()->take($question_num)->pluck('id');
                    foreach ($randomIds as $id)
                        QuizQuestion::create(['section_id' => '', 'quiz_id' => $quiz->id, 'question_id' => $id]);
                }
            }
        }
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        if ($request->has_levels == 1)
            return redirect('admin/quizzes/' . $quiz->id . '/sections');
        else
            return redirect('admin/quizzes/' . $quiz->id);
    }


    public function show($id)
    {

        $data['row'] = Quiz::find($id);
        $data['title'] = trans('admin.quizzes.show');
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        return view($this->view . '.show', $data);
    }

    public function edit($id)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        $data['row'] = Quiz::find($id);
        $data['bank_groups'] = $data['row']->bankGroups()->pluck('bank_group_id')->ToArray();
        $data['banks'] = BankGroup::active()->get();
        $data['quizuestionsids'] = QuizQuestion::where('quiz_id', $id)->pluck('question_id')->ToArray();
        return $data['quizuestionsids'];
        $data['groups'] = BankQuestion::whereIn('id', $data['quizuestionsids'])->pluck('bank_group_id')->ToArray();
        $data['bankgroups'] = QuizBankGroup::where('quiz_id', $id)->get();
        $data['quizquestions'] = QuizQuestion::where('quiz_id', $id)->pluck('question_id')->toArray();

        return view($this->view . '.edit', $data);
    }
    public function update(Request $request)
    {
        $quiz = Quiz::find($request->id);
        $active = $request->active ? '1' : '0';
        $has_levels = $request->has_levels ? '1' : '0';
        $request->merge(['active' => $active, 'has_levels' => $has_levels]);
        $quiz->update($request->all());

        if ($request->banks) {
            // delete unchecked 
            for ($i = 0; $i < count($request['banks']); $i++)
                if ($request->banks[$i] !== null) {
                    QuizBankGroup::firstOrCreate(['quiz_id' => $quiz->id, 'bank_group_id' => $request['banks'][$i]], [
                        'random'  => $request['random'][$i],
                        'question_number' => $request['questionNumber'][$i]
                    ]);
                }
        }


        if ($request->questions) {
            QuizQuestion::whereNotIn('question_id', $request->questions)->delete();
            foreach ($request->questions as $question)
                QuizQuestion::firstOrCreate(['quiz_id' => $quiz->id, 'question_id' => $question], []);
        }


        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.quizzes.index');
    }



    public function ExportToExcel(Request $request)
    {

        return Excel::download(new CourseExport, 'courses.xlsx');
    }

    public function destroy(Request $request)
    {
        $quiz = Quiz::find($request->id);
        if ($quiz)
            $quiz->delete();

        Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
        return redirect()->route($this->route . '.index');
    }


    public function getcourses(Request $request)
    {
        $track_id = $request->track_id;
        $quizs = Quiz::whereHas('tracks', function ($q) use ($track_id) {
            $q->where('track_id', $track_id);
        })->get();
        return response()->json($courses);
    }
}
