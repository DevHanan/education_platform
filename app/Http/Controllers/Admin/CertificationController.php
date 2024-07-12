<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CertificatesExport;
use App\Http\Controllers\Controller;
use App\Mixins\Certificate\MakeCertificate;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Toastr;


class CertificationController extends Controller
{
    public function __construct()
    {
        $this->title = trans('admin.certifications.platform_certification');
        $this->route = 'admin.certifications';
        $this->view = 'admin.certifications';
        $this->path = 'certifications';
        $this->access = 'certifications';
        $this->middleware('permission:certifications-create', ['only' => ['create','store']]);
        $this->middleware('permission:certifications-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:certifications-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:certifications-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Certificate::where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->where('platform_certification','1')->paginate(10);
        return view($this->view.'.index', $data);
    }

    
    public function studentCertificate(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = trans('admin.certifications.student_certification');
        $data['rows'] = Certificate::where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->where('platform_certification','1')->where('student_id','!=',null)->paginate(10);
        return view($this->view.'.student_certification', $data);
    }

    public function externelStudentCertificate(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = trans('admin.certifications.externel_certification');
        $data['rows'] = Certificate::where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->where('platform_certification','0')->paginate(10);
        return view($this->view.'.externel', $data);
    }

    public function create(Certificate $certificate)
    {
        $data['title'] = 'Add certifications ';
        $data['route'] = $this->route;
        return view($this->view .'.create',$data);
    }


    public function grantingcertificate(){
        $data['title'] = 'granting certificate ';
        $data['route'] = $this->route;
        return view('admin.certifications.grantingcertificate',$data);
    }


    public function postgrantingcertificate(Request $request){
        $request->merge(['platform_certification'=>'1']);
        $certificate = Certificate::create($request->except(['file']));
        if ($request->hasFile('file')) {
            $thumbnail = $request->file;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/certifications/main/'),$filename);
            $certificate->file ='uploads/certifications/main/'.$filename;
            $certificate->save();
        }    
        Toastr::success(__('msg_added_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.studentscertifications');
    }
    public function store(Request $request)
    {
        $request->merge(['platform_certification'=>'1']);
        if($request->active)
        $request->merge (['active'=>'1']) ;
        $certificate = Certificate::create($request->except(['image','file']));
        if ($request->hasFile('file')) {
            $thumbnail = $request->file;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/certifications/main/'),$filename);
            $certificate->file ='uploads/certifications/main/'.$filename;
            $certificate->save();
        }

        if ($request->hasFile('image')) {
            $thumbnail = $request->image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/certifications/images/'),$filename);
            $certificate->image ='uploads/certifications/images/'.$filename;
            $certificate->save();
        }
        
        Toastr::success(__('msg_added_successfully'), __('admin.msg_success'));
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
        $data['title'] = 'edit Certification';
        return view($this->view.'.edit',$data);
    }


    
    public function update(Request $request)
    {
        $certificate = Certificate::find($request->id);
        $certificate->update($request->except(['image','file']));
        if ($request->hasFile('file')) {
            $thumbnail = $request->file;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/certifications/main/'),$filename);
            $certificate->file ='uploads/certifications/main/'.$filename;
            $certificate->save();
        }

        if ($request->hasFile('image')) {
            $thumbnail = $request->image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/certifications/images/'),$filename);
            $certificate->image ='uploads/certifications/images/'.$filename;
            $certificate->save();
        }
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.certifications.index');
          
    }

    public function destroy (Request $request)
    {
        $certificate = Certificate::find($request->id);
        if ($certificate)
            $certificate->delete();

            Toastr::success(__('admin.msg_delete_successfully'), __('admin.msg_success'));
            return redirect()->back();
    }

    public function getCertifications(Request $request){
        $courses = Certificate::where('course_id',$request->course_id)->where('platform_certification','1')->get();
        return response()->json($courses);
    }
}
