@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                {{ Breadcrumbs::render('show-courses',$row) }}

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
                                        <th>{{__('admin.courses.name')}}</th>
                                        <td>{{ $row->name }}</td>
                                    </tr>
                                    <tr>
                                        <th> {{__('admin.courses.type')}}</th>
                                        <td>{{optional($row->coursetype)->name}}</td>

                                    </tr>
                                    <tr>
                                        <th> {{__('admin.courses.image')}}</th>
                                        <td> <img src="{{ $row->imageFullPath }}" style="width:40px"></td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.courses.price') }}</th>
                                        <td>{{$row->price}} {{ $setting->currency }}</td>

                                    </tr>


                                    <tr>
                                        <th>{{ __('admin.courses.price_with_discount') }}</th>
                                        <td>{{$row->price_with_discount}} {{ $setting->currency }}</td>

                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.courses.seat_number') }}</th>
                                        <td>{{$row->seat_number}} </td>

                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.courses.level') }}</th>
                                        <td>{{$row->DifficultyLevelLabel}}</td>

                                    </tr>
                                    <tr>
                                        <th> {{__('admin.courses.create_date')}}</th>
                                        <td>{{ $row->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th> {{__('admin.courses.field_published_at')}}</th>
                                        <td>{{ $row->published_at }}</td>
                                    </tr>
                                    <tr>
                                        <th> {{__('admin.courses.start_date')}}</th>
                                        <td>{{ $row->start_date }}</td>
                                    </tr>
                                    <tr>
                                        <th> {{__('admin.courses.end_date')}}</th>
                                        <td>{{ $row->end_date }}</td>
                                    </tr>

                                    <tr>
                                        <th> {{__('admin.courses.general_rate')}}</th>
                                        <td>
                                            @for ($i = 0; $i <5 ; $i++) @if ($i < $row->manual_review_val)
                                                <i class="fa fa-star"></i>
                                                @else
                                                <i class="fa-regular fa-star"></i>
                                                @endif
                                                @endfor
                                                ( {{ $row->manual_review_val}})
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.courses.track') }}</th>
                                        <td>
                                            @if($row->tracks)
                                            <ul class="list-unstyled">
                                                @foreach($row->tracks as $item)
                                                <li> {{ $item->name  }}</li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </td>

                                    </tr>

                                    <!-- <tr>
                                        <th>{{ __('admin.courses.instructor') }}</th>
                                        <td>
                                            @if($row->instructors)
                                            <ul class="list-unstyled">
                                                @foreach($row->instructors as $item)
                                                <li> {{ $item->name  }}</li>
                                                @endforeach
                                            </ul>
                                            @endif

                                        </td>

                                    </tr> -->

                                    <tr>
                                        <th>{{ __('admin.courses.period') }}</th>
                                        <th>{{$row->period }} {{ __($row->periodLabel) }}</th>

                                    </tr>



                                    <tr>
                                        <th>{{ __('admin.courses.status') }}</th>
                                        <td>


                                            @if($row->active==1)
                                            {{ __('admin.active')}}
                                            @else
                                            {{ __('admin.inactive')}}


                                            @endif

                                        </td>


                                    </tr>




                                    <tr>



                                        <th>{{ __('admin.courses.recommend_status') }}</th>
                                        <td>


                                            <div class="form-check form-switch md-3" style="margin:10px">

                                                <input data-id="{{$row->id}}" data-type='App\Models\Course' class="form-check-input form-control toggole-recommened" type="checkbox" style="float: right;" role="switch" id="flexSwitchCheckDefault" @if($row->recommened==1) checked="checked" @endif name="recommened">
                                            </div>
                                        </td>


                                    </tr>


                                    <tr>
                                        <th>{{ __('admin.courses.prerequisites') }}</th>
                                        <td>{!! $row->prerequisites !!} </td>

                                    </tr>

                                    <tr>
                                        <th>{{ __('admin.courses.descriptions') }}</th>
                                        <td>{!! $row->description !!} </td>

                                    </tr>


                                    <tr>
                                        <th>{{ __('admin.courses.goals') }}</th>
                                        <td>{!! $row->goals !!} </td>

                                    </tr>

                                    <tr>
                                        <th>{{ __('admin.courses.directedTo') }}</th>
                                        <td>{!! $row->directedTo !!} </td>

                                    </tr>


                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3> {{ __('admin.courses.instructors') }} </h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class=" export-table table card-table table-vcenter text-nowrap datatable">
                                            <thead>
                                                <tr>
                                                    <th class="w-1"># <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M6 15l6 -6l6 6"></path>
                                                        </svg>
                                                    </th>
                                                    <td> {{ __('admin.courses.instructor') }} </td>
                                                    <td> {{ __('admin.courses.buy_course_instructor') }}</td>
                                                    <td> {{ __('admin.courses.instructor_prectange') }}</td>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($row->instructors as $instructor)

                                                <tr>
                                                    <td><span class="text-secondary">{{$loop->iteration}}</span></td>
                                                    <td>{{$instructor->name}}</td>
                                                    <td>{{$instructor->pivot->course_price}} {{ $setting->currency }}</td>
                                                    <td>{{$instructor->pivot->course_prectange}} % </td>



                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3> إحصائيات</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="row row-cards">

                                            <div class="col-sm-6 col-lg-6">
                                                <div class="card card-sm">
                                                    <div class="card-body" style="min-height:90px;">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <span class="bg-blue text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calculator">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                        <path d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                                                        <path d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                                                                        <path d="M8 14l0 .01" />
                                                                        <path d="M12 14l0 .01" />
                                                                        <path d="M16 14l0 .01" />
                                                                        <path d="M8 17l0 .01" />
                                                                        <path d="M12 17l0 .01" />
                                                                        <path d="M16 17l0 .01" />
                                                                    </svg></span>
                                                            </div>
                                                            <div class="col">
                                                                <div class="font-weight-medium">
                                                                    {{ $row->Totalsubscription }} {{ $setting->currency }}
                                                                </div>
                                                                <div class="text-secondary">
                                                                    {{ __('admin.courses.total_subscriptions') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-lg-6">
                                                <div class="card card-sm">
                                                    <div class="card-body" style="min-height:90px;">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <span class="bg-blue text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path>
                                                                        <path d="M12 3v3m0 12v3"></path>
                                                                    </svg> </span>

                                                            </div>
                                                            <div class="col">
                                                                <div class="font-weight-medium">
                                                                    <td>{{ $row->SubscriptionCount }}</td>
                                                                </div>
                                                                <div class="text-secondary">
                                                                    <th>{{ __('admin.instructors.susbscriptions_count') }}</th>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
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