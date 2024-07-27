<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">




<head>
  @include('admin.layouts.common.header_script')

</head>

<body>
  <script src="{{asset('dist/js/demo-theme.min.js?1692870487')}}"></script>


  <div class="page">

    @include('admin.layouts.inc.navbar')


    <div class="page-wrapper">
      @yield('content')


      @include('admin.layouts.inc.footer')
    </div>
  </div>



  @include('admin.layouts.common.footer_script')
  @stack('scripts')


</body>

</html>