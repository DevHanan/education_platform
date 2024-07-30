<?php

namespace App\Http\Controllers\Instructor;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Toastr;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/instructor/dashboard';

    public function login($id)
    {
        $instructor = Instructor::find($id);
        if ($instructor) {
            if ($instructor->active == 1) {
                Auth::guard('web')->logout();
                Auth::guard('instructors-login')->loginUsingId($id);
                Toastr::success(__('admin.msg_login_successfully'), __('admin.msg_success'));
                return redirect('instructor/dashboard');
            } else {
                Toastr::error(__('admin.instructor_no_active'), __('admin.msg_error'));
                return redirect()->back();
            }

        } else {
            Toastr::error(__('admin.instructor_not_exist'), __('admin.msg_error'));
            return redirect()->back();
        }
    }



    public function logout()
    {

        Auth::guard('instructors-login')->logout();
        Toastr::success(__('admin.auth_logged_out'), __('admin.msg_success'));
        return redirect('/')->with('admin.success', __('admin.auth_logged_out'));
    }

    public function getProfile()
    {

        $data['row'] = auth()->guard('instructors-login')->user();
        return view('instructor.profile', $data);
    }
    public function profile(Request $request)
    {
        // Field Validation
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'photo' => 'nullable|image',
        ]);

        $user = Auth::guard('instructors-login')->user();

        if ($request->id == $user->id) {

            // Update data
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->country_id = $request->country_id;
            $user->phone = $request->phone;
            $user->about_teacher = $request->about_teacher;
            $user->qualifications = $request->qualifications;
            $user->save();


            if ($request->hasFile('image')) {

                $thumbnail = $request->image;
                $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move(public_path('/uploads/instructors/'), $filename);
                $user->image = 'uploads/instructors/' . $filename;
                $user->save();
            }

            if ($request->track_ids)
                $user->tracks()->attach($request->track_ids);

            if ($request->hasFile('cv')) {

                $thumbnail = $request->cv;
                $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move(public_path('/uploads/instructors/'), $filename);
                $user->cv = 'uploads/instructors/' . $filename;
                $user->save();
            }


            if ($request->password != null) {
                $user->password = Bcrypt($request->password);
                $user->save();
            }


            Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        } else {
            Toastr::error(__('admin.msg_not_permitted'), __('admin.msg_error'));
        }

        return redirect()->back();
    }
}
