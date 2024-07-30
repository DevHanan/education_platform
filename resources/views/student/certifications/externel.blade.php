@extends('admin.layouts.master')
@section('title', $title)
@section('content')


<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('studentexternalCertifications') }}

            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">

                    <a href="{{ route($route.'.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        {{__('admin.btn_add_new_certification')}} </a>

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
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                                    <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 15l6 -6l6 6"></path>
                                        </svg>
                                    </th>
                                    <th> {{__('admin.certifications.name')}}</th>
                                    <th>{{ __('admin.certifications.course_name') }}</th>
                                    <th>{{ __('admin.certifications.track_name') }}</th>
                                    <th>{{ __('admin.certifications.authority') }}</th>
                                    <th>{{ __('admin.certifications.date') }}</th>
                                    <th>{{ __('admin.certifications.status') }}</th>
                                    <th>{{ __('admin.certifications.file') }}</th>
                                    <th>{{ __('admin.tracks.actions') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows as $row)

                                <tr>
                                    <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                                    <td> {{ $loop->iteration }}</td>
                                    <td><span class="text-secondary">{{$row->name}}</span></td>
                                    <td>{{ optional($row->course)->name}}</td>
                                    <td>{{ optional($row->track)->name}}</td>
                                    <td>{{$row->authority}}</td>
                                    <td>{{$row->date}}</td>
                                    <td> {{ __($row->statusLabel) }}</td>

                                    <td>
                                        @if(file_exists($row->fileFullPath))
                                        <a href="{{$row->fileFullPath}}" style="width:40px" class="btn btn-primary">
                                            عرض الملف
                                        </a>
                                        @else
                                        لا يوجد ملف للعرض
                                        @endif
                                    </td>

                                    <td style="width: 270px;">



                                        @if($row->active != 1)
                                        

                                        <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$row->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <!-- Include Delete modal -->
                                        @include('admin.layouts.inc.delete')
                                        @endif
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