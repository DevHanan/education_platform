@extends('admin.layouts.master')
@section('title', trans('module_staff'))

@section('content')


<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('add-sections',$quiz) }}

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <div class="card-header">
            <div class="card-block">
              <a href="{{ url('admin/quizzes/'.$quiz->id.'/sections') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

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

        <form autocomplete="off" class="card"  action="{{ url('admin/quizzes/'.$quiz->id.'/sections' ) }}" method="post" enctype="multipart/form-data">
          @csrf

          <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
          <div class="card-body">
            <div class="row ">
              <div class="mb-3">
                <label class="form-label" for="name"> {{ __('admin.sections.field_title') }} <span>*</span></label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="question_number"> {{ __('admin.sections.question_number') }} <span>*</span></label>

                <input type="text" class="form-control" name="question_number" id="question_number" value="{{ old('question_number') }}" required>

                @error('question_number')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group col-md-12">
                <label class="form-label" for="active" class="form-label">{{ __('admin.sections.status') }}</label>
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
                          <td>#</td>
                        </tr>
                      </thead>
                      <tbody id="instructorstable">
                        <tr>
                          <td>
                            <select class="select2 form-control" name="banks[]" id="bank">
                              <option value="">{{ __('select') }}</option>
                              @foreach($bankgroups as $bank)
                              <option value="{{$bank->id}}"> {{ $bank->name }}</option>
                              @endforeach

                            </select>
                          </td>
                          <td>
                            <select class="select2 form-control" name="random" id="random">
                              <option value="1">{{ __('admin.yes') }}</option>
                              <option value="0">{{ __('admin.no') }}</option>

                            </select>
                          </td>
                          <td><input type="number" name="questionNumber[]" id="questionNumber" value="" placeholder="عدد الأسئلة" /></td>

                          <td><a type="button" value="Delete" onclick="deleteRow(this)">
                              <i class="fas fa-trash-alt"></i>
                            </a></td>
                        </tr>
                      </tbody>

                    </table>
                    <div class="pull-right">
                      <input type="button" value="إضافة" class="top-buffer" onclick="addRow()" />
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


  // Get the checkbox and the div elements
const flexHasLevelSwitchCheck = document.getElementById('random');
const divToHide = document.getElementById('divToHide');

// Add an event listener to the checkbox
flexHasLevelSwitchCheck.addEventListener('change', function() {
  const selectedValue = selectElement.value;
  // If the checkbox is checked, hide the div
  if (selectedValue == '0') {
    divToHide.style.display = 'block';

  } else {
    // If the checkbox is not checked, show the div
    divToHide.style.display = 'none';

  }
});

</script>
@endpush