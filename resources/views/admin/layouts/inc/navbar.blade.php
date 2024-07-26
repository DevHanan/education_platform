<style>
  .nav-link-icon {
    margin-left: 7px !important;
  }
</style>
@if(auth()->guard('web')->user())
@include('admin.layouts.inc.admin_side')
@elseif(auth()->guard('instructors-login')->user())
@include('admin.layouts.inc.instructor_side')
@else
@include('admin.layouts.inc.student_side')
@endif
<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
  <div class="container-xl">
    <button class="navbar-toggler" type="button" href="#navbar-layout" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav flex-row order-md-last">
      <div class="d-none d-md-flex">



        @if(app()->getLocale() == 'en')
        <li style="padding: 8px;">
          <a href="{{ url('language/ar') }}">
             <img src="{{ asset('public/uploads/ar.png')}}"  style="width:30px;height:25px" alt="Tabler" class="navbar-brand-image">
           {{__('admin.arabic')}}
          </a>
        </li>
        @else
        <li style="padding: 8px;">
          <a href="{{ url('language/en') }}">
          <img src="{{ asset('public/uploads/en.png')}}" style="width:30px;height:25px" alt="Tabler" class="navbar-brand-image">
          {{__('admin.english')}}

        </a>
        </li>
        @endif

        <li style="padding: 14px;" title="واجهه الموقع" href="#navbar-layout" data-bs-toggle="tooltip" data-bs-placement="bottom">
          <a href="{{ url('/') }}"><i class="fa-solid fa-globe"></i></a>
        </li>

      </div>
      <div class="d-none d-md-flex">
        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" href="#navbar-layout" data-bs-toggle="tooltip" data-bs-placement="bottom">
          <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
          </svg>
        </a>
        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" href="#navbar-layout" data-bs-toggle="tooltip" data-bs-placement="bottom">
          <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
            <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
          </svg>
        </a>
      </div>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" href="#navbar-layout" data-bs-toggle="dropdown" aria-label="Open user menu">


          @if(auth()->guard('web')->user())
          <span class="avatar avatar-sm" style="background-image: url({{auth()->guard('web')->user()->photo}})"></span>
          @elseif(auth()->guard('instructors-login')->user())
          <span class="avatar avatar-sm" style="background-image: url({{auth()->guard('instructors-login')->user()->imageFullPath}})"></span>
          @else
          <span class="avatar avatar-sm" style="background-image: url({{auth()->guard('students-login')->user()->imageFullPath}})"></span>
          @endif
          <span>
            @if(auth()->guard('web')->user())
            {{ auth()->user()->name }}
            @elseif(auth()->guard('instructors-login')->user())
            {{ auth()->guard('instructors-login')->user()->name }}
            @else
            {{ auth()->guard('students-login')->user()->name }}
            @endif
          </span>



          <div class="d-none d-xl-block ps-2">
            <div>
              @if(auth()->guard('web')->user())
              {{ auth()->user()->name }}
              @elseif(auth()->guard('instructors-login')->user())
              {{ auth()->guard('instructors-login')->user()->name }}
              @else
              {{ auth()->guard('students-login')->user()->name }}
              @endif
            </div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <a href="#" class="dropdown-item">
            @if(auth()->guard('web')->user())
            {{ auth()->user()->name }}
            @elseif(auth()->guard('instructors-login')->user())
            {{ auth()->guard('instructors-login')->user()->name }}
            @else
            {{ auth()->guard('students-login')->user()->name }}
            @endif
          </a>
          <div class="dropdown-divider"></div>

          @if(auth()->guard('students-login')->user() )
          <a href="javascript:void(0);" class="mx-3 p-2 text-decoration-none text-dark" href="#" onclick="event.preventDefault();
        document.getElementById('student-logout-form').submit();">

            تسجيل الخروج
            <i class="fa fa-sign-out" aria-hidden="true"></i>

          </a>

          <form id="student-logout-form" action="{{ route('student.student-logout') }}" method="POST">
            @csrf
          </form>
          @elseif(auth()->guard('instructors-login')->user() )
          <a href="javascript:void(0);" class="mx-3 p-2 text-decoration-none text-dark" href="#" onclick="event.preventDefault();
        document.getElementById('instructor-logout-form').submit();">

            تسجيل الخروج
            <i class="fa fa-sign-out" aria-hidden="true"></i>
          </a>

          <form id="instructor-logout-form" action="{{ route('instructor.instructor-logout') }}" method="POST">
            @csrf
          </form>
          @else

          <a href="javascript:void(0);" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">

            {{ __('admin.logout')}}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
          </form>
          @endif

        </div>
      </div>

    </div>
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div>
        <form action="./" method="get" autocomplete="off" novalidate>
          <div class="input-icon">
            <span class="input-icon-addon">
              <!-- Download SVG icon from http://tabler-icons.io/i/search -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
              </svg>
            </span>
            <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
          </div>
        </form>
      </div>
    </div>
  </div>
</header>