<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\FileUploader;
use App\Http\Resources\CountryResource;
use App\Http\Requests\CountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Toastr;


class CountryController extends Controller
{
    use  FileUploader;


    
    public function __construct()
    {
        $this->title = trans('admin.countries.title');
        $this->route = 'admin.countries';
        $this->view = 'admin.countries';
        $this->path = 'countries';
        $this->access = 'countries';
        $this->middleware('permission:countries-create', ['only' => ['create','store']]);
        $this->middleware('permission:countries-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:countries-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:countries-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Country::where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->paginate(10);
        return view($this->view.'.index', $data);
    }

    public function create(Country $country)
    {
        $data['title'] = trans('admin.countries.add');
        $data['route'] = $this->route;
        return view($this->view .'.create',$data);
    }
    public function store(CountryRequest $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:countries,name'
        ]);   
        $country = Country::create($request->except('image'));
        if ($request->hasFile('image')) {
            $directory = 'countries';
            $attach = 'image';
            $country->image = 'uploads/countries/'.$this->uploadMedia($request, $attach, $directory);
            $country->save();
        }
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.countries.index');
    }


    public function show($id){
        $country = Country::find($id);
        if($country)
        return $this->okApiResponse(new CountryResource($country), __('Country loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function edit($id)
    {   
        $data['row'] = Country::find($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.countries.edit');
        return view($this->view.'.edit',$data);
    }

    public function update(CountryRequest $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:countries,name,' . $request->id
        ]);
        $country = Country::find($request->id);
        $country->update($request->except('image'));
        if ($request->hasFile('image')) {
            $directory = 'countries';
            $attach = 'image';
            $country->image = 'uploads/countries/'.$this->uploadMedia($request, $attach, $directory);
            $country->save();
        }
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.countries.index');    
    }

    public function destroy (Request $request)
    {
        $country = Country::find($request->id);
        if ($country)
            $country->delete();

            Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
            return redirect()->route($this->route.'.index');
    }
}
