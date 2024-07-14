<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Education</title>
  <!--bootstrap-file-->
  <link rel="stylesheet" href="{{asset('public/front/exam/css/bootstrap.min.css')}}" />
  <!--bootstrap-file-->
  <!--fontawesome-file-->
  <link rel="stylesheet" href="{{asset('public/front/exam/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/front/exam/css/style.css')}}">

  <!--woow AnimateFiles Css-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet" />
  <!--google-font-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body>
  <nav class="bg-primary text-light w-100">
    <div class="d-flex justify-content-between container-fluid">
      <h2>اختبار قدرات</h2>
      <div>
        <div class="d-flex align-items-center gap-2">
          <i class="fa-solid fa-clock mb-1"></i>
          <h6>الوقت المتبقى</h6>
          <!-- <span class="rotate-icon"><i class="fa-solid fa-arrows-rotate"></i></span> -->
          <h6 id="timer">25:00</h6>
        </div>
        <div class="d-flex justify-content-end">
          <span>1 من 24</span>
        </div>
      </div>
    </div>
  </nav>
  <nav class="second-nav text-light w-100">
    <div class="d-flex gap-3 align-items-center container-fluid justify-content-end">
      <span><i class="fa-solid fa-flag"></i></span>
      <h5>تمييز السؤال للمراجعة</h5>
      <select class="form-select bg-primary px-5 py-0 w-auto">
        <option value="1">1</option>
        <option value="18" selected>18</option>
      </select>
    </div>
  </nav>
  
  <script src="{{asset('public/front/exam/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('public/front/exam/js/all.min.js')}}"></script>
  <script src="{{asset('public/front/exam/js/question.js')}}"></script>
  <!--scirpt Files-->
</body>

</html>