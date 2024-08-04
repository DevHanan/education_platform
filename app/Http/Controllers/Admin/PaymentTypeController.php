<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\PaymentTypeResource;
use App\Http\Requests\PaymentTypeRequest;
use App\Http\Requests\UpdatePaymentTypeRequest;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use Toastr;


class PaymentTypeController extends Controller
{
    use ApiResponse, FileUploader;


    
    public function __construct()
    {
        $this->title = trans('admin.paymenttypes.title');
        $this->route = 'admin.payment-types';
        $this->view = 'admin.payment-types';
        $this->path = 'payment-types';
        $this->access = 'payment-types';
        $this->middleware('permission:payment-types-create', ['only' => ['create','store']]);
        $this->middleware('permission:payment-types-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:payment-types-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:payment-types-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = PaymentType::where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->paginate(10);
        return view($this->view.'.index', $data);
    }

    public function create(PaymentType $paymentType)
    {
        $data['title'] = trans('admin.paymenttypes.add');
        ;
        $data['route'] = $this->route;
        return view($this->view .'.create',$data);
    }
    public function store(Request $request)
    {
        $paymentType = PaymentType::create($request->except('image'));
        if ($request->hasFile('image')) {
            $thumbnail = $request->image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/paymentType/main/'),$filename);
            $paymentType->image ='uploads/paymentType/'.$filename;
            $paymentType->save();
        }
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.payment-types.index');
    }


    public function show($id){
        $paymentType = PaymentType::find($id);
        if($paymentType)
        return $this->okApiResponse(new PaymentTypeResource($paymentType), __('PaymentType loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function edit($id)
    {   
        $data['row'] = PaymentType::find($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.paymenttypes.edit');
        return view($this->view.'.edit',$data);
    }

    public function update(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:payment_types,name,' . $request->id
        ]);
        $paymentType = PaymentType::find($request->id);
        $paymentType->update($request->except('image'));
        if ($request->hasFile('image')) {
            $thumbnail = $request->image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/paymentType/'),$filename);
            $paymentType->image ='uploads/paymentType/'.$filename;
            $paymentType->save();
        }
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.payment-types.index');    }

    public function destroy (Request $request)
    {
        $paymentType = PaymentType::find($request->id);
        if ($paymentType)
            $paymentType->delete();

            Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
            return redirect()->route($this->route.'.index');
    }
}
