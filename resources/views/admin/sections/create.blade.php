@extends('admin.layouts.master')
@section('title', trans('module_staff'))

@section('content')


<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('add-sections',$quiz) }}

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <div class="card-header">
            <div class="card-block">
              <a href="{{ url('admin/quizzes/'.$quiz->id.'/sections') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

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

        <form autocomplete="off" class="card" novalidate action="{{ url('admin/quizzes/$quiz->id/sections' ) }}" method="post" enctype="multipart/form-data">
          @csrf

          <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
          <div class="card-body">
            <div class="row ">
              <div class="mb-3">
                <label class="form-label" for="name"> {{ __('admin.sections.field_title') }} <span>*</span></label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group col-md-12">
                <label class="form-label" for="active" class="form-label">{{ __('admin.sections.status') }}</label>
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

              <div class="mb-3">
                <label class="form-label">{{ __('admin.sections.description') }} <span class="form-label-description"></span></label>
                <textarea dir="auto" class="form-control richtext" name="description" rows="4" placeholder="Content.."></textarea>
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