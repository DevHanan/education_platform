@extends('admin.layouts.master')
@section('title', $title)

@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('add-faculities') }}

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
              <div class="col-md-12">

                <div class="mb-3">
                  <label class="form-label" for="name"> {{ __('admin.faculities.name') }} <span>*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="name"> {{ __('admin.faculities.min_degree') }} <span>*</span></label>
                  <input type="number" class="form-control" name="min_accept_degree" id="min_accept_degree" value="{{ old('min_accept_degree') }}" required>

                  @error('min_accept_degree')
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

                <div class="form-group ">
                  <label class="form-label" for="gender" class="form-label">{{ __('admin.faculities.gender') }}</label>
                  <div>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" value="male" type="radio" name="gender" checked>
                      <span class="form-check-label"> {{ __('admin.faculities.male')}}</span>
                    </label>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" value="female" type="radio" name="gender">
                      <span class="form-check-label"> {{ __('admin.faculities.female' )}}</span>
                    </label>

                    <label class="form-check form-check-inline">
                      <input class="form-check-input" value="both" type="radio" name="gender">
                      <span class="form-check-label"> {{ __('admin.faculities.both' )}}</span>
                    </label>

                  </div>
                </div>






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