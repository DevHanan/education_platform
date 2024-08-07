@extends('admin.layouts.master')
@section('title', trans('module_staff'))

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">

                {{ Breadcrumbs::render('add-instructors') }}
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

                <form autocomplete="off" class="card" action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="form-label" for="first_name"> {{ __('admin.instructors.field_first_name') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" required>

                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="phone">{{ __('admin.instructors.phone_number') }} <span>*</span></label>
                                    <input id="inst_phone_number" name="phone" required type="tel" name="phone" value="" class="form-control w-100 mb-3 p-3 ps-5" placeholder="">
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="password">{{ __('admin.instructors.field_password') }} <span>*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                    <span class="fa password-toggle-icon eye-icon ">
                                        <i class="fa password-icon" aria-hidden="true"></i>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="type">{{ __('admin.instructors.is_employee') }} <span>*</span></label>
                                    <select class="form-control" name="is_employee" id="isemployee" required>
                                        <option value="">{{ __('select') }}</option>
                                        <option value="1"> {{ __('admin.instructors.yes')}}</option>
                                        <option value="0" selected> {{ __('admin.instructors.no')}}</option>

                                    </select>

                                    @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="track_id">{{ __('admin.instructors.track') }} <span>*</span></label>
                                    <select class="form-control select2" name="track_ids[]" id="track_id" multiple>
                                        <option value="" disabled hidden>Please select an Track</option>
                                        @foreach($tracks as $track)
                                        <option value="{{ $track->id }}"> {{ $track->name }}</option>

                                        @endforeach
                                    </select>

                                    @error('track_id')
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
                                        <option value="{{ $country->id }}"> {{ $country->name }}</option>

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
                                    <input type="text" class="form-control" name="paypall_account_number" id="paypall_account_number" value="{{ old('paypall_account_number') }}">


                                    @error('paypall_account_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">


                                    <label class="form-label" for="logo">{{ __('admin.instructors.field_photo') }}</label>
                                    <input type="file" class="form-control" name="image" id="logo">

                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
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

                            </div>
                            <div class="col-md-6">



                                <div class="mb-3">
                                    <label class="form-label" for="last_name"> {{ __('admin.instructors.field_last_name') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" required>

                                    @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="email">{{ __('admin.instructors.field_email') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">

                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password">{{ __('admin.instructors.field_password_confirmation') }} <span>*</span></label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                    <span class="fa password-toggle-icon eye-icon ">
                                        <i class="fa password-icon" aria-hidden="true"></i>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="salary">{{ __('admin.instructors.salary') }} <span>*</span></label>
                                    <input type="salary" value="0" readonly class="form-control" name="salary" id="empsalary" value="{{ old('salary') }}">

                                    @error('salary')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="about_teacher">{{ __('admin.instructors.about') }} <span>*</span></label>
                                    <select class="select2 form-control" name="about_teacher" id="about_teacher">
                                        <option value="">{{ __('select') }}</option>
                                        <option value="0">{{ __('admin.instructors.student') }}</option>
                                        <option value="1">{{ __('admin.instructors.Bachelor') }}</option>
                                        <option value="2 ">{{ __('admin.instructors.Graduated') }}</option>
                                        <option value="3">{{ __('admin.instructors.Doctorate') }}</option>
                                        <option value="4">{{ __('admin.instructors.Master') }}</option>

                                    </select>
                                    @error('about_teacher')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="bank_account">{{ __('admin.instructors.bank_account') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="bank_account" id="bank_account" value="{{ old('bank_account') }}">


                                    @error('bank_account')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="cash_wallet_number">{{ __('admin.instructors.cash_wallet_number') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="cash_wallet_number" id="cash_wallet_number" value="{{ old('cash_wallet_number') }}">


                                    @error('cash_wallet_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>




                            </div>

                            <!-- <div class="col-md-12">
                                <label class="form-label">{{ __('admin.instructors.about') }} <span class="form-label-description"></span></label>
                                <textarea class="form-control" name="about_teacher" rows="6" placeholder="Content.."></textarea>
                            </div> -->
                            <div class="col-md-12">
                                <label class="form-label">{{ __('admin.instructors.qualifications') }} <span class="form-label-description"></span></label>
                                <textarea class="form-control" name="qualifications" rows="6" placeholder="Content.."></textarea>
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
@push('scripts')
<script>
    const phoneInputField = document.querySelector("#inst_phone_number");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
@endpush