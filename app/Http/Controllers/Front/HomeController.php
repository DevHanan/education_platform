<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Cors;
use App\Models\AboutSetting;
use App\Models\Blog;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Partener;
use App\Models\Team;
use App\Models\Lecture;
use App\Models\Subscription;
use App\Models\MailList;
use App\Models\Ticket;
use App\Models\Quiz;
use App\Models\Subject;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'الصفحة الرئيسية';
        return view('front.index', compact(['title']));
    }

    public function about()
    {
        $aboutsetting = AboutSetting::find(1);
        $teams = Team::active()->get();
        $parteners = Partener::active()->get();
        $title = 'من نحن';
        return view('front.about', compact(['aboutsetting', 'teams', 'parteners', 'title']));
    }

    public function courses(Request $request)
    {
        $title = 'الدورات التدريبية';
        $list_courses = Course::where(function ($q) use ($request) {
            if ($request->track_id)
                $q->whereHas('tracks', function ($l) use ($request) {
                    $l->where('tracks.id', $request->track_id);
                });
            if ($request->tracks)
                $q->whereHas('tracks', function ($l) use ($request) {
                    $l->whereIn('tracks.id', $request->tracks);
                });
            if ($request->instructor_id)
                $q->whereHas('instructors', function ($l) use ($request) {
                    $l->where('instructors.id', $request->instructor_id);
                });
            if ($request->instructors)
                $q->whereHas('instructors', function ($l) use ($request) {
                    $l->whereIn('instructors.id', $request->instructors);
                });


            if ($request->type)
                $q->where('course_type_id', $request->type);
            if ($request->types)
                $q->whereIn('course_type_id', $request->types);
            if ($request->recommend)
                $q->where('recommened', $request->recommend);
            if ($request->name)
                $q->Where('name', 'like', '%' . $request->name  . '%');
        })->active()->latest()->get();

        return view('front.courses', compact('title', 'list_courses'));
    }

    public function blogs(Request $request)
    {
        $title = ' المقالات';
        $blogs = Blog::where(function ($q) use ($request) {
            if ($request->start)
                $q->whereDate('published_at', '>=', $request->start);
            if ($request->end)
                $q->whereDate('published_at', '<=', $request->end);
        })->active()->paginate(10);
        return view('front.blogs', compact(['blogs', 'title']));
    }


    public function blog($id)
    {
        $blog = Blog::find($id);
        return view('front.blog', compact('blog'));
    }

    public function policy()
    {
        $title = 'السياسات والشروط';
        return view('front.policy', compact('title'));
    }
    public function contactus()
    {
        $title = 'تواصل معنا';
        return view('front.contactus', compact('title'));
    }

    public function books()
    {
        return view('front.books');
    }
    public function book()
    {
        return view('front.book');
    }

    public function course($id)
    {

        $course = Course::with(['levels', 'lectures', 'tracks', 'instructors', 'coupon', 'comments'])->find($id);
        $tracks_id = $course->tracks()->pluck('track_id')->ToArray();
        $tests = Quiz::whereHas('questions')->where('course_id', $id)->whereNull(['lecture_id', 'level_id'])->get();
        $related_courses = Course::whereHas('tracks', function ($query) use ($tracks_id) {
            $query->whereIn('track_id', $tracks_id);
        })->where('id', '!=', $course->id)->get();
        $title = $course->name;
        return view('front.course', compact('course', 'related_courses', 'title', 'tests'));
    }

    public function lecture($id)
    {
        $lecture = Lecture::find($id);
        $title = $lecture->title;
        return view('front.lecture', compact('lecture'));
    }
    public function signin()
    {
        $title = 'تسجيل الدخول';
        return view('front.signin', compact('title'));
    }
    public function signup()
    {
        $title = 'تسجيل حساب جديد';
        return view('front.signup', compact('title'));
    }
    public function cart($id)
    {
        if (Auth::guard('students-login')->check()) {
            $course = Course::with(['levels', 'lectures', 'tracks', 'instructors'])->find($id);
            $title = 'الاشتراكات';
            return view('front.course_cart', compact('course', 'title'));
        } else {
            toastr()->error(__('front.failed'), __('front.instructor_course_subscribe'));
            return redirect()->back();
        }
    }

    public function Questions()
    {
        $title = 'الأسئلة الشائعة';
        return view('front.Questions', compact('Questions'));
    }


    public function subscribe(Request $request)
    {
        $course = Course::find($request->course_id);

        

        $request->merge([
            'student_id' => Auth::guard('students-login')->user()->id,
            'paid' => $request->paid
        ]);
        $item = Subscription::create($request->except(['bill']));
        if ($request->hasFile('bill')) {

            $thumbnail = $request->bill;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/subsctiptions/'), $filename);
            $item->bill = 'uploads/subsctiptions/' . $filename;
            $item->save();
        }

        /** add teacher prectanage  */
        foreach ($course->instructors as $instructor) {
            if($instructor->pivot->course_prectange){
            $prectange = ($course->price / 100) * $instructor->pivot->course_prectange;
            $instructor->current_balance = $instructor->current_balance + $prectange;
            $instructor->total_balance = $instructor->total_balance + $prectange;
            $instructor->save();
            }
        }

        toastr()->success(__('front.data_created_successfully'), __('front.msg_success'));
        return redirect('course/' . $request->course_id);
    }

    public function saveMessage(Request $request)
    {
        if (Auth::guard('students-login')->check())
            $request->merge([
                'student_id' => Auth::guard('students-login')->user()->id, 'read' => '0'
            ]);
        elseif (Auth::guard('instructors-login')->check())
            $request->merge([
                'instructor_id' => Auth::guard('instructors-login')->user()->id, 'read' => '0'
            ]);
        else
            $request->merge(['read' => '0']);

        Ticket::create($request->all());

        MailList::updateOrCreate(
            ['email' => $request->email]
        );

        toastr()->success(__('front.data_created_successfully'), __('front.msg_success'));
        return redirect()->back();
    }


    public function checkCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->where('course_id', $request->course_id)->first();
        $course = Course::find($request->course_id);
        if ($coupon) {
            if ($coupon->active == '0' ||  $coupon->start_date > Carbon::today()  || $coupon->end_date < Carbon::today()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Coupon has been deactivated',
                    'total' => $course->TotalDiscount
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'discount' => $coupon->discount,
                    'total' => (optional($coupon->course)->TotalDiscount) -  ((optional($coupon->course)->TotalDiscount / 100) * $coupon->discount),
                    'coupon' => $coupon->id
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Coupon not Vaild',
                'total' => $course->TotalDiscount,
                'coupon' => ''

            ]);
        }
    }

    public function calcMasarat()
    {
        $data['first'] = Subject::where('active', '1')->where('classroom', '1')->get();
        $data['second'] = Subject::where('active', '1')->where('classroom', '2')->get();
        $data['third'] = Subject::where('active', '1')->where('classroom', '3')->get();
        // return $data['third'];
        return view('front.calcmasart', $data);
    }


    public function mailList(Request $request)
    {
        MailList::updateOrCreate(
            ['email' => $request->email]
        );
        toastr()->success(__('front.data_created_successfully'), __('front.msg_success'));
        return redirect('/');
    }


    public function comment(Request $request)
    {
        return $request->all();
    }

    public function availablefacultities(Request $request)
    {
        $malefaculities = Faculty::where('min_accept_degree', '<=', $request->result2)->where('gender', 'male')->get();
        $femalefaculities = Faculty::where('min_accept_degree', '<=', $request->result2)->where('gender', 'female')->get();

        return view('front.availablefaculty', compact('malefaculities', 'femalefaculities'));
    }


    public function tests()
    {
        $tests = Quiz::whereHas('questions')->whereNull(['course_id', 'lecture_id', 'level_id'])->get();
        return view('front.abilitytests', compact('tests'));
    }
}
