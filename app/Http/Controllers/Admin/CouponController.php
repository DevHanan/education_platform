<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\CouponResource;
use App\Http\Requests\CouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use Toastr;


class CouponController extends Controller
{
    use ApiResponse, FileUploader;

    public function __construct()
    {
        $this->title = trans('admin.coupons.list');
        $this->route = 'admin.coupons';
        $this->view = 'admin.coupons';
        $this->path = 'coupons';
        $this->access = 'coupons';
        $this->middleware('permission:coupons-create', ['only' => ['create','store']]);
        $this->middleware('permission:coupons-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:coupons-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:coupons-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] =Coupon::where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->get();
        return view($this->view.'.index', $data);
    }

    public function create(Coupon $coupon)
    {
        $data['title'] = trans('admin.coupons.add');
        $data['route'] = $this->route;
        return view($this->view .'.create',$data);
    }

    public function store(CouponRequest $request)
    {
        $coupon = Coupon::create($request->all());
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.coupons.index');
     
    }

   

    public function edit($id)
    {   
        $data['row'] = Coupon::find($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.coupons.edit');
        return view($this->view.'.edit',$data);
    }

    public function update(Request $request)
    {
        $this->validate(request(), [
            'code' => 'required|string|unique:coupons,code,' . $request->id,
            'discount' => 'required',
            'track_id' => 'required|exists:tracks,id',
            'course_id' => 'required|exists:courses,id'
        ]);
        $coupon = Coupon::find($request->id);
        $coupon->update($request->all());
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.coupons.index');     }

    public function destroy(Request $request)
    {
       $coupon =  Coupon::find($request->id);
       if($coupon)
       $coupon->delete();
       Toastr::success(__('admin.msg_delete_successfully'), __('admin.msg_success'));
       return redirect()->route($this->route.'.index');    }
}
