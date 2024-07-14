<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\PartenerResource;
use App\Models\Subject;
use Illuminate\Http\Request;

use Toastr;


class SubjectController extends Controller
{
    use ApiResponse, FileUploader;



    public function __construct()
    {
        $this->first_classroom_title = trans('admin.subjects.first_classroom_title');
        $this->second_classroom_title = trans('admin.subjects.second_classroom_title');
        $this->third_classroom_title = trans('admin.subjects.third_classroom_title');
        $this->route = 'admin.subjects';
        $this->view = 'admin.subjects';
        $this->path = 'subjects';
        $this->access = 'subjects';
        // $this->middleware('permission:.subjects-create', ['only' => ['create','store']]);
        // $this->middleware('permission:.subjects-view',   ['only' => ['show', 'index']]);
        // $this->middleware('permission:.subjects-edit',   ['only' => ['edit','update']]);
        // $this->middleware('permission:.subjects-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        if ($request->classroom == 1)
            $data['title'] = $this->first_classroom_title;
        elseif ($request->classroom == 2)
            $data['title'] = $this->second_classroom_title;
        else
            $data['title'] = $this->third_classroom_title;

        $data['rows'] = Subject::where(function ($q) use ($request) {
            if ($request->name)
                $q->Where('name', 'like', '%' . $request->name  . '%');
            if ($request->classroom)
                $q->Where('classroom', $request->classroom);
        })->paginate(10);
        return view($this->view . '.index', $data);
    }

    public function create(Subject $subject)
    {
        $data['title'] = trans('admin.subjects.add');
        $data['route'] = $this->route;
        return view($this->view . '.create', $data);
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'degree' => 'required',
        ]);
        $request->merge(['terms'=>json_encode($request->terms)]);
        $subject = Subject::create($request->all());

        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect('admin/subjects?classroom='.$subject->classroom);
    }


    public function show($id)
    {
        $subject = Subject::find($id);
        if ($subject)
            return $this->okApiResponse(new PartenerResource($subject), __('Partener loades successfully'));
        else
            return $this->notFoundApiResponse([], __('Data Not Found'));
    }

    public function edit($id)
    {
        $data['row'] = Subject::find($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.subjects.edit');
        return view($this->view . '.edit', $data);
    }

    public function update(Request $request, Subject $subject)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:subjects,name,' . $request->id,
            'degree' => 'required',
        ]);
        $request->merge(['terms'=>json_encode($request->terms)]);
        $subject = Subject::find($request->id);
        $subject->update($request->all());
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect('admin/subjects?classroom='.$subject->classroom);
    }

    public function destroy(Request $request)
    {
        $subject = Subject::find($request->id);
        
        if ($subject)
            $subject->delete();

        Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
        return redirect()->back();
    }
}
