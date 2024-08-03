@extends('admin.layouts.master')
@section('title', trans('edit_staff') )

@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        {{ Breadcrumbs::render('update-instructor-profile') }}

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <div class="card-header">
            <div class="card-block">
              <a href="{{ url('instructor/dashboard') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

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


        <form class="card" action="{{ url('instructor/profile')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$row->id}}">

          <div class="card-body">
            <div class="row ">
              <div class="col-md-6">

                <div class="mb-3">
                  <label class="form-label" for="first_name"> {{ __('admin.instructors.field_first_name') }} <span>*</span></label>
                  <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $row->first_name }}" required>

                  @error('first_name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label" for="phone">{{ __('admin.instructors.phone_number') }} <span>*</span></label>
                  <input type="text" class="form-control" name="phone" id="phone" value="{{ $row->phone }}">

                  @error('phone')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="password">{{ __('admin.instructors.field_password') }} <span>*</span></label>
                  <input type="password" class="form-control" name="password" id="password">

                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="type">{{ __('admin.instructors.is_employee') }} <span>*</span></label>
                  @if($row->employee == 1)
                  <label class="form-label" for="type">{{ __('admin.instructors.yes')}} </label>



                  <div class="mb-3">
                    <label class="form-label" for="salary">{{ __('admin.instructors.salary') }}  <span>{{ $row->salary }}</span></label>

                  </div>



                  @else
                  <label class="form-label" for="type">{{ __('admin.instructors.no')}} </label>
                  @endif
                </div>





                <div class="mb-3">
                  <label class="form-label" for="about_teacher">{{ __('admin.instructors.about') }} <span>*</span></label>
                  <select class="select2 form-control" name="about_teacher" id="about_teacher">
                    <option value="">{{ __('select') }}</option>
                    <option value="0" @if($row->about_teacher == 0) selected="selected" @endif>{{ __('admin.instructors.student') }}</option>
                    <option value="1" @if($row->about_teacher == 1) selected="selected" @endif>{{ __('admin.instructors.Bachelor') }}</option>
                    <option value="2" @if($row->about_teacher == 2) selected="selected" @endif>{{ __('admin.instructors.Graduated') }}</option>
                    <option value="3" @if($row->about_teacher == 3) selected="selected" @endif>{{ __('admin.instructors.Doctorate') }}</option>
                    <option value="4" @if($row->about_teacher == 4) selected="selected" @endif>{{ __('admin.instructors.Master') }}</option>


                  </select>
                  @error('about_teacher')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>



                <div class="mb-3">
                  <label class="form-label" for="country_id">{{ __('admin.students.country_id') }} <span>*</span></label>
                  <select class="form-control select2" name="country_id" id="country_id" required>
                    <option value="">{{ __('select') }}</option>
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}" @if($row->country_id == $country->id) selected @endif> {{ $country->name }}</option>

                    @endforeach
                  </select>

                  @error('country_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="paypall_account_number">{{ __('admin.instructors.paypall_account_number') }} <span>*</span></label>
                  <input type="text" class="form-control" name="paypall_account_number" id="paypall_account_number" value="{{ old('paypall_account_number',$row) }}">


                  @error('paypall_account_number')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


              </div>
              <div class="col-md-6">



                <div class="mb-3">
                  <label class="form-label" for="last_name"> {{ __('admin.instructors.field_last_name') }} <span>*</span></label>
                  <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $row->last_name }}" required>

                  @error('last_name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label" for="email">{{ __('admin.instructors.field_email') }} <span>*</span></label>
                  <input type="text" class="form-control" name="email" id="email" value="{{ $row->email }}" required>

                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="password">{{ __('admin.instructors.field_password_confirmation') }} <span>*</span></label>
                  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">

                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="track_id">{{ __('admin.instructors.track') }} <span>*</span></label>
                  <select class="form-control select2" name="track_ids[]" id="track_id" multiple>
                    <option value="">{{ __('select') }}</option>
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
                  <label class="form-label" for="bank_account">{{ __('admin.instructors.bank_account') }} <span>*</span></label>
                  <input type="text" class="form-control" name="bank_account" id="bank_account" value="{{ $row->bank_account }}">
                  @error('bank_account')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="cash_wallet_number">{{ __('admin.instructors.cash_wallet_number') }} <span>*</span></label>
                  <input type="text" class="form-control" name="cash_wallet_number" id="cash_wallet_number" value="{{ old('cash_wallet_number',$row) }}">


                  @error('cash_wallet_number')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>





              </div>




              <div class="col-md-12">
                <label class="form-label">{{ __('admin.instructors.qualifications') }} <span class="form-label-description"></span></label>
                <textarea class="form-control" name="qualifications" rows="6" placeholder="Content..">{{ $row->qualifications }}</textarea>
              </div>

              <div class="mb-3">


                <label class="form-label" for="logo">{{ __('admin.instructors.field_cv') }}</label>
                <input type="file" class="form-control" name="cv" id="cv">

                @error('cv')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="logo">{{ __('admin.instructors.field_photo') }}</label>
                <input type="file" class="form-control" name="image" id="logo">

                @if(isset($row->image))
                <img src="{{ $row->imageFullPath }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
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