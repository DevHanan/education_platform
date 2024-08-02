<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\PartenerResource;
use App\Models\Faculty;
use Illuminate\Http\Request;

use Toastr;


class FacultyController extends Controller
{
    use ApiResponse, FileUploader;


    
    public function __construct()
    {
        $this->title = trans('admin.faculities.title');
        $this->route = 'admin.faculities';
        $this->view = 'admin.faculities';
        $this->path = 'faculities';
        $this->access = 'faculities';
        // $this->middleware('permission:.faculities-create', ['only' => ['create','store']]);
        // $this->middleware('permission:.faculities-view',   ['only' => ['show', 'index']]);
        // $this->middleware('permission:.faculities-edit',   ['only' => ['edit','update']]);
        // $this->middleware('permission:.faculities-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Faculty::where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->paginate(10);
        return view($this->view.'.index', $data);
    }

    public function create(Faculty $faculty)
    {
        $data['title'] = trans('admin.faculities.add');
        $data['route'] = $this->route;
        return view($this->view .'.create',$data);
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:faculities,name'
        ]);
        $faculty = Faculty::create($request->all());
      
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.faculities.index');
    }


    public function show($id){
        $faculty = Faculty::find($id);
        if($faculty)
        return $this->okApiResponse(new PartenerResource($faculty), __('Partener loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function edit($id)
    {   
        $data['row'] = Faculty::find($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.faculities.edit');
        return view($this->view.'.edit',$data);
    }

    public function update(Request $request,Faculty $faculty)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:faculities,name,' . $request->id
        ]);
        $faculty = Faculty::find($request->id);
        $faculty ->update($request->all());
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.faculities.index');    }

    public function destroy (Request $request)
    {
        $faculty = Faculty::find($request->id);
        if ($faculty)
            $faculty->delete();

            Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
            return redirect()->route($this->route.'.index');
    }
}
