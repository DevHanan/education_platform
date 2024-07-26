@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
            {{ Breadcrumbs::render('update-course-types',$row) }}

            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">

                    <div class="card-header">
                        <div class="card-block">
                            <a href="{{ route('admin.course-types.index') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

                            <a href="{{ route('admin.course-types.create') }}" class="btn btn-rounded btn-info">{{ __('admin.btn_refresh') }}</a>
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


      <form class="card" action="{{ route('admin.course-types.update',$coursetype) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="card-body">
          <!-- Form Start -->
          <fieldset class="row scheduler-border">


            <div class="form-group col-md-12">
             <label class="form-label" for="name"> {{__('admin.coursetypes.name')}} <span>*</span></label>
              <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$coursetype) }}" required>

              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <input type="hidden" class="form-control" name="id"  value="{{ old('id',$coursetype) }}" required>




            <div class="form-group col-md-12">
             <label class="form-label" for="active" class="form-label">{{ __('admin.coursetypes.status') }}</label>
              <div>
               <label class="form-check form-check-inline">
                  <input class="form-check-input" value="1" @if($coursetype->active ==1) checked="checked" @endif type="radio" name="active" >
                  <span class="form-check-label"> {{ __('admin.active')}}</span>
                </label>
               <label  class="form-check form-check-inline">
                  <input class="form-check-input" value="0" @if($coursetype->active == 0) checked="checked" @endif type="radio" name="active" >
                  <span class="form-check-label"> {{ __('admin.inactive' )}}</span>
                </label>

              </div>
            </div>


          </fieldset>


          <!-- Form End -->
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
        </div>
      </form>
    </div>
  </div>
  <!-- [ Card ] end -->
</div>
</div>
<!-- [ Main Content ] end -->


@endsection