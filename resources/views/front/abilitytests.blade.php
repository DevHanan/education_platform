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
          
      <div class="row">

      @if($tests)
      @foreach($tests as $test)
      <div class="col-lg-6">
                  <div class="d-flex justify-content-between align-items-center bg-white rounded policy-card mb-4">
                      <div>
                          <h3> {{ $test->name }}</h2>
                          <p class="mt-4">  {!! optional($test->track)->name !!}</p>
                      </div>
                      <div>
                          <a href="#" class="btn btn-success primary-bg">
                              إبدا الأختبار </a>
                      </div>
                  </div>
              </div>
        @endforeach
        @else
لا توجد بيانات للعرض
        @endif
    </div>
         
      </section>
@endsection