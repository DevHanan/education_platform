@extends('front.layouts.master')
@section('title', '')
@section('content')
@include('front.layouts.common.navbar')
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
      <div class="py-3">
        <h3>القسم الأول</h3>
        <h3>عدد الأسئلة : 24 سؤال</h3>
        <h3>الزمن الكلى للقسم : 25 دقيقة</h3>
      </div>
      <footer class="bg-primary position-absolute text-light w-100 bottom-0">
        <div class="d-flex container-fluid justify-content-end">
          <h4 class="next-btn mb-0 p-1 pe-2 fw-bold">التالى <i class="fa-solid fa-arrow-left"></i></h4>
        </div>
      </footer>

     @endsection
