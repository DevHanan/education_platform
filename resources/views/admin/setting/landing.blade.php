@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        @include('admin.layouts.inc.breadcrumb')

      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row row-deck row-cards">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
          </div>

          <div class="page-body">
            <div class="container-xl">
              <div class="row row-cards">
                <div class="col-md-12">
                  <form class="needs-validation"  action="{{ url('admin/landing-settings') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                      <div class="row row-cards row-deck">
                        <div class="col">
                          <div class="card">
                            <div class="card-header">
                              <h3 class="card-title"> {{ __('admin.landing.header_settings')}} </h3>
                            </div>
                            <div class="card-body row">

                              <div class="col-md-6">

                                <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">

                                <div class="form-group col-md-12">
                                  <label class="form-label" for="header_title">{{ __('admin.landing.header_title') }} <span>*</span></label>
                                  <input type="text" class="form-control" name="header_title" id="title" value="{{ isset($row->header_title)?$row->header_title:'' }}">

                                  @error('header_title')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                  @enderror
                                </div>

                                <div class="mb-3 ">



                                  <label for="logo form-label">{{ __('admin.landing.header_image') }}</label>
                                  <input type="file" class="form-control" name="header_image" id="logo">
                                  @if(isset($row->header_image))
                                  <img style="height:200px;" src="{{ asset($row->headerImageFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                                  <div class="clearfix"></div>
                                  @endif
                                  @error('header_image')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                  @enderror
                                </div>




                              </div>
                              <div class="col-md-6">
                                <div class="mb-3">
                                  <label class="form-label">{{ __('admin.landing.header_descriptions') }} <span class="form-label-header_description"></span></label>
                                  <textarea class="form-control" name="header_description" rows="6" placeholder="Content.."> {{ $row->header_description }}</textarea>
                                </div>



                              </div>
                            </div>

                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="col-12">
                      <div class="row row-cards row-deck">
                        <div class="col">
                          <div class="card">
                            <div class="card-header">
                              <h3 class="card-title"> {{ __('admin.landing.footer_settings')}} </h3>
                            </div>
                            <div class="card-body row">

                              <div class="col-md-6">


                                <div class="mb-3 ">



                                  <label for="logo form-label">{{ __('admin.landing.footer_image') }}</label>
                                  <input type="file" class="form-control" name="footer_image" id="logo">
                                  @if(isset($row->footer_image))
                                  <img style="height:200px;" src="{{ asset($row->footerImageFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                                  <div class="clearfix"></div>
                                  @endif
                                  @error('footer_image')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                  @enderror
                                </div>




                              </div>
                              <div class="col-md-6">
                                <div class="mb-3">
                                  <label class="form-label">{{ __('admin.landing.footer_description') }} <span class="form-label-header_description"></span></label>
                                  <textarea class="form-control" name="footer_description" rows="6" placeholder="Content.."> {{ $row->footer_description }}</textarea>
                                </div>



                              </div>
                            </div>

                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="mb-3">
                            <label class="form-label" for="start_soon_period">{{ __('admin.landing.start_soon_period') }} <span>*</span></label>
                            <input type="number" class="form-control" name="start_soon_period" id="start_soon_period" value="{{ isset($row->start_soon_period)?$row->start_soon_period:'' }}">

                            @error('start_soon_period')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>


                          <div class="mb-3">
                            <label class="form-label" for="book_shop_url">{{ __('admin.landing.book_shop_url') }} <span>*</span></label>
                            <input type="text" class="form-control" name="book_shop_url" id="book_shop_url" value="{{ isset($row->book_shop_url)?$row->book_shop_url:'' }}">

                            @error('book_shop_url')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="mb-3 ">



                                  <label for="guide_file form-label">{{ __('admin.landing.guide_file') }}</label>
                                  <input type="file" class="form-control" name="guide_file" id="guide_file">
                                  @if(isset($row->guide_file))
                                  <a href="{{asset($row->guideFileFullPath)}}" target="_blank" class="btn btn-icon btn-success btn-sm" download="{{asset($row->guideFileFullPath)}}"> 
                                        <i class="fa-solid fa-cloud-arrow-down"></i>  </a>
                                  <div class="clearfix"></div>
                                  @endif
                                  @error('guide_file')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                  @enderror
                                </div>


                    <div class="col-12">
                      <div class="row row-cards row-deck">
                        <div class="col">
                          <div class="card">
                            <div class="card-header">
                              <h3 class="card-title"> {{ __('admin.landing.control')}} </h3>
                            </div>
                            <div class="card-body">
                              <div class="row">

                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.achievements')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="achievements" @if($row->achievements==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>
                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.most_required_courses')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="most_required_courses" @if($row->most_required_courses==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>
                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.free_courses')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="free_courses" @if($row->free_courses==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>
                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.recommend_courses')}}

                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="recommend_courses" @if($row->recommend_courses == 1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>

                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.top_rated_courses')}}


                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="top_rated_courses" @if($row->top_rated_courses == 1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>
                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.star_recently_courses')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="star_recently_courses" @if($row->star_recently_courses==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>
                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.tracks')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="tracks" @if($row->tracks==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>
                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.instructors')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="instructors" @if($row->instructors==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>
                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.workteam')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="workteam" @if($row->workteam==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>
                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.parteners')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="parteners" @if($row->parteners==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>
                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.student_opinion')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="student_opinion" @if($row->student_opinion==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>

                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.letter_news')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="letter_news" @if($row->letter_news==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>


                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.landing.map_locations')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="map_locations" @if($row->map_locations==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>

                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.questions.list')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="question_list" @if($row->question_list==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>


                                <div class="col-md-12">
                                  <label class="form-control">
                                    <span class="col">
                                      {{ __('admin.book_store_visiable')}}
                                    </span>
                                    <span class="col-auto">
                                      <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" type="checkbox" name="book_store_visiable" @if($row->book_store_visiable==1) checked="checked" @endif>
                                      </label>
                                    </span>
                                  </label>
                                </div>
                              </div>

                              <!-- Form Start -->
                              <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success">{{ __('admin.btn_update') }}</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

@endsection