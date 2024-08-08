<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSetting;
use App\Models\LandingSetting;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\MailSetting;
use App\Models\ZoomSetting;

use Toastr;
use Image;
use File;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans('admin.settings.title');
        $this->route = 'admin.setting';
        $this->view = 'admin.setting';
        $this->path = 'setting';
        $this->access = 'setting';

        // $this->middleware('permission:'.$this->access.'-view');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['row'] = Setting::where('status', 1)->first();

        return view($this->view . '.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function siteInfo(Request $request)
    {
       
        $data = Setting::where('id', 1)->first();
        if (!$data)
            $data = new Setting();

        $data->update($request->except(['logo_path', 'favicon_path']));
        if ($request->hasFile('logo_path')) {

            $thumbnail = $request->logo_path;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->logo_path = 'uploads/settings/' . $filename;
            $data->save();
        }

        if ($request->hasFile('favicon_path')) {

            $thumbnail = $request->favicon_path;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->favicon_path = 'uploads/settings/' . $filename;
            $data->save();
        }

        if ($request->hasFile('login_image')) {

            $thumbnail = $request->login_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->login_image = 'uploads/settings/' . $filename;
            $data->save();
        }

        if ($request->hasFile('register_image')) {

            $thumbnail = $request->register_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->register_image = 'uploads/settings/' . $filename;
            $data->save();
        }

        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->back();
    }

    public function landingSetting()
    {
        $data['title'] = 'إعدادت صفحة واجهه الموقع ';
        $data['row'] = LandingSetting::where('id', '1')->first();
        return view($this->view . '.landing', $data);
    }


    public function contactUs()
    {
        $data['title'] = 'إعدادت تواصل معنا ';
        $data['route'] = $this->route;
        $data['row'] = Setting::where('status', 1)->first();
        return view($this->view . '.contactus', $data);
    }



    public function SaveLandingSetting(Request $request)
    {
        $data = LandingSetting::where('id', 1)->first();
        if (!$data)
            $data = new LandingSetting();


        $data->start_soon_period = $request->start_soon_period;

        $data->header_title = $request->header_title;
        $data->header_description = $request->header_description;
        $data->footer_description = $request->footer_description;

        $data->most_required_courses = $request->most_required_courses ? 1 : 0;
        $data->recommend_courses = $request->recommend_courses ? 1 : 0;
        $data->free_courses = $request->free_courses ? 1 : 0;
        $data->top_rated_courses = $request->top_rated_courses ? 1 : 0;
        $data->star_recently_courses = $request->star_recently_courses ? 1 : 0;

        $data->tracks = $request->tracks ? 1 : 0;
        $data->instructors = $request->instructors ? 1 : 0;
        $data->workteam = $request->workteam ? 1 : 0;
        $data->parteners = $request->parteners ? 1 : 0;
        $data->student_opinion = $request->student_opinion ? 1 : 0;
        $data->map_locations = $request->map_locations ? 1 : 0;
        $data->achievements = $request->achievements ? 1: 0;
        $data->letter_news = $request->letter_news ? 1: 0;
        $data->book_shop_url = $request->book_shop_url;
        $data->question_list = $request->question_list ? 1 : 0;
        $data->book_store_visiable = $request->book_store_visiable ? 1 : 0;

        


        $data->save();


        if ($request->hasFile('header_image')) {

            $thumbnail = $request->header_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->header_image = 'uploads/settings/' . $filename;
            $data->save();
        }

        if ($request->hasFile('footer_image')) {

            $thumbnail = $request->footer_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->footer_image = 'uploads/settings/' . $filename;
            $data->save();
        }


        if ($request->hasFile('instructor_guide_file')) {

            $thumbnail = $request->instructor_guide_file;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->instructor_guide_file = 'uploads/settings/' . $filename;
            $data->save();
        }


        if ($request->hasFile('student_guide_file')) {

            $thumbnail = $request->student_guide_file;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->student_guide_file = 'uploads/settings/' . $filename;
            $data->save();
        }
        Toastr::success(__('msg_updated_successfully'), __('msg_success'));
        return redirect()->back();
    }


    public function aboutUSSetting()
    {
        $data['title'] = 'إعدادت من نحن ';
        $data['row'] = AboutSetting::first();
        return view($this->view . '.about', $data);
    }


    public function saveAboutSetting(Request $request)
    {
        $data = AboutSetting::first();
        if (!$data)
            $data = new AboutSetting();

        $data->update($request->except([
            'background_image', 'mission_image', 'msg_image1',
            'msg_image2', 'msg_image3', 'msg_image4'
        ]));
        if ($request->hasFile('background_image')) {

            $thumbnail = $request->background_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->background_image = 'uploads/settings/' . $filename;
            $data->save();
        }

        if ($request->hasFile('mission_image')) {

            $thumbnail = $request->mission_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->mission_image = 'uploads/settings/' . $filename;
            $data->save();
        }
        if ($request->hasFile('msg_image1')) {

            $thumbnail = $request->msg_image1;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->msg_image1 = 'uploads/settings/' . $filename;
            $data->save();
        }
        if ($request->hasFile('msg_image2')) {

            $thumbnail = $request->msg_image2;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->msg_image2 = 'uploads/settings/' . $filename;
            $data->save();
        }

        if ($request->hasFile('msg_image3')) {

            $thumbnail = $request->msg_image3;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->msg_image3 = 'uploads/settings/' . $filename;
            $data->save();
        }
        if ($request->hasFile('msg_image4')) {

            $thumbnail = $request->msg_image4;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->msg_image4 = 'uploads/settings/' . $filename;
            $data->save();
        }
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->back();
    }

    public function mailSettings()
    {
        $data['title'] = 'إعدادت  البريد الإلكترونى ';
        $data['route'] = $this->route;
        $data['row'] = MailSetting::first();
        return view($this->view . '.mail', $data);
    }

    public function SaveMailSetting(Request $request)
    {
        $data = MailSetting::first();
        if($data == null) 
        $data = new MailSetting();
        $data->update($request->all());
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->back();

    }


    public function zoomSettings()
    {
        $data['title'] = 'إعدادت   زوم';
        $data['route'] = $this->route;
        $data['row'] = ZoomSetting::first();
        return view($this->view . '.zoom', $data);
    }

    public function SaveZoomSetting(Request $request)
    {
        $data = ZoomSetting::first();
        if($data == null) 
        $data = new ZoomSetting();
        $data->update($request->all());
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->back();
    }

}
