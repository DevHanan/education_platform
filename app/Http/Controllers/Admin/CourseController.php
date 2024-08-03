<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Http\Resources\CourseResource;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CourseExport;
use App\Models\CourseInstructor;
use App\Models\CourseTrack;
use App\Models\Instructor;
use App\Models\LandingSetting;
use App\Models\Lecture;
use App\Models\Level;
use Toastr;
use Illuminate\Support\Facades\URL;




class CourseController extends Controller
{
    use ApiResponse;
    use  FileUploader;


    public function __construct()
    {
        // Module Data
        $this->title = trans('admin.courses.title');
        $this->route = 'admin.courses';
        $this->view = 'admin.courses';
        $this->path = 'courses';
        $this->access = 'courses';
        $this->middleware('permission:courses-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:courses-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:courses-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:courses-delete',   ['only' => ['delete']]);
        $this->middleware('permission:recommened-courses-view',   ['only' => ['recommendCourses']]);
        $this->middleware('permission:make-recommened-courses-view',   ['only' => ['recommendCourses']]);
        $this->middleware('permission:recent-courses-view',   ['only' => ['startSoonCourses']]);
    }


    public function index(Request $request)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['rows'] = Course::with('tracks', 'instructors')->where(function ($q) use ($request) {

            if ($request->type)
                $q->where('course_type_id', $request->type);
            if ($request->recommend)
                $q->where('recommened', $request->recommend);
            if ($request->type)
                $q->where('course_type_id', $request->type);

            if ($request->course_type_id)
                $q->where('course_type_id', $request->course_type_id);
            if (isset($request->name) &&  $request->name != null)
                $q->Where('name', 'like', '%' . $request->name  . '%');
            if ($request->instructor_id &&  $request->instructor_id != null)
                $q->whereHas('instructors', function ($q) use ($request) {
                    $q->where('instructor_id', $request->instructor_id);
                });
            if ($request->track_id &&  $request->track_id != null)
                $q->whereHas('tracks', function ($q) use ($request) {
                    $q->where('track_id', $request->track_id);
                });
        })->latest()->paginate(10);



