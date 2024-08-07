<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InstructorsExport;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\InstructorResource;
use App\Http\Requests\InstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Models\CourseInstructor;
use App\Models\Instructor;

use App\Models\InstructorTrack;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Bcrypt;
use Toastr;

use Maatwebsite\Excel\Facades\Excel;


class InstructorController extends Controller
{
    use ApiResponse, FileUploader;

    public function __construct()
    {
        $this->title = trans('admin.instructors.list');
        $this->route = 'admin.instructors';
        $this->view = 'admin.instructors';
        $this->path = 'instructors';
        $this->access = 'instructors';
        $this->middleware('permission:instructors-create', ['only' => ['create','store']]);
        $this->middleware('permission:instructors-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:instructors-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:instructors-delete',   ['only' => ['delete']]);
    }


    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Instructor::where(function ($q) use ($request) {
            if ($request->name)
                $q->Where('first_name', 'like', '%' . $request->name  . '%')
                    ->orWhere('last_name', 'like', '%' . $request->name  . '%');
            if ($request->phone)
                $q->Where('phone', $request->phone);
            if ($request->email)
                $q->Where('email', $request->email);
        })->get();
        return view($this->view . '.index', $data);
    }


    public function create(Instructor $instructor)
    {
        $data['title'] = trans('admin.instructors.add');
        $data['route'] = $this->route;
        return view($this->view . '.create', $data);
    }
    public function store(InstructorRequest $request)
    {
        $instructor = Instructor::create($request->except(['image','cv']));
        if ($request->track_ids)
            $instructor->tracks()->attach($request->track_ids);
        if ($request->hasFile('image')) {

            $thumbnail = $request->image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/instructors/'), $filename);
            $instructor->image = 'uploads/instructors/' . $filename;
            $instructor->save();
        }

        if ($request->hasFile('cv')) {

            $thumbnail = $request->cv;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/instructors/'), $filename);
            $instructor->cv = 'uploads/instructors/' . $filename;
            $instructor->save();
        }

        if ($request->password) {
            $instructor->password = Bcrypt($request->password);
            $instructor->active = 0;
            $instructor->save();
        }
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.instructors.index');
    }


    public function show($id)
    {
        $data['row'] = Instructor::find($id);
        $data['title'] = 'عرض بروفايل المحاضر';
        $courses_id = CourseInstructor::where('instructor_id',$id)->pluck('course_id')->ToArray();
        $data['subscribtions'] = Subscription::where('course_id',$courses_id)->get();
        return view($this->view . '.show', $data);

    }

    public function update(UpdateInstructorRequest $request)
    {
        $instructor = Instructor::find($request->id);
        $instructor->update($request->except(['image','cv']));
        InstructorTrack::where('instructor_id',$instructor->id)->delete();
        if ($request->track_ids) {
              $instructor->tracks()->attach($request->track_ids);
          }
        if ($request->hasFile('image')) {

            $thumbnail = $request->image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/instructors/'), $filename);
            $instructor->image = 'uploads/instructors/' . $filename;
            $instructor->save();
        }

        if ($request->hasFile('cv')) {

            $thumbnail = $request->cv;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/instructors/'), $filename);
            $instructor->cv = 'uploads/instructors/' . $filename;
            $instructor->save();
        }

        if ($request->password != null) {
            $instructor->password = Bcrypt($request->password);
            $instructor->save();
        }

        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.instructors.index');
    }
    public function edit($id)
    {
        $data['row'] = Instructor::find($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.instructors.edit');
        return view($this->view . '.edit', $data);
    }

    public function destroy(Request $request)
    {
        $instructor = Instructor::find($request->id);
        if ($instructor)
            $instructor->delete();
        Toastr::success(__('admin.msg_delete_successfully'), __('admin.msg_success'));
        return redirect()->route($this->route . '.index');
    }


    public function ExportToExcel(Request $request)
    {

        return Excel::download(new InstructorsExport, 'Instructors.xlsx');
    }

    public function status($id)
    {
        // Set Status
        $user = Instructor::where('id', $id)->firstOrFail();
        $user->active = $user->active == 0 ? 1 : 0;
        $user->save();
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));

        return redirect()->route('admin.instructors.index');
    }
}
