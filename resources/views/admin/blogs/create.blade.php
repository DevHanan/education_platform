@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('add-blogs') }}
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

                <form class="card"  action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- Form Start -->


                        <div class="col-md-12">
                            <label class="form-label" for="title"> {{__('admin.blogs.title')}} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label">{{ __('admin.blogs.description') }} <span class="form-label-description"></span></label>
                            <textarea dir="auto" class="form-control richtext" name="description" rows="4" placeholder="Content.." ></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('admin.blogs.more_details') }} <span class="form-label-description"></span></label>
                            <textarea dir="auto" class="form-control richtext" name="more_details" rows="4" placeholder="Content.."></textarea>
                        </div>
                        <hr />

                        <div class="form-group col-md-6">


                            <label for="logo">{{ __('admin.blogs.field_photo') }}</label>
                            <input type="file" class="form-control" name="image" id="logo" required>

                            @error('image')
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