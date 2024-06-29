@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('update-quizzes',$row) }}

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
        <form class="needs-validation" novalidate action="{{ route($route.'.update',$row) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="card-body">
            <div class="row ">
              <div class="col-md-6">

                <div class="mb-3">
                  <label class="form-label" for="name"> {{ __('admin.quizzes.name') }} <span>*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$row) }}" required>

                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="total_mark"> {{ __('admin.quizzes.total_mark') }} <span>*</span></label>
                  <input type="number" class="form-control" name="total_mark" id="total_mark" value="{{ old('total_mark',$row) }}" required>

                  @error('total_mark')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label" for="track_id">{{ __('admin.coupons.track') }} <span>*</span></label>
                  <select class="form-control" name="track_id" id="track_id">
                    <option value="">{{ __('select') }}</option>
                    @foreach($tracks as $track)
                    <option value="{{$track->id}}" @if( $row->track_id != null && ($row->track_id == $track->id) ) selected @endif>{{ $track->name }}</option>
                    @endforeach

                  </select>

                  @error('track_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="levels">{{ __('admin.quizzes.level') }} <span>*</span></label>
                  <select class="select2 form-control" name="level_id" id="levels">
                    <option value="{{ $row->level_id }}"> {{ optional($row->level)->name }}</option>

                  </select>

                  @error('level_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label" for="prectange"> {{ __('admin.quizzes.question_number') }} <span>*</span></label>
                  <input type="number" class="form-control" name="question_number" id="question_number" value="{{ $row->question_number }}">

                  @error('question_number')
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

                      <input class="form-check-input form-control" type="checkbox" style="float: right;" role="switch" id="flexSwitchCheckDefault" name="active" @if($row->active ==1 ) checked @endif>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label" for="title"> {{ __('admin.quizzes.has_levels') }} <span>*</span></label>
                    <div class="form-check form-switch md-3" style="margin:10px">

                      <input class="form-check-input form-control" type="checkbox" style="float: right;" role="switch" id="flexHasLevelSwitchCheck" name="has_levels" @if($row->has_levels ==1 ) checked @endif>
                    </div>
                  </div>
                </div>



                <div class="mb-3">
                  <label class="form-label" for="pass_mark"> {{ __('admin.quizzes.pass_mark') }} <span>*</span></label>
                  <input type="number" class="form-control" name="pass_mark" id="pass_mark" value="{{ old('pass_mark',$row) }}" required>

                  @error('pass_mark')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="course_id">{{ __('admin.quizzes.course') }} <span>*</span></label>
                  <select class="select2 form-control" name="course_id" id="course_id">
                    <option value="">{{ __('select') }}</option>
                    <option value="{{ $row->course_id }}" selected> {{ optional($row->course)->name }}</option>
                  </select>

                  @error('course_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="lectures">{{ __('admin.quizzes.lecture') }} <span>*</span></label>
                  <select class="select2 form-control" name="lecture_id" id="lectures">
                    <option value="{{ $row->lecture_id }}"> {{ optional($row->lecture)->title }}</option>

                  </select>

                  @error('lecture_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label" for="quiz_type">{{ __('admin.quizzes.quiz_type') }} <span>*</span></label>
                  <select class="form-control" name="quiz_type" id="quiz_type" required>
                    <option value="">{{ __('select') }}</option>
                    <option value="1" @if($row->quiz_type ==1 ) selected @endif> {{ __('admin.quizzes.simulator') }}</option>
                    <option value="2" @if($row->quiz_type ==2 ) selected @endif> {{ __('admin.quizzes.platform') }}</option>
                  </select>

                  @error('quiz_type')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                @if($row->has_levels == 1)
                <div class="mb-3" id="bankgroupsList">
                  <label class="form-label" for="bank">{{ __('admin.quizzes.select_bankgroups') }} <span>*</span></label>
                  <select class="select2 form-control" name="banks[]" id="bank" multiple>
                    <option value="">{{ __('select') }}</option>
                    @foreach($bankgroups as $bank)
                    <option value="{{$bank->id}}" @if(in_array($bank->id , $bank_groups)) selected @endif> {{ $bank->name }}</option>
                    @endforeach

                  </select>
                </div>
                @endif

              </div>
              <input type="hidden" name="id" value="{{$row->id}}">



            </div>

          </div>
          @if($groups && $row->has_levels == 0)
          <div class="card-body">

            <div class="card-status-top bg-blue"></div>

            <div class="card-header">
              <h3 class="card-title"> بنوك الأسئلة  فى الاختبار </h3>

            </div>
            <div class="table-responsive">
              <table class="  table card-table table-vcenter text-nowrap ">
                <thead>
                  <tr>
                    <th class="w-1">#
                    </th>
                    <th> {{__('admin.bankgroups.bank_name')}}</th>
                    <th>{{ __('admin.bankgroups.question_number') }}</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($groups as $group)

                  <tr>

                    <td>
                      <input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices" name="groupids[]" value="{{ $group->id }}" checked>

                      <span class="text-secondary">{{$loop->iteration}}</span>
                    </td>

                    <td>
                      {!! $group->name !!}
                    </td>
                    <td> 

                    <input type="number" name="groupquestions[]" min="0">

                    </td>

                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
          @endif

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
      document.getElementById("instructorstable").deleteRow(rowIndex);
    } else {
      alert("Please specify at least one value.");
    }
  }
</script>
@endpush