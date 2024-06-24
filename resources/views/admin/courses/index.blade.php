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
            <div class="col-md-9">
              <h3 class="card-title">{{ $title }}</h3>
            </div>

            <div class="col-md-2">


              <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                {{__('admin.advanced_search')}}
              </a>


            </div>

          

          </div>

          <div class="col-md-12">
              <div class="collapse card" id="collapseExample">

                <div class="col-md-12">

                <form class=" row col-md-12" action="{{url('admin/courses')}}">
                  <div class="form-group col-md-2">
                    <select class="select2 form-control" name="course_id" id="course_id">
                      <option value="">{{ __('select') }}</option>
                      @foreach($courses as $course)
                      <option value="{{ $course->id }}"> {{ $course->name }}</option>

                      @endforeach
                    </select>
                  </div>
                  <div class=" form-group col-md-2">
                    <select class="select2 " name="course_type_id" id="course_type_id" required>
                      <option value="">{{ __('select') }}</option>
                      @foreach($courseTypes as $type)
                      <option value="{{ $type->id }}"> {{ $type->name }}</option>

                      @endforeach
                    </select>
                  </div>
                  <div class=" form-group col-md-2">
                    <select class="select2 " name="track_id" id="track_id">
                      <option value="">{{ __('select') }}</option>
                      @foreach($tracks as $track)
                      <option value="{{ $track->id }}"> {{ $track->name }}</option>

                      @endforeach
                    </select>
                  </div>
                  <div class=" form-group col-md-2">
                    <select class="select2" name="instructor_id" style="padding:3px;">
                      <option value="0"> {{ __('admin.select_instructor')}}</option>
                      @foreach($instructors as $instructor)
                      <option value="{{$instructor->id}}"> {{ $instructor->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class=" form-group col-md-2">
                    <button type="submit" class="btn btn-success">{{__('admin.search')}}</button>
                  </div>
                  </form>
                </div>

              </div>
            </div>


          <div class="table-responsive">
            <table class=" export-table table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                  <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 15l6 -6l6 6"></path>
                    </svg>
                  </th>
                  <th> {{__('admin.courses.name')}}</th>
                  <th> {{__('admin.courses.image')}}</th>
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
                  <td>{{$row->name}}</td>
                  <td><img src="{{$row->imageFullPath}}" style="width:40px"></td>
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


                    <button type="button" title="{{__('admin.delete')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$row->id }}">
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

@endsection