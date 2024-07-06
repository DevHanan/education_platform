@extends('admin.layouts.master')
@section('title', trans('module_staff'))

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                {{ Breadcrumbs::render('add-faq-questions') }}

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
                                    <label class="form-label" class="form-label" for="question"> {{__('admin.questions.question')}} <span>*</span></label>
                                    <input type="text" class="form-control" name="question" id="title" value="{{ old('question') }}" required>

                                    @error('question')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>




                            </div>
                            <div class="col-md-6">

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



                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin.questions.answer') }} <span class="form-label-description"></span></label>
                            <textarea class="form-control" name="answer" rows="6" placeholder="Content.."></textarea>
                            @error('answer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
                        </div>
                    </div>

                    <!-- Form End -->


                </form>
            </div>
        </div>
    </div>
</div>





@endsection