@extends('front.layouts.master')
@section('title', '')
@section('content')
@include('front.layouts.common.navbar')

<section class="coursesPage bg-white">
    <div class="hero_sec pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img">
                        <img src="{{asset('front/img/courses-header.svg')}}" class="img-fluid m-0" data-aos="fade-left" data-aos-duration="1000" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info position-relative py-5">
                        <img src="{{asset('front/img/completed-bg.svg')}}" class="position-absolute img-fluid" alt="">
                        <h4 class="title py-5 pb-1 fw-bold secondary-color">قائمة الدورات </h4>
                        <div class="content fw-bold text-white">
                            بين يديك مجموعة متنوعة من الدورات التدريبية فى مختلف المسارات التعليمية نسعى من خلالها لتلبية احتياجاتك العلمية واكسابك مهارات متنوعة وخبرات ومعرفة تؤهلك للعمل وممارسة حياتك بشكل أفضل
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content my-5 container">
        <div class="row">
            <div class="col-lg-5">
                <form method="get" action="{{url('/courses')}}">
                    <div class="filter px-5">
                        <button class="btn w-100 rounded-pill fw-bold text-center secondary-bg text-white" type="submit"> تصفية النتائج</button>
                        <div class="search position-relative">
                            <input type="search" class="form-control rounded-pill py-2 mt-3 text-center" placeholder="ماذا تريد أن تتعلم؟" name="name">
                            <i class="fa-solid fa-search p-2  position-absolute rounded-circle d-flex align-items-center text-white secondary-bg" style="top:4px;"></i>
                        </div>

                        <div class="my-5 p-4 pb-1 category rounded">
                            <h3>المسارات</h3>
                            <div class="search">
                                <input type="text" class="form-control my-3 rounded-pill" placeholder="بحث">
                            </div>
                            <ul class="list-unstyled">
                                @if(!request()->get('track_id'))
                                <li class="my-2 d-flex align-items-center">
                                    <input checked class="form-check-input" type="checkbox" value="" id="checkAll" onclick="checkAll('category')">
                                    <p class="m-0 mx-2">الكل</p>
                                </li>
                                @endif

                                @foreach($tracks as $track)
                                <li class="my-2 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="{{ $track->id }}" @if($track->id == request()->get('track_id')) checked="checked" @endif >
                                    <label for="img-videos" class="d-flex">
                                        <p class="m-0 mx-2"> {{ $track->name }}</p>
                                        <span>( {{$track->courseCount }})</span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="my-5 p-4 pb-1 coursesFilter rounded">
                            <h3>الدورات</h3>
                            <div class="search">
                                <input type="text" class="form-control my-3 rounded-pill" placeholder="بحث باسم الدورة">
                            </div>
                            <ul class="list-unstyled">
                                <li class="my-2 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="0" name="track_ids[]" id="checkAll" onclick="checkAll('coursesFilter')">
                                    <p class="m-0 mx-2">الكل</p>
                                </li>
                                @foreach($courseTypes as $type)
                                <li class="my-2 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="{{$type->id}}" name="track_ids[]">
                                    <label for="combine-courses">
                                        <p class="m-0 mx-2"> {{ $type->name }} </p>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="my-5 p-4 pb-1 trainers rounded">
                            <h3>المدربين</h3>
                            <div class="search">
                                <input type="text" class="form-control my-3 rounded-pill" placeholder="بحث">
                            </div>
                            <ul class="list-unstyled">
                                <li class="my-2 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="checkAll" onclick="checkAll('trainers')">
                                    <p class="m-0 mx-2">الكل</p>
                                </li>
                                @foreach($instructors as $instructor)
                                <li class="my-2 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="{{ $instructor->id}}" @if($instructor->id == request()->get('instructor_id')) checked="checked" @endif >
                                    <label for="teacher5">
                                        <p class="m-0 mx-2">{{ $instructor->name  }}</p>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="my-5 p-4 pb-1 prices rounded">
                            <h3>بحث بالسعر</h3>
                            <div class="mx-2 my-4 w-100 price-filter">
                                <ul class="list-unstyled">
                                    <li class="my-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="checkAll" onclick="checkAll('price-filter')">
                                        <p class="m-0 mx-2">الكل</p>
                                    </li>

                                    <li class="my-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="free-course">
                                        <label for="free-course">
                                            <p class="m-0 mx-2"> مجانا </p>
                                        </label>
                                    </li>

                                    <li class="my-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="discount-course">
                                        <label for="discount-course">
                                            <p class="m-0 mx-2"> تخفيضات </p>
                                        </label>
                                    </li>

                                    <li class="my-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="price-course">
                                        <label for="price-course">
                                            <p class="m-0 mx-2"> رينج سعر </p>
                                        </label>
                                    </li>
                                </ul>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="slider-range"></div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <span id="slider-range-value2"></span>
                                    <span id="slider-range-value1"></span>
                                </div>
                                <!-- <div class="row">
                                <div class="col-sm-12">
                                    <form>
                                        <input type="hidden" name="min-value" value="">
                                        <input type="hidden" name="max-value" value="">
                                    </form>
                                </div>
                            </div> -->
                            </div>
                        </div>

                        <div class="my-5 p-4 pb-1 dateFilter rounded">
                            <h3>تاريخ النشر</h3>
                            <ul class="list-unstyled">
                                <li class="my-2 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="checkAll" onclick="checkAll('dateFilter')">
                                    <p class="m-0 mx-2">الكل</p>
                                </li>

                                <li class="my-2 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="recently-added">
                                    <label for="recently-added">
                                        <p class="m-0 mx-2"> مضاف حديثا </p>
                                    </label>
                                </li>

                                <li class="my-2">
                                    <div class="d-flex align-items-center mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="period-time">
                                        <label for="period-time">
                                            <p class="m-0 mx-2"> خلال فترة </p>
                                        </label>
                                    </div>
                                    <label for="" class="my-2">من تاريخ</label>
                                    <input class="form-control" type="date" value="" id="">
                                    <label for="" class="my-2">الي تاريخ</label>
                                    <input class="form-control" type="date" value="" id="">
                                </li>
                            </ul>
                        </div>

                        <div class="my-5 p-4 pb-1 rating rounded">
                            <h3>التقيم</h3>
                            <ul class="list-unstyled mt-3">
                                <li class="my-2 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="checkAll" onclick="checkAll('rating')">
                                    <p class="m-0 mx-2">الكل</p>
                                </li>
                                <li class="my-2 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="more-4">
                                        <label for="more-4">
                                            <p class="m-0 mx-2">4 وما فوق</p>
                                        </label>
                                    </div>
                                    <div>
                                        <img src="{{asset('front/img/emptyStar.png')}}" width="20" alt="">
                                        <img src="{{asset('front/img/Star.svg')}}" width="20" alt="">
                                        <img src="{{asset('front/img/Star.svg')}}" width="20" alt="">
                                        <img src="{{asset('front/img/Star.svg')}}" width="20" alt="">
                                        <img src="{{asset('front/img/Star.svg')}}" width="20" alt="">
                                    </div>
                                </li>
                                <li class="my-2 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="more-3">
                                        <label for="more-3">
                                            <p class="m-0 mx-2">3 وما فوق</p>
                                        </label>
                                    </div>
                                    <div>
                                        <img src="{{asset('front/img/emptyStar.png')}}" width="20" alt="">
                                        <img src="{{asset('front/img/emptyStar.png')}}" width="20" alt="">
                                        <img src="{{asset('front/img/Star.svg')}}" width="20" alt="">
                                        <img src="{{asset('front/img/Star.svg')}}" width="20" alt="">
                                        <img src="{{asset('front/img/Star.svg')}}" width="20" alt="">
                                    </div>
                                </li>
                                <li class="my-2 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="more-2">
                                        <label for="more-2">
                                            <p class="m-0 mx-2">2 وما فوق</p>
                                        </label>
                                    </div>
                                    <div>
                                        <img src="{{asset('front/img/emptyStar.png')}}" width="20" alt="">
                                        <img src="{{asset('front/img/emptyStar.png')}}" width="20" alt="">
                                        <img src="{{asset('front/img/emptyStar.png')}}" width="20" alt="">
                                        <img src="{{asset('front/img/Star.svg')}}" width="20" alt="">
                                        <img src="{{asset('front/img/Star.svg')}}" width="20" alt="">
                                    </div>
                                </li>
                                <li class="my-2 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="more-1">
                                        <label for="more-1">
                                            <p class="m-0 mx-2">1 وما فوق</p>
                                        </label>
                                    </div>
                                    <div>
                                        <img src="{{asset('front/img/emptyStar.png')}}" width="20" alt="">
                                        <img src="{{asset('front/img/emptyStar.png')}}" width="20" alt="">
                                        <img src="{{asset('front/img/emptyStar.png')}}" width="20" alt="">
                                        <img src="{{asset('front/img/emptyStar.png')}}" width="20" alt="">
                                        <img src="{{asset('front/img/Star.svg')}}" width="20" alt="">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-7">
                <div class="course_content">
                    <h3 class="position-relative fw-bold primary-color mb-4">
                        @if(request()->get('track_id'))
                            <?php 
                            $track  = \App\Models\Track::find(request()->get('track_id'));
                            ?>
                            {{ $track->name }}
                        @else
                        {{ $setting->title }} 

                        @endif
                        <img src="{{asset('front/img/text-line2.svg')}}" class="position-absolute img-fluid" alt=""></h3>
                    <div class="d-flex justify-content-between">
                        <h3 class="fw-bold">قائمة الدورات</h3>
                        <div class="d-flex">

                            <img src="{{asset('front/img/icons/category.svg')}}" class="img-fluid categoryCards cardShape active p-1 rounded mx-2" alt="">
                            <img src="{{asset('front/img/icons/Layer.svg')}}" class="img-fluid rowsCards cardShape p-1 rounded" alt="">
                        </div>
                    </div>

                    <div class="row" id="paginationCard">
                        @if($courses)
                        @foreach($list_courses as $course)
                        <div class="col-sm-6 card_pagination">
                            <article class="rounded mt-4 shadow">
                                <div class="row">
                                    <div class="col-12 paginationCardImg">
                                        <div class="card__image  p-2">
                                            <a href="{{ url('course/'.$course->id)}}">
                                                <img src="{{asset('public/'.$course->image)}}"  alt="image" class="card__img img-fluid w-100 ">
                                            </a>
                                            <div class="card_category position-absolute rounded text-dark px-2 py-1">
                                                @if($course->tracks)
                                                @foreach ($course->tracks as $item)
                                                {{ $item->name  }}
                                                @endforeach
                                                @endif
                                            </div>
                                            <div class="card__shadow"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 paginationCardData">
                                        <div class="card__data p-3 pt-1">
                                            <a href="{{ url('course/'.$course->id)}}" class="text-decoration-none text-dark">
                                                <p class="card__description my-1">
                                                    {{ $course->name }}
                                                </p>
                                            </a>
                                            <div class="name primary-color fw-bold mb-3" style="font-size: 14px;">
                                                <!-- @if($course->instructors)
                                            @foreach($course->instructors as $item)
                                            {{ $item->name }} 
                                            @endforeach

                                            @endif -->
                                            </div>

                                            <div class="rating d-flex justify-content-end">
                                                <span class="mx-3">({{ $course->SubscriptionCount}})</span>
                                                <span class="fw-bold ms-2" style="color:#5a5a5a">{{ $course->avgrating }}</span>
                                                @if($course->avgrating )
                                                @for($i=0; $i<(int)$course->avgrating; $i++)
                                                <img src="{{ asset('public/front/img/icons/yellow-star.png') }}">
                                                @endfor
                                                @for($i=0; $i<5-(int)$course->avgrating; $i++)
                                                <img src="{{ asset('public/front/img/icons/empty-yellow-star.png')}}" alt="">
                                                @endfor
                                                @endif
                                             
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="{{ url('course/'.$course->id)}}" class="link-arrow rounded-circle"><i class="fa-solid fa-arrow-up-long"></i></a>
                                                <div class="price">
                                                    <span class="instead-price text-danger text-decoration-line-through mx-2">{{ $setting->currency }}{{ $course->price }}</span>
                                                    <span class="fw-bold">{{ $setting->currency }} {{ $course->TotalDiscount }}</span>

                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                        @else
                                <p> لا توجد بيانات للعرض</p>
                        @endif

                    </div>

                    <nav class="mt-4 d-flex justify-content-center" aria-label="Page navigation example">
                        <ul id="pagination" class="pagination align-items-center">
                            <li class="page-item">
                                <a id="prevPageBtn" class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <!-- Numbered pagination buttons will be added dynamically here -->
                            <li class="page-item">
                                <a id="nextPageBtn" class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    @if($landing_setting->most_required_courses == 1)

    <div class="popular-courses my-5">
        <div class="container">
            <h2 class="section_title fw-bold">دورات <span class="primary-color">اكثر طلباً</span></h2>
            <p class="fw-bold mt-3"> بين يديك الدورات الأكثر طلبا فى سوق العمل يسعى أغلب الطلاب للاشتراك بها فانضم اليهم </p>
        </div>

        <div class="card__container swiper mt-4">
            <div class="container">

                <div class="card__content">
                    <div class="swiper-wrapper">
                        @foreach($most_required as $course)
                        <article class="card__article swiper-slide shadow">
                            <a href="{{ url('course/'.$course->id)}}">
                                <div class="card__image p-2">
                                    <img src="{{asset('public/'.$course->image)}}"  alt="image" class="card__img img-fluid w-100">
                                    <div class="card_category position-absolute rounded text-dark px-2 py-1">
                                        @if($course->tracks)
                                        @foreach ($course->tracks as $item)
                                        {{ $item->name  }}
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="card__shadow"></div>
                                </div>
                            </a>

                            <div class="card__data p-3">
                                <a href="{{ url('course/'.$course->id)}}" class="text-decoration-none">
                                    <p class="card__description mt-1 mb-1"> {{ $course->name }} </p>
                                </a>
                                <!-- <div class="name primary-color mb-3" style="font-size: 14px;">
                                @if($course->instructors)
                                            @foreach($course->instructors as $item)
                                            {{ $item->name }} 
                                            @endforeach

                                            @endif
                                 </div> -->
                                <div class="rating d-flex justify-content-end">
                                    <span class="mx-3">({{ $course->SubscriptionCount}})</span>
                                    <span class="fw-bold ms-2" style="color:#5a5a5a">4</span>
                                    <img src="{{asset('front/img/grayStar.svg')}}" alt="">
                                    <img src="{{asset('front/img/Star.svg')}}" alt="">
                                    <img src="{{asset('front/img/Star.svg')}}" alt="">
                                    <img src="{{asset('front/img/Star.svg')}}" alt="">
                                    <img src="{{asset('front/img/Star.svg')}}" alt="">
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ url('course/'.$course->id)}}" class="link-arrow secondary-bg rounded-circle"><i class="fa-solid fa-arrow-up-long"></i></a>
                                    <div class="price">
                                        <span class="instead-price text-decoration-line-through mx-2 primary-color">{{ $setting->currency }} {{ $course->price }}</span>
                                        <span class="fw-bold"> {{ $course->TotalDiscount }} {{ $setting->currency }}</span>

                                    </div>
                                </div>
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

