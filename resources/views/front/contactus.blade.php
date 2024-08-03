@extends('front.layouts.master')
@section('title', '')
@section('content')
@include('front.layouts.common.navbar')
<section class="contact-us my-5">
    <div class="container">
        <div class="bg-white">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="position-relative">ابق على اتصال <img src="public/front/img/text-line2.svg" class="position-absolute" style="bottom: -19px;right:0" alt=""></h3>
                    <p class="my-5">أخبرنا برأيك فى خدماتنا وما لديكم من استفسارات واقتراحات وشكاوى، نحن هنا دائما من أجلكم يسعدنا أن نلبي احتياجاتكم </p>
                    <div class="icons mb-4 d-flex align-items-center">
                        <div><img src="public/front/img/icons/home.svg" class="p-2 rounded" alt=""></div>
                        <div class="info mx-3">
                            <p class="fw-bold m-0">تفضل بزيارتنا :</p>
                            <p class="mb-0"> {{ $setting->address }}</p>
                        </div>
                    </div>
                    <div class="icons mb-4 d-flex align-items-center">
                        <div><img src="public/front/img/icons/mail.svg" class="p-2 rounded" alt=""></div>
                        <div class="info mx-3">
                            <p class="fw-bold m-0"> ارسل لنا :</p>
                            <p class="mb-0">{{ $setting->email }}</p>
                        </div>
                    </div>
                    <div class="icons mb-4 d-flex align-items-center">
                        <div><img src="public/front/img/icons/phone-call.svg" class="p-2 rounded" alt=""></div>
                        <div class="info mx-3">
                            <p class="fw-bold m-0">تليفون ارضي :</p>
                            <a href="tel:{{ $setting->telephone }}" class="text-dark text-decoration-none mb-0">Call: {{ $setting->telephone }}</a>
                        </div>
                    </div>

                    <div class="icons mb-4 d-flex align-items-center">
                        <div><img src="public/front/img/icons/mobile.svg" width="48" class="p-2 rounded" alt=""></div>
                        <div class="info mx-3">
                            <p class="fw-bold m-0">هاتف محمول :</p>
                            <a href="https://wa.me/{{ $setting->whatsapp }}" class="text-dark text-decoration-none mb-0">Call: {{ $setting->whatsapp }}</a>
                        </div>
                    </div>

                    <div class="contact text-white">
                        <div class="social">
                            <ul class="list-unstyled d-flex w-100 m-0 p-0">

                                @if($setting->facebook_url != null)
                                <li>
                                    <a target="_blank" href="{{ $setting->facebook_url}}" class="d-flex justify-content-center align-items-center text-white primary-bg rounded-circle text-decoration-none mx-2">
                                        <i class="fa-brands fa-facebook-f fa-lg "></i>
                                    </a>
                                </li>
                                @endif
                                @if($setting->whatsapp != null)
                                <li>
                                    <a target="_blank" href="https://wa.me/{{ $setting->whatsapp }}" class="d-flex justify-content-center align-items-center text-white primary-bg rounded-circle text-decoration-none mx-2">
                                        <i class="fa-brands fa-whatsapp fa-lg "></i>
                                    </a>
                                </li>
                                @endif

                                @if($setting->instgram_url != null)
                                <li>
                                    <a target="_blank" href="{{ $setting->instgram_url }}" class="d-flex justify-content-center align-items-center text-white primary-bg rounded-circle text-decoration-none mx-2">
                                        <i class="fa-brands fa-instagram fa-lg "></i>
                                    </a>
                                </li>
                                @endif
                                @if($setting->youtube_url != null)
                                <li>
                                    <a target="_blank" href="{{ $setting->youtube_url }}" class="d-flex justify-content-center align-items-center text-white primary-bg rounded-circle text-decoration-none mx-2">
                                        <i class="fa-brands fa-youtube fa-lg "></i>
                                    </a>
                                </li>
                                @endif
                                @if($setting->twitter_url != null)
                                <li>
                                    <a target="_blank" href="{{ $setting->twitter_url }}" class="d-flex justify-content-center align-items-center text-white primary-bg rounded-circle text-decoration-none mx-2">
                                        <i class="fa-brands fa-x-twitter fa-lg "></i>
                                    </a>
                                </li>
                                @endif
                                @if($setting->snapchat_url != null)
                                <li>
                                    <a target="_blank" href="{{ $setting->snapchat_url }}" class="d-flex justify-content-center align-items-center text-white primary-bg rounded-circle text-decoration-none mx-2">
                                        <i class="fa-brands fa-snapchat fa-lg "></i>
                                    </a>
                                </li>
                                @endif
                                @if($setting->telegram_number != null)
                                <li>
                                    <a target="_blank" href="tel: {{ $setting->telegram_number }}" class="d-flex justify-content-center align-items-center text-white primary-bg rounded-circle text-decoration-none mx-2">
                                        <i class="fa-brands fa-telegram fa-lg "></i>
                                    </a>
                                </li>
                                @endif

                                @if($setting->linkedin_url != null)
                                <li>
                                    <a target="_blank" href="{{ $setting->linkedin_url }}" class="d-flex justify-content-center align-items-center text-white primary-bg rounded-circle text-decoration-none mx-2">
                                        <i class="fa-brands fa-linkedin fa-lg "></i>
                                    </a>
                                </li>
                                @endif

                                @if($setting->tiktok_url != null)
                                <li>
                                    <a target="_blank" href="{{ $setting->tiktok_url }}" class="d-flex justify-content-center align-items-center text-white primary-bg rounded-circle text-decoration-none mx-2">
                                        <i class="fa-brands fa-tiktok fa-lg "></i>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="{{url('contactus')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3 position-relative">
                                    <i class="fa-solid fa-user secondary-color position-absolute" style="top: 13px ; right: 25px;"></i>
                                    @if( auth()->guard('students-login')->user() )
                                    <input type="text" class="form-control pe-5 py-2" value="{{ auth()->guard('students-login')->user() ->name}}" name="name" readonly>
                                    @elseif( auth()->guard('instructors-login')->user() )
                                    <input type="text" class="form-control pe-5 py-2" value="{{ auth()->guard('instructors-login')->user() ->name}}" name="name" readonly>

                                    @else
                                    <input type="text" class="form-control pe-5 py-2" placeholder="الاسم" name="name" required>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3 position-relative">
                                    <i class="fa-solid fa-user-doctor secondary-color position-absolute" style="top: 13px ; right: 25px;"></i>
                                    <input type="text" class="form-control pe-5 py-2" placeholder="الوظيفة" name="job" required>
                                </div>
                            </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group mb-3 position-relative">
                                <i class="fa-solid fa-envelope secondary-color position-absolute" style="top: 13px; right: 14px;"></i>
                                @if( auth()->guard('students-login')->user() )
                                <input type="email" class="form-control pe-5 py-2" value="{{ auth()->guard('students-login')->user() ->email}}" name="email" readonly>
                                @elseif( auth()->guard('instructors-login')->user() )
                                <input type="email" class="form-control pe-5 py-2" value="{{ auth()->guard('instructors-login')->user() ->email}}" name="email" readonly>

                                @else
                                <input type="email" class="form-control pe-5 py-2" placeholder="البريد الالكتروني" name="email" required>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3 position-relative">
                                <i class="fa-solid fa-phone secondary-color position-absolute" style="top: 13px; right: 17px;"></i>
                                @if( auth()->guard('students-login')->user() )
                                <input type="text" class="form-control pe-5 py-2" value="{{  auth()->guard('students-login')->user() ->phone }}" name="phone" readonly>
                                @elseif( auth()->guard('instructors-login')->user() )
                                <input type="text" class="form-control pe-5 py-2" value="{{  auth()->guard('instructors-login')->user() ->phone }}" name="phone" readonly>
                                @else
                                <input type="text" class="form-control pe-5 py-2" placeholder="رقم الهاتف" name="phone" required>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-3 position-relative">
                            <i class="fa-solid fa-user secondary-color position-absolute" style="top: 13px ; right: 25px;"></i>
                            <input type="text" class="form-control pe-5 py-2" placeholder="عنوان الرسالة" name="title" required>
                        </div>
                        <div class="form-group position-relative">
                            <i class="fa-solid fa-edit secondary-color position-absolute" style="top: 13px; right: 25px;"></i>
                            <textarea id="" cols="30" rows="9" class="form-control pe-5" placeholder="رسالتك" name="description" required></textarea>
                        </div>
                </div>

                <div class="form-check my-3 d-flex">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label me-5" for="flexCheckChecked">
                        ابقني على اطلاع دائم بالأخبار والعروض من وقت لآخر عن طريق البريد الإلكتروني
                    </label>
                </div>

                <button class="btn secondary-bg text-white w-100 my-3 py-3" type="submit">ارسل الرسالة</button>
                </form>
            </div>
        </div>
    </div>
    </div>


    @if($landing_setting->map_locations == 1)

    <div class="container">

        <iframe src="http://maps.google.com/maps?q=<?= $setting->lat ?>,<?= $setting->lng ?>&z=16&output=embed" height="400" width="600" class="google-map w-100 my-5"></iframe>

    </div>
    @endif
</section>
@endsection
@push('frontscript')
<script src="https://developers.google.com/maps/marker/advanced-marker-element/latest/advanced-marker-element.min.js"></script>
<script>
    $(document).ready(function() {
        let map;

        function initMap() {

            map = new google.maps.Map(document.getElementById('mapelement'), {
                center: {
                    lat: 37.7749,
                    lng: -122.4194
                },
                zoom: 8,
            });
            const marker = new google.maps.Marker({
                position: {
                    lat: 37.7749,
                    lng: -122.4194
                },
                map: map,
                title: 'Hello World!'
            });


        }
    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAeKtyQzy9Mg88dwLjT2OxlfEZdgUYdydg
&callback=initMap" async defer></script>
@endpush