@extends('admin.layouts.master')
@section('title', trans('module_staff'))

@section('content')

<style>
  .custom-style {
    padding: 10px;
  }
</style>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('add-bankquestions',$bankgroup) }}

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <div class="card-header">
            <div class="card-block">
              <a href="{{ url('admin/bank-groups/'.$bankgroup->id.'/bank-questions') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

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

        <form autocomplete="off" class="card" action="{{ url('admin/bank-groups/$bankgroup->id/bank-questions' ) }}" method="post" enctype="multipart/form-data">
          @csrf


          <div class="card-body">
            <div class="card-status-top bg-blue"></div>

            <div class="card-header">
              <h3 class="card-title"> {{__('admin.bankquestions.question_data')}} </h3>

            </div>
            @csrf
            <input type="hidden" name="bank_group_id" value="{{$bankgroup->id}}">
            <div class="row">
              <div class="mb-3">
                <label class="form-label">{{__('admin.bankquestions.title')}}</label>
                <textarea class="form-control" rows="3" name="title" required> </textarea>

                @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col-lg-6 custom-style">
                <div class="mb-3">
                  <label class="form-label">{{__('admin.bankquestions.mark')}}</label>
                  <input type="number" class="form-control" name="mark" value="{{old('mark')}}" required>
                  @error('mark')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6 custom-style">
                <div class=" col-md-6">
                  <label class="form-label" for="active" class="form-label">{{ __('admin.tracks.status') }}</label>
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





              <div class="form-group col-md-6 img-class">


                <label class="form-label">{{ __('admin.bankquestions.title_photo') }}</label>
                <input type="file" class="form-control" name="picture" id="logo">

                @error('title_photo')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>





            </div>




          </div>

          <div class="card-body">
            <div class="card-status-top bg-blue"></div>
            <div class="card-header">
              <h3 class="card-title"> {{__('admin.bankquestions.answer_data')}} </h3>

            </div>
            <div class="card-body">

              <div class="mb-3">
                <label class="form-label">{{__('admin.bankquestions.answer1')}}</label>
                <input type="text" class="form-control" name="answer1" value="{{old('answer1')}}" required>

                @error('answer1')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">{{__('admin.bankquestions.answer2')}}</label>
                <input type="text" class="form-control" name="answer2" required>
                @error('answer2')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">{{__('admin.bankquestions.answer3')}}</label>
                <input type="text" class="form-control" name="answer3" required>
                @error('answer3')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">{{__('admin.bankquestions.answer4')}}</label>
                <input type="text" class="form-control" name="answer4" required>
                @error('answer4')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="answer_id">{{ __('admin.bankquestions.correct_answer') }} <span>*</span></label>
                <select class="select2 form-control" name="correct_answer" id="answer_id" required>
                  <option value="">{{ __('select') }}</option>
                  <option value="1">{{ __('admin.bankquestions.answer1') }}</option>
                  <option value="2">{{ __('admin.bankquestions.answer2') }}</option>
                  <option value="3 ">{{ __('admin.bankquestions.answer3') }}</option>
                  <option value="4">{{ __('admin.bankquestions.answer4') }}</option>

                </select>

                @error('correct_answer')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>




            </div>
          </div>

          <div class="card-body">
            <div class="card-status-top bg-blue"></div>

            <div class="card-header">
              <h3 class="card-title"> {{__('admin.bankquestions.explain_question_data')}} </h3>

            </div>
            @csrf
            <div class="row">






              <div class="col-lg-12">
                <div>
                  <label class="form-label">{{__('admin.bankquestions.title_notes')}}</label>
                  <textarea class="form-control" rows="3" name="question_notes"></textarea>
                </div>
              </div>


              <div class="form-group col-md-6 img-class">


                <label class="form-label">{{ __('admin.bankquestions.question_photo') }}</label>
                <input type="file" class="form-control" name="question_declare_img">

                @error('question_photo')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>



            </div>




          </div>

          <div class="card-body">
            <div class="card-status-top bg-blue"></div>
            <div class="card-header">
              <h3 class="card-title"> {{__('admin.bankquestions.explain_answer_data')}} </h3>

            </div>
            <div class="card-body">

              <div class="mb-3">
                <label class="form-label">{{__('admin.bankquestions.link')}}</label>
                <input type="text" class="form-control" name="answer_video_link">
                @error('answer_video_link')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>




              <div class="col-lg-12">
                <div>
                  <label class="form-label">{{__('admin.bankquestions.answer_notes')}}</label>
                  <textarea class="form-control" rows="3" name="answer_notes"></textarea>
                  @error('answer_notes')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>

              <div class="form-group col-md-12">


                <label class="form-label">{{ __('admin.bankquestions.answer_photo') }}</label>
                <input type="file" class="form-control" name="answer_declare_img">

                @error('answer_photo')
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

          <!-- Form End -->


        </form>
      </div>
    </div>
  </div>
</div>





@endsection