</section>
@endsection
@push('frontscript')
<script src="{{asset('public/front/js/price_filter.js')}}"></script>
<script>

        $(document).ready(function() {
            $('.select2').select2();
        });


        let categoryCards = document.querySelector('.categoryCards');
        let rowsCards = document.querySelector('.rowsCards');
        let paginationCards = document.querySelectorAll('#paginationCard .card_pagination');
        let paginationCardsImg = document.querySelectorAll('#paginationCard .paginationCardImg');
        let paginationCardsData = document.querySelectorAll('#paginationCard .paginationCardData');

        rowsCards.addEventListener('click', function() {
            categoryCards.classList.remove('active');
            rowsCards.classList.add('active');

            paginationCards.forEach(paginationCard => {
                paginationCard.classList.add('col-sm-12');
            });
            paginationCardsImg.forEach(paginationCardImg => {
                paginationCardImg.classList.remove('col-12');
                paginationCardImg.classList.add('col-4');
            });
            paginationCardsData.forEach(paginationCardData => {
                paginationCardData.classList.remove('col-12');
                paginationCardData.classList.add('col-8');
            });

            let paginationCardsDesc = document.querySelectorAll('#paginationCard article p');

            paginationCardsDesc.forEach(paginationCardDesc => {
                paginationCardDesc.style.cssText = 'white-space: normal;';
            });
        });

        categoryCards.addEventListener('click', function() {
            rowsCards.classList.remove('active');
            categoryCards.classList.add('active');

            paginationCards.forEach(paginationCard => {
                paginationCard.classList.remove('col-sm-12');

                paginationCardsImg.forEach(paginationCardImg => {
                    paginationCardImg.classList.remove('col-4');
                    paginationCardImg.classList.add('col-12');
                });
                paginationCardsData.forEach(paginationCardData => {
                    paginationCardData.classList.remove('col-8');
                    paginationCardData.classList.add('col-12');
                });
            });

            let paginationCardsDesc = document.querySelectorAll('#paginationCard article p');

            paginationCardsDesc.forEach(paginationCardDesc => {
                paginationCardDesc.style.cssText = 'white-space: nowrap;';
            });
        });
    </script>

    <script>
            function checkAll(filterClass) {
                alert("inside");
            // Get the "Check All" checkbox and all other checkboxes
            const checkAllCheckbox = document.querySelector(`.${filterClass} #checkAll`);
            const checkboxes = document.querySelectorAll(`.${filterClass} .form-check-input:not(.check-all)`);
    
            // Add event listener to the "Check All" checkbox
            checkAllCheckbox.addEventListener('change', function() {
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = checkAllCheckbox.checked;
                });
            });
    
            // Add event listener to other checkboxes to uncheck "Check All" if any checkbox is unchecked
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (!this.checked) {
                        checkAllCheckbox.checked = false;
                    }
                });
            });
        }
     
       
    </script>
@endpush