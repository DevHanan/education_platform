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
                        <p class="mt-4"> {!! optional($test->track)->name !!}</p>
                </div>
                <div id="end_exam" aria-labelledby="headingOne" data-bs-parent="#course_end_exam">
                    <div class="accordion-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="my-2">المحاولات : <span>0/3</span></div>
                            <div class="my-2">درجات الاجتياز : <span>{{ $test->pass_mark }}/{{ $test->total_mark}}</span></div>
                            <div class="time my-2 ms-3"> <img src="{{asset('front/img/icons/fi-rr-alarm-clock.svg')}}" class="mx-1" width="15" alt=""> 30 : 1 ساعة </div>
                            <div class="time my-2 ms-3"> <img src="{{asset('front/img/icons/fi-rr-calendar.png')}}" class="mx-1" width="15" alt=""> {{ $test->end_time }}</div>
                        </div>
                        <!-- <div class="d-flex flex-wrap justify-content-end mt-2">
                                            <div class="mt-2">
                                                <a href="{{url('exam/'.$test->id)}}" class="btn secondary-bg px-3 text-white">ابدء الأختبار</a>
                                            </div>
                                        </div> -->
                    </div>
                </div>
                <div>
                    <a href="{{url('exam/'.$test->id)}}" class="btn secondary-bg px-3 text-white">ابدء الأختبار</a>

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