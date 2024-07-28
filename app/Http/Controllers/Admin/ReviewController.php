<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\TrackResource;
use App\Http\Requests\TrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use Toastr;
use Validator;


class ReviewController extends Controller
{
    use ApiResponse, FileUploader;


    
    public function __construct()
    {
        $this->title = trans('admin.reviews.title');
        $this->route = 'admin.reviews';
        $this->view = 'admin.reviews';
        $this->path = 'reviews';
        $this->access = 'reviews';
        $this->middleware('permission:reviews-create', ['only' => ['create','store']]);
        $this->middleware('permission:reviews-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:reviews-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:reviews-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Review::where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->paginate(10);
        return view($this->view.'.index', $data);
    }

    public function create(Review $review)
    {
        $data['title'] = trans('admin.reviews.add');
        $data['route'] = $this->route;
        return view($this->view .'.create',$data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment'=> 'required',
            'name' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->active)
        $request->merge (['active'=>'1']) ;
        $review = Review::create($request->all());
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.reviews.index');
    }


    public function show($id){
        $review = Review::find($id);
        if($review)
        return $this->okApiResponse(new TrackResource($review), __('Track loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function edit($id)
    {   
        $data['row'] = Review::find($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.reviews.edit');
        return view($this->view.'.edit',$data);
    }

    public function update(Request $request,Review $review)
    {
        $validator = Validator::make($request->all(), [
            'comment'=> 'required',
            'name' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->active)
        $request->merge (['active'=>'1']) ;
    else
    $request->merge (['active'=>'0']) ;

        $review->update($request->all());
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.reviews.index');    }

    public function destroy (Request $request)
    {
        $review = Review::find($request->id);
        if ($review)
            $review->delete();

            Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
            return redirect()->route($this->route.'.index');
    }
}
