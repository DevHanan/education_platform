<aside class="navbar navbar-vertical  navbar-expand-lg @if(App::getLocale() == 'ar') navbar-right 
 @endif">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" href="#navbar-layout" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark">
      <a href="{{url('/')}}">
        <img src="{{ asset($setting->logoFullPath)}}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
      </a>
    </h1>
    <div class="navbar-nav flex-row d-lg-none">
      <div class="nav-item d-none d-lg-flex me-3">
        <div class="btn-list">
          <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
            <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
            </svg>
            Source code
          </a>
          <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
            </svg>
            Sponsor
          </a>
        </div>
      </div>
      <div class="d-none d-lg-flex">
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
        <div class="nav-item dropdown d-none d-md-flex me-3">
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Last updates</h3>
              </div>
              <div class="list-group list-group-flush list-group-hoverable">
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                    <div class="col text-truncate">
                      <a href="#" class="text-body d-block">Example 1</a>
                      <div class="d-block text-secondary text-truncate mt-n1">
                        Change deprecated html tags to text decoration classes (#29604)
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="#" class="list-group-item-actions">
                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto"><span class="status-dot d-block"></span></div>
                    <div class="col text-truncate">
                      <a href="#" class="text-body d-block">Example 2</a>
                      <div class="d-block text-secondary text-truncate mt-n1">
                        justify-content:between ⇒ justify-content:space-between (#29734)
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="#" class="list-group-item-actions show">
                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto"><span class="status-dot d-block"></span></div>
                    <div class="col text-truncate">
                      <a href="#" class="text-body d-block">Example 3</a>
                      <div class="d-block text-secondary text-truncate mt-n1">
                        Update change-version.js (#29736)
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="#" class="list-group-item-actions">
                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                    <div class="col text-truncate">
                      <a href="#" class="text-body d-block">Example 4</a>
                      <div class="d-block text-secondary text-truncate mt-n1">
                        Regenerate package-lock.json (#29730)
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="#" class="list-group-item-actions">
                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" href="#navbar-layout" data-bs-toggle="dropdown" aria-label="Open user menu">
          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
          <div class="d-none d-xl-block ps-2">
            <div>Paweł Kuna</div>
            <div class="mt-1 small text-secondary">UI Designer</div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <a href="#" class="dropdown-item">Status</a>
          <a href="./profile.html" class="dropdown-item">Profile</a>
          <a href="#" class="dropdown-item">Feedback</a>
          <div class="dropdown-divider"></div>
          <a href="./settings.html" class="dropdown-item">Settings</a>
          <a href="./sign-in.html" class="dropdown-item">Logout</a>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="sidebar-menu">
      <ul class="navbar-nav pt-lg-3">
        @canany(['home'])

        <li class="nav-item @if(request()->routeIs('admin.dashboard')) active @endif">
          <a class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif" href="{{url('admin/dashboard')}}">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.Home') }}
            </span>
          </a>
        </li>
        @endcanany

        @canany(['tracks-create','tracks-view','tracks-edit','tracks-delete','tracks-footer','course-types-create','course-types-view',
        'course-types-edit','course-types-delete','courses-create','courses-view','courses-edit','courses-delete','recommened-courses-view',
        'make-recommened-courses-view','recent-courses-view'])

        <li class="nav-item  dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.comments','admin.courses.*','admin.recommendCourses','admin.startsoonCourses','admin.lectures.*','admin.levels.*','admin.tracks.*','admin.course-types.*'])) show @endif" href="" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                <path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                <path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                <path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.courses.title') }}
            </span>
          </a>
          <div class="dropdown-menu  @if(request()->routeIs(['admin.coursereviews','admin.courses.*','admin.recommendCourses','admin.startsoonCourses','admin.lectures.*','admin.levels.*','admin.tracks.*','admin.course-types.*'])) show @endif">
            <div class="dropdown-menu-columns ">
              <div class="dropdown-menu-column ">
                @canany(['tracks-create','tracks-view','tracks-edit','tracks-delete','tracks-footer'])
                <a class="dropdown-item @if(request()->routeIs(['admin.tracks.index','admin.tracks.edit'])) active @endif" href="{{ url('admin/tracks')}}">
                  {{ __('navbar.courses.list_tracks') }}

                </a>
                @endcanany
                @canany(['tracks-create'])

                <a class="dropdown-item @if(request()->routeIs(['admin.tracks.create'])) active @endif" href="{{ url('admin/tracks/create')}}">
                  {{ __('navbar.courses.add_track') }}

                </a>
                @endcanany

                @foreach($courseTypes as $type)
                <a class="dropdown-item {{ request()->input('type') == $type->id ? 'active' : '' }}" href="{{ url('admin/courses?type='. $type->id)}}">
                  {{ $type->name }}

                </a>
                @endforeach

                @canany(['recent-courses-view'])
                <a class="dropdown-item @if(request()->routeIs(['admin.startsoonCourses'])) active @endif" href="{{ url('admin/start-soon-courses')}}">

                  {{ __('navbar.courses.start_soon_courses') }}

                </a>
                @endcanany

                @canany(['recommened-courses-view'])
                <a class="dropdown-item @if(request()->routeIs(['admin.recommendCourses'])) active @endif" href="{{ url('admin/recommend-courses?recommend=1')}}">

                  {{ __('navbar.courses.recommened_courses') }}

                </a>
                @endcanany

                @canany(['courses-create','courses-view','courses-edit','courses-delete'])

                <a class="dropdown-item @if(request()->routeIs('admin.courses.index')) active @endif" href="{{ url('admin/courses')}}">
                  {{ __('navbar.courses.all_courses') }}

                </a>
                @endcanany

                @canany(['courses-create'])
                <a class="dropdown-item @if(request()->routeIs('admin.courses.create')) active @endif" href="{{ url('admin/courses/create')}}">
                  {{ __('navbar.courses.add_course') }}

                </a>
                @endcanany

                @canany(['course-types-create','course-types-view','course-types-edit','course-types-delete'])
                <a class="dropdown-item @if(request()->routeIs(['admin.course-types.index','admin.course-types.edit'])) active @endif" href="{{ url('admin/course-types')}}">
                  {{ __('navbar.courses.list_course_types') }}

                </a>
                @endcanany

                @canany(['courses-comments'])
                <a class="dropdown-item @if(request()->routeIs(['admin.comments.*'])) active @endif" href="{{url('admin/comments')}}">

                  {{ __('navbar.courses.reviews') }}

                </a>
                @endcanany





              </div>

            </div>
          </div>
        </li>
        @endcanany


        @canany(['students-create','students-view','students-edit','students-delete','subscriptions-create','subscriptions-view',
        'subscriptions-edit','subscriptions-delete'])
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.subscriptions.*','admin.students.*'])) show @endif" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.students.student_managment') }}
            </span>
          </a>
          <div class="dropdown-menu @if(request()->routeIs(['admin.subscriptions.*','admin.students.*'])) show @endif">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">

                @canany(['students-view','students-edit','students-delete'])
                <a class="dropdown-item @if(request()->routeIs('admin.students')) active @endif" href="{{url('/admin/students')}}">
                  {{ __('navbar.students.list') }}

                </a>
                @endcanany

                @canany(['students-create'])
                <a class="dropdown-item @if(request()->routeIs('admin.students.create')) active @endif" href="{{url('/admin/students/create')}}">
                  {{ __('navbar.students.add') }}
                </a>

                @canany(['subscriptions-view',
                'subscriptions-edit','subscriptions-delete'])
                <a class="dropdown-item @if(request()->routeIs('admin.subscriptions')) active @endif" href="{{url('/admin/subscriptions')}}">
                  {{ __('navbar.subscriptions.list') }}

                </a>
                @endcanany
                @canany(['subscriptions-create'])
                <a class="dropdown-item @if(request()->routeIs('admin.subscriptions.create')) active @endif" href="{{url('/admin/subscriptions/create')}}">
                  {{ __('navbar.subscriptions.add') }}
                </a>
                @endcanany

              </div>
            </div>
          </div>
        </li>
        @endcanany

        @canany(['instructors-view','instructors-edit','instructors-delete','instructors-create'])

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs('admin.instructors.*')) show @endif" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                <path d="M13.5 6.5l4 4" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.instructors.instructor_management') }}
            </span>
          </a>
          <div class="dropdown-menu @if(request()->routeIs('admin.instructors.*')) show @endif">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
              @canany(['instructors-view','instructors-edit','instructors-delete'])
                <a class="dropdown-item @if(request()->routeIs('admin.instructors')) active @endif" href="{{url('/admin/instructors')}}">
                  {{ __('navbar.instructors.list') }}

                </a>
                @endcanany

                @canany(['instructors-create'])
                <a class="dropdown-item @if(request()->routeIs('admin.instructors.create')) active @endif" href="{{url('/admin/instructors/create')}}">
                  {{ __('navbar.instructors.add') }}
                </a>
                @endcanany

              </div>
            </div>
          </div>
        </li>

        @endcanany


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.bank-groups.index','admin.bank-groups.create','admin.quizzes.*'])) show @endif " href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-question-mark">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M8 8a3.5 3 0 0 1 3.5 -3h1a3.5 3 0 0 1 3.5 3a3 3 0 0 1 -2 3a3 4 0 0 0 -2 4" />
                <path d="M12 19l0 .01" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.exams.exam_management') }}
            </span>
          </a>
          <div class="dropdown-menu  @if(request()->routeIs(['admin.bank-groups.index','admin.bank-groups.create','admin.quizzes.*']))  show @endif ">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item @if(request()->routeIs('admin.bank-groups.index'))   active @endif" href="{{url('admin/bank-groups')}}">
                  {{ __('navbar.exams.quections_list') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.bank-groups.create'))   active @endif" href="{{url('admin/bank-groups/create')}}">
                  {{ __('navbar.exams.add_question') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.quizzes.index'))   active @endif" href="{{url('admin/quizzes')}}">
                  {{ __('navbar.exams.list_exam') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.quizzes.create'))   active @endif" href="{{url('admin/quizzes/create')}}">
                  {{ __('navbar.exams.add_exam') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.studentsexamresults'))   active @endif" href="{{url('admin/studentsexamresults')}}">
                  {{ __('navbar.exams.exam_result') }}
                </a>
                <!-- <a class="dropdown-item @if(request()->routeIs('admin.students-tickets'))   active @endif" href="#">
                  {{ __('navbar.exams.exam_setting') }}
                </a> -->



              </div>
            </div>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.subjects.*','admin.faculities.*'])) show @endif " href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-question-mark">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M8 8a3.5 3 0 0 1 3.5 -3h1a3.5 3 0 0 1 3.5 3a3 3 0 0 1 -2 3a3 4 0 0 0 -2 4" />
                <path d="M12 19l0 .01" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.calculate_equation.management') }}
            </span>
          </a>
          <div class="dropdown-menu  @if(request()->routeIs(['admin.subjects.*','admin.faculities.*'])) show @endif  ">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item  @if(request()->routeIs(['admin.subjects.firstsubjects'])) active @endif" href="{{url('admin/subjects?classroom=1')}}">
                  {{ __('navbar.calculate_equation.first_secondary_subjects') }}
                </a>
                <a class="dropdown-item  @if(request()->routeIs(['admin.subjects.secondsubjects'])) active @endif" href="{{url('admin/subjects?classroom=2')}}">
                  {{ __('navbar.calculate_equation.second_secondary_subjects') }}
                </a>
                <a class="dropdown-item  @if(request()->routeIs(['admin.subjects.thirdsubjects'])) active @endif" href="{{url('admin/subjects?classroom=3')}}">
                  {{ __('navbar.calculate_equation.third_secondary_subjects') }}
                </a>

                <!-- <a class="dropdown-item @if(request()->routeIs(['admin.subjects.*'])) active @endif" href="{{url('admin/subjects?classroom=3')}}">
                  {{ __('navbar.calculate_equation.settings') }}
                </a> -->
                <a class="dropdown-item @if(request()->routeIs(['admin.faculities.*'])) active @endif" href="{{url('admin/faculities')}}">
                  {{ __('navbar.calculate_equation.list_of_colleges') }}
                </a>
              </div>
            </div>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.grantingcertificate','admin.certifications.index','admin.studentscertifications','admin.externelstudentscertifications'])) show @endif" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-certificate">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 15m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                <path d="M13 17.5v4.5l2 -1.5l2 1.5v-4.5" />
                <path d="M10 19h-5a2 2 0 0 1 -2 -2v-10c0 -1.1 .9 -2 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -1 1.73" />
                <path d="M6 9l12 0" />
                <path d="M6 12l3 0" />
                <path d="M6 15l2 0" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.certifications.certifications_management') }}
            </span>
          </a>
          <div class="dropdown-menu  @if(request()->routeIs(['admin.grantingcertificate','admin.certifications.index','admin.studentscertifications','admin.externelstudentscertifications'])) show @endif">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item @if(request()->routeIs(['admin.certifications.index'])) active @endif" href="{{url('admin/certifications')}}">
                  {{ __('navbar.certifications.list_dwafer') }}

                </a>
                <a class="dropdown-item @if(request()->routeIs(['admin.certifications.create'])) active @endif" href="{{url('admin/certifications/create')}}">
                  {{ __('navbar.certifications.add') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs(['admin.studentscertifications.*'])) active @endif" href="{{url('admin/students-certifications')}}">
                  {{ __('navbar.certifications.student_certifications') }}

                </a>
                <a class="dropdown-item @if(request()->routeIs(['admin.externelstudentscertifications'])) active @endif" href="{{url('admin/externel-students-certifications')}}">
                  {{ __('navbar.certifications.student_certifications_from_out') }}

                </a>
                <a class="dropdown-item @if(request()->routeIs(['admin.grantingcertificate'])) active @endif" href="{{url('admin/grantingcertificate')}}">
                  {{ __('navbar.certifications.granting') }}
                </a>



              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs('admin.coupons.*')) show @endif" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-discount">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 15l6 -6" />
                <circle cx="9.5" cy="9.5" r=".5" fill="currentColor" />
                <circle cx="14.5" cy="14.5" r=".5" fill="currentColor" />
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.coupons.coupons_management') }}
            </span>
          </a>
          <div class="dropdown-menu @if(request()->routeIs('admin.coupons.*')) show @endif">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item @if(request()->routeIs(['admin.coupons.index','admin.coupons.edit'])) active @endif" href="{{url('/admin/coupons')}}">
                  {{ __('navbar.coupons.list') }}

                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.coupons.create')) active @endif" href="{{url('/admin/coupons/create')}}">
                  {{ __('navbar.coupons.add') }}
                </a>

              </div>
            </div>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.instructorProfits','admin.courseprofits','admin.studentspayment','admin.listRequest','admin.listPaidRequest'])) show @endif " href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-report-money">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                <path d="M12 17v1m0 -8v1" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.finances.finances_management') }}
            </span>
          </a>
          <div class="dropdown-menu  @if(request()->routeIs(['admin.listRequest','admin.listPaidRequest','admin.instructorProfits','admin.courseprofits','admin.studentspayment','admin.listRequest','admin.listPaidRequest']))  show @endif ">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item @if(request()->routeIs('admin.courseprofits'))   active @endif" href="{{url('admin/course/profit')}}">
                  {{ __('navbar.finances.course_profit') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.studentspayment'))   active @endif" href="{{url('admin/student-payments')}}">
                  {{ __('navbar.finances.students_payment') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.instructorProfits'))   active @endif" href="{{url('admin/instructor-profits')}}">
                  {{ __('navbar.finances.instructors_profit') }}
                </a>

                <a class="dropdown-item @if(request()->routeIs('admin.listRequest')) active @endif" href="{{url('admin/list-payment-requests')}}">
                  {{ __('navbar.finances.instructors_request') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.listPaidRequest')) active @endif" href="{{url('admin/list-paid-payment-requests')}}">
                  {{ __('navbar.finances.instructor_paid') }}
                </a>
              </div>
            </div>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.cvs.*'])) show @endif " href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-cv">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                <path d="M11 12.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0" />
                <path d="M13 11l1.5 6l1.5 -6" />
              </svg> </span>
            <span class="nav-link-title">
              {{ __('navbar.cvmaker.cvmaker_management') }}
            </span>
          </a>
          <div class="dropdown-menu  @if(request()->routeIs(['admin.cvs.*']))  show @endif ">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item @if(request()->routeIs(['admin.cvs.index','admin.cvs.edit']))   active @endif" href="{{url('admin/cvs')}}">
                  {{ __('navbar.cvmaker.cvmaker_template') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.cvs.create'))   active @endif" href="{{url('admin/cvs/create')}}">
                  {{ __('navbar.cvmaker.add_cvmaker_template') }}
                </a>


              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.blogs.index','admin.blogs.edit','admin.blogs.create'])) show @endif " href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 9l9 6l9 -6l-9 -6l-9 6"></path>
                <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10"></path>
                <path d="M3 19l6 -6"></path>
                <path d="M15 13l6 6"></path>
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.blogs.blogs_management') }}
            </span>
          </a>
          <div class="dropdown-menu  @if(request()->routeIs(['admin.blogs.index','admin.blogs.edit','admin.blogs.create']))  show @endif ">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">

                <a class="dropdown-item @if(request()->routeIs(['admin.blogs.index','admin.blogs.edit'])) active @endif" href="{{ url('admin/blogs')}}">
                  {{ __('navbar.blogs.list') }}

                </a>
                <a class="dropdown-item @if(request()->routeIs(['admin.blogs.create'])) active @endif" href="{{ url('admin/blogs/create')}}">
                  {{ __('navbar.blogs.add') }}

                </a>
              </div>
            </div>
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.notifications','admin.listemails.index','admin.listemails.create','admin.instructorstickets','admin.studentstickets','admin.visitorstickets'])) show @endif " href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 9l9 6l9 -6l-9 -6l-9 6"></path>
                <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10"></path>
                <path d="M3 19l6 -6"></path>
                <path d="M15 13l6 6"></path>
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.tickets.tickets_management') }}
            </span>
          </a>
          <div class="dropdown-menu  @if(request()->routeIs(['admin.notifications','admin.listemails.index','admin.listemails.create','admin.instructorstickets','admin.studentstickets','admin.visitorstickets']))  show @endif ">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item @if(request()->routeIs('admin.studentstickets'))   active @endif" href="{{url('admin/students-tickets')}}">
                  {{ __('navbar.tickets.student_msg') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.instructorstickets'))  active @endif" href="{{url('admin/instructors-tickets')}}">
                  {{ __('navbar.tickets.instrutor_msg') }}

                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.visitorstickets'))  active @endif" href="{{url('admin/visitors-tickets')}}">
                  {{ __('navbar.tickets.visitors') }}

                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.notifications.*'))  active @endif" href="{{url('admin/notifications')}}">
                  {{ __('navbar.tickets.notifications') }}

                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.listemails.index'))  active @endif" href="{{url('admin/listemails')}}">
                  {{ __('navbar.tickets.subscribedMail') }}

                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.listemails.create'))  active @endif" href="{{url('admin/listemails/create')}}">
                  {{ __('navbar.tickets.sendMail') }}

                </a>


              </div>
            </div>
          </div>
        </li>




        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.users.*','admin.roles.*'])) show @endif" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.user_managment') }}
            </span>
          </a>
          <div class="dropdown-menu @if(request()->routeIs(['admin.users.*','admin.roles.*'])) show @endif">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item @if(request()->routeIs(['admin.roles.index','admin.roles.edit'])) active @endif" href="{{url('admin/roles')}}">
                  {{ __('navbar.roles.list') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.roles.create')) active @endif" href="{{url('admin/roles/create')}}">
                  {{ __('navbar.roles.add') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs(['admin.users.index','admin.users.edit'])) active @endif" href="{{url('admin/users')}}">
                  {{ __('navbar.users.list') }}

                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.users.create')) active @endif" href="{{url('admin/users/create')}}">
                  {{ __('navbar.users.add') }}

                </a>


              </div>
            </div>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  @if(request()->routeIs(['admin.settings.zoom','admin.settings.mail','admin.questions.*','admin.settings.aboutUSSetting','admin.payment-types.*','admin.countries.*','admin.teams.*','admin.parteners.*','admin.setting.index','admin.policies.*']))  show @endif " href="#navbar-extra" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.master_data')}}
            </span>
          </a>
          <div class="dropdown-menu @if(request()->routeIs(['admin.settings.zoom','admin.settings.mail','admin.reviews.*','admin.langauges.*','admin.settings.contactUs','admin.questions.*','admin.settings.aboutUSSetting','admin.setting.landingSetting','admin.payment-types.*','admin.countries.*','admin.teams.*','admin.parteners.*','admin.setting.index','admin.policies.*']))  show @endif ">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item  @if(request()->routeIs('admin.setting.index')) active @endif " href="{{url('admin/setting')}}">

                  {{ __('navbar.settings.general_settings') }}
                </a>

                <a class="dropdown-item  @if(request()->routeIs('admin.setting.landingSetting')) active @endif " href="{{url('admin/landing-page-settings')}}">

                  {{ __('navbar.settings.home_settings') }}
                </a>

                <a class="dropdown-item  @if(request()->routeIs('admin.settings.aboutUSSetting')) active @endif " href="{{url('admin/about-us-settings')}}">

                  {{ __('navbar.settings.about_us_settings') }}
                </a>

                <a class="dropdown-item  @if(request()->routeIs('admin.settings.contactUs')) active @endif " href="{{url('admin/contact-us-settings')}}">

                  {{ __('navbar.settings.contactus_settings') }}
                </a>
                <a class="dropdown-item  @if(request()->routeIs('admin.languages.index')) active @endif " href="{{ url('admin/languages')}}">

                  {{ __('navbar.settings.language_setting') }}
                </a>
                <!-- <a class="dropdown-item  @if(request()->routeIs('admin.setting.sendemail')) active @endif " href="{{ url('admin/send-email-settings')}}">

                  {{ __('navbar.settings.email_send_settings') }}
                </a> -->
                <a class="dropdown-item  @if(request()->routeIs('admin.settings.zoom')) active @endif " href="{{ url('admin/zoom-settings')}}">

                  {{ __('navbar.settings.zoom_settings') }}
                </a>
                <a class="dropdown-item  @if(request()->routeIs('admin.settings.mail')) active @endif " href="{{ url('admin/mail-settings')}}">

                  {{ __('navbar.settings.mail_settings') }}
                </a>
                <a class="dropdown-item  @if(request()->routeIs('admin.policies.*')) active @endif " href="{{url('admin/policies')}}">

                  {{ __('navbar.settings.policies') }}
                </a>



                <a class="dropdown-item  @if(request()->routeIs('admin.parteners.*')) active @endif " href="{{url('admin/parteners')}}">

                  {{ __('navbar.settings.parteners') }}
                </a>
                <a class="dropdown-item  @if(request()->routeIs('admin.teams.*')) active @endif " href="{{url('admin/teams')}}">

                  {{ __('navbar.settings.teams') }}
                </a>
                <a class="dropdown-item  @if(request()->routeIs('admin.questions.*')) active @endif " href="{{url('admin/questions')}}">

                  {{ __('navbar.settings.questions') }}
                </a>
                <a class="dropdown-item  @if(request()->routeIs('admin.reviews.*')) active @endif " href="{{url('admin/reviews')}}">

                  {{ __('navbar.settings.reviews') }}
                </a>

                <a class="dropdown-item  @if(request()->routeIs('admin.countries.*')) active @endif " href="{{url('admin/countries')}}">

                  {{ __('navbar.countries') }}
                </a>
                <a class="dropdown-item @if(request()->routeIs('admin.payment-types.*'))  active @endif " href="{{url('admin/payment-types')}}">
                  {{ __('navbar.paymenttypes') }}
                </a>

              </div>

            </div>
          </div>
        </li>


      </ul>
    </div>
  </div>
</aside>