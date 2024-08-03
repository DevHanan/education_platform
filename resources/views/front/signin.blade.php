<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @if(isset($title))
        {{ $title }} -
        @endif
        {{ $setting->title }}
    </title>
    <link rel="shortcut icon" href="{{ asset($setting->iconFullPath) }}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('front/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/media.css')}}">
</head>

<body>
    <div class="register login">
        <div class="row p-0 m-0">
            <div class="col-md-6 p-0 position-relative">
                <div class="welcome d-flex flex-column align-items-center justify-content-center">
                    <div class="layout position-absolute"></div>
                    <img src="{{asset('front/img/Group 327.svg')}}" class="position-absolute img-fluid h-100" alt="">
                    <a href="{{url('/')}}">
                        <img src="{{asset($setting->logoFullPath)}}" style="height:120px;" class="logo img-fluid position-absolute" alt="">
                    </a>

                    <div class="data text-center text-white" style="max-height: 60%;max-width: 80%;">
                        <img src="{{asset($setting->loginImageFullPath)}}" class="img-fluid" alt="">
                        <h2>مرحبا بك يا صديقي </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="intro container p-5">
                    <div class="text-center mb-5">
                        ليس لديك حساب؟ <a href="{{url('signup')}}">قم بالتسجيل</a>
                    </div>
                    <h1>تسجيل الدخول!</h1>
                    <p class="mt-3 mb-5">لغرض التنظيم ، التفاصيل الخاصة بك مطلوبة.</p>


                    <section class="bg-white form rounded p-5">
                        <div class="toggle d-flex justify-content-center rounded mb-4">
                            <button class="emailBtn btn w-100 rounded active"><i class="fa-solid fa-envelope mx-2"></i> البريد الالكتروني</button>
                            <button class="phoneBtn btn w-100 rounded"> <i class="fa-solid fa-phone mx-2"></i> التليفون</button>
                        </div>

                        <form action="{{url('signin')}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="email_feild">
                                <label for="" class="mb-3">عنوان البريد الإلكتروني*</label>
                                <input type="email" name="email" class="form-control mb-3 p-3" placeholder="أدخل عنوان البريد الإلكتروني">
                            </div>

                            <div class="phone_feild">
                                <label for="" class="mb-3">التليفون*</label>
                                <input type="text" name="phone" class="form-control mb-3 p-3" placeholder="أدخل رقم التليفون">
                            </div>

                            <label for="" class="mb-3">كلمة مرور*</label>
                            <input type="password" name="password" class="form-control mb-3 p-3" placeholder="أدخل كلمة المرور">

                            <div class="form-check d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label mx-5" for="flexCheckChecked">
                                    تذكرني
                                </label>
                            </div>

                            <button type="submit" class="btn secondary-bg fw-bold text-white w-100 my-3 py-3">تسجيل الدخول</button>
                        </form>
                        <p class="text-center">او</p>
                        <button class="btn shadow-sm border fw-bold w-100 my-3 py-3">تسجيل الدخول عن طريق جوجل
                            <img src="{{asset('front/img/icons/google.png')}}" class="mx-3" alt=""></button>


                    </section>

                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const emailBtn = document.querySelector('.emailBtn');
            const phoneBtn = document.querySelector('.phoneBtn');
            const email_feild = document.querySelector('.email_feild');
            const phone_feild = document.querySelector('.phone_feild');

            emailBtn.addEventListener('click', function() {
                emailBtn.classList.add('active');
                phoneBtn.classList.remove('active');
                email_feild.style.display = 'block';
                phone_feild.style.display = 'none';
            });

            phoneBtn.addEventListener('click', function() {
                phoneBtn.classList.add('active');
                emailBtn.classList.remove('active');
                phone_feild.style.display = 'block';
                email_feild.style.display = 'none';
            });
        });
    </script>

</body>

</html>