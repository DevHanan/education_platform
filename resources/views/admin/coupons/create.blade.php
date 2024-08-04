@extends('admin.layouts.master')
@section('title', trans('module_staff'))

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                {{ Breadcrumbs::render('add-coupons') }}

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

                <form autocomplete="off" class="card"  action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">

                                <div class="col-md-12">
                                    <label class="form-label" class="form-label" for="code"> {{__('admin.coupons.code')}} <span>*</span></label>
                                    <input type="text" class="form-control" name="code" id="title" value="{{ old('code') }}" required>

                                    @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="track_id">{{ __('admin.coupons.track') }} <span>*</span></label>
                                    <select class="form-control" name="track_id" id="track_id" required>
                                        <option value="">{{ __('select') }}</option>
                                        @foreach($tracks as $track)
                                        <option value="{{$track->id}}">{{ $track->name }}</option>
                                        @endforeach

                                    </select>

                                    @error('track_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label" class="form-label" for="start_date"> {{__('admin.coupons.start_date')}} <span>*</span></label>
                                    <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}">

                                    @error('start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label class="form-label" class="form-label" for="discount"> {{__('admin.coupons.discount')}} <span>*</span></label>
                                    <input type="number" class="form-control" name="discount" id="title" value="0" required>

                                    @error('discount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>




                                <div class="mb-3">
                                    <label class="form-label" for="courses">{{ __('admin.subscriptions.field_course') }} <span>*</span></label>
                                    <select class="form-control" name="course_id" id="courses" required>
                                        <option value="">{{ __('select') }}</option>

                                    </select>

                                    @error('course_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" class="form-label" for="end_date"> {{__('admin.coupons.end_date')}} <span>*</span></label>
                                    <input type="date" class="form-control"  name="end_date" id="end_date" value="{{ old('end_date') }}">

                                    @error('end_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="form-label" for="active" class="form-label">{{ __('admin.select_status') }}</label>
                                <div>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" value="1" type="radio" name="active" checked>
                                        <span class="form-check-label"> {{ __('admin.active')}}</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" value="0" type="radio" name="active">
                                        <span class="form-check-label"> {{ __('admin.inactive' )}}</span>
                                    </label>

                                </div>
                            </div>









                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
                            </div>
                        </div>


                    </div>



                    <!-- Form End -->


                </form>
            </div>
        </div>
    </div>
</div>






@endsection