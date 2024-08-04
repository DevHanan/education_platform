@extends('admin.layouts.master')
@section('title', $title)

@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('add-courses') }}

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

                <div class="mb-3">
                  <label class="form-label" for="name"> {{ __('admin.courses.name') }} <span>*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">

                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="price"> {{ __('admin.courses.price') }} <span>*</span></label>
                  <input type="number"  min="0" class="form-control" name="price" id="price" value="0"  >

                  @error('price')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="period"> {{ __('admin.courses.period') }} <span>*</span></label>
                  <input type="number"  min="0" class="form-control" name="period" id="period" value="{{ old('period') }}" >

                  @error('period')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label" for="course_type_id">{{ __('admin.courses.course_type') }} <span>*</span></label>
                  <select class="select2 form-control" name="course_type_id" id="course_type_id" >
                    <option value="">{{ __('select') }}</option>
                    @foreach($courseTypes as $type)
                    <option value="{{ $type->id }}"> {{ $type->name }}</option>

                    @endforeach
                  </select>

                  @error('course_type_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>



                <div class="mb-3">
                  <label class="form-label" for="published_at">{{ __('admin.courses.field_published_at') }} <span>*</span></label>
                  <input type="date" class="form-control" name="published_at" id="published_at" value="<?php echo date('Y-m-d');?>" >

                  @error('published_at')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="start_date">{{ __('admin.courses.start_date') }} <span>*</span></label>
                  <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}">

                  @error('start_date')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="end_date">{{ __('admin.courses.end_date') }} <span>*</span></label>
                  <input type="date" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}" >

                  @error('end_date')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="promo_url"> {{ __('admin.courses.promo_url') }} <span>*</span></label>
                  <input type="text" class="form-control" name="promo_url" id="promo_url" value="{{ old('promo_url') }}" >

                  @error('promo_url')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

              </div>
              <div class="col-md-6">

                <div class=" row mb-3" style="margin-top:10px;">
                  <div class="col-md-6">
                    <label class="form-label" for="title"> {{ __('admin.select_status') }} <span>*</span></label>
                    <div class="form-check form-switch md-3" style="margin:10px">

                      <input class="form-check-input form-control" type="checkbox" style="float: right;" role="switch" id="flexSwitchCheckDefault" name="active">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label" for="title"> {{ __('admin.select_recommend') }} <span>*</span></label>
                    <div class="form-check form-switch md-3" style="margin:10px">

                      <input class="form-check-input form-control" type="checkbox" style="float: right;" role="switch" id="flexSwitchCheckDefault" name="recommened">
                    </div>
                  </div>
                </div>



                <div class="mb-3">
                  <label class="form-label" for="price_with_discount"> {{ __('admin.courses.price_with_discount') }} <span>*</span></label>
                  <input type="number"  min="0" class="form-control" name="price_with_discount" id="price_with_discount" value="0" >

                  @error('price_with_discount')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label" for="period_type">{{ __('admin.courses.period_type') }} <span>*</span></label>
                  <select class="form-control" name="period_type" id="period_type" >
                    <option value="">{{ __('select') }}</option>
                    <option value="1"> {{ __('admin.levels.month') }}</option>
                    <option value="2"> {{ __('admin.levels.day') }}</option>
                    <option value="3"> {{ __('admin.levels.hour') }}</option>
                  </select>

                  @error('period_type')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="difficulty_level">{{ __('admin.courses.difficulty_level') }} <span>*</span></label>
                  <select class="select2 form-control" name="difficulty_level" id="difficulty_level" >
                    <option value="">{{ __('select') }}</option>
                    <option value="0">{{ __('admin.courses.beginner') }}</option>
                    <option value="1">{{ __('admin.courses.intermediate') }}</option>
                    <option value="2 ">{{ __('admin.courses.advanced') }}</option>
                    <option value="3">{{ __('admin.courses.all') }}</option>

                  </select>

                  @error('difficulty_level')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="track_id">{{ __('admin.courses.track') }} <span>*</span></label>
                  <select class="select2 form-control" name="track_ids[]" id="track_id"  multiple>
                    <option value=""  disabled hidden>{{ __('select') }}</option>
                    @foreach($tracks as $track)
                    <option value="{{ $track->id }}"> {{ $track->name }}</option>

                    @endforeach
                  </select>

                  @error('track_ids')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="seat_number"> {{ __('admin.courses.seat_number') }} <span>*</span></label>
                  <input type="number"  min="0" class="form-control" name="seat_number" id="seat_number" value="{{ old('seat_number') }}" >

                  @error('seat_number')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>




                <div class="mb-3">
                  <label class="form-label" for="provider">{{ __('admin.courses.provider') }} <span>*</span></label>
                  <select class="form-control" name="provider" id="provideSelect">
                    <option value="">{{ __('select') }}</option>
                    <option value="1"> {{ __('admin.courses.viemo')}}</option>
                    <option value="2"> {{ __('admin.courses.Youtube')}}</option>

                  </select>
                </div>


                <div class="col-md-6">
                    <label class="form-label" for="title"> {{ __('admin.select_manual_review') }} <span>*</span></label>
                    <div class="form-check form-switch md-3" style="margin:10px">

                      <input class="form-check-input form-control" type="checkbox" style="float: right;" role="switch"  name="manual_review">
                    </div>
                  </div>
                <div class="mb-3">
                  <label class="form-label" for="seat_number"> {{ __('admin.courses.manual_review') }} <span>*</span></label>
                  <input type="number"  max="5" class="form-control" name="manual_review_val" id="manual_review_val" value="{{ old('manual_review_val') }}">

                  @error('manual_review_val')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>






              </div>
              <div class="mb-3">
                <label class="form-label">{{ __('admin.courses.descriptions') }} <span class="form-label-description"></span></label>
                <textarea dir="auto" class="form-control richtext" name="description" rows="4" placeholder="Content.."></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">{{ __('admin.courses.directedTo') }} <span class="form-label-description"></span></label>
                <textarea dir="auto" class="form-control richtext" name="directedTo" rows="4" placeholder="Content.."></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">{{ __('admin.courses.goals') }} <span class="form-label-description"></span></label>
                <textarea dir="auto" class="form-control richtext" name="goals" rows="4" placeholder="Content.."></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">{{ __('admin.courses.prerequisites') }} <span class="form-label-description"></span></label>
                <textarea dir="auto" class="form-control richtext" name="prerequisites" rows="4" placeholder="Content.."></textarea>
              </div>


              <div class="mb-3 ">


                <label for="logo">{{ __('admin.courses.image') }}</label>
                <input type="file" class="form-control" name="image" id="logo">

                @error('img')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3 ">



                <label for="logo">{{ __('admin.courses.background_image') }}</label>
                <input type="file" class="form-control" name="background_image" id="logo">

                @error('background_image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="card" style="margin-top: 20px;">
                <div class="card-header">
                  <h3> {{ __('admin.courses.add_instructors') }} </h3>
                </div>
                <div class="card-body">
                  <div class="main">
                    <table  class=" table data-table data-table-horizontal data-table-highlight">
                      <thead>
                        <tr>
                          <td> {{ __('admin.courses.instructor') }} </td>
                          <td>   {{ __('admin.courses.buy_course_instructor') }}</td>
                          <td> {{ __('admin.courses.instructor_prectange') }}</td>
                          <td></td>
                        </tr>
                      </thead>
                      <tbody id="instructorstable">
                        <tr>
                          <td>
                            <select class=" form-control" name="instructors[]" style="padding:3px;">
                              <option value="0"> {{ __('admin.select_instructor')}}</option>
                              @foreach($instructors as $instructor)
                              <option value="{{$instructor->id}}"> {{ $instructor->name }}</option>
                              @endforeach
                            </select>
                          </td>
                          <td><input type="number" min="0" name="instructorsprice[]" value="0" placeholder="قيمة شراء الدورة من المدرب" /></td>
                          <td><input type="number"  min="0" name="instructorsprecentage[]" value="0" placeholder="ربح المدرب من كل اشتراك" /></td>
                          <td><a type="button" value="Delete" onclick="deleteRow(this)">
                              <i class="fas fa-trash-alt"></i>
                            </a></td>
                        </tr>

                    </table>
                    <div class="pull-right">
                      <input type="button" value="إضافة" class="top-buffer" onclick="addRow('instructorstable')" />
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
    </div>
  </div>
</div>

@endsection
@push('scripts')

<script>
  function addRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    var colCount = table.rows[0].cells.length;

    for (var i = 0; i < colCount; i++) {
      var newRow = row.insertCell(i);

      newRow.innerHTML = table.rows[0].cells[i].innerHTML;
      newRow.childNodes[0].value = "";
    }
  }

  function deleteRow(row) {
    var table = document.getElementById("instructorstable");
    var rowCount = table.rows.length;
    if (rowCount > 1) {
      var rowIndex = row.parentNode.parentNode.rowIndex;
      document.getElementById("instructorstable").deleteRow(rowIndex - 1);
    } else {
      alert("Please specify at least one value.");
    }
  }
</script>
@endpush