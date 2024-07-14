<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  @if(isset($title))
  {{ $title }} -
  @endif
  {{ $setting->title }}</title>
  <link rel="shortcut icon" href="{{ asset($setting->iconFullPath) }}">

    <link rel="stylesheet" href="{{asset('public/front/css/bootstrap.min.css')}}">

  <!--woow AnimateFiles Css-->
  <link rel="stylesheet" href="css/all.min.css" />
  <!--woow AnimateFiles Css-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet" />
  <!--google-font-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <style>
    body{
  position: relative;
  min-height: 100vh !important;
  padding-bottom: 40px;
}
.next-btn, .review-all, .review-uncompleted, .review-unique{
  border-right: 2px solid;
  cursor: pointer;
}
.equations{
  border-left: 2px solid;
  cursor: pointer;
}
.second-nav{
  background-color: #0a60e0 ;
}
.question-main-section .col-md-6:first-child{
    border-left: 5px solid #0a60e0;
    min-height: 81vh;
}
.question-main-section .col-md-6:last-child{
    border-right: 5px solid #0a60e0;
    min-height: 81vh;
}
  </style>
</head>

<body>
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
  @foreach ($quiz->sections as $section )
  @if($loop->iteration == 1)
  <div class="py-3">
    <h3> {{ $section->title }}</h3>
    <h3>عدد الأسئلة : {{ $section->question_number }}</h3>
    <h3>الزمن الكلى للقسم : دقيقة</h3>
  </div>
  @endif
  @endforeach
  @endif
  <footer class="bg-primary position-absolute text-light w-100 bottom-0">
    < div class="d-flex container-fluid justify-content-end">
      <a href="{{url('exam-level-question/'.$section->id)}}">
      <h4 class="next-btn mb-0 p-1 pe-2 fw-bold">التالى <i class="fa-solid fa-arrow-left"></i></h4>
    </a>
    </div>
  </footer>

  <!--scirpt Files-->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/main.js"></script>
  <!--scirpt Files-->
</body>

</html>