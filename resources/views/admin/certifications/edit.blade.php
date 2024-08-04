@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('add-externalCertifications') }}
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">

                    <div class="card-header">
                        <div class="card-block">
                            <a href="{{ route($route.'.index') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-md-12">

                <form class="card"  action="{{ route($route.'.update',$row) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="id" value="{{$row->id}}">
                    <div class="row card-body">
                        <!-- Form Start -->


                        <div class=" form-group col-md-6">
                            <label class="form-label" for="name"> {{__('admin.certifications.name')}} <span>*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$row) }}" required>

                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class=" form-group col-md-6">
                            <label class="form-label" for="active" class="form-label">{{ __('admin.certifications.Status') }}</label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" value="1" @if($row->active ==1) checked="checked" @endif type="radio" name="active" checked>
                                <span class="form-check-label"> {{ __('admin.active')}}</span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" value="0" @if($row->active ==0) checked="checked" @endif type="radio" name="active">
                                <span class="form-check-label"> {{ __('admin.inactive' )}}</span>
                            </label>


                        </div>


                        <div class="form-group col-md-6">
                            <label class="form-label" for="track_id">{{__('admin.certifications.track')}} <span>*</span></label>
                            <select class="form-control select2" name="track_id" id="track_id">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $tracks as $track )
                                <option value="{{ $track->id }}" @if($row->track_id ==$track->id) selected @endif>{{ $track->name }}</option>
                                @endforeach
                            </select>

                            @error('track_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label" for="courses">{{__('admin.certifications.courses')}} <span>*</span></label>
                            <select class="form-control select2" name="course_id" id="courses" required>
                                <option value="{{$row->course_id}}">{{ optional($row->course)->name}}</option>


                            </select>

                            @error('course_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">


                            <label for="logo">{{__('admin.certifications.file')}}</label>
                            <input type="file" class="form-control" name="file" id="logo">

                            @if(isset($row->file))
                            <a href="{{asset($row->FileFullPath)}}" style="width:40px" target="_blank">
                                عرض النموذج
                            </a>
                            @endif
                            @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
<!-- 
                        <div class="form-group col-md-6">


                            <label for="logo">{{__('admin.certifications.image')}}</label>
                            <input type="file" class="form-control" name="image" id="image">
                            @if(isset($row->image))
                            <img src="{{ $row->imageFullPath }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                            <div class="clearfix"></div>
                            @endif
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> -->

                        <!-- Form End -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection