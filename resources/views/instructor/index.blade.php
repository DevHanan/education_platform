@extends('admin.layouts.master')
@section('title', $title)
@section('content')


<!-- Page body -->
<div class="page-body">
  <div class="container-xl">
    
  <div class="col-12">
        <div class="row row-cards">


          <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
              <div class="card-body" style="min-height:90px;">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                        <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                        <path d="M3 6l0 13" />
                        <path d="M12 6l0 13" />
                        <path d="M21 6l0 13" />
                      </svg> </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                      {{ auth()->guard('instructors-login')->user()->courses()->count() }}
                    </div>
                    <div class="text-secondary">
                      {{ __('admin.instructors.total_course')}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
              <div class="card-body" style="min-height:90px;">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path>
                        <path d="M12 3v3m0 12v3"></path>
                      </svg>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                      {{ auth()->guard('instructors-login')->user()->current_balance }}
                      {{ $setting->currency }}
                    </div>
                    <div class="text-secondary">
                      {{ __('admin.instructors.current_balance')}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
              <div class="card-body" style="min-height:90px;">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path>
                        <path d="M12 3v3m0 12v3"></path>
                      </svg>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                      {{ auth()->guard('instructors-login')->user()->total_balance }}
                      {{ $setting->currency }}
                    </div>
                    <div class="text-secondary">
                      {{ __('admin.instructors.total_balance')}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
              <div class="card-body" style="min-height:90px;">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /><path d="M15 19l2 2l4 -4" /></svg>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                      {{ $student_count }}
                     
                    </div>
                    <div class="text-secondary">
                      {{ __('admin.instructors.student_count')}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

<!-- @include('admin.layouts.inc.footer') -->
@endsection

@push('custom-scripts')

@endpush