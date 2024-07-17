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
        // $this->middleware('permission:quizzes-create', ['only' => ['create','store']]);
        // $this->middleware('permission:quizzes-view',   ['only' => ['show', 'index']]);
        // $this->middleware('permission:quizzes-edit',   ['only' => ['edit','update']]);
        // $this->middleware('permission:quizzes-delete',   ['only' => ['delete']]);

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
        return $request->all();
        $active = $request->active ? '1' : '0';
        $has_levels = $request->has_levels ? '1' : '0';
        $request->merge(['active' => $active,'has_levels'=>$has_levels]);

        $quiz = Quiz::create($request->all());
        // if (count($request->sections)) {
        //     for ($i = 0; $i < count($request->sections); $i++) {
        //         if ($request->sections[$i] != null)
        //             QuizSection::create([
        //                 'quiz_id' => $quiz->id,
        //                 'title' => $request->sections[$i]
        //             ]);
        //     }
        // }

         if($request->banks)
         foreach($request->banks as $bank)  
         QuizBankGroup::create([
            'quiz_id'  => $quiz->id,
            'bank_group_id' => $bank['banks'],
            'random'  =>$bank['random'] ,
            'question_number' => $bank['question_number']
        ]);  

        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        if($request->has_levels == 1)
        return redirect('admin/quizzes/'.$quiz->id .'/sections');
        else
        return redirect('admin/quizzes/'.$quiz->id . '/edit');

    }


    public function show($id)
    {
        $quiz = Quiz::find($id);
        if ($quiz)
            return $this->okApiResponse($quiz, __('course loades successfully'));
        else
            return $this->notFoundApiResponse([], __('Data Not Found'));
    }

    public function edit($id)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        $data['row'] = Quiz::find($id);
        $data['bank_groups']= $data['row']->bankGroups()->pluck('bank_group_id')->ToArray();
        $data['groups'] = BankGroup::wherein('id',$data['bank_groups'])->get();
        return view($this->view . '.edit', $data);
    }
    public function update(Request $request)
    {
        $quiz = Quiz::find($request->id);
        $active = $request->active ? '1' : '0';
        $has_levels = $request->has_levels ? '1' : '0';
        $request->merge(['active' => $active,'has_levels'=>$has_levels]);
        $quiz->update($request->all());

        if($request->banks)
        foreach($request->banks as $bank)  
        QuizBankGroup::create([
           'quiz_id'  => $quiz->id,
           'bank_group_id' => $bank,
           'random'  => ' ',
           'prectange' => ' '
       ]); 

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
