@extends('admin.layouts.master')
@section('title', trans('edit_staff') )

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                {{ Breadcrumbs::render('update-coupons',$row) }}

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


                <form class="card" action="{{ route($route.'.update', [$row->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">

                                <div class="col-md-12">
                                    <label class="form-label" class="form-label" for="code"> {{__('admin.coupons.code')}} <span>*</span></label>
                                    <input type="text" class="form-control" name="code" id="title" value="{{$row->code }}" required>

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
                                        <option value="{{$track->id}}" @if($row->track_id == $track->id)  selected="selected" @endif>{{ $track->name }}</option>
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
                                    <input type="date" class="form-control" name="start_date" id="title" value="{{ $row->start_date }}">

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
                                    <input type="number" class="form-control" name="discount" id="title" value="{{ $row->discount }}" required>

                                    @error('discount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="course_id">{{ __('admin.subscriptions.field_course') }} <span>*</span></label>
                                    <select class="form-control" name="course_id" id="courses" required>
                                        <option value="{{ $row->course_id }}"  selected="selected" > {{ optional($row->course)->name }}</option>
                                    </select>

                                    @error('course_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" class="form-label" for="end_date"> {{__('admin.coupons.end_date')}} <span>*</span></label>
                                    <input type="date" class="form-control" name="end_date" id="title" value="{{ $row->end_date }}">

                                    @error('end_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                           

                             




                                <input type="hidden" value="{{$row->id}}" name="id">


                              



                            </div>



                        </div>
                        <div class="form-group ">
                                    <label class="form-label" for="active" class="form-label">{{ __('admin.select_status') }}</label>
                                    <div>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" value="1" @if($row->active == 1) checked="checked" @endif type="radio" name="active">
                                            <span class="form-check-label"> {{ __('admin.active')}}</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" value="0"   @if($row->active == 0) checked="checked" @endif type="radio" name="active">
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



                </form>
            </div>

        </div>
    </div>
</div>


@endsection