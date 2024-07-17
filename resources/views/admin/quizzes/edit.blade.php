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
        <form class="needs-validation" action="{{ route($route.'.update',$row) }}" method="post" enctype="multipart/form-data">
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
          <div class="card" style="margin-top: 20px;">
            <div class="card-header">
              <h3> {{ __('admin.quizzes.add_bank_group') }} </h3>
            </div>
            <div class="card-body">
              <div class="main">
                <table class=" table data-table data-table-horizontal data-table-highlight">
                  <thead>
                    <tr>
                      <td> {{ __('admin.quizzes.select_bank') }}</td>
                      <td>{{ __('admin.quizzes.random_select') }} </td>

                      <td>{{ __('admin.quizzes.question_number') }} </td>
                      <td>#</td>
                    </tr>
                  </thead>
                  <tbody id="instructorstable">
                    <tr>
                      <td>
                        <select class="select2 form-control" name="banks[]" id="bank">
                          <option value="">{{ __('select') }}</option>
                          @foreach($banks as $bank)
                          <option value="{{$bank->id}}"> {{ $bank->name }}</option>
                          @endforeach

                        </select>
                      </td>
                      <td>
                        <select class="select2 form-control" name="random[]" id="random">
                          <option value="1">{{ __('admin.yes') }}</option>
                          <option value="0">{{ __('admin.no') }}</option>

                        </select>
                      </td>
                      <td><input type="number" name="questionNumber[]" id="questionNumber" value="" placeholder="عدد الأسئلة" /></td>

                      <td><a type="button" value="Delete" onclick="deleteRow(this)">
                          <i class="fas fa-trash-alt"></i>
                        </a></td>
                    </tr>
                    @if($bankgroups)
                    @foreach ($bankgroups as $group )

                    <tr>
                      <td>
                        <select class="select2 form-control" name="banks[]" id="bank">
                          <option value="{{$group->bank_group_id}}"> {{ optional($group->bankGroup)->name }}</option>

                        </select>
                      </td>
                      <td>
                        <select class="select2 form-control" name="random[]" id="random">
                          @if($group->randmom == 1)
                          <option value="1">{{ __('admin.yes') }}</option>
                          @else
                          <option value="0">{{ __('admin.no') }}</option>
                          @endif

                        </select>
                      </td>
                      <td>
                        <input type="number" name="questionNumber[]" id="questionNumber" value="{{$group->question_number}}" placeholder="عدد الأسئلة" /></td>

                      <td>
                        <a type="button" value="Delete" onclick="deleteRow(this)">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                    @endforeach

                    @endif
                  </tbody>

                </table>
                <div class="pull-right">
                  <input type="button" value="إضافة" class="top-buffer" onclick="addRow()" />
                </div>
              </div>
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
  function addRow() {
    var table = document.getElementById("instructorstable");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);

    cell1.innerHTML = '<select class="select2 form-control" name="banks[]"><option value="">{{ __('select') }}</option>@foreach($bankgroups as $bank)<option value="{{$bank->id}}"> {{ $bank->name }}</option>@endforeach</select>';
    cell2.innerHTML = '<select class="select2 form-control" name="random[]"><option value="1">{{ __('admin.yes') }}</option><option value="0">{{ __('admin.no') }}</option></select>';
    cell3.innerHTML = '<input type="number" name="questionNumber[]" value="" placeholder="عدد الأسئلة" />';
    cell4.innerHTML = '<a type="button" value="Delete" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></a>';
  }

  function deleteRow(obj) {
 

    var table = document.getElementById("instructorstable");
      var rowCount = table.rows.length;
      if (rowCount > 1) {
        var rowIndex = row.parentNode.parentNode.rowIndex;
        document.getElementById("data").deleteRow(rowIndex);
      } else {
        alert("Please specify at least one value.");
      }
  }
</script>
</script>
@endpush