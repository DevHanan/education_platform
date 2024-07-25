@extends('front.layouts.master')
@section('title', '')
@section('content')
@include('front.layouts.common.navbar')
<section class="header">
    <div class="text-center text-white">
        <h1 class="pb-3">إختبارات القدرات</h1>
        <!-- <p>تعرف على السياسات و اللوائح وكل ما يخص المؤسسة</p> -->
    </div>
</section>

<section class="tests container my-5 p-5 rounded">

    <div class="row">

        @if($tests)
        @foreach($tests as $test)
        <div class="col-lg-6">
            <div class=" justify-content-between align-items-center bg-white rounded policy-card mb-4">
                <div style="display: block !important;">
                    <h3> {{ $test->name }}</h2>
                        <!-- <p class="mt-4"> {!! optional($test->track)->name !!}</p> -->
                </div>
                <div id="end_exam" aria-labelledby="headingOne" data-bs-parent="#course_end_exam">
                    <div class="accordion-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="time my-2 ms-3">
                                <img src="{{asset('front/img/icons//fi-rr-user.svg')}}" class="mx-1" width="15" alt="">
                                {{ $test->passingattempt }} / 3

                            </div>
                            <div class="time my-2 ms-3">
                                <img src="{{asset('front/img/icons/fi-rr-graduation-cap.svg')}}" class="mx-1" width="15" alt="">
                                {{ $test->pass_mark }}/{{ $test->total_mark}}
                            </div>
                            <div class="time my-2 ms-3"> <img src="{{asset('front/img/icons/fi-rr-alarm-clock.svg')}}" class="mx-1" width="15" alt=""> {{ $test->created_at }} </div>
                        </div>

                    </div>
                </div>
                <div>
                    @if (Auth::guard('students-login')->check())
                    @if($test->has_level == 0)
                    <a href="{{url('start-exam/'.$test->id)}}" class="btn secondary-bg px-3 text-white">ابدء الأختبار</a>
                    @else
                    <a href="{{url('start-exam-levels/'.$test->id)}}" class="btn secondary-bg px-3 text-white">ابدء الأختبار</a>
                    @endif
                    @else
                    <!-- Show a placeholder for guests -->
                    <a class="btn secondary-bg px-3 text-white" disabled>سجل الدخول للمتابعة</a>
                    @endauth

                </div>
            </div>
        </div>
        @endforeach
        @else
        لا توجد بيانات للعرض
        @endif
    </div>

</section>
@endsection