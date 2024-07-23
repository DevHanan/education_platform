@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('update-sections',$quiz,$row) }}

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


        <form class="card" action="{{ route($route.'.update',[$quiz->id,$row]) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method("PUT")
          <div class="card-body">
            <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
            <input type="hidden" name="id" value="{{$row->id}}">

            <div class="row ">
              <div class="mb-3">
                <label class="form-label" for="name"> {{ __('admin.sections.field_title') }} <span>*</span></label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title',$row) }}" required>

                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="question_number"> {{ __('admin.sections.question_number') }} <span>*</span></label>

                <input type="text" class="form-control" name="question_number" id="question_number" value="{{ old('question_number',$row) }}" required>

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
                    <input class="form-check-input" value="1" type="radio" name="active" @if($row->active == 1)checked @endif>
                    <span class="form-check-label"> {{ __('admin.active')}}</span>
                  </label>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" value="0" type="radio" name="active" @if($row->active == 0)checked @endif>
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
                        </tr>
                      </thead>
                      <tbody id="instructorstable">
                        <tr>
                          @foreach($bankgroups as $bank)
                          <td>
                            <input type="checkbox" name="banks[]" value="{{ $bank->id}}" @if(in_array($bank->id,$groups)) checked @endif> {{ $bank->name }}
                            @if(count($bank->questions)>1)
                            <p>
                              <a class="text-primary" data-bs-toggle="collapse" href="#collapseExample{{$bank->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
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


                                        <input type="checkbox" name="questions[]" value="{{$question->id}}" @if(in_array($question->id,$quizuestionsids)) checked @endif>
                                       {{ $question->customTitle }}</td>

                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>

                            @endif
                          </td>
                          <td>
                            <select class="select2 form-control" name="random[]" id="random[]">
                              <option value="1">{{ __('admin.yes') }}</option>
                              <option value="0">{{ __('admin.no') }}</option>

                            </select>
                          </td>
                          <td>
                            <input type="number" name="questionNumber[]" id="questionNumber" value="" placeholder="عدد الأسئلة" />
                          </td>
                        </tr>
                        @endforeach

                      </tbody>

                    </table>

                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
            </div>
        </form>
      </div>
    </div>
    <!-- [ Card ] end -->
  </div>
</div>
<!-- [ Main Content ] end -->


@endsection
@push('scripts')

<script>
  // Get the checkbox and the div elements
  const flexHasLevelSwitchCheck = document.getElementById('random[]');
  const divToHide = document.getElementById('divToHide');

  // Add an event listener to the checkbox
  flexHasLevelSwitchCheck.addEventListener('change', function() {
    const selectedValue = selectElement.value;
    alert(selectedValue);
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