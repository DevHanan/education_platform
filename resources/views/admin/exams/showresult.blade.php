@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                {{ Breadcrumbs::render('show-result',$row) }}

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


                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3> {{ __('admin.quizzes.questions') }} </h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class=" export-table table card-table table-vcenter text-nowrap datatable">
                                            <thead>
                                                <tr>


                                                    <th class="w-1">
                                                        #
                                                    </th>
                                                    <th>{{__('admin.bankquestions.title')}} </th>
                                                    <th>{{__('admin.bankquestions.title_photo')}} </th>
                                                    <th>{{__('admin.bankquestions.ban_group')}} </th>
                                                    <th> {{__('admin.bankquestions.options')}}</th>
                                                    <th> {{__('admin.bankquestions.correct_answer')}}</th>
                                                    <th>{{__('admin.bankquestions.mark')}} </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($row->StudentExamdetail as $obj)

                                                <tr>
                                                    <td><span class="text-secondary">{{$loop->iteration }}</span></td>
                                                    <td> {{ Str::words( optional($obj->question)->customTitle, 7) }}</td>
                                                    <td><img src="{{ optional($obj->question)->pictureFullPath }}" style="width:40px"></td>
                                                    <td>{{ optional(optional($obj->question)->group)->name}}</td>
                                                    <td>
                                                        <ul style="list-style-type:decimal;">
                                                            <li>
                                                                <span class="badge bg-cyan text-cyan-fg">{{ optional($obj->question)->answer1 }}</span>
                                                            </li>
                                                            <li>
                                                                <span class="badge bg-cyan text-cyan-fg">{{ optional($obj->question)->answer2 }}</span>
                                                            </li>
                                                            <li>
                                                                <span class="badge bg-cyan text-cyan-fg">{{ optional($obj->question)->answer3 }}</span>
                                                            </li>
                                                            <li>
                                                                <span class="badge bg-cyan text-cyan-fg">{{ optional($obj->question)->answer4 }}</span>
                                                            </li>
                                                        </ul>


                                                    </td>
                                                    <td> {{ optional($obj->question)->correctanswer}}</td>

                                                    <td>{{optional($obj->question)->mark}}</td>



                                                   

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- [ Data table ] end -->
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
@endsection