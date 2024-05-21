<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function __construct()
    {
        $this->title = trans('admin.certifications.list');
        $this->route = 'student.certifications';
        $this->view = 'student.certifications';
        $this->path = 'certifications';
        $this->access = 'certifications';
    }
    public function platformCertifications(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Certificate::where('student_id',auth()->guard('students-login')->user()->id)->where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->where('platform_certification','1')->paginate(10);
        return view($this->view.'.index', $data);
    }


    public function externalCertifications(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Certificate::where('student_id',auth()->guard('students-login')->user()->id)->where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->where('platform_certification','0')->paginate(10);
        return view($this->view.'.index', $data);
    }
    
    public function studentCertificate(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = 'Student Certifications';
        $data['rows'] = Certificate::whereNull('course_id')->where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->get();
        return view($this->view.'.index', $data);
    }

    public function create(Certificate $certificate)
    {
        $data['title'] = 'Add certifications ';
        $data['route'] = $this->route;
        return view($this->view .'.create',$data);
    }
    public function store(Request $request)
    {
        $certificate = Certificate::create($request->except('file'));
        if ($request->hasFile('file')) {
            $thumbnail = $request->file;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/tracks/main/'),$filename);
            $certificate->file ='uploads/tracks/main/'.$filename;
            $certificate->save();
        }
        Toastr::success(__('msg_updated_successfully'), __('msg_success'));
        return redirect()->route('admin.certifications.index');
    }


    public function show($id){
        $certificate = Certificate::find($id);
        if($certificate)
        return $this->okApiResponse(new CountryResource($certificate), __('Country loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function edit($id)
    {   
        $data['row'] = Certificate::find($id);
        $data['route'] = $this->route;
        $data['title'] = 'edit Country';
        return view($this->view.'.edit',$data);
    }

    public function update(Request $request)
    {
        $certificate = Certificate::find($request->id);
        $certificate->update($request->except('file'));
        if ($request->hasFile('file')) {
            $thumbnail = $request->file;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/tracks/main/'),$filename);
            $certificate->file ='uploads/tracks/main/'.$filename;
            $certificate->save();
        }
        Toastr::success(__('msg_updated_successfully'), __('msg_success'));
        return redirect()->route('admin.certifications.index');    }

    public function destroy (Request $request)
    {
        $certificate = Certificate::find($request->id);
        if ($certificate)
            $certificate->delete();

            Toastr::success(__('msg_delete_successfully'), __('msg_success'));
            return redirect()->route($this->route.'.index');
    }
}
