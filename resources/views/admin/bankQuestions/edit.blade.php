@extends('admin.layouts.master')
@section('title', trans('module_staff'))

@section('content')


<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('update-bankquestions',$bankgroup,$row) }}

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
        <form class="card"  action="{{ route($route.'.update',[$bankgroup->id,$row]) }}" method="post" enctype="multipart/form-data">

          @csrf

          @method("PUT")


          <div class="card-body">
            <div class="card-status-top bg-blue"></div>

            <div class="card-header">
              <h3 class="card-title"> {{__('admin.bankquestions.question_data')}} </h3>
              <input type="hidden" name="id" value="{{$row->id}}">
            </div>
            @csrf
            <input type="hidden" name="bank_group_id" value="{{$bankgroup->id}}">
            <div class="row">
              <div class="mb-3">
                <label class="form-label">{{__('admin.bankquestions.title')}}</label>
                <!-- <input type="text" class="form-control" name="title" value="{{old('title',$row)}}"> -->

                <textarea class="form-control" rows="3" name="title" required> {{ $row->title }}</textarea>

                @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col-lg-6 custom-style">
                <div class="mb-3">
                  <label class="form-label">{{__('admin.bankquestions.mark')}}</label>
                  <input type="number" class="form-control" name="mark" value="{{old('mark',$row)}}">
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
                      <input class="form-check-input" value="1" type="radio" name="active"  @if($row->active == 1) checked="checked" @endif>
                      <span class="form-check-label"> {{ __('admin.active')}}</span>
                    </label>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" value="0" type="radio" name="active"  @if($row->active == 0) checked="checked" @endif>
                      <span class="form-check-label"> {{ __('admin.inactive' )}}</span>
                    </label>

                  </div>
                </div>

              </div>



              <!-- <div class="col-lg-12">
                <div>
                  <label class="form-label">{{__('admin.bankquestions.title_notes')}}</label>
                  <textarea class="form-control" rows="3" name="question_notes"> {{ $row->question_notes }}</textarea>
                </div>
              </div> -->

              <!-- <div class="form-group col-md-6 img-class">


                <label class="form-label">{{ __('admin.bankquestions.title_photo') }}</label>
                <input type="file" class="form-control" name="picture" id="logo">
                @if(isset($row->picture))
                <img style="padding-top:30px;" src="{{ asset($row->pictureFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                <div class="clearfix"></div>
                @endif

                @error('title_photo')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div> -->

              <div class="form-group col-md-6 img-class">


                <label class="form-label">{{ __('admin.bankquestions.question_photo') }}</label>
                <input type="file" class="form-control" name="question_declare_img">
                @if(isset($row->question_declare_img))
                <img style="padding-top:30px;" src="{{ asset($row->questionFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                <div class="clearfix"></div>
                @endif
                @error('question_declare_img')
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
                <input type="text" class="form-control" name="answer1" value="{{old('answer1',$row)}}">

                @error('answer1')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">{{__('admin.bankquestions.answer2')}}</label>
                <input type="text" class="form-control" name="answer2" value="{{old('answer2',$row)}}">
                @error('answer2')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">{{__('admin.bankquestions.answer3')}}</label>
                <input type="text" class="form-control" name="answer3" value="{{old('answer3',$row)}}">
                @error('answer3')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">{{__('admin.bankquestions.answer4')}}</label>
                <input type="text" class="form-control" name="answer4" value="{{old('answer4',$row)}}">
                @error('answer4')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="answer_id">{{ __('admin.bankquestions.correct_answer') }} <span>*</span></label>
                <select class="select2 form-control" name="correct_answer" id="correct_answer" required>
                  <option value="">{{ __('select') }}</option>
                  <option value="1" @if($row->correct_answer == 1) selected @endif>{{ __('admin.bankquestions.answer1') }}</option>
                  <option value="2" @if($row->correct_answer == 2) selected @endif>{{ __('admin.bankquestions.answer2') }}</option>
                  <option value="3" @if($row->correct_answer == 3) selected @endif>{{ __('admin.bankquestions.answer3') }}</option>
                  <option value="4" @if($row->correct_answer == 4) selected @endif>{{ __('admin.bankquestions.answer4') }}</option>

                </select>

                @error('answer_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">{{__('admin.bankquestions.link')}}</label>
                <input type="text" class="form-control" name="answer_video_link" value="{{old('answer_video_link',$row)}}">
                @error('answer_video_link')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>


            

              <div class="col-lg-12">
                <div>
                  <label class="form-label">{{__('admin.bankquestions.answer_notes')}}</label>
                  <textarea class="form-control" rows="3" name="answer_notes"> {{ $row->answer_notes }}</textarea>
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

                @if(isset($row->answer_declare_img))
                <img style="padding-top:30px;" src="{{ asset($row->answerFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                <div class="clearfix"></div>
                @endif
                @error('answer_declare_img')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>

          <!-- <div class="card-body">
            @csrf
            <input type="hidden" name="bank_group_id" value="{{$bankgroup->id}}">
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">{{__('admin.questions.title')}}</label>
                  <input type="text" class="form-control" name="title" value="{{old('title',$row)}}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">{{__('admin.questions.link')}}</label>
                  <input type="text" class="form-control" name="answer_video_link" value="{{old('answer_video_link',$row)}}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">{{__('admin.questions.mark')}}</label>
                  <input type="number" class="form-control" name="mark" value="{{old('mark',$row)}}">
                </div>
              </div><input type="hidden" value="{{$row->id}}" name="id">

              <div class=" col-md-6">
                <label class="form-label" for="active" class="form-label">{{ __('admin.tracks.status') }}</label>
                <div>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" value="1" type="radio" name="active" @if($row->active == 1) checked="checked" @endif>
                    <span class="form-check-label"> {{ __('admin.active')}}</span>
                  </label>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" value="0" type="radio" name="active" @if($row->active == 0) checked="checked" @endif>
                    <span class="form-check-label"> {{ __('admin.inactive' )}}</span>
                  </label>

                </div>
              </div>
              <div class="col-lg-12">
                <div>
                  <label class="form-label">{{__('admin.questions.title_notes')}}</label>
                  <textarea class="form-control" rows="3" name="question_notes"> {{ $row->question_notes}}</textarea>
                </div>
              </div>



              <div class="col-lg-12">
                <div>
                  <label class="form-label">{{__('admin.questions.optiomal_answer')}}</label>
                  <textarea class="form-control" rows="3" name="model_answer">{{ $row->model_answer}}</textarea>
                </div>
              </div>

              <div class="col-lg-12">
                <div>
                  <label class="form-label">{{__('admin.questions.answer_notes')}}</label>
                  <textarea class="form-control" rows="3" name="answer_notes"> {{ $row->answer_notes}}</textarea>
                </div>
              </div>
            </div>

            <div class="form-group col-md-12">


              <label>{{ __('admin.questions.title_photo') }}</label>
              <input type="file" class="form-control" name="picture" id="logo">
              @if(isset($row->picture))
              <img style="padding-top:30px;" src="{{ asset($row->pictureFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
              <div class="clearfix"></div>
              @endif
              @error('title_photo')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group col-md-12">


              <label>{{ __('admin.questions.question_photo') }}</label>
              <input type="file" class="form-control" name="question_declare_img">
              @if(isset($row->question_declare_img))
              <img style="padding-top:30px;" src="{{ asset($row->questionFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
              <div class="clearfix"></div>
              @endif
              @error('question_photo')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>


            <div class="form-group col-md-12">


              <label>{{ __('admin.questions.answer_photo') }}</label>
              <input type="file" class="form-control" name="answer_declare_img">
              @if(isset($row->answer_declare_img))
              <img style="padding-top:30px;" src="{{ asset($row->answerFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
              <div class="clearfix"></div>
              @endif

              @error('answer_photo')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div> -->
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