        return view($this->view . '.index', $data);
    }


    public function startSoonCourses(Request $request)
    {
        $data['title'] = 'دورات تبدأ قريبا';
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['rows'] = Course::recentStart()->with('tracks', 'instructors')->where(function ($q) use ($request) {
            if ($request->type)
                $q->where('course_type_id', $request->type);
            if ($request->recommend)
                $q->where('recommened', $request->recommend);
            if ($request->name)
                $q->Where('name', 'like', '%' . $request->name  . '%');
            if ($request->instructor_id)
                $q->where('instructor_id', $request->instructor_id);
            if ($request->track_id)
                $q->where('track_id', $request->track_id);
            if ($request->course_type)
                $q->where('course_type_id', $request->course_type);
        })->paginate(10);

        return view($this->view . '.index', $data);
    }

    public function recommendCourses(Request $request)
    {
        $data['title'] = 'دورات  مرشحة';
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['rows'] = Course::where('recommened', '1')->with('tracks', 'instructors')->where(function ($q) use ($request) {
            if ($request->name)
                $q->Where('name', 'like', '%' . $request->name  . '%');
            if ($request->instructor_id)
                $q->where('instructor_id', $request->instructor_id);
            if ($request->track_id)
                $q->where('track_id', $request->track_id);
            if ($request->course_type)
                $q->where('course_type_id', $request->course_type);
        })->paginate(10);

        return view($this->view . '.index', $data);
    }
    public function create()
    {
        $data['title'] = trans('admin.courses.add');
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        return view($this->view . '.create', $data);
    }

    public function store(CourseRequest $request)
    {

        $active = $request->active ? '1' : '0';
        $recommend = $request->recommend ? '1' : '0';
        $request->merge(['active' => $active, 'recommend' => $recommend]);
        if ($request->promo_url && $request->provider == 2) {
            $parsedUrl = parse_url($request->promo_url);
            if ($parsedUrl['host'] == 'www.youtube.com') {
                parse_str($parsedUrl['query'], $query);
                $video_id =  $query['v'];
            } elseif ($parsedUrl['host'] == 'youtu.be') {
                $path = explode('?', $parsedUrl['path']);
                $video_id = trim($path[0], '/');
            } else {
                $video_id = '';
            }
            $request->merge(['videoId' => 'https://www.youtube.com/embed/' . $video_id]);
        } else {
            if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $request->promo_url, $regs)) {
                $video_id = $regs[3];
            } else {
                $video_id = ''; // If no video code is found, set it to an empty string
            }
            $request->merge(['videoId' => 'https://player.vimeo.com/video/' . $video_id]);
        }


        $course = Course::create($request->except(['image', 'background_image']));

        if ($request->track_ids)
            $course->tracks()->attach($request->track_ids);

        if (count($request->instructors)) {
            for ($i = 0; $i < count($request->instructors); $i++) {
                if ($request->instructors[$i] != 0) {

                    CourseInstructor::updateOrCreate([
                        'course_id' => $course->id,
                        'instructor_id' => $request->instructors[$i],
                    ], [
                        'course_price' => $request->instructorsprice[$i],
                        'course_prectange' => $request->instructorsprecentage[$i]

                    ]);
                    /** Add profits to each instructors  */
                    $instructor = Instructor::find($request->instructors[$i]);
                    $instructor->current_balance = $instructor->current_balance + $request->instructorsprice[$i];
                    $instructor->total_balance = $instructor->total_balance + $request->instructorsprice[$i];
                    $instructor->save();
                }
            }
        }

        if ($request->hasFile('image')) {
            $thumbnail = $request->image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/courses/main/'), $filename);
            $course->image = 'uploads/courses/main/' . $filename;
            $course->save();
        }

        if ($request->hasFile('background_image')) {
            $thumbnail = $request->background_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/courses/background_image/'), $filename);
            $course->background_image = 'uploads/courses/background_image/' . $filename;
            $course->save();
        }

        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect('admin/courses/' . $course->id . '/levels');
    }


    public function show($id)
    {
        $data['row'] = Course::find($id);
        $data['title'] = trans('admin.courses.show');
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        return view($this->view . '.show', $data);
    }

    public function edit($id)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        $data['row'] = Course::find($id);
        $data['row_tracks'] = $data['row']->tracks->pluck('id')->ToArray();


        return view($this->view . '.edit', $data);
    }
    public function update(UpdateCourseRequest $request)
    {
        $course = Course::find($request->id);
        $active = $request->active ? '1' : '0';
        $recommend = $request->recommend ? '1' : '0';
        if ($request->promo_url && $request->provider == 2) {
            $parsedUrl = parse_url($request->promo_url);
            if ($parsedUrl['host'] == 'www.youtube.com') {
                parse_str($parsedUrl['query'], $query);
                $video_id =  $query['v'];
            } elseif ($parsedUrl['host'] == 'youtu.be') {
                $path = explode('?', $parsedUrl['path']);
                $video_id = trim($path[0], '/');
            } else {
                $video_id = '';
            }

            $request->merge(['videoId' => 'https://www.youtube.com/embed/' . $video_id]);
        } else {
            if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $request->promo_url, $regs)) {
                $video_id = $regs[3];
            } else {
                $video_id = ''; // If no video code is found, set it to an empty string
            }
            $request->merge(['videoId' => 'https://player.vimeo.com/video/' . $video_id]);
        }

        $request->merge(['active' => $active, 'recommend' => $recommend]);
        $course->update($request->except(['image', 'background_image', 'thumbinal_image']));

        if ($request->track_ids) {
            CourseTrack::where('course_id', $course->id)->delete();
            $course->tracks()->attach($request->track_ids);
        }

        if (count($request->instructors)) {
            CourseInstructor::where('course_id', $course->id)->delete();
            for ($i = 0; $i < count($request->instructors); $i++) {
                if ($request->instructors[$i] != 0)
                    CourseInstructor::updateOrCreate([
                        'course_id' => $course->id,
                        'instructor_id' => $request->instructors[$i],
                    ], [
                        'course_price' => $request->instructorsprice[$i],
                        'course_prectange' => $request->instructorsprecentage[$i]

                    ]);
            }
        }
        if ($request->hasFile('image')) {
            $thumbnail = $request->image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/courses/main/'), $filename);
            $course->image = 'uploads/courses/main/' . $filename;
            $course->save();
        }

        if ($request->hasFile('background_image')) {
            $thumbnail = $request->background_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/courses/background_image/'), $filename);
            $course->background_image = 'uploads/courses/background_image/' . $filename;
            $course->save();
        }

        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.courses.index');
        // return redirect('admin/courses/'.$course->id .'/levels');

    }



    public function ExportToExcel(Request $request)
    {

        return Excel::download(new CourseExport, 'courses.xlsx');
    }

    public function destroy(Request $request)
    {
        $course = Course::find($request->id);
        if ($course)
            $course->delete();

        Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
        return redirect()->route($this->route . '.index');
    }


    public function getcourses(Request $request)
    {
        $track_id = $request->track_id;
        $courses = Course::whereHas('tracks', function ($q) use ($track_id) {
            $q->where('track_id', $track_id);
        })->get();
        return response()->json($courses);
    }

    public function getcourse(Request $request)
    {
        $course = Course::find($request->course_id);
        return response()->json($course);
    }

    public function getlevels(Request $request)
    {
        $course_id = $request->course_id;
        $levels = Level::where('course_id', $course_id)->get();
        return response()->json($levels);
    }

    public function getlectures(Request $request)
    {
        $level_id = $request->level_id;
        $lectures = Lecture::where('level_id', $level_id)->get();
        return response()->json($lectures);
    }
}
