@extends('admin.layouts.master')
@section('title', $title)
@section('content')

    <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                {{ $setting->title }}       
                </div>
                <h2 class="page-title">
                @if(isset($title))
        {{ $title }} 
      @endif
                </h2>
              </div>
              <!-- Page title actions -->
              <!-- <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  
                  <a href="{{ route($route.'.create') }}" class="btn btn-primary d-none d-sm-inline-block" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            {{ __('btn_add_new') }}
                    </a>
                
                </div>
              </div> -->
            </div>
          </div>
        </div>
    <div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">

        <!-- [ Data table ] start -->
        <div class="table-responsive">
            <table id="export-table" class="display table nowrap table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> {{__('certificate name')}}</th>
                        <th> {{__('course name')}}</th>
                        <th> {{__('create date')}}</th>
                        <th> {{__('authority')}}</th>
                        <th>{{ __('field_photo') }}</th>
                        <th>{{ __('control') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $row)
                    <tr>
                        <td class="ui-state-default drag-handler" data-faq="{{$row->id}}">{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->student->surname }}</td>
                        <td>{{$row->created_at }}</td>
                        <td>{{$row->authority }}</td>

                        <td><img src="{{asset($row->image)}}" style="width:40px"></td>					

                      
                        <td style="width: 270px;">



                            <a href="{{ route($route.'.edit',$row->id) }}" class="btn btn-icon btn-primary btn-sm">
                                <span class="far fa-edit "></span>
                            </a>

                            <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$row->id }}">
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
        <!-- [ Data table ] end -->

        </div>
    </div>
    </div>

@endsection