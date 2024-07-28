<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Models\BookLecture;
use App\Models\PhotoLecture;
use App\Models\Lecture;
use App\Models\Level;
use Illuminate\Http\Request;
use Toastr;


class LectureController extends Controller
{
    use ApiResponse, FileUploader;



    public function __construct()
    {
        $this->title = trans('admin.lectures.title');
        $this->route = 'admin.levels.lectures';
        $this->view = 'admin.lectures';
        $this->path = 'lectures';
        $this->access = 'lectures';
        $this->middleware('permission:lectures-create', ['only' => ['create','store']]);
        $this->middleware('permission:lectures-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:lectures-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:lectures-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request, $level_id)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Lecture::where(function ($q) use ($request) {
            if ($request->title)
                $q->Where('title', 'like', '%' . $request->title  . '%');
        })->where('level_id', $level_id)->paginate(10);
        $data['level'] = Level::find($level_id);
        return view($this->view . '.index', $data);
    }

    public function create(Lecture $lecture, $level_id)
    {
        $data['title'] = trans('admin.lectures.add');
        $data['route'] = $this->route;
        $data['level'] = Level::find($level_id);
        return view($this->view . '.create', $data);
    }
    public function store(Request $request, $level_id)
    {
        $free = $request->free ? '1' : '0';
        $request->merge(['free' => $free]);
        $lecture = Lecture::create($request->except(['img', 'bookFiles']));
        if (count($request->imgTitle) && $request->imgTitle[0] != null) {
            for ($i = 0; $i < count($request->imgTitle); $i++) {
                if ($request->img[$i] != null) {

                    $thumbnail = $request->img[$i];
                    $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
                    $thumbnail->move(public_path('/uploads/lectures/images/'), $filename);

                    PhotoLecture::create([
                        'title' => $request->imgTitle[$i],
                        'photo' => 'public/uploads/lectures/images/' . $filename,
                        'lecture_id'  => $lecture->id
                    ]);
                }
            }
        }


        if ($request->bookTitles &&  $request->bookTitles[0] != null) {
            for ($i = 0; $i < count($request->bookTitles); $i++) {
                if ($request->bookFiles[$i] != null) {

                    $thumbnail = $request->bookFiles[$i];
                    $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
                    $thumbnail->move(public_path('/uploads/lectures/books/'), $filename);

                    BookLecture::create([
                        'title' => $request->bookTitles[$i],
                        'file' => 'public/uploads/lectures/books/' . $filename,
                        'link'  => $request->bookLinks[$i],
                        'lecture_id'  => $lecture->id
                    ]);
                }
            }
        }

        if ($request->link && $request->provider == 2) {
            
            $pattern = '/(?:v=|be\/)([^&\n]+)/';


            if (preg_match($pattern, $request->link, $matches)) {
                $video_id = $matches[1];
            } else {
                $video_id = ''; // If no video code is found, set it to an empty string
            }
            $lecture->link = 'https://www.youtube.com/embed/' . $video_id;
            $lecture->save();
        } elseif ($request->link && $request->provider == 1) {

            if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $request->link, $regs)) {
                $video_id = $regs[3];
            } else {
                $video_id = ''; // If no video code is found, set it to an empty string
            }
            $lecture->link = 'https://player.vimeo.com/video/' . $video_id;
            $lecture->save();
        } else {
            $lecture->link = $request->link;
            $lecture->save();
        }
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect("admin/levels/$level_id/lectures");
    }

    public function edit($level_id, $id)
    {
        $data['row'] = Lecture::find($id);
        $data['level'] = Level::find($level_id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.lectures.edit');
        return view($this->view . '.edit', $data);
    }

    public function update(Request $request, $level_id)
    {
        $free = $request->free ? '1' : '0';
        $request->merge(['free' => $free]);
        $lecture = Lecture::find($request->id);
        $lecture->update($request->except(['img', 'bookFiles']));

        if (count($request->imgTitle)) {
             PhotoLecture::where('lecture_id',$lecture->id)->delete();
            for ($i = 0; $i < count($request->imgTitle); $i++) {
                if (isset($request->img[$i]) && $request->img[$i] != null) {

                    $thumbnail = $request->img[$i];
                    $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
                    $thumbnail->move(public_path('/uploads/lectures/images/'), $filename);

                    PhotoLecture::create([
                        'title' => $request->imgTitle[$i],
                        'photo' => 'public/uploads/lectures/images/' . $filename,
                        'lecture_id'  => $lecture->id
                    ]);
                }
            }
        }


        if (count($request->bookTitles)) {
             BookLecture::where('lecture_id',$lecture->id)->delete();
            for ($i = 0; $i < count($request->bookTitles); $i++) {
                if (isset($request->bookFiles[$i]) && $request->bookFiles[$i] != null ) {

                    $thumbnail = $request->bookFiles[$i];
                    $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
                    $thumbnail->move(public_path('/uploads/lectures/books/'), $filename);
                    BookLecture::create([
                        'title' => $request->bookTitles[$i],
                        'file' => 'public/uploads/lectures/books/' . $filename,
                        'link'  => $request->bookLinks[$i],
                        'lecture_id'  => $lecture->id
                    ]);
                } else {
                    if (isset($request->bookLinks[$i]) && $request->bookLinks[$i] != null ) 
                    BookLecture::create([
                        'title' => $request->bookTitles[$i],
                        'file' => '',
                        'link'  => $request->bookLinks[$i],
                        'lecture_id'  => $lecture->id
                    ]);
                }
            }
            
        }


        if ($request->link && $request->provider == 2) {
                $pattern = '/(?:v=|be\/)([^&\n]+)/';
                if (preg_match($pattern, $request->link, $matches)) {
                $video_id = $matches[1];
            } else {
                $video_id = ''; // If no video code is found, set it to an empty string
            }
            $lecture->link = 'https://www.youtube.com/embed/' . $video_id;
            $lecture->save();
        } elseif ($request->link && $request->provider == 1) {

            if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $request->link, $regs)) {
                $video_id = $regs[3];
            } else {
                $video_id = ''; // If no video code is found, set it to an empty string
            }
            $lecture->link = 'https://player.vimeo.com/video/' . $video_id;
            $lecture->save();
        } else {
            $lecture->link = $request->link;
            $lecture->save();
        }

        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect("admin/levels/$level_id/lectures");
    }

    public function destroy(Request $request)
    {
        $lecture = Lecture::find($request->id);
        if ($lecture)
            $lecture->delete();

        Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
        return redirect()->back();
    }
}
