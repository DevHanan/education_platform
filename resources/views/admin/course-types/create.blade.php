@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
            {{ Breadcrumbs::render('add-course-types') }}

            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">

                    <div class="card-header">
                        <div class="card-block">
                            <a href="{{ route('admin.course-types.index') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

                            <!-- <a href="{{ route('admin.course-types.create') }}" class="btn btn-rounded btn-info">{{ __('admin.btn_refresh') }}</a> -->
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

                <form class="card"  action="{{ route('admin.course-types.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- Form Start -->


                        <div class="col-md-12">
                            <label class="form-label" for="name"> {{__('admin.coursetypes.name')}} <span>*</span></label>
                            <input  required type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" >

                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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