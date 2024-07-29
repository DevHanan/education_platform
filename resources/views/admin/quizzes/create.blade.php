@extends('admin.layouts.master')
@section('title', $title)

@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('add-quizzes') }}

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
                  <label class="form-label" for="name"> {{ __('admin.quizzes.name') }} <span>*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="total_mark"> {{ __('admin.quizzes.total_mark') }} <span>*</span></label>
                  <input type="number" class="form-control" name="total_mark" id="total_mark" value="{{ old('total_mark') }}" required>

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
                    <option value="{{$track->id}}">{{ $track->name }}</option>
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
                    <option value="">{{ __('select') }}</option>

                  </select>

                  @error('level_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>




                <div class="mb-3">
                  <label class="form-label" for="prectange"> {{ __('admin.quizzes.question_number') }} <span>*</span></label>
                  <input type="number" class="form-control" name="question_number" id="question_number" value="0">

                  @error('question_number')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <!-- <div class="mb-3" id="bankgroupsList">
                  <label class="form-label" for="bank">{{ __('admin.quizzes.select_bankgroups') }} <span>*</span></label>
                  <select class="select2 form-control" name="banks[]" id="bank" multiple>
                    <option value="">{{ __('select') }}</option>
                    @foreach($bankgroups as $bank)
                    <option value="{{$bank->id}}"> {{ $bank->name }}</option>
                    @endforeach

                  </select>
                </div> -->


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
                    <label class="form-label" for="title"> {{ __('admin.quizzes.has_levels') }} <span>*</span></label>
                    <div class="form-check form-switch md-3" style="margin:10px">

                      <input class="form-check-input form-control" type="checkbox" style="float: right;" role="switch" id="hasLevel" name="has_levels">
                    </div>
                  </div>


                </div>



                <div class="mb-3">
                  <label class="form-label" for="pass_mark"> {{ __('admin.quizzes.pass_mark') }} <span>*</span></label>
                  <input type="number" class="form-control" name="pass_mark" id="pass_mark" value="{{ old('pass_mark') }}" required>

                  @error('pass_mark')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="course_id">{{ __('admin.quizzes.course') }} <span>*</span></label>
                  <select class="select2 form-control" name="course_id" id="course_id">

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
                    <option value="">{{ __('select') }}</option>

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
                    <option value="1"> {{ __('admin.quizzes.simulator') }}</option>
                    <option value="2"> {{ __('admin.quizzes.platform') }}</option>
                  </select>

                  @error('quiz_type')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>



              </div>



              <div class="card-body">

                <div class="card-status-top bg-blue"></div>

                <div class="card" style="margin-top: 20px;" id="divToHide">
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
                          </tr>
                        </thead>
                        <tbody id="instructorstable">
                          <tr>
                            @foreach($bankgroups as $bank)

                            <td>
                              <input type="checkbox" name="banks[]" value="{{ $bank->id}}"> {{ $bank->name }}

                            </td>

                            <td>
                              <select class="select2 form-control randomlist" name="random[$bank->id][]" id="{{$bank->id}}">
                                <option selected disabled>{{ __('admin.select') }}</option>
                                <option value="1">{{ __('admin.yes') }}</option>
                                <option value="0">{{ __('admin.no') }}</option>

                              </select>
                            </td>
                            <td>
                              <input type="number" name="questionNumber[$bank->id][]" id="questionNumber" value="" placeholder="عدد الأسئلة" max="{{$bank->questions()->count()}}" />
                            </td>
                          </tr>
                          <tr>
                            <td colspan="3">
                              <p>
                                <a class="text-primary" id="bankquestion_{{$bank->id}}" style="display:none;" data-bs-toggle="collapse" href="#collapseExample{{$bank->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                  إختر الاسئلة
                                </a>

                              </p>
                              <div class="collapse" id="collapseExample{{$bank->id}}">
                                <div class="card card-body">
                                  <table class="table card-table">
                                    <tbody>
                                      @foreach ($bank->questions as $question )

                                      <tr>
                                        <td>


                                          <input type="checkbox" name="questions[]" value="{{$question->id}}">
                                          {{ $question->customTitle }}
                                        </td>


                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </td>

                          </tr>
                          @endforeach

                        </tbody>

                      </table>

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
  $(document).ready(function() {
    // Get all select elements with the same class name
    const selectElements = $('.randomlist');


    // Add an event listener to each select element
    selectElements.on('change', function() {
      // Get the ID of the select element that triggered the event
      const selectId = this.id;
      const value = this.value;
      console.log("bankquestion_" + selectId);
      if (value == '1') {
        document.getElementById("bankquestion_" + selectId).style.display = 'none';


      } else {
        // If the checkbox is not checked, show the div
        document.getElementById("bankquestion_" + selectId).style.display = 'block';

      }

    });
  });
  // function addRow() {
  //   var table = document.getElementById("instructorstable");
  //   var row = table.insertRow(-1);
  //   var cell1 = row.insertCell(0);
  //   var cell2 = row.insertCell(1);
  //   var cell3 = row.insertCell(2);
  //   var cell4 = row.insertCell(3);

  //   cell1.innerHTML = '<select class="select2 form-control" name="banks[]"><option value="">{{ __('select') }}</option>@foreach($bankgroups as $bank)<option value="{{$bank->id}}"> {{ $bank->name }}</option>@endforeach</select>';
  //   cell2.innerHTML = '<select class="select2 form-control" name="random[]"><option value="1">{{ __('admin.yes') }}</option><option value="0">{{ __('admin.no') }}</option></select>';
  //   cell3.innerHTML = '<input type="number" name="questionNumber[]" value="" placeholder="عدد الأسئلة" />';
  //   cell4.innerHTML = '<a type="button" value="Delete" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></a>';
  // }

  // function deleteRow(obj) {


  //   var table = document.getElementById("instructorstable");
  //     var rowCount = table.rows.length;
  //     if (rowCount > 1) {
  //       var rowIndex = row.parentNode.parentNode.rowIndex;
  //       document.getElementById("data").deleteRow(rowIndex);
  //     } else {
  //       alert("Please specify at least one value.");
  //     }
  // }


  // Get the checkbox and the div elements
  const flexHasLevelSwitchCheck = document.getElementById('hasLevel');
  const divToHide = document.getElementById('divToHide');

  // Add an event listener to the checkbox
  flexHasLevelSwitchCheck.addEventListener('change', function() {
    // If the checkbox is checked, hide the div
    if (this.checked) {
      divToHide.style.display = 'none';
    } else {
      // If the checkbox is not checked, show the div
      divToHide.style.display = 'block';
    }
  });
</script>
@endpush