@extends('front.layouts.master')
@section('title', '')
@section('content')
@include('front.layouts.common.navbar')
<section class="header">
        <div class="text-center text-white">
          <h1 class="pb-3">إختبارات القدرات</h1>
          <!-- <p>تعرف على السياسات و اللوائح وكل ما يخص المؤسسة</p> -->
        </div>
      </section>
  
      <section class="tests container my-5 p-5 rounded">
          <div class="test-info d-flex justify-content-between align-items-center mb-5">
              <div>
                  <!-- <h1 class="fw-bold">السياسات واللوائح</h1> -->
                  <p class="fw-bold mt-4">
                  تعرف على أختبارات العامة الخاصة بنا
                  </p>
              </div>
              <div>
                  <img src="public/front/img/docs.png" alt="">
              </div>
          </div>
          <div class="row">
             
          @if($tests)
          @foreach($tests as $test)
              <div class="col-lg-6">
                  <div class="d-flex justify-content-between align-items-center bg-white rounded test-card mb-4">
                      <div>
                          <h3> {{ $test->name }}</h2>
                          <p class="mt-4">  {!! $test->description !!}</p>
                      </div>
                    
                  </div>
              </div>
              @endforeach
              @else

<p>  {{ __('admin.no_data_found')}}</p>
              @endif
             
          </div>
      </section>
@endsection