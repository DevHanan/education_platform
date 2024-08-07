<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>
  @if(isset($title))
  {{ $title }} -
  @endif
  {{ $setting->title }}
</title>
<link rel="shortcut icon" href="{{ asset($setting->iconFullPath) }}">

<link href="{{asset('dist/css/tabler.min.css?1692870487')}}" rel="stylesheet" />
<link href="{{asset('dist/css/tabler-flags.min.css?1692870487')}}" rel="stylesheet" />
<link href="{{asset('dist/css/tabler-payments.min.css?1692870487')}}" rel="stylesheet" />
<link href="{{asset('dist/css/tabler-vendors.min.css?1692870487')}}" rel="stylesheet" />
<link href="{{asset('dist/css/demo.min.css?1692870487')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<!-- fontawesome icon -->

<link rel="stylesheet" href="{{ asset('dashboard/fonts/fontawesome/css/fontawesome-all.min.css') }}">
<!-- data tables css -->
<link rel="stylesheet" href="{{ asset('dashboard/plugins/data-tables/css/datatables.min.css') }}">
<!-- select2 css -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colvis/1.1.2/css/dataTables.colVis.min.css
">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/colvis/1.1.2/css/dataTables.colvis.jqueryui.css
">


<style>
  @import url('https://rsms.me/inter/inter.css');

  :root {
    --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
  }

  body {
    font-feature-settings: "cv03", "cv04", "cv11";
  }

  .invalid-feedback {
    display: block;
    padding: 10px;
  }
</style>
@if(App::getLocale() == 'ar')
<style>
  .page {
    direction: rtl !important;
  }

  .navbar-vertical.navbar-expand-lg .navbar-collapse .dropdown-menu .dropdown-item {
    min-width: 0;
    display: flex;
    width: auto;
    padding-right: calc(calc(calc(var(--tblr-page-padding) * 2)/ 2) + 1.75rem);
    color: inherit;
  }
</style>
@endif
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  div#DataTables_Table_0_filter {
    margin: 25px;
  }

  .table-responsive {
    padding: 15px 5px 5px 5px;
  }
</style>


<!--  ToolTip custom style  -->
<!-- <style>
 a[data-title] {
  position: relative;
}

a[data-title]:hover::after {
  content: attr(data-title);
  font-size: 14px;
  color: white;
  background-color: black;
  padding: 5px;
  border-radius: 5px;
  position: absolute;
  top: -30px;
  left: 50%;
  transform: translateX(-50%);
  white-space: nowrap;
}

button.btn.btn-icon.btn-danger.btn-sm[data-title] {
  position: relative;
}

button.btn.btn-icon.btn-danger.btn-sm[data-title]:hover::after {
  content: attr(data-title);
  font-size: 14px;
  color: white;
  background-color: black;
  padding: 5px;
  border-radius: 5px;
  position: absolute;
  top: -30px;
  left: 50%;
  transform: translateX(-50%);
  white-space: nowrap;
}
</style> -->

<!-- -->
@if(app()->getLocale() == 'ar')
<style>
  .dropdown-menu-end[data-bs-popper] {
    left: 0;
    right: auto;
  }
</style>

@endif

<!-- @if(app()->getLocale() == 'en')

<style>
    .fa-eye-slash {
        position: absolute;
        top: 28%;
        right: 4%;
        cursor: pointer;
        color: #37374a;
    }

    .eye-icon {
        position: absolute;
        right: 10px;
        top: 10px;
        cursor: pointer;
    }

    .eye-icon:before {
        font-family: "Font Awesome 5 Free";
        content: "\f06e";
        /* eye icon */
        font-size: 18px;
        color: #666;
    }
</style>
@else

<style>
    .fa-eye-slash {
        position: absolute;
        top: 28%;
        left: 4%;
        cursor: pointer;
        color: #37374a;
    }

    .eye-icon {
        position: absolute;
        left: 10px;
        top: 10px;
        cursor: pointer;
    }

    .eye-icon:before {
        font-family: "Font Awesome 5 Free";
        content: "\f06e";
        /* eye icon */
        font-size: 18px;
        color: #666;
    }
</style>
@endif -->
<style>
  .form-control.is-invalid {
    border-color: #dc3545;
    /* Red color */
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    /* Red shadow */
  }

  .invalid-feedback {
    color: #dc3545;
    /* Red color */
  }
</style>