<div class="nav-hero" style="overflow-x: auto;">
  <div class="container-fluid">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-2">
      <div class="header-info d-flex align-items-center">
        @if(auth()->guard('students-login')->user() )
        <a href="{{url('/student/dashboard')}}" class="
        mx-3 p-2 rounded-pill secondary-bg text-white text-decoration-none"> لوحه تحكم الطالب </a>
        <a href="javascript:void(0);" class="mx-3 p-2 text-decoration-none text-dark" href="#" onclick="event.preventDefault();
        document.getElementById('student-logout-form').submit();">

          تسجيل الخروج
          <i class="fa fa-sign-out" aria-hidden="true"></i>

        </a>

        <form id="student-logout-form" action="{{ route('student.student-logout') }}" method="POST">
          @csrf
        </form>
        @elseif(auth()->guard('instructors-login')->user())
        <a href="{{url('/instructor/dashboard')}}" class="mx-3 p-2 rounded-pill secondary-bg text-white text-decoration-none"> لوحه تحكم المحاضر </a>
        <a href="javascript:void(0);" class="mx-3 p-2 text-decoration-none text-dark" href="#" onclick="event.preventDefault();
        document.getElementById('instructor-logout-form').submit();">

          تسجيل الخروج
          <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>

        <form id="instructor-logout-form" action="{{ route('instructor.instructor-logout') }}" method="POST">
          @csrf
        </form>
        @elseif(auth()->guard('web')->user())

        <a href="{{url('/admin/dashboard')}}" class="mx-3 p-2 rounded-pill secondary-bg text-white text-decoration-none"> لوحه تحكم الادمن </a>
        <a href="javascript:void(0);" class="mx-3 p-2 text-decoration-none text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">

          تسجيل الخروج
          <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf
        </form>
        @else
        <a href="{{url('signup')}}" class="mx-3 p-2 rounded-pill secondary-bg text-white text-decoration-none"> اشترك الان مجانا </a>
        <a href="{{url('signin')}}" class="mx-3 p-2 text-decoration-none text-dark"> تسجيل الدخول <i class="fa-solid fa-lock mx-2"></i> </a>
        @endif
      </div>
      <div>
        <ul class="navbar-nav me-auto my-2 mb-lg-0 d-flex flex-row align-items-center responsive-list">
          <!-- <li class="nav-item px-2">
            <a class="nav-link position-relative" aria-current="page" href="{{ url('/cart') }}">
              <i class="fa-solid fa-cart-shopping primary-color fa-lg"></i>
              <span class="position-absolute bg-white fw-bold rounded-pill">0</span>
            </a>
          </li> -->
          @if($setting->facebook_url != null)
          <li class="nav-item px-2">
            <a class="nav-link primary-color" target="_blank" href="{{ $setting->facebook_url }}"><i class="fa-brands fa-facebook-f"></i></a>
          </li>
          @endif
          @if($setting->whatsapp != null)
          <li class="nav-item px-2">
            <a class="nav-link primary-color" target="_blank" href="https://wa.me/{{ $setting->whatsapp }}"><i class="fa-brands fa-whatsapp"></i></a>
          </li>
          @endif
          @if($setting->instgram_url != null)
          <li class="nav-item px-2">
            <a class="nav-link primary-color" target="_blank" href="{{ $setting->instgram_url }}"><i class="fa-brands fa-instagram"></i></a>
          </li>
          @endif
          @if($setting->youtube_url != null)
          <li class="nav-item px-2">
            <a class="nav-link primary-color" target="_blank" href="{{ $setting->youtube_url }}"><i class="fa-brands fa-youtube"></i></a>
          </li>
          @endif
          @if($setting->twitter_url != null)
          <li class="nav-item px-2">
            <a class="nav-link primary-color" target="_blank" href="{{ $setting->twitter_url }}"><i class="fa-brands fa-x-twitter"></i></a>
          </li>
          @endif
          @if($setting->snapchat_url != null)
          <li class="nav-item px-2">
            <a target="_blank" href="{{ $setting->snapchat_url }}" class="nav-link primary-color">
              <i class="fa-brands fa-snapchat fa-lg "></i>
            </a>
          </li>
          @endif
          @if($setting->telegram_number != null)
          <li class="nav-item px-2">
            <a target="_blank" href="tel: {{ $setting->telegram_number }}" class="nav-link primary-color">
              <i class="fa-brands fa-telegram fa-lg "></i>
            </a>
          </li>
          @endif

          @if($setting->linkedin_url != null)
          <li class="nav-item px-2">
            <a target="_blank" href="{{ $setting->linkedin_url }}" class="nav-link primary-color">
              <i class="fa-brands fa-linkedin fa-lg"></i>
            </a>
          </li>
          @endif

          @if($setting->tiktok_url != null)
          <li class="nav-item px-2">
            <a target="_blank" href="{{ $setting->tiktok_url }}" class="nav-link primary-color">
              <i class="fa-brands fa-tiktok fa-lg "></i>
            </a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light primary-bg sec-nav shadow-sm">
  <div class="container-fluid nav_content">
    <a class="navbar-brand" href="{{url('/')}}">
      <img src="{{asset($setting->logoFullPath)}}" alt="logo" style="max-height:140px;max-width:fit-content;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link  @if(Request::is('/')) active @endif" href="{{url('/')}}">الرئيسية</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('about-us')) active @endif" href="{{ url('/about-us')}}">من نحن</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  @if(Request::is(['courses','course/*']) ) active @endif" href="{{url('/courses')}}">الدورات</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  @if(Request::is(['blogs','blog/*']) ) active @endif" href="{{url('/blogs')}}">المدونة</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('masarat') ) active @endif" href="{{url('/masarat')}}">حساب التنسيق</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">تحقق من الشهادة</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">صانع CV</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  @if(Request::is('tests')) active @endif" href="{{ url('/test-capabilities
') }}" target="_blank">اختبارات قدرات</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  @if(Request::is('policies')) active @endif" href="{{ url('/policies') }}" target="_blank">سياساتنا</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  @if(Request::is('contact-us')) active @endif" href="{{url('/contactus')}}">تواصل معنا</a>
        </li>
        @if($landing_setting->book_store_visiable==1 && $landing_setting->book_shop_url && $landing_setting->book_shop_url != null)
        <li class="nav-item">
          <div class="header-info d-flex align-items-center">
            <a href="{{ url($landing_setting->book_shop_url)}}" class="mx-3 p-2 rounded-pill secondary-bg text-white text-decoration-none">متجر الكتب</a>
          </div>

        </li>
        @endif
    </div>
  </div>
</nav>

<img src="#" class="position-absolute header_layout" alt="">