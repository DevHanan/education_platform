@extends('front.layouts.master')
@section('title', '')
@section('content')
@include('front.layouts.common.navbar')
<div class="lecture-content-page">

    <h2 class="lec-title position-relative m-4 mb-5 fw-bold primary-color"> {{ $lecture->title }} </h2>

    <div class="px-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 right-class">
                    <div class="position-relative w-100 gallery-item mt-3" style="height: 400px;">
                        @if($lecture->link && $lecture->provider == 2)

                        <iframe type='text/html' style="height:340px !important;" src="{{$lecture->link}}" width='100%' style="height:100% !important;" frameborder='0' allowfullscreen='true' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                        @elseif($lecture->link && $lecture->provider == 1)
                        <iframe src="{{$lecture->link}}" style="height:340px !important;" frameborder="0" width='100%'  style="height:100% !important;" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                        @else
                        <a href="{{$lecture->link}}" target="_blank">

                            <video id="myVideo" class="w-100 h-100" poster="{{asset('public/front/img/video-img.png')}}" style="object-fit: cover;">
                                <source src="{{$lecture->link}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <div id="playButton" class="position-absolute play-icon p-3 rounded-pill d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-play text-white"></i>
                            </div>
                        </a>
                        @endif

                    </div>

                    <div class="lec-desc">
                        {!! $lecture->short_description !!}
                    </div>
                </div>

                <div class="col-lg-4 left-class">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="lecture_content shadow-sm border my-4 p-2" style="border-radius: 24px;">
                                <div class="info mt-3 px-4">
                                    <p> <img src="{{asset('public/front/img/icons/fi-rr-e-learning.png')}}" class="ms-2" width="20" alt=""> <span> الدورة : {{ optional($lecture->course)->name }} </span></p>
                                    <p> <img src="{{asset('public/front/img/icons/fi-rr-e-learning.png')}}" class="ms-2" width="20" alt=""> <span> المرحلة : {{ optional($lecture->level)->name }} </span></p>
                                    <p> <img src="{{asset('public/front/img/icons/user.png')}}" class="ms-2" width="20" alt=""> <span> المدرب : {{ optional(optional($lecture->level)->instructor)->name }} </span></p>
                                    <p> <img src="{{asset('public/front/img/icons/fi-rr-calendar.png')}}" class="ms-2" width="20" alt=""> <span> {{ $lecture->created_at->format('d/m/Y') }} </span></p>
                                    <p> <img src="{{asset('public/front/img/icons/fi-rr-time-quarter-to.svg')}}" class="ms-2" width="20" alt=""> <span> {{ $lecture->period }} ساعة </span></p>
                                    <p> <img src="{{asset('public/front/img/icons/fi-rr-e-learning.png')}}" class="ms-2" width="20" alt=""> <span>
                                            نوع المحاضرة :
                                            @if($lecture->type == 1)
                                            {{ __('admin.lectures.viedo')}}
                                            @else
                                            {{ __('admin.lectures.metting')}}
                                            @endif
                                        </span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="shadow-sm border my-3 p-4 pb-2" style="border-radius: 24px;">
                                <p class="fw-bold text-center" style="font-size: 18px;">الاهداف</p>
                                {!! $lecture->goals !!}
                            </div>
                        </div>
                    </div>
                </div>

                <section class="center-class">
                    <div class="content-lec mt-4">
                        <h3 class="fw-bold primary-color position-relative mb-4">الموضوع</h3>
                        <p class="container">
                            {!! $lecture->description !!}
                        </p>
                    </div>

                    @if($lecture->books)

                    <div class="content-book">
                        <h3 class="fw-bold primary-color position-relative mb-5">الكتب المرفقة</h3>
                        <div class="container">
                            <div class="row">
                                @foreach($lecture->books as $book)
                                <div class="col-lg-6">
                                    <div class="d-flex justify-content-between align-items-center bg-white rounded policy-card mb-4">
                                        <div>
                                            <h3> {{ $book->title }}</h2>
                                        </div>
                                        <div>

                                            @if($book->file)
                                            <a href="{{asset($book->file)}}" style="padding:10px 5px 10px 5px;" target="_blank" class="btn btn-success primary-bg" download="{{asset($book->file)}}"> <img src="{{asset('front/img/icons/material-symbols_download.png')}}" alt=""> تنزيل </a>
                                            @elseif(isset($book->link))
                                            <a href="{{asset($book->link)}}" style="padding:10px 5px 10px 5px;" target="_blank" class="btn btn-success primary-bg"> <img src="{{asset('front/img/icons/material-symbols_download.png')}}" alt=""> فتح الرابط </a>
                                            @else
                                            لا يوجد محتوى للعرض
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    @endif

                    @if($lecture->photos)
                    <section class="container py-3 mb-3 gallay-all">
                        <div class="row">
                            <h3 class="fw-bold primary-color position-relative mb-5">الصور المرفقة</h3>

                            @foreach($lecture->photos as $item)
                            @if($loop->iteration == 1)
                            <div class="col-md-5 mb-4">
                                @elseif($loop->iteration == 2)
                                <div class="col-md-7 mb-4">
                                    @elseif($loop->iteration == 3)
                                    <div class="col-md-8 mb-4">
                                        @else
                                        <div class="col-md-4 mb-4">
                                            @endif
                                            <div class="position-relative w-100 h-100 gallery-item">
                                                <img src="{{asset($item->photo)}}" class="w-100 h-100" alt="">
                                                <div class="position-absolute event-title bottom-0 w-100" style="background-color: rgb(0 0 0 / 65%);box-shadow: 0 0 10px #00000091;">
                                                    <p class="text-white m-3 mx-4"> {{ $item->title }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                    </section>
                    @endif
                    </section>

                    <section class="container py-3 mb-3 gallay-all">
                        <div class="row">
                            <h3 class="fw-bold primary-color position-relative mb-5">الاختبارات</h3>
                            @if($lecture->quiz)
                            @foreach ($lecture->quiz as $quiz )
                            <div class="accordion mb-4" id="course_end_exam">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button bg-white border-bottom" type="button" data-bs-toggle="collapse" data-bs-target="#end_exam" aria-expanded="true" aria-controls="end_exam">
                                        <img src="../img/icons/fi-rr-document.png" class="ms-2" alt="">  {{ $quiz->name }}
                                    </button>
                                  </h2>
                                  <div id="end_exam" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#course_end_exam">
                                    <div class="accordion-body">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="my-2">المحاولات : <span>0/3</span></div>
                                            <div class="my-2">درجات الاجتياز : <span>{{ $quiz->pass_mark }}/{{ $quiz->total_mark}}</span></div>
                                            <div class="time my-2 ms-3"> <img src="{{asset('front/img/icons/fi-rr-alarm-clock.svg')}}" class="mx-1" width="15" alt=""> 30 : 1 ساعة </div>
                                            <div class="time my-2 ms-3"> <img src="{{asset('front/img/icons/fi-rr-calendar.png')}}" class="mx-1" width="15" alt=""> {{ $quiz->end_time }}</div>
                                        </div>                                            
                                        <div class="d-flex flex-wrap justify-content-end mt-2">
                                            <div class="mt-2">
                                                <a href="{{url('exam/'.$quiz->id)}}" class="btn secondary-bg px-3 text-white">ابدء الأختبار</a>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            @endforeach
                           @else
                           لا توجد اختبارات
                            @endif
                            </div>
                </section>

            </div>
        </div>
    </div>
</div>
@endsection
@push('frontscript')
<script>
           
           var video = document.getElementById("myVideo");
           var playButton = document.getElementById("playButton");
           video.controls = false;
       
           // Add click event listener to the play button
           playButton.addEventListener("click", function() {
               if (video.paused) {
                   video.play();
                   playButton.style.display = "none"; 
               } else {
                   video.pause();
               }
           });
           
   
           document.addEventListener('DOMContentLoaded', function () {
               const ratingContainers = document.querySelectorAll('.rating-stars');
   
               ratingContainers.forEach(container => {
                   const stars = container.querySelectorAll('img');
                   const question = container.getAttribute('data-question');
                   const ratingInput = document.querySelector(`#ratingInput-${question}`); // Assuming you have separate rating input for each question
   
                   stars.forEach((star, index) => {
                       star.addEventListener('click', function () {
                           // Set all stars to gray
                           stars.forEach(s => s.src = "../img/emptyStar.png");
                           // Set clicked and previous stars to yellow
                           for (let i = 0; i <= index; i++) {
                               stars[i].src = "../img/Star.svg";
                           }
                           // Update the rating input field with the selected index
                           ratingInput.value = index + 1; // Assuming the rating starts from 1
                       });
                   });
               });
           });
         </script>
@endpush