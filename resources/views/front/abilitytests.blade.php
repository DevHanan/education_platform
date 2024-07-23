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
      
        @endforeach
        @else
لا توجد بيانات للعرض
        @endif
    </div>
         
      </section>
@endsection