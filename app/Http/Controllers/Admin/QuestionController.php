<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use Toastr;
use Illuminate\Support\Facades\Validator;


class QuestionController extends Controller
{

    public function __construct()
    {
        $this->title = trans('admin.questions.list');
        $this->route = 'admin.questions';
        $this->view = 'admin.questions';
        $this->path = 'questions';
        $this->access = 'questions';
        $this->middleware('permission:faq-create', ['only' => ['create','store']]);
        $this->middleware('permission:faq-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:faq-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:faq-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] =Question::where(function($q)use($request){
            if ($request->question)
            $q->Where('question', 'like', '%' . $request->question  . '%');
        })->latest()->get();
        return view($this->view.'.index', $data);
    }

    public function create(Question $question)
    {
        $data['title'] = trans('admin.questions.add');
        $data['route'] = $this->route;
        return view($this->view .'.create',$data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question'=> 'required',
            'answer' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $question = Question::create($request->all());
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.questions.index');
     
    }

   

    public function edit($id)
    {   
        $data['row'] = Question::find($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.questions.edit');
        return view($this->view.'.edit',$data);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question'=> 'required',
            'answer' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $question = Question::find($request->id);
        $question->update($request->all());
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.questions.index');     }

    public function destroy(Request $request)
    {
       $question =  Question::find($request->id);
       if($question)
       $question->delete();
       Toastr::success(__('admin.msg_delete_successfully'), __('admin.msg_success'));
       return redirect()->route($this->route.'.index');    }
}
