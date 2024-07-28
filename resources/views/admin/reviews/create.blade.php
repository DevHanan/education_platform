@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
            {{ Breadcrumbs::render('add-reviews') }}
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
            <div class="md-3">

                <form class="card"  action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- Form Start -->
                        <div class="row">


                            <div class="md-3">
                                <label class="form-label" for="name"> {{__('admin.reviews.field_name')}} <span>*</span></label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="md-3">
                                <label class="form-label" for="job"> {{__('admin.reviews.field_job')}} <span>*</span></label>
                                <input type="text" class="form-control" name="job" id="job" value="{{ old('job') }}" required>

                                @error('job')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label class="form-label">{{ __('admin.reviews.field_comment') }} <span class="form-label-description"></span></label>
                                <textarea class="form-control" name="comment" rows="6" placeholder="Content.." ></textarea>
                                @error('comment')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-check form-switch md-3" style="margin:10px">
                                <label class="form-check-label form-label" for="flexSwitchCheckDefault">{{ __('admin.reviews.status') }}</label>   
                                <input class="form-check-input form-control" type="checkbox" style="float: right;" role="switch" id="flexSwitchCheckDefault" name="active">
                                </div>
                            </div>
                         





                        </div>
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