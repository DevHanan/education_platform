<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\Models\Course;
use App\Models\CourseInstructor;
use App\Models\Instructor;
use App\Models\Subscription;
use Toastr;

class SubscriptionController extends Controller
{
    use ApiResponse, FileUploader;


    public function __construct()
    {
        $this->title = trans('admin.subscriptions.title');
        $this->route = 'admin.subscriptions';
        $this->view = 'admin.subscriptions';
        $this->path = 'subscriptions';
        $this->access = 'subscriptions';
        $this->middleware('permission:subscriptions-create', ['only' => ['create','store']]);
        $this->middleware('permission:subscriptions-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:subscriptions-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:subscriptions-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Subscription::where(function ($q) use ($request) {
            if ($request->student_id)
                $q->Where('student_id', $request->student_id);
            if ($request->course_id)
                $q->Where('course_id', $request->course_id);
            if ($request->track_id)
                $q->Where('track_id', $request->track_id);
        })->get();
        return view($this->view . '.index', $data);
    }

    public function create(Subscription $subscription)
    {
        $data['title'] = trans('admin.subscriptions.add');
        $data['route'] = $this->route;
        return view($this->view . '.create', $data);
    }

    public function store(SubscriptionRequest $request)
    {

        $subscriptioncount = Subscription::where(['student_id' => $request->student_id, 'course_id' => $request->course_id])->count();
        if ($subscriptioncount > 0) {
            Toastr::error(__('admin.subscribtion_added_again'), __('admin.msg_error'));
            return redirect()->back();
        } else {
            $request->merge(['active'=>'1']);
            $subscription = Subscription::create($request->except('bill'));
            if ($request->hasFile('bill')) {
                $thumbnail = $request->bill;
                $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move(public_path('/uploads/subscriptions/main/'), $filename);
                $subscription->bill = 'uploads/subscriptions/main/' . $filename;
                $subscription->save();
            }
            $course = Course::find($request->course_id);
            $subscription->update(['paid' => $course->price_with_discount]);

            /** add instructor prectange if exist */
            // $instructors = CourseInstructor::where('course_id', $course->id)->get();
            // foreach ($instructors as $item) {
            //     if ($item->prectange) {
            //         $instructor = Instructor::find($item->instructor_id);
            //         $instructor_profit = ($course->price / 100) * $item->prectange;
            //         $instructor->current_balance = $instructor->current_balance + $instructor_profit;
            //         $instructor->total_balance = $instructor->total_balance + $instructor_profit;
            //         $instructor->save();
            //     }
            // }

            foreach ($course->instructors as $instructor) {
                if($instructor->pivot->course_prectange){
                $prectange = ($subscription->paid  * $instructor->pivot->course_prectange)/100;
                $instructor->current_balance = $instructor->current_balance + $prectange;
                $instructor->total_balance = $instructor->total_balance + $prectange;
                $instructor->save();
                }
            }

            Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
            return redirect()->route('admin.subscriptions.index');
        }
    }

    public function show($id)
    {
        $subscription = Subscription::find($id);
        if ($subscription)
            return $this->okApiResponse(new SubscriptionResource($subscription), __('Subscription loades successfully'));
        else
            return $this->notFoundApiResponse([], __('Data Not Found'));

    }

    public function edit($id)
    {
        $data['row'] = Subscription::find($id);
        $data['route'] = $this->route;
        $data['title'] = 'edit Subscription';
        return view($this->view . '.edit', $data);
    }
    public function update(SubscriptionRequest $request)
    {
        $subscription = Subscription::find($request->id);
        $subscription->update($request->except('bill'));
        if ($request->hasFile('bill')) {
            $thumbnail = $request->bill;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/subscriptions/main/'), $filename);
            $subscription->bill = 'uploads/subscriptions/main/' . $filename;
            $subscription->save();
        }
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.countries.index');
    }

    public function destroy(Request $request)
    {
        $subscription = Subscription::find($request->id);
        if ($subscription)
            $subscription->delete();
        Toastr::success(__('admin.msg_delete_successfully'), __('admin.msg_success'));
        return redirect()->route($this->route . '.index');
    }


    public function changeStatus(Request $request)
    {
        $item = $request->type::find($request->id);
        $item->active = $request->status;
        $item->save();
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function changerecommened(Request $request)
    {

        $item = $request->type::find($request->id);
        $item->recommened = $request->recommened;
        $item->save();
        return response()->json(['success' => 'Recommened change successfully.']);
    }
}
