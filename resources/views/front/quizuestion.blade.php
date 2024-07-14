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
  <section class="container-fluid question-main-section">
    @foreach ($questions as $question )
    <div class="row">
      <div class="col-md-6 p-4">
        <h5> {!! $question->title !!} </h5>
        <img src="{{ $question->pictureFullPath }}" style="height:200px ;" class="img-fluid mt-4 mb-5 w-100" alt="">
        <div class="p-2 d-flex gap-2">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="ans-1">
          <h5 class="form-check-label" for="ans-1">
            {{ $question->answer1 }}
          </h5>
        </div>
        <div class="p-2 d-flex gap-2">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="ans-2">
          <h5 class="form-check-label" for="ans-2">
            {{ $question->answer2 }}
          </h5>
        </div>
        <div class="p-2 d-flex gap-2">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="ans-3">
          <h5 class="form-check-label" for="ans-3">
            {{ $question->answer3 }}
          </h5>
        </div>
        <div class="p-2 d-flex gap-2">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="ans-4">
          <h5 class="form-check-label" for="ans-4">
            {{ $question->answer4 }}
          </h5>
        </div>
      </div>
      <div class="col-md-6 p-4">
        <h5 class="text-danger">التناظر اللفظى</h5>
        <h5 class="text-danger">الشركة نفسها هي شركة ناجحة جدا. ويحمد عناء إيجاد طريقة رائعة لهم. اتبع في تقديم الجسم في كثير من الأحيان! وفي وقت الواجبات يتبعهم المخترع، ما هي الأوقات والتملق والألم والرغبة من القادم، ولكن هل هذا كل شيء؟ سأشرح مرونة الملذات، فهي بالفعل أقل من أي شخص، ولكن يمكننا أن نكون لنا، حتى لا يتجنب أحد مضايقات اللطف العظيم، فلا نتهم المادحين بأي عفو. لكن المولود كله لا يعيق سوى متعة النفس الشاقة! هنا الألم من المرونة نفسها، شخص ما لمتابعة بعض الرحلة! فهروب الأنماط، ولا كونهم لا يعرفون مخترع أي خطأ، والذي قاله أولئك، يقع على عاتق الحق ذاته بمسؤوليات وآلام كبيرة. أولئك الذين ولدوا لتلقي المتعة، دعهم يشعرون بالراحة هنا، فهم لا يقدمون طرقًا مريحة لهذه، الألم المرهق للحقيقة ومثله، الذي يهرب بالفعل، ويطلقه، ويتفكك! إنه يكره مدى سهولة تجنب الألم الكبير! ومن أين يرضيه أقل مرونة، أعمته الحقيقة، إلا إذا اتهمناه في الوقت الذي لا يعرفون فيه تمييز التملق السهل؟ ولأن المتهمين غالباً ما يكونون المختار الذي آتي إليه، إلا إذا كان مستمتعاً بواجبات الحق، علاوة على ذلك، يقال إن فرار العميان والفاسدين يتحرر كما هم في ذلك الوقت و! أولئك الذين يتم صدهم عن القيام بأي تمرين، في الواقع. أو في تحملها، لأنها شاقة، يعميها من يعميها ألم اختيار الآلام العادلة، والضروريات والوسائل أبدا. يمكننا ذلك، لكنه يأخذ شيئًا ما ويصده.</h5>
        <iframe class="w-100 my-4" height="315" src="https://www.youtube.com/embed/yrfIMgxG14w?si=jtJ1-rQClQ_QXm6g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <img src="./img/book1.jpeg" style="height:200px ;" class="img-fluid my-2 w-100" alt="">
      </div>
    </div>
    @endforeach
    {{ $questions->links() }}

  </section>
  <script src="{{asset('public/front/exam/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('public/front/exam/js/all.min.js')}}"></script>
  <script src="{{asset('public/front/exam/js/question.js')}}"></script>
  <!--scirpt Files-->
</body>

</html>