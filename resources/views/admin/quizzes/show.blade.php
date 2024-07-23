@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                {{ Breadcrumbs::render('show-quizzes',$row) }}

            </div>
            <!-- Page title actions -->

        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">

                                <tbody>

                                    <tr>
                                        <th> {{__('admin.quizzes.name')}}</th>
                                        <td>{{$row->name}}</td>


                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.quizzes.date') }}</th>
                                        <td>{{$row->created_at}}</td>

                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.quizzes.total_mark') }}</th>
                                        <td> {{ $row->total_mark }}</td>


                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.quizzes.pass_mark') }}</th>
                                        <td> {{ $row->pass_mark }}</td>


                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.quizzes.question_number') }}</th>
                                        <td>{{$row->question_number}}</td>



                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.quizzes.status') }}</th>
                                        <td>
                                            @if($row->active==1)
                                            {{ __('admin.active')}}
                                            @else
                                            {{ __('admin.inactive')}}


                                            @endif
                                        </td>


                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.quizzes.track') }}</th>
                                        <td>
                                            {{ optional($row->track)->name}}
                                        </td>


                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.quizzes.course') }}</th>
                                        </td>
                                        <td>
                                            {{ optional($row->course)->name}}

                                        </td>

                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.quizzes.level') }}</th>
                                        <td>
                                            {{ optional($row->level)->name}}

                                        </td>

                                    </tr>
                                    <tr>
                                        <th> {{__('admin.quizzes.lecture')}}</th>
                                        <td>
                                            {{ optional($row->lecture)->title}}

                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>


                        <!-- [ Data table ] end -->
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
@endsection