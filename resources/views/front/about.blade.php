@extends('front.layouts.master')
@section('title', '')
@section('content')
@include('front.layouts.common.navbar')

<!-- <section class="about">
    <div class="hero_sec pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img d-flex justify-content-center">
                        <img src="{{ asset($aboutsetting->backgroundImageFullPath)}}" class="img-fluid m-0" data-aos="fade-left" data-aos-duration="1000" alt="">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info position-relative py-5">
                        <img src="{{asset('/front/img/completed-bg.svg')}}" class="position-absolute w-100 h-100 img-fluid" alt="">
                        <h4 class="title py-5 pb-1 fw-bold secondary-color"> {{ $aboutsetting-> title}} </h4>
                        <div class="content fw-bold text-white">
                            {!! $aboutsetting->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($landing_setting->achievements == 1)
    <div class="achievementSec my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img">
                        <img src="{{asset('front/img/achievement.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info">
                        <h2 class="position-relative"> إنجازاتنا <img src="{{asset('front/img/text-line2.svg')}}" class="position-absolute" alt=""></h2>
                        <h5 class="my-5 mb-5 ">خلال فترة قصيرة حققنا هذه الإنجازات، نحن بكم ولكم وفي خدمتكم على الدوام.</h5>
                        <div class="row">

                            <div class="col-6">
                                <div class="data mb-4 d-flex align-items-center">
                                    <div class="img rounded p-3" style="background-color: #E9F8F3;"><img src="{{asset('/front/img/icons/GraduationCap.svg')}}" alt=""></div>
                                    <div class="mx-3 text-center">
                                        <h3 class="fw-bold count" data-target="{{ $aboutsetting->course_number}}"> 0</h3>
                                        <p class="fw-bold">دورات</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="data mb-4 d-flex align-items-center">
                                    <div class="img rounded p-3" style="background-color: #FFFAF5;"><img src="{{asset('/front/img/icons/VideoCamera.svg')}}" alt=""></div>
                                    <div class="mx-3 text-center">
                                        <h3 class="fw-bold count" data-target="{{$aboutsetting->lecture_number}}">0</h3>
                                        <p class="fw-bold">محاضرات</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="data mb-4 d-flex align-items-center">
                                    <div class="img rounded p-3" style="background-color: #F0F7FF;"><img src="{{asset('/front/img/icons/UsersThree.svg')}}" alt=""></div>
                                    <div class="mx-3 text-center">
                                        <h3 class="fw-bold count" data-target="{{ $aboutsetting->instructor_number}}">0</h3>
                                        <p class="fw-bold">مدربين</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="data mb-4 d-flex align-items-center">
                                    <div class="img rounded p-3" style="background-color: #FFEEF0;"><img src="{{asset('/front/img/icons/GraduationCap2.svg')}}" alt=""></div>
                                    <div class="mx-3 text-center">
                                        <h3 class="fw-bold count" data-target="{{ $aboutsetting->student_number}}"> 0</h3>
                                        <p class="fw-bold">طلاب</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($landing_setting->workteam == 1)

    <div class="team trainers py-5">
        <div class="container">
            <h2> تعرف على <span class="position-relative primary-color"> فريقنا <img src="{{asset('/front/img/text-line2.svg')}}" style="bottom: -12px;right: 0;" class="position-absolute" alt=""></span> </h2>
            <h5 class="my-5 mb-5 "> فريق عمل يضم نخبة من المتميزين فى إدارة المحتوى التعليمى الالكتروني وتقديمه بصورة متكاملة ومتميزة.</h5>
        </div>
        <div class="card__container swiper mt-4">
            <div class="container">

                <div class="card__content">
                    <div class="swiper-wrapper">
                        @foreach($teams as $team)
                        <article class="card__article swiper-slide shadow bg-white">
                            <a href="#">
                                <div class="card__image p-2">
                                    <img src="{{ asset('public/'.$team->image)}}" alt="image" class="card__img img-fluid w-100">
                                    <div class="card__shadow"></div>
                                </div>
                            </a>

                            <div class="card__data p-3">
                                <p class="card__description fw-bold text-center m-0 mb-2"> {{ $team->name }} </p>
                                <p class="card__description text-center m-0"> {{ $team->job }} </p>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="swiper-button-next">
                <i class="fa-solid fa-angle-right"></i>
            </div>

            <div class="swiper-button-prev">
                <i class="fa-solid fa-angle-left"></i>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>
    @endif

    <div class="aim position-relative my-5">
        <!-- <img src="{{asset('/front/img/aim-bg.svg')}}" class="position-absolute img-fluid" alt=""> -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="h-100 d-flex flex-column justify-content-center">
                        <h2 class="position-relative"> {{ $aboutsetting->mission_title }}
                            <img src="{{asset('/front/img/text-line2.svg')}}" class="position-absolute" alt="">
                        </h2>
                        <h5 class="my-5 mb-5 ">
                            {!! $aboutsetting->mission_description !!}
                        </h5>
                        <div>
                            <a href="{{url('signup')}}" class="btn rounded-pill secondary-bg text-white my-4">اشترك الآن مجانا وابدأ رحلتك التعليمية</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img"><img src="{{ asset( $aboutsetting->missionimageFullPath )}}" class="img-fluid" data-aos="fade-right" data-aos-duration="1000" alt=""></div>
                </div>
            </div>

        </div>
    </div>

    <div class="messages py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-none d-md-block">
                    <div class="img"><img src="{{asset('/front/img/messages.svg')}}" class="img-fluid" data-aos="fade-left" data-aos-duration="1000" alt=""></div>
                </div>
                <div class="col-md-6">
                    <div class="h-100">
                        <h2 class="position-relative"> رسالتنا وأهدافنا <img src="{{asset('/front/img/text-line2.svg')}}" class="position-absolute" alt=""></h2>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="data mb-5">
                                    <img src="{{ asset('public/'.$aboutsetting->msg_image1)}}" class="img-fluid rounded mb-3 p-2" style="background-color: #E8FEFD;" alt="">
                                    <h5> {{$aboutsetting->msg_title1 }}</h5>
                                    <p> {!! $aboutsetting->msg_desc1 !!}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="data mb-5">
                                    <img src="{{ asset('public/'.$aboutsetting->msg_image2) }}" class="img-fluid rounded mb-3 p-2" style="background-color: #E8FEFD;" alt="">
                                    <h5> {{$aboutsetting->msg_title2 }}</h5>
                                    <p> {!! $aboutsetting->msg_desc2 !!}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="data mb-5">
                                    <img src="{{ asset('public/'.$aboutsetting->msg_image3) }}" class="img-fluid rounded mb-3 p-2" style="background-color: #E8FEFD;" alt="">
                                    <h5> {{$aboutsetting->msg_title3 }}</h5>
                                    <p> {!! $aboutsetting->msg_desc3 !!}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="data mb-5">
                                    <img src="{{ asset('public/'.$aboutsetting->msg_image4) }}" class="img-fluid rounded mb-3 p-2" style="background-color: #E8FEFD;" alt="">
                                    <h5> {{$aboutsetting->msg_title4 }}</h5>
                                    <p> {!! $aboutsetting->msg_desc4 !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @if($landing_setting->parteners == 1)

    <div class="partners position-relative my-5">
        <div class="container text-center mb-3">
            <h2 class="position-relative"> شركاء نجاحنا <img src="{{asset('/front/img/text-line2.svg')}}" class="position-absolute" style="bottom: -19px;right: 50%;
                    transform: translateX(10px);" alt=""></h2>
        </div>

        <div class="card__container swiper mt-4">
            <div class="container">
                <div class="card__content">
                    <div class="swiper-wrapper">
                        @foreach($parteners as $partener)

                        <article class="card__article swiper-slide d-flex flex-column align-items-center shadow p-3">
                            <img style="height:130px;" src="{{ asset($partener->imageFullPath )}}" class="img-fluid" alt="">
                            <div class="fw-bold mt-3">{{ $partener->name }}</div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="swiper-button-next">
                <i class="fa-solid fa-angle-right"></i>
            </div>

            <div class="swiper-button-prev">
                <i class="fa-solid fa-angle-left"></i>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>
    @endif

    @if($landing_setting->question_list == 1)
    <div class="que mt-5 py-5 mb-3" style="background-color: #DBFFFE;">
        <div class="container">
            <h2 class="text-center mb-5">أسئلة متكررة؟</h2>
            <div class="d-flex justify-content-between que_content">
                <div class="w-100">
                    @foreach($questions as $item)
                    @if($loop->odd)
                    <ul>
                        <li>
                            <p class="m-0">
                                <a class="collapseQue fw-bold text-decoration-none" data-bs-toggle="collapse" href="#collapse_right_{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapse_right1">
                                    {!! $item->question !!}
                                </a>
                            </p>
                            <div class="collapse" id="collapse_right_{{$item->id}}">
                                <div class="card card-body bg-transparent border-0">
                                    {!! $item->answer !!}
                                </div>
                            </div>
                        </li>
                    </ul>
                    @endif
                    @endforeach

                </div>
                <div class="w-100">
                    @foreach($questions as $item)
                    @if($loop->even)
                    <ul>
                        <li>
                            <p class="m-0">
                                <a class="collapseQue fw-bold text-decoration-none" data-bs-toggle="collapse" href="#collapse_left{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapse_left1">
                                    {!! $item->question !!}
                                </a>
                            </p>
                            <div class="collapse" id="collapse_left{{$item->id}}">
                                <div class="card card-body bg-transparent border-0">
                                    {!! $item->answer !!}
                                </div>
                            </div>
                        </li>
                    </ul>
                    @endif
                    @endforeach

                </div>
            </div>

        </div>
    </div>
    @endif

</section> -->
@endsection

@push('frontscript')
<script>
    $(document).ready(function() {
        // counter
        const counters = document.querySelectorAll(".count");
        const speed = 700;
        
        const isElementInViewport = (el) => {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        };
    
        const startCounterIfVisible = (counter) => {
            if (isElementInViewport(counter)) {
                const updateCount = () => {
                    const target = parseInt(counter.getAttribute("data-target"));
                    const count = parseInt(counter.innerText);
                    const increment = Math.ceil(target / speed);
        
                    if (count < target) {
                        counter.innerText = count + increment;
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            } else {
                window.addEventListener('scroll', () => {
                    if (isElementInViewport(counter)) {
                        startCounterIfVisible(counter);
                        // Remove the event listener once the counter starts
                        window.removeEventListener('scroll', arguments.callee);
                    }
                });
            }
        };
        
        counters.forEach(startCounterIfVisible);
    });
    </script>
@endpush