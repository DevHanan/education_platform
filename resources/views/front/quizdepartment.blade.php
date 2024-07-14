@extends('front.layouts.master')
@section('title', '')
@section('content')
      <nav class="bg-primary text-light w-100">
        <div class="d-flex justify-content-between container-fluid">
            <h2>اختبار قدرات</h2>
            <div class="d-flex align-items-center gap-2">
              <i class="fa-solid fa-clock mb-1"></i>
              <h6>الوقت المتبقى</h6>
              <span class="rotate-icon"><i class="fa-solid fa-arrows-rotate"></i></span>
              <h6 id="timer" class="d-none">00:10</h6>
            </div>
        </div>
      </nav>
      @if($quiz->has_levels)
      @foreach ($quiz->sections as  $section )
      <div class="py-3">
        <h3> {{ $section->title }}</h3>
        <h3>عدد الأسئلة :  {{ $section->question_number }}</h3>
        <h3>الزمن الكلى للقسم :  دقيقة</h3>
      </div>
      @endforeach
     
     @endif

     @endsection
