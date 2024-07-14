@extends('admin.layouts.master')
@section('title', $title)

@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('add-subjects') }}

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <div class="card-header">
            <div class="card-block">
              <a href="{{ url('admin/subjects?classroom='.request()->input('classroom')) }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

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

        <form autocomplete="off" class="card" action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
          @csrf


          <div class="card-body">
            <div class="row ">
              <div class="col-md-12">

                <div class="mb-3">
                  <label class="form-label" for="name"> {{ __('admin.subjects.name') }} <span>*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="name"> {{ __('admin.subjects.degree') }} <span>*</span></label>
                  <input type="number" class="form-control" name="degree" id="degree" value="100" required>

                  @error('degree')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="track_id">{{ __('admin.subjects.terms') }} <span>*</span></label>
                  <select class="select2 form-control" name="terms[]" id="terms" required multiple>
                    <option value="" disabled hidden>{{ __('select') }}</option>
                    <option value="1"> {{ __('admin.subjects.term1') }}</option>
                    <option value="2"> {{ __('admin.subjects.term2') }}</option>
                    <option value="3"> {{ __('admin.subjects.term3') }}</option>
                  </select>

                  @error('terms')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
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

                <input type="hidden" name="classroom" value="{{request()->input('classroom')}}">






              </div>



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