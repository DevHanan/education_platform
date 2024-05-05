@extends('admin.layouts.master')
@section('title', trans('module_staff'))

@section('content')
<style>
  .hidden {
    display: none;
  }

  h1 {
    font-family: Arial;
    font-size: 20px;
    color: #666;
  }

  .data-table {
    border: solid 1px #eee;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
    width: 100%;
  }

  .data-table tbody td {
    border: solid 1px #eee;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
  }

  .data-table-highlight tbody tr:hover {
    background-color: #f8f8f8;
  }

  .data-table-horizontal tbody td {
    border-left: none;
    border-right: none;
  }

  .top-buffer {
    margin-top: 20px;
  }

  .pull-right {
    float: right;
  }

  .main {
    width: 90%;
  }
</style>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      @if( app()->getLocale() == 'ar')
      <style>
        .breadcrumb-item+.breadcrumb-item::before {
          float: right;
          padding-left: var(--tblr-breadcrumb-item-padding-x);
        }
      </style>
      @endif

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">{{ __('admin.home') }}</a></li>
          <li class="breadcrumb-item"><a href="{{url('/admin/courses')}}">{{ optional($level->course)->name }}</a></li>
          <li class="breadcrumb-item"><a href="{{url('/admin/courses/'.optional($level->course)->id.'/levels')}}">{{ $level->name }}</a></li>
          <li class="breadcrumb-item active" aria-current="page"> @if(isset($title)) {{ $title }} @endif </li>
        </ol>
      </nav>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <div class="card-header">
            <div class="card-block">
              <a href="{{ route($route.'.index',$level->id) }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

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

        <form autocomplete="off" class="card" novalidate action="{{ route($route.'.store',$level->id) }}" method="post" enctype="multipart/form-data">
          @csrf


          <div class="card-body">
            <div class="row ">
              <div class="col-md-6">

                <div class="mb-3">
                  <label class="form-label" for="title"> {{ __('admin.lectures.field_title') }} <span>*</span></label>
                  <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                  @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="type">{{ __('admin.lectures.type') }} <span>*</span></label>
                  <select class="form-control" name="type" id="typeSelect" required>
                    <option value="">{{ __('select') }}</option>
                    <option value="1"> {{ __('admin.lectures.viedo')}}</option>
                    <option value="2"> {{ __('admin.lectures.metting')}}</option>

                  </select>

                  @error('type')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3 hidden" id="provider_div" >
                  <label class="form-label" for="provider">{{ __('admin.lectures.provider') }} <span>*</span></label>
                  <select class="form-control" name="provider" id="provideSelect" required>
                    <option value="">{{ __('select') }}</option>
                    <option value="1"> {{ __('admin.lectures.viedo')}}</option>
                    <option value="2"> {{ __('admin.lectures.Youtube')}}</option>

                  </select>

                  @error('provider')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3 hidden" id="appointment_div" style="padding-top: 18px;">
                  <label class="form-label" for="appointment"> {{ __('admin.lectures.appointment') }} <span>*</span></label>
                  <input type="text" class="form-control" name="appointment" id="appointment" value="{{ old('appointment') }}" required>

                  @error('appointment')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


              </div>
              <div class="col-md-6">
              <div class="mb-3">
                  <label class="form-label" for="period"> {{ __('admin.lectures.field_period') }} <span>*</span></label>
                  <input type="text" class="form-control" name="period" id="period" value="{{ old('period') }}" required>

                  @error('period')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <input type="hidden" value="{{ $level->id}}" name="level_id">
                <input type="hidden" value="{{ optional($level->course)->id}}" name="course_id">


                <div class="mb-3">
                  <label class="form-label" for="title"> {{ __('admin.lectures.opened_free') }} <span>*</span></label>
                  <div class="form-check form-switch md-3" style="margin:10px">

                    <input class="form-check-input form-control" type="checkbox" style="float: right;" role="switch" id="flexSwitchCheckDefault" name="free">
                  </div>
                </div>


               
                <div class="mb-3 hidden" id="link_div" style="padding-top: 18px;">
                  <label class="form-label" for="link"> {{ __('admin.lectures.link') }} <span>*</span></label>
                  <input type="text" class="form-control" name="link" id="link" value="{{ old('link') }}" required>

                  @error('link')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


              </div>

              <div class="mb-3">
                <label class="form-label">{{ __('admin.lectures.short_description') }} <span class="form-label-description"></span></label>
                <textarea class="form-control" name="short_description" rows="3" placeholder="Content.."></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">{{ __('admin.lectures.goals') }} <span class="form-label-description"></span></label>
                <textarea class="form-control" name="goals" rows="3" placeholder="Content.."></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">{{ __('admin.lectures.descriptions') }} <span class="form-label-description"></span></label>
                <textarea class="form-control" name="description" rows="3" placeholder="Content.."></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">{{ __('admin.lectures.conclusion') }} <span class="form-label-description"></span></label>
                <textarea class="form-control" name="conclusion" rows="3" placeholder="Content.."></textarea>
              </div>

              <div class="card" style="margin-top: 20px;">
                <div class="card-header">
                  <h3> إضافة صور </h3>
                </div>
                <div class="card-body">

                  <div class="main">
                    <table id="data" class=" table data-table data-table-horizontal data-table-highlight">

                      <tbody>
                        <tr>
                          <td><input type="text" name="imgTitle[]" placeholder="عنوان الصورة" /></td>
                          <td><input type="file" name="img[]" /></td>
                          <td><a type="button" value="Delete" onclick="deleteRow(this)">
                              <i class="fas fa-trash-alt"></i>
                            </a></td>
                        </tr>

                    </table>
                    <div class="pull-right">
                      <input type="button" value="إضافة" class="top-buffer" onclick="addRow('data')" />
                    </div>
                  </div>

                </div>
              </div>

              <div class="card" style="margin-top: 20px;">
                <div class="card-header">
                  <h3> إضافة الكتب والمراجع </h3>
                </div>
                <div class="card-body">
                <div class="main">
                    <table id="data2" class=" table data-table data-table-horizontal data-table-highlight">

                      <tbody>
                        <tr>
                          <td><input type="text" name="bookTitles[]" placeholder="عنوان الكتاب" /></td>
                          <td><input type="file" name="bookFiles[]" /></td>
                          <td><input type="text" name="bookLinks[]"  placeholder="رابط الكتاب"/></td>
                          <td><a type="button" value="Delete" onclick="deleteRow2(this)">
                              <i class="fas fa-trash-alt"></i>
                            </a></td>
                        </tr>

                    </table>
                    <div class="pull-right">
                      <input type="button" value="إضافة" class="top-buffer" onclick="addRow('data2')" />
                    </div>
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
      </d iv>
    </div>
  </div>





  @endsection