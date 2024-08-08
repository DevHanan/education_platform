@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('update-courses',$row) }}

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
    <div class="card">
      <form class="needs-validation"  action="{{ route($route.'.update',$row) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">
          <div class="row ">
            <div class="col-md-6">

              <div class="mb-3">
                <label class="form-label" for="name"> {{ __('admin.courses.name') }} <span>*</span></label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$row) }}" >

                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="price"> {{ __('admin.courses.price') }} <span>*</span></label>
                <input type="number" min="0" class="form-control" name="price" id="price" value="{{ old('price',$row) }}" >

                @error('price')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="period"> {{ __('admin.courses.period') }} <span>*</span></label>
                <input type="number" min="0" class="form-control" name="period" id="period" value="{{ old('period',$row) }}" >

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
                  <option value="{{ $type->id }}" @if($row->course_type_id == $type->id ) selected @endif> {{ $type->name }}</option>

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
                <input type="date" class="form-control" name="published_at" id="published_at" value="{{ old('published_at',$row) }}" >

                @error('published_at')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="start_date">{{ __('admin.courses.start_date') }} <span>*</span></label>
                <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date',$row) }}">

                @error('start_date')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="end_date">{{ __('admin.courses.end_date') }} <span>*</span></label>
                <input type="date" class="form-control" name="end_date" id="end_date" value="{{ old('end_date',$row) }}" >

                @error('end_date')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="promo_url"> {{ __('admin.courses.promo_url') }} <span>*</span></label>
                <input type="text" class="form-control" name="promo_url" id="promo_url" value="{{ old('promo_url',$row) }}" >

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

                    <input class="form-check-input form-control" type="checkbox" style="float: right;" @if($row->active ==1 ) checked @endif role="switch" id="flexSwitchCheckDefault" name="active">
                  </div>
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="title"> {{ __('admin.select_recommend') }} <span>*</span></label>
                  <div class="form-check form-switch md-3" style="margin:10px">

                    <input class="form-check-input form-control" type="checkbox" style="float: right;" @if($row->recommened ==1 ) checked @endif role="switch" id="flexSwitchCheckDefault" name="recommened">
                  </div>
                </div>
              </div>



              <div class="mb-3">
                <label class="form-label" for="price_with_discount"> {{ __('admin.courses.price_with_discount') }} <span>*</span></label>
                <input type="number" min="0" class="form-control" name="price_with_discount" id="price_with_discount" value="{{ old('price_with_discount',$row) }}" >

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
                  <option value="1" @if($row->period_type == 1 ) selected @endif> {{ __('admin.levels.month') }}</option>
                  <option value="2" @if($row->period_type == 2 ) selected @endif> {{ __('admin.levels.day') }}</option>
                  <option value="3" @if($row->period_type == 3 ) selected @endif> {{ __('admin.levels.hour') }}</option>
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
                  <option value="0" @if($row->difficulty_level == '0' ) selected @endif >{{ __('admin.courses.beginner') }}</option>
                  <option value="1" @if($row->difficulty_level == '1' ) selected @endif>{{ __('admin.courses.intermediate') }}</option>
                  <option value="2" @if($row->difficulty_level == '2' ) selected @endif>{{ __('admin.courses.advanced') }}</option>
                  <option value="3" @if($row->difficulty_level == '3' ) selected @endif>{{ __('admin.courses.all') }}</option>

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
                  <option value="">{{ __('select') }}</option>
                  @foreach($tracks as $track)
                  <option value="{{ $track->id }}" @if(in_array($track->id,$row_tracks)) selected  @endif> {{ $track->name }}</option>

                  @endforeach
                </select>

                @error('track_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="seat_number"> {{ __('admin.courses.seat_number') }} <span>*</span></label>
                <input type="number" min="0" class="form-control" name="seat_number" id="seat_number" value="{{ old('seat_number',$row) }}" >

                @error('seat_number')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>




              <div class="mb-3">
                <label class="form-label" for="provider">{{ __('admin.courses.provider') }} <span>*</span></label>
                <select class="form-control" name="provider" id="provideSelect" >
                  <option value="">{{ __('select') }}</option>
                  <option value="1" @if($row->provider == 1) selected @endif> {{ __('admin.courses.viemo')}}</option>
                  <option value="2" @if($row->provider == 2) selected @endif> {{ __('admin.courses.Youtube')}}</option>

                </select>
              </div>


              <div class="col-md-6">
                  <label class="form-label" for="title"> {{ __('admin.select_manual_review') }} <span>*</span></label>
                  <div class="form-check form-switch md-3" style="margin:10px">

                    <input class="form-check-input form-control" type="checkbox" style="float: right;" @if($row->manual_review ==1 ) checked @endif role="switch" name="manual_review">
                  </div>
                </div>

              <div class="mb-3">
                  <label class="form-label" for="seat_number"> {{ __('admin.courses.manual_review') }} <span>*</span></label>
                  <input type="number"   class="form-control"  max="5" name="manual_review_val" id="manual_review_val" value="{{ old('manual_review_val',$row) }}" >

                  @error('manual_review_val')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>








            </div>
            <div class="mb-3">
              <label class="form-label">{{ __('admin.courses.descriptions') }} <span class="form-label-description"></span></label>
              <textarea dir="auto" class="form-control" name="description" rows="4" placeholder="Content.."> {{ $row->description }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">{{ __('admin.courses.directedTo') }} <span class="form-label-description"></span></label>
              <textarea dir="auto" class="form-control" name="directedTo" rows="4" placeholder="Content..">{{ $row->directedTo }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">{{ __('admin.courses.goals') }} <span class="form-label-description"></span></label>
              <textarea dir="auto" class="form-control" name="goals" rows="4" placeholder="Content..">{{ $row->goals }}</textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">{{ __('admin.courses.prerequisites') }} <span class="form-label-description"></span></label>
              <textarea dir="auto" class="form-control" name="prerequisites" rows="4" placeholder="Content.."> {{ $row->prerequisites }} </textarea>
            </div>


            <div class="mb-3 ">



              <label for="logo">{{ __('admin.courses.image') }}</label>
              <input type="file" class="form-control" name="image" id="logo">
              @if(isset($row->image))
              <img src="{{ $row->imageFullPath }}" style="max-height:120px;" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
              <div class="clearfix"></div>
              @endif
              @error('img')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3 ">



              <label for="logo">{{ __('admin.courses.background_image') }}</label>
              <input type="file" class="form-control" name="background_image" id="logo">
              @if(isset($row->background_image))
              <img src="{{ $row->backgroundImageFullPath }}" style="max-height:120px;" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
              <div class="clearfix"></div>
              @endif
              @error('background_image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3 ">


                <label for="plan_file">{{ __('admin.courses.plan_file') }}</label>
                <input type="file" class="form-control" name="plan_file" id="plan_file">

                @error('plan_file')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3 ">


                <label for="plan_file">{{ __('admin.courses.prerequisite_file') }}</label>
                <input type="file" class="form-control" name="prerequisite_file" id="prerequisite_file">

                @error('prerequisite_file')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            <input type="hidden" name="id" value="{{$row->id}}">

            <div class="card" style="margin-top: 20px;">
                <div class="card-header">
                  <h3> {{ __('admin.courses.course_forum') }} </h3>
                </div>
                <div class="card-body">
                  <div class="main">
                    <div class="mb-3">
                      <label class="form-label" for="whatsApp_group_link"> {{ __('admin.courses.whatsApp_group_link') }} <span>*</span></label>
                      <input type="text" class="form-control" name="whatsApp_group_link" id="whatsApp_group_link" value="{{ old('whatsApp_group_link',$row) }}">

                      @error('whatsApp_group_link')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="telegram_channel_link"> {{ __('admin.courses.telegram_channel_link') }} <span>*</span></label>
                      <input type="text" class="form-control" name="telegram_channel_link" id="telegram_channel_link" value="{{ old('telegram_channel_link',$row) }}">

                      @error('telegram_channel_link')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            <div class="card" style="margin-top: 20px;">
              <div class="card-header">
                <h3> إضافة المدربين </h3>
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
                          <select class=" form-control" name="instructors[]" style="padding:3px;" >
                            <option value="0"> {{ __('admin.select_instructor')}}</option>
                            @foreach($instructors as $instructor)
                            <option value="{{$instructor->id}}"> {{ $instructor->name }}</option>
                            @endforeach
                          </select>
                        </td>
                        <td><input type="number" min="0" name="instructorsprice[]" value="0" placeholder="قيمة شراء الدورة من المدرب" /></td>
                        <td><input type="number" min="0" name="instructorsprecentage[]" value="0" placeholder="ربح المدرب من كل اشتراك" /></td>
                        <td><a type="button" value="Delete" onclick="deleteRow(this)">
                            <i class="fas fa-trash-alt"></i>
                          </a></td>
                      </tr>
                      @foreach($row->instructors as $item)
                      <tr>
                        <td>
                          <select class=" form-control" name="instructors[]" style="padding:3px;" >
                            <option value="{{$item->id}}" selected> {{ $item->name }}</option>
                          </select>
                        </td>
                        <td><input type="number" min="0" name="instructorsprice[]" value="{{$item->pivot->course_price}}" placeholder="قيمة شراء الدورة من المدرب" /></td>
                        <td><input type="number" min="0" name="instructorsprecentage[]" value="{{$item->pivot->course_prectange}}" placeholder="ربح المدرب من كل اشتراك" /></td>
                        <td><a type="button" value="Delete" onclick="deleteRow(this)">
                            <i class="fas fa-trash-alt"></i>
                          </a></td>
                      </tr>
                      @endforeach
                  </table>
                  <div class="pull-right">
                    <input type="button" value="إضافة" class="top-buffer" onclick="addRow('instructorstable')" />
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>


        <div class="card-footer">
          <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('admin.btn_Back') }}</button>-->
          <button type="submit" class="btn btn-success">{{ __('admin.btn_update') }}</button>
        </div>


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
      document.getElementById("instructorstable").deleteRow(rowIndex- 1);
    } else {
      alert("Please specify at least one value.");
    }
  }
</script>
@endpush