<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseType;
use Toastr;
use App\Http\Resources\CourseTypeResource;
use App\Http\Requests\CourseTypeRequest;
use App\Http\Requests\UpdateCourseTypeRequest;
use App;
use Illuminate\Http\Request;
class CourseTypeController extends Controller
{

    public function __construct()
    {
        $this->title = trans('admin.coursetypes.title') ;
        $this->route = 'admin.course-types';
        $this->view = 'admin.course-types';
        $this->path = 'course-types';
        $this->access = 'course-types';
        $this->middleware('permission:course-types-create', ['only' => ['create','store']]);
        $this->middleware('permission:course-types-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:course-types-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:course-types-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] =  CourseType::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view($this->view.'.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CourseType $couretype)
    {
        $title = trans('admin.coursetypes.add');
        return view('admin.course-types.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseTypeRequest $request)
    {
       
        $request->merge([
            'slug'=> $request->name
        ]);
        $couretype = CourseType::create([
            "slug"=>$request->slug,
            "name"=>$request->name,
        ]);
        
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.course-types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $couretype
     * @return \Illuminate\Http\Response
     */
    public function show(CourseType $couretype)
    {
        if(!auth()->user()->isAbleTo('course-types-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $couretype
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $coursetype = CourseType::find($id);
        $title = trans('admin.coursetypes.edit');
        return view('admin.course-types.edit',compact('title','coursetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $couretype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:course_types,name,' . $request->id
        ]);
        $couretype = CourseType::find($request->id);
        
         $request->merge([
            'slug'=> $request->name 
        ]);
        $couretype->update([
            "slug"=>$request->slug,
            "name"=>$request->name,
            'active' => $request->active

            ]);
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.course-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $couretype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $couretype = CourseType::find($request->id);
        $couretype->delete();
        Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.course-types.index');
    }
}
