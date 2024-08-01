@extends('admin.layouts.master')
@section('title', trans('edit_staff') )

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                {{ Breadcrumbs::render('update-students',$row) }}

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
                    <input type="hidden" name="id" value="{{$row->id}}">

                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="form-label" for="first_name"> {{ __('admin.students.field_first_name') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $row->first_name }}" required>

                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="phone">{{ __('admin.students.phone_number') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{ $row->phone }}">
                                    <P class="text-info"> 098-329-0745 </P>           

                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="password">{{ __('admin.students.field_password') }} <span>*</span></label>
                                    <input type="password" class="form-control" name="password" id="password">

                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label class="form-label" for="track_id">{{ __('admin.students.track') }} <span>*</span></label>
                                    <select class="form-control select2" name="track_ids[]" id="track_id" multiple>
                                        <option value="" disabled hidden>Please select an Track</option>

                                        @foreach($tracks as $track)
                                        <option value="{{ $track->id }}" @if(in_array($track->id,$row->tracks()->pluck('track_id')->ToArray())) selected @endif> {{ $track->name }}</option>

                                        @endforeach
                                    </select>

                                    @error('track_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">{{ __('admin.students.qualifications') }} <span class="form-label-description"></span></label>
                                    <input type="text" class="form-control" name="qualifications" value="{{ $row->qualifications }}">
                                </div>



                            </div>
                            <div class="col-md-6">



                                <div class="mb-3">
                                    <label class="form-label" for="last_name"> {{ __('admin.students.field_last_name') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $row->last_name }}" required>

                                    @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="email">{{ __('admin.students.field_email') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ $row->email }}" required>

                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password">{{ __('admin.students.field_password_confirmation') }} <span>*</span></label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">

                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label class="form-label" for="country_id">{{ __('admin.students.country_id') }} <span>*</span></label>
                                    <select class="form-control select2" name="country_id" id="country_id">
                                        <option value="">{{ __('select') }}</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}" @if($row->country_id == $country->id) selected="selected" @endif> {{ $country->name }}</option>

                                        @endforeach
                                    </select>

                                    @error('country_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="about_student">{{ __('admin.students.degree') }} <span>*</span></label>
                                    <select class="select2 form-control" name="about_student" id="about_student" required>
                                        <option value="">{{ __('select') }}</option>
                                        <option value="0" @if($row->about_student == 0) selected="selected" @endif>{{ __('admin.instructors.student') }}</option>
                                        <option value="1" @if($row->about_student == 1) selected="selected" @endif>{{ __('admin.instructors.Bachelor') }}</option>
                                        <option value="2" @if($row->about_student == 2) selected="selected" @endif>{{ __('admin.instructors.Graduated') }}</option>
                                        <option value="3" @if($row->about_student == 3) selected="selected" @endif>{{ __('admin.instructors.Doctorate') }}</option>
                                        <option value="4" @if($row->about_student == 4) selected="selected" @endif>{{ __('admin.instructors.Master') }}</option>


                                    </select>
                                    @error('about_student')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                            </div>


                            <div class="mb-3">


                                <label class="form-label" for="logo">{{ __('admin.students.field_photo') }}</label>
                                <input type="file" class="form-control" name="image" id="logo">

                                @if(isset($row->image))
                                <img src="{{ asset($row->imageFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                                <div class="clearfix"></div>
                                @endif
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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