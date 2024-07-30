@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                {{ Breadcrumbs::render('instructor-students') }}

            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">

            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">



            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="basic-table" class="export-table display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>{{ __('admin.students.field_name') }}</th>
                                        <th>{{ __('admin.students.field_join_date') }}</th>

                                        <th>{{ __('admin.students.course_name') }}</th>
                                        <!-- <th>{{ __('admin.students.track') }}</th> -->
                                        <th>{{ __('admin.students.subscribed_date') }}</th>
                                        <th>{{ __('admin.students.subscribed_amount') }}</th>

                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ optional($row->student)->name }}</td>
                                        <td>{{ optional($row->student)->created_at->format('l, F j, Y')  }}</td>
                                        <td>{{ optional($row->course)->name }}</td>
                                        <!-- <td>{{ optional($row->track)->name }}</td> -->

                                        <td>
                                            @if(isset($row->created_at))
                                            {{ $row->created_at->format('l, F j, Y')  }}
                                            @endif
                                        </td>
                                        <td> {{ $row->paid }} {{ $setting->currency }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {{ $rows->links()}}
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection