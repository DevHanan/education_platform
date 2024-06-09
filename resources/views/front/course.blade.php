@extends('front.layouts.master')
@section('title', $title)
@section('content')
@include('front.layouts.common.navbar')
<div class="course-content-page">

    <div class="hero_sec pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img h-100 d-flex">
                        @if(isset($course->backgroundImageFullPath))
                        <img src="{{ $course->backgroundImageFullPath }}" class="img-fluid m-0" alt="">
                        @else
                        <img src="{{ asset('public/front/img/questions.svg')}}" class="img-fluid m-0" alt="">
                        @endif
                    </div>
                </div>
                <div class="col-md-6 position-relative">
                    <img src="{{ asset('public/front/img/completed-bg.svg')}}" class="position-absolute img-fluid" alt="">
                    <div class="info position-relative py-5">
                        <h2 class="title py-3 pb-1 fw-bold secondary-color text-center"> {{ $course->name }} </h2>
                        <h3 class="fw-bold text-center mb-4">
                        @foreach($course->tracks as $track)

                            <a href="{{ url('courses?track_id='.$track->id)}}" class="text-decoration-none btn-info">{{ $track->name }}</a>
                            @endforeach

                        </h3>
                        <div class="d-flex justify-content-center align-items-center">
                            @if($course->SubscriptionCount > 0)
                            <div class="persons mx-3">
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li class="avatar avatar-xs pull-up position-relative">
                                        <img src="{{ asset('public/front/img/user4.png')}}" alt="Avatar" class="rounded-circle w-100 h-100" />
                                    </li>
                                    <li class="avatar avatar-xs pull-up position-relative">
                                        <img src="{{ asset('public/front/img/user1.png')}}" alt="Avatar" class="rounded-circle w-100 h-100" />
                                    </li>
                                    <li class="avatar avatar-xs pull-up position-relative">
                                        <img src="{{ asset('public/front/img/user2.png')}}" alt="Avatar" class="rounded-circle w-100 h-100" />
                                    </li>
                                    <li class="avatar avatar-xs pull-up position-relative">
                                        <img src="{{ asset('public/front/img/user3.png')}}" alt="Avatar" class="rounded-circle w-100 h-100" />
                                    </li>
                                    <li class="avatar avatar-xs pull-up position-relative">
                                        <span class="rounded-circle w-100 h-100 bg-white d-flex justify-content-center align-items-center">+{{ $course->SubscriptionCount}}</span>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            <div class="followers_number mx-3">
                                <p class="text-white mb-1">{{ $course->SubscriptionCount}} طلاب </p>
                                <p class="text-white mb-0">يتابعون هذه الدورة </p>
                            </div>
                        </div>
                        <div class="ratings d-flex justify-content-center my-4">
                            <span class="text-white mx-4 fw-bold">(15) 4.5</span>
                            <div class="stars">
                                <img src="{{ asset('public/front/img/emptyStar.png')}}" alt="">
                                <img src="{{ asset('public/front/img/Star.svg')}}" alt="">
                                <img src="{{ asset('public/front/img/Star.svg')}}" alt="">
                                <img src="{{ asset('public/front/img/Star.svg')}}" alt="">
                                <img src="{{ asset('public/front/img/Star.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="date text-center">
                            <i class="fa fa-calendar" style="color: #374957;"></i>
                            <span class="fw-bold mx-2">{{ $course->published_at  }}</span>
                        </div>


                        @if( $course->isSubscribed == 0)

                        <div class="d-flex justify-content-center mb-3">
                            <a href="{{url('cart/'.$course->id)}}" class="btn secondary-bg text-white mt-4 px-3"> اشترك الأن <i class="fa fa-arrow-left mx-2"></i></a>
                        </div>
                        @elseif( $course->isSubscribed == 1)
                        <div class="d-flex justify-content-center mb-3">
                            <span class="btn secondary-bg text-white mt-4 px-3"> <i class="fa-solid fa-bell"></i> انت بالفعل مشترك فى الدورة
                            </span>
                        </div>
                        @elseif( $course->isSubscribed == -1)
                        <div class="d-flex justify-content-center mb-3">
                            <span class="btn secondary-bg text-white mt-4 px-3"> <i class="fa-solid fa-bell"></i> الإشتراك قيد الانتظار للتفعيل
                            </span>
                        </div>
                        @endif

                        <div class="form-check d-flex justify-content-center p-0" style="font-size: 14px;">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label me-5 text-white" for="flexCheckChecked">
                                أرغب في تلقي بريد إلكتروني من دوافير والتعرف على العروض الأخرى المتعلقة بالمحاسبة
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 right-class">
                <div class="nav-align-top shadow-sm border my-4" style="border-radius: 24px;">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item py-3">
                            <button type="button" class="nav-link border-0 p-0 m-0 active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-content" aria-controls="navs-justified-content" aria-selected="true">
                                <span class="d-sm-block fw-bold text-dark"> محتوي الدورة</span>
                            </button>
                        </li>
                        <li class="nav-item py-3">
                            <button type="button" class="nav-link border-0 p-0 m-0" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-about" aria-controls="navs-justified-about" aria-selected="false">
                                <span class="d-sm-block fw-bold text-dark"> عن الدورة</span>
                            </button>
                        </li>
                        @if(count($course->instructors))
                        <li class="nav-item py-3">
                            <button type="button" class="nav-link border-0 p-0 m-0" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-trainsers" aria-controls="navs-justified-trainsers" aria-selected="false">
                                <span class="d-sm-block fw-bold text-dark"> عن المدرب</span>
                            </button>
                        </li>
                        @endif
                        <li class="nav-item py-3">
                            <button type="button" class="nav-link border-0 p-0 m-0" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-rating" aria-controls="navs-justified-rating" aria-selected="false">
                                <span class="d-sm-block fw-bold text-dark"> تقييمات الطلاب</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content p-4">
                        <div class="tab-pane fade show active" id="navs-justified-content" role="tabpanel">

                            <!-- اختبار بداية الدورة -->
                            <div class="accordion mb-4" id="course_start_exam">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading">
                                        <button class="accordion-button bg-white border-bottom" type="button" data-bs-toggle="collapse" data-bs-target="#start_exam" aria-expanded="true" aria-controls="start_exam">
                                            <img src="{{ asset('public/front/img/icons/fi-rr-document.png')}}" class="ms-2" alt=""> اختبار بداية الدورة
                                        </button>
                                    </h2>
                                    <div id="start_exam" class="accordion-collapse collapse" aria-labelledby="heading" data-bs-parent="#course_start_exam">
                                        <div class="accordion-body">
                                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="my-2">المحاولات : <span>0/3</span></div>
                                                <div class="my-2">درجات الاجتياز : <span>70/100</span></div>
                                                <div class="time my-2 ms-3"> <img src="{{ asset('public/front/img/icons/fi-rr-alarm-clock.svg')}}" class="mx-1" width="15" alt=""> 30 : 1 ساعة </div>
                                                <div class="time my-2 ms-3"> <img src="{{ asset('public/front/img/icons/fi-rr-calendar.png')}}" class="mx-1" width="15" alt=""> 12 سبتمبر , 2023 </div>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-end mt-2">
                                                <div class="mt-2">
                                                    <button class="btn secondary-bg px-3 text-white">ابدء الأختبار</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- المرحلة الاولي -->
                            @if(count($course->levels))
                            @foreach($course->levels as $level)
                            <div class="accordion mb-4" id="accordion{{$level->id}}">
                                <div class="accordion-item border-0 shadow-sm">
                                    <h2 class="accordion-header" id="headingOne{{$level->id}}">
                                        <button class="accordion-button pb-0 d-block bg-transparent border-bottom" type="button" data-bs-toggle="collapse" data-bs-target="#dataTab{{$level->id}}" aria-expanded="true" aria-controls="dataTab">
                                            <div class="d-flex justify-content-between flex-wrap mb-2">
                                                <p> {{ $level->name }} </p>
                                                <div class="d-flex flex-wrap">
                                                    <div class="parts"> {{ $level->lectures()->count()}} محاضرات</div>
                                                    <div class="time mx-3"> <img src="{{ asset('public/front/img/icons/fi-rr-alarm-clock.svg')}}" class="mx-1" width="15" alt=""> {{ $level->period }} {{ __($level->periodLabel) }} </div>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>

                                    @foreach($level->lectures as $lecture)
                                    <div id="dataTab{{$level->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion{{$level->id}}">
                                        <div class="accordion-body">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne{{$level->id}}">
                                                    <button class="accordion-button bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#stage1_lec{{$lecture->id}}
                                        " aria-expanded="true" aria-controls="stage1_lec1">
                                                       
                                                        <img src="{{ asset('public/front/img/icons/fi-rr-bell.png')}}" class="ms-2" alt="">

                                                        {{ $lecture->title }}

                                                        @if($lecture->free == 0)
                                                       <i class="fas fa-lock" style="direction: ltr;"></i> 
                                                        @endif

                                                    </button>

                                                </h2>
                                                <div id="stage1_lec{{$lecture->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#data_body">
                                                    <div class="accordion-body">
                                                        <p>
                                                            {!!
                                                            $lecture->short_description
                                                            !!} </p>
                                                        <div class="d-flex flex-wrap justify-content-between align-items-center mt-4">
                                                            <div class="d-flex flex-wrap mt-2">
                                                                <div class="time ms-3"> <img src="{{ asset('public/front/img/icons/fi-rr-alarm-clock.svg')}}" class="mx-1" width="15" alt=""> {{ $lecture->period }} ساعة</div>
                                                                <div class="time ms-3"> <img src="{{ asset('public/front/img/icons/fi-rr-calendar.png')}}" class="mx-1" width="15" alt=""> {{ $lecture->created_at->format('l, F j, Y') }} </div>
                                                            </div>
                                                            @if($lecture->free == 1 || $course->isSubscribed == 1)
                                                            <div class="mt-2">
                                                                <a class="btn secondary-bg px-3 text-white" href="{{url('lecture/'.$lecture->id)}}">اذهب الي المحاضرة</a>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                            @endforeach
                            @else
                            لا يوجد محتوى للعرض
                            @endif



                        </div>

                        <div class="tab-pane fade" id="navs-justified-about" role="tabpanel">
                            <h3 class="primary-color fw-bold"> {{ $course->name }}</h3>
                            <p class="my-4">
                                {!! $course->description !!}
                            </p>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="title primary-color fw-bold mb-4">اهدف الدورة</div>
                                    {!! $course->goals !!}
                                </div>
                                <div class="col-lg-6">
                                    <div class="title primary-color fw-bold mb-4">الدورة موجهة الي :</div>
                                    {!! $course->directedTo !!}
                                </div>
                                
                            </div>
                            <div class="row">
                            <div class="col-lg-6">
                                    <div class="title primary-color fw-bold mb-4"> متطلبات مسبقة للدورة</div>
                                    {!! $course->prerequisites !!}
                                </div>
                            </div>
                           
                        </div>

                        <div class="tab-pane fade" id="navs-justified-trainsers" role="tabpanel">
                            @if($course->instructors)
                            @foreach($course->instructors as $instructor )
                            <div class="shadow-sm my-4 p-4" style="border-radius: 24px;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="person d-flex align-items-center">
                                        <div class="img"><img src="{{ asset('public/front/img/user4.png')}}" alt=""></div>
                                        <p class="fw-bold mx-3"> {{ $instructor->name  }}</p>
                                    </div>
                                    <div class="rating d-flex">
                                        <div><img src="{{ asset('public/front/img/icons/fi-rr-e-learning.png')}}" width="20" alt=""></div>
                                        <div class="mx-2 fw-bold">
                                            {{ $instructor->courses()->count()  }}
                                            دورة
                                        </div>
                                    </div>
                                </div>
                                <div class="opinion my-3">
                                    {!! $instructor->qualifications !!}
                                </div>
                                <div class="rating d-flex justify-content-end align-items-center">
                                    <!-- <div class="fw-bold">تقييم عام </div> -->
                                    <div class="mx-2 fw-bold">4.5 </div>
                                    <div class="img">
                                        <img src="{{ asset('public/front/img/icons/empty-yellow-star.png')}}" alt="">
                                        <img src="{{ asset('public/front/img/icons/yellow-star.png')}}" alt="">
                                        <img src="{{ asset('public/front/img/icons/yellow-star.png')}}" alt="">
                                        <img src="{{ asset('public/front/img/icons/yellow-star.png')}}" alt="">
                                        <img src="{{ asset('public/front/img/icons/yellow-star.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            لا توجد بيانات للمدربين لعرضها
                            @endif
                        </div>

                        <div class="tab-pane fade" id="navs-justified-rating" role="tabpanel">
                            <!-- <div id="paginationCard">
                                <div class="card_pagination shadow-sm my-4 p-4" style="border-radius: 24px;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="person d-flex align-items-center">
                                            <div class="img"><img src="{{ asset('public/front/img/user4.png')}}" alt=""></div>
                                            <p class="fw-bold mx-3">علي احمد</p>
                                        </div>
                                        <div class="rating d-flex">
                                            <div class="mx-2 fw-bold">4.5</div>
                                            <div class="img">
                                                <img src="{{ asset('public/front/img/icons/empty-yellow-star.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/icons/yellow-star.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/icons/yellow-star.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/icons/yellow-star.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/icons/yellow-star.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="opinion my-3">
                                        لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                                        أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                                        أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات .
                                    </div>
                                </div>

                                <div class="card_pagination shadow-sm my-4 p-4" style="border-radius: 24px;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="person d-flex align-items-center">
                                            <div class="img"><img src="{{ asset('public/front/img/user4.png')}}" alt=""></div>
                                            <p class="fw-bold mx-3">علي احمد</p>
                                        </div>
                                        <div class="rating d-flex">
                                            <div class="mx-2 fw-bold">4.5 </div>
                                            <div class="img">
                                                <img src="{{ asset('public/front/img/icons/empty-yellow-star.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/icons/yellow-star.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/icons/yellow-star.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/icons/yellow-star.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/icons/yellow-star.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="opinion my-3">
                                        لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                                        أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                                        أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات .
                                    </div>
                                </div>
                            </div> -->

                            <!-- <nav class="mt-4 d-flex justify-content-center" aria-label="Page navigation example">
                                <ul id="pagination" class="pagination align-items-center">
                                    <li class="page-item">
                                        <a id="prevPageBtn" class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a id="nextPageBtn" class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav> -->

                            <div class="comment mt-5">
                                <h3 class="primary-color">اضف تعليقك</h2>
                                    <form action="">
                                        <textarea name="" class="form-control w-100" id="" cols="30" rows="5"></textarea>
                                        <div class="d-flex flex-wrap my-3">
                                            <p class="fw-bold ms-3">ما تقييمك للدورة؟</p>
                                            <div class="rating-stars" data-question="course">
                                                <img src="{{ asset('public/front/img/emptyStar.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/emptyStar.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/emptyStar.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/emptyStar.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/emptyStar.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap my-3">
                                            <p class="fw-bold ms-3">ما تقييمك للمدرب؟</p>
                                            <div class="rating-stars" data-question="trainer">
                                                <img src="{{ asset('public/front/img/emptyStar.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/emptyStar.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/emptyStar.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/emptyStar.png')}}" alt="">
                                                <img src="{{ asset('public/front/img/emptyStar.png')}}" alt="">
                                            </div>
                                        </div>
                                        <button class="btn secondary-bg text-white mt-3"> انشر التعليق <img src="{{ asset('public/front/img/icons/fi-rr-comment-alt.png')}}" width="20" class="mx-3" alt=""></button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 left-class">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="course_content shadow-sm border my-4 p-2" style="border-radius: 24px;">
                            @if($course->videoId && $course->provider == 2)
                            <div class="position-relative w-100 h-100 gallery-item">

                                <iframe type='text/html' style="max-height: 220px;" src="{{$course->videoId}}" width='100%' height='500' frameborder='0' allowfullscreen='true' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                            </div>
                            @elseif($course->videoId && $course->provider == 1)
                            <div class="position-relative w-100 h-100 gallery-item">
                                <iframe src="{{$course->videoId}}" style="max-height: 220px;" frameborder="0" width='100%' height='500' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>

                            @else
                            <div class="img"><img src="{{ asset('public/front/img/video-img.png')}}" class="img-fluid w-100" alt=""></div>
                            @endif
                            <div class="info mt-3 px-4">
                                <p> <img src="{{ asset('public/front/img/icons/fi-rr-e-learning.png')}}" class="ms-2" width="20" alt=""> <span> {{ $course->lectures()->count()}} محاضرة</span></p>
                                <p> <img src="{{ asset('public/front/img/icons/fi-rr-money.svg')}}" class="ms-2" width="20" alt="">
                                    <span class="instead-price text-danger text-decoration-line-through mx-2">{{ $setting->currency }}{{ $course->price }}</span>
                                    <span class="fw-bold">{{ $setting->currency }} {{ $course->TotalDiscount }}</span>
                                    <!-- <span> {{ $setting->currency }}{{ $course->price }} </span> -->
                                </p>
                                <p> <img src="{{ asset('public/front/img/icons/fi-rr-user.svg')}}" class="ms-2" width="20" alt=""> <span> {{ $course->SubscriptionCount}} طلاب مشتركين</span></p>
                                <p> <img src="{{ asset('public/front/img/icons/fi-rr-e-learning.png')}}" class="ms-2" width="20" alt=""> <span> {{ $course->seat_number }} سعة مقاعد</span></p>
                                <p> <img src="{{ asset('public/front/img/icons/fi-rr-time-quarter-to.svg')}}" class="ms-2" width="20" alt=""> <span> {{ $course->period }}
                                        {{ $course->periodLabel }}
                                </p>


                                <p> <img src="{{ asset('public/front/img/icons/fi-rr-time-quarter-to.svg')}}" class="ms-2" width="20" alt="">
                                    <span> <i class="fi fi-rr-calendar"></i> {{ $course->start_date }} </span> /
                                    <span>{{ $course->end_date }}

                                    </span>
                                </p>
                                <p> <img src="{{ asset('public/front/img/icons/fi-rr-graduation-cap.svg')}}" class="ms-2" width="20" alt=""> <span> {{ optional($course->courseType)->name  }} </span></p>
                                <p> <img src="{{ asset('public/front/img/icons/fi-rr-graduation-cap.svg')}}" class="ms-2" width="20" alt=""> <span> {{ $course->difficultyLevelLabel }} </span></p>
                                @if( $course->isSubscribed == 0)

                                <div class="d-flex justify-content-center mb-3">
                                    <a href="{{ url('cart/'.$course->id)}}" class="btn secondary-bg text-white px-3"> اشترك الأن <i class="fa fa-arrow-left mx-2"></i></a>
                                </div>
                                @elseif( $course->isSubscribed == 1)
                                <div class="d-flex justify-content-center mb-3">
                                    <span class="btn secondary-bg text-white mt-4 px-3"> <i class="fa-solid fa-bell"></i> انت بالفعل مشترك فى الدورة
                                    </span>
                                </div>
                                @elseif( $course->isSubscribed == -1)
                                <div class="d-flex justify-content-center mb-3">
                                    <span class="btn secondary-bg text-white mt-4 px-3"> <i class="fa-solid fa-bell"></i> الإشتراك قيد الانتظار للتفعيل
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="shadow-sm border my-4 p-4 py-5 d-flex flex-column align-items-center" style="border-radius: 24px;">
                            <p class="fw-bold" style="font-size: 18px;">دورات ذات صلة</p>
                            <ul class="">
                                @if(count($related_courses))
                                @foreach($related_courses as $item)
                                <li class="py-1"><a href="{{url('course/'.$item->id)}}" class="text-decoration-none"> {{ $item->name }}</a></li>
                                @endforeach
                                @else
                                لا توجد دورات للعرض
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection