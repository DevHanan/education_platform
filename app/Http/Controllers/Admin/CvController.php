<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Models\Cv;
use Illuminate\Http\Request;

use Toastr;


class CvController extends Controller
{
    use ApiResponse, FileUploader;


    
    public function __construct()
    {
        $this->title = trans('admin.cv.title');
        $this->route = 'admin.cvs';
        $this->view = 'admin.cv';
        $this->path = 'cv';
        $this->access = 'cv';     
        $this->middleware('permission:cvs-create', ['only' => ['create','store']]);
        $this->middleware('permission:cvs-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:cvs-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:cvs-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Cv::paginate(10);
        return view($this->view.'.index', $data);
    }

    public function create(Cv $cv)
    {
        $data['title'] = trans('admin.cv.add');
        $data['route'] = $this->route;
        return view($this->view .'.create',$data);
    }
    public function store(Request $request)
    {
        $cv = Cv::create(['active'=>'1']);
      
        if ($request->hasFile('image')) {
            $thumbnail = $request->image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/cv/main/'),$filename);
            $cv->image ='uploads/cv/main/'.$filename;
            $cv->save();
        }
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.cvs.index');
    }


    public function show($id){
        $cv = Cv::find($id);
        if($cv)
        return $this->okApiResponse($cv, __('Cv loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function edit($id)
    {   
        $data['row'] = Cv::find($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.cv.edit');
        return view($this->view.'.edit',$data);
    }

    public function update(Request $request,Cv $cv)
    {
        $cv->update($request->except('image'));
        if ($request->hasFile('image')) {
            $thumbnail = $request->image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/cv/main/'),$filename);
            $cv->image ='uploads/cv/main/'.$filename;
            $cv->save();
        }
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.cvs.index');    }

    public function destroy (Request $request)
    {
        $cv = Cv::find($request->id);
        if ($cv)
            $cv->delete();

            Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
            return redirect()->route($this->route.'.index');
    }
}
