<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\TrackResource;
use App\Models\Quiz;
use App\Models\BankQuestion;
use App\Models\QuizSection;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Toastr;


class QuizSectionController extends Controller
{
    use ApiResponse, FileUploader;


    
    public function __construct()
    {
        $this->title = trans('admin.sections.title');
        $this->route = 'admin.quizzes.sections';
        $this->view = 'admin.sections';
        $this->path = 'sections';
        $this->access = 'sections';
        // $this->middleware('permission:sections-create', ['only' => ['create','store']]);
        // $this->middleware('permission:sections-view',   ['only' => ['show', 'index']]);
        // $this->middleware('permission:sections-edit',   ['only' => ['edit','update']]);
        // $this->middleware('permission:sections-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request,$quiz_id)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['quiz'] = Quiz::find($quiz_id);
        $data['rows'] = QuizSection::where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->where('quiz_id',$quiz_id)->paginate(10);
        return view($this->view.'.index', $data);
    }

    public function create(QuizSection $section,$quiz_id)
    {
        
        $data['title'] = trans('admin.quiz-sections.add');
        $data['route'] = $this->route;
        $data['quiz'] = Quiz::find($quiz_id);
        $bank_groups= $data['quiz']->bankGroups()->pluck('bank_group_id')->ToArray();
        $data['questions'] = BankQuestion::whereIn('bank_group_id',$bank_groups)->get();
        return view($this->view .'.create',$data);
    }
    public function store(Request $request)
    {
        $active = $request->active ? '1' : '0';
        $request->merge(['active' => $active]);
       $section = QuizSection::create($request->all());
         if($request->questions){
            foreach($request->questions as $id)
            QuizQuestion::create(['section_id'=>$section->id , 'quiz_id'=>$section->quiz_id,'question_id'=>$id]);
         }
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect("admin/quizzes/".$request->quiz_id."/sections");
    }


    public function show($id){
       $section = QuizSection::find($id);
        if($track)
        return $this->okApiResponse(new TrackResource($track), __('Track loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function edit($quiz_id,$id)
    {   
        $data['row'] = QuizSection::find($id);
        $data['route'] = $this->route;
        $data['quiz'] = Quiz::find($quiz_id);
        $data['quizuestionsids']=QuizQuestion::where('section_id',$id)->pluck('question_id')->ToArray();
        $data['groups'] = BankQuestion::whereIn('question_id',$data['quizuestionsids'])->pluck('bank_group_id')->ToArray();
        $data['bank_groups']= $data['quiz']->bankGroups()->pluck('bank_group_id')->ToArray();
        $data['questions'] = BankQuestion::whereIn('bank_group_id', $data['bank_groups'])->get();
        $data['title'] = trans('admin.quiz-sections.edit');
        return view($this->view.'.edit',$data);
    }

    public function update(Request $request,$quiz_id)
    {
        $active = $request->active ? '1' : '0';
        $request->merge(['active' => $active]);
       $section = QuizSection::find($request->id);
       $section->update($request->all());
       if($request->questionids){
        QuizQuestion::whereNotIn('question_id', $request->questionids)->delete();
        foreach($request->questionids as $id)
        QuizQuestion::firstOrCreate(['section_id' => $section->id,'quiz_id'=>$section->quiz_id,'question_id'=>$id]); 
    }
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect("admin/quizzes/".$quiz_id."/sections");
    
    }

    public function destroy (Request $request ,$quiz_id)
    {
       $section = QuizSection::find($request->id);
        if ($section)
           $section->delete();
            Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
            return redirect()->back();
    }
}
