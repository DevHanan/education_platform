@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<style>
  .list-unstyled {
    list-style: none;
    margin-left: 0;
    padding-left: 0;
  }
</style>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">

      <div class="col">
        @include('admin.layouts.inc.breadcrumb')

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <a href="{{ route($route.'.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 5l0 14" />
              <path d="M5 12l14 0" />
            </svg>
            {{__('admin.btn_add_new')}} </a>

        </div>
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
            <div class="col-md-10">
              <h3 class="card-title">{{ $title }}</h3>
            </div>

            <div class="col-md-2">



              <div class="accordion" id="accordion-example">

                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading-4">
                    <button style="padding:10px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false">
                      {{__('admin.advanced_search')}}
                    </button>
                  </h2>

                </div>
              </div>

            </div>



          </div>

          <div class="col-md-12">
            <div id="collapse-4" class="accordion-collapse collapse" data-bs-parent="#accordion-example" style="">
              <div class="accordion-body pt-0">



                <div class="col-lg-12">
                  <div class="row row-cards">
                    <div class="col-12">
                      <form class="card" action="{{url('admin/courses')}}">
                        <div class="card-body">
                          <div class="row row-cards">
                            <div class="col-md-3">
                              <div class="mb-3">
                                <label class="form-label">{{__('admin.courses.name')}}</label>
                                <input type="text" class="form-control" placeholder="course" name="name" value="{{old('name')}}">
                              </div>
                            </div>


                            @if(request()->has('type'))
                            <input type="hidden" name="type" value="{{request()->input('type') }}">
                            @else

                            <div class="col-md-3">
                              <div class="mb-3">
                                <label class="form-label">{{ __('admin.courses.course_type')}}</label>
                                <select class="form-control form-select" name="course_type_id" id="course_type_id">
                                  <option value="">{{ __('select') }}</option>
                                  @foreach($courseTypes as $type)
                                  <option value="{{ $type->id }}"> {{ $type->name }}</option>

                                  @endforeach
                                </select>
                              </div>
                            </div>
                            @endif

                            <div class="col-md-3">
                              <div class="mb-3">
                                <label class="form-label">{{ __('admin.courses.track')}}</label>
                                <select class="form-control form-select" name="track_id">
                                  <option value="">{{ __('select') }}</option>
                                  @foreach($tracks as $track)
                                  <option value="{{ $track->id }}"> {{ $track->name }}</option>

                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="mb-3">
                                <label class="form-label">{{ __('admin.courses.instructor')}}</label>
                                <select class="form-control form-select" name="instructor_id">
                                  <option value="">{{ __('select') }}</option>
                                  @foreach($instructors as $instructor)
                                  <option value="{{$instructor->id}}"> {{ $instructor->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="card-footer text-end">
                          <button type="submit" class="btn btn-primary">{{ __('admin.search')}}</button>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>


              </div>
            </div>

          </div>


          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable" id="courses">
              <thead>
                <tr>
                  <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                  <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 15l6 -6l6 6"></path>
                    </svg>
                  </th>
                  <th> {{__('admin.courses.image')}}</th>
                  <th> {{__('admin.courses.name')}}</th>
                  <th>{{ __('admin.courses.track') }}</th>
                  <th>{{ __('admin.courses.instructor') }}</th>
                  <th> {{__('admin.courses.type')}}</th>
                  <th>{{ __('admin.courses.period') }}</th>
                  <th>{{ __('admin.courses.price') }}</th>
                  <th>{{ __('admin.courses.price_with_discount') }}</th>
                  <th>{{ __('admin.courses.status') }}</th>
                  <th>{{ __('admin.courses.recommend_status') }}</th>
                  <th>{{ __('admin.courses.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($rows as $row)

                <tr>
                  <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                  <td><span class="text-secondary">{{$loop->iteration}}</span></td>
                  <td><img src="{{$row->imageFullPath}}" style="width:40px"></td>
                  <td>{{$row->name}}</td>
                  <td>
                    @if($row->tracks)
                    <ul class="list-unstyled">
                      @foreach($row->tracks as $item)
                      <li class="badge badge-primary" style="display: table;margin-bottom:5px;"> {{ $item->name  }}</li>
                      @endforeach
                    </ul>
                    @endif

                  </td>
                  <td>
                    @if($row->instructors)
                    <ul class="list-unstyled">
                      @foreach($row->instructors as $item)
                      <li class="badge badge-primary" style="display: table;margin-bottom:5px;"> {{ $item->name  }}</li>
                      @endforeach
                    </ul>
                    @endif

                  </td>
                  <td>{{optional($row->coursetype)->name}}</td>
                  <th>{{$row->period }} {{ __($row->periodLabel) }}</th>
                  <td>{{$row->price}} {{ $setting->currency }}</td>
                  <td>{{$row->price_with_discount}} {{ $setting->currency }}</td>

                  <td>


                    <div class="form-check form-switch md-3" style="margin:10px">

                      <input data-id="{{$row->id}}" data-type='App\Models\Course' class="form-check-input form-control toggole-class" type="checkbox" style="float: right;" role="switch" id="flexSwitchCheckDefault" @if($row->active==1) checked="checked" @endif name="active">
                    </div>
                  </td>

                  <td>


                    <div class="form-check form-switch md-3" style="margin:10px">

                      <input data-id="{{$row->id}}" data-type='App\Models\Course' class="form-check-input form-control toggole-recommened" type="checkbox" style="float: right;" role="switch" id="flexSwitchCheckDefault" @if($row->recommened==1) checked="checked" @endif name="recommened">
                    </div>
                  </td>



                  <td style="width: 270px;">


                    <a href="{{ url('admin/courses/'.$row->id) }}" title="{{__('admin.show')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn btn-icon btn-primary btn-sm">
                      <span class="far fa-eye "></span>
                    </a>
                    <a href="{{ route($route.'.edit',$row->id) }}" title="{{__('admin.edit')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn btn-icon btn-primary btn-sm">
                      <span class="far fa-edit "></span>
                    </a>

                    <a href="{{ url('admin/courses/'.$row->id .'/levels') }}" title="{{__('admin.show_level')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn btn-icon btn-primary btn-sm">
                      <i class="fa fa-level-up" aria-hidden="true"></i>
                    </a>


                    <button type="button" title="{{__('admin.delete')}}" data-bs-placement="bottom" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$row->id }}">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                    <!-- Include Delete modal -->
                    @include('admin.layouts.inc.delete')
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <div class="card-footer d-flex align-items-center">
            {{ $rows->links()}}
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php
if (app()->getLocale() == 'ar') {
  $locale = 'Arabic';
  $dir = 'right to left';
} else {
  $locale = 'English';
  $dir = 'left to right';
}

?>
@endsection

@push('scripts')
<script>
  let locale = '<?= $locale ?>'; // assuming this is set by your PHP code
  let url = `https://cdn.datatables.net/plug-ins/1.10.24/i18n/${locale}.json`;
  let dir = '<?= $dir ?>';
  console.log(url);

  new DataTable('#courses', {
    language: {

      url: url
    },

    'direction': dir,
    "scrollX": true,
    "fixedHeader": {
      "headerOffset": 1
    },
    columnDefs: [{
      className: 'dt-center',
      targets: '_all',

    }],
    layout: {
      topStart: {
        buttons: [{
            extend: 'colvis',
            text: '<i class="fa fa-eye-slash text-primary" aria-hidden="true" style="font-size:large;"></i>',

            columns: ":not(':first')"
          },

          {
            extend: 'copyHtml5',
            text: '<i class="fas fa-copy text-primary" style="font-size:large;"></i>',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel text-primary" style="font-size:large;"></i>',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'pdfHtml5',
            text: '<i class="far fa-file-pdf fa-lg text-primary"></i>',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'csvHtml5',
            title: 'CSV',
            text: '<i class="fas fa-file text-primary" style="font-size:large;"></i>',
            exportOptions: {
              columns: ':not(:last-child)',
              columns: ':visible'

            }
          },

        ]
      }
    }
  });
</script>
@endpush