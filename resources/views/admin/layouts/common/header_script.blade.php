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
<!-- CSS files -->



<link href="{{asset('dist/css/tabler.min.css?1692870487')}}" rel="stylesheet" />
<link href="{{asset('dist/css/tabler-flags.min.css?1692870487')}}" rel="stylesheet" />
<link href="{{asset('dist/css/tabler-payments.min.css?1692870487')}}" rel="stylesheet" />
<link href="{{asset('dist/css/tabler-vendors.min.css?1692870487')}}" rel="stylesheet" />
<link href="{{asset('dist/css/demo.min.css?1692870487')}}" rel="stylesheet" />
<!-- fontawesome icon -->

<link rel="stylesheet" href="{{ asset('dashboard/fonts/fontawesome/css/fontawesome-all.min.css') }}">
<!-- data tables css -->
<link rel="stylesheet" href="{{ asset('dashboard/plugins/data-tables/css/datatables.min.css') }}">
<!-- select2 css -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<style>
  @import url('https://rsms.me/inter/inter.css');

  :root {
    --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
  }

  body {
    font-feature-settings: "cv03", "cv04", "cv11";
  }
  .invalid-feedback{
    display: block;
    padding: 10px;
  }

</style>
@if(App::getLocale() == 'ar')
<style>
  .page{
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
  div#DataTables_Table_0_filter{
    margin: 25px;
  }
</style>


<!--  ToolTip custom style  -->
<style>
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
</style>

<!-- -->
@if(app()->getLocale() == 'ar')
<style>
  .dropdown-menu-end[data-bs-popper]{
  left: 0;
  right: auto;
}
</style>

@endif
