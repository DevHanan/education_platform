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
    <link rel="stylesheet" href="{{asset('public/front/exam/css/all.min.css')}}" />
    <!--icons-site-->
    <link rel="icon" type="png" href="img/logo.png" />
    <!--icons-site-->
    <link rel="stylesheet" href="{{asset('public/front/exam/css/style.css')}}" />
    <!--google-font-->
    <!--woow AnimateFiles Css-->
    <link rel="stylesheet" href="{{asset('public/front/exam/css/all.min.css')}}" />
    <!--woow AnimateFiles Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap"
      rel="stylesheet" />
    <!--google-font-->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet" />
  </head>
  <body>
    <div class="overlay d-none" style="width: 100%;height: 100%;position: absolute;top: 0;left: 0;background-color: rgba(0, 0, 0, 0.418);z-index: 9;"></div>
    <div class="unique-pop-up d-none bg-primary text-light shadow-sm position-absolute p-4" style="width:500px ;top: 40%;left: 50%;transform: translate(-50%,-50%);z-index: 10;border-radius: 5px;">
        <div class="d-flex justify-content-between align-items-center">
            <h5>الأسئلة المميزة بعلامة</h5>
            <i class="fa-solid fa-close border px-2 py-1" onclick="hidePopUp()" style="cursor:pointer ;"></i>
        </div>
        <hr>
        <div class="py-4 text-center">
          <h5><i class="fa-solid fa-circle-info"></i> ليس هناك أى أسئلة مميزة بعلامة لمراجعتها</h5>
        </div>
        <hr>
        <div class="text-center pt-2"><div class="btn border text-light" onclick="hidePopUp()">حسنا</div></div>
      </div>
      <div class="uncompleted-pop-up d-none bg-primary text-light shadow-sm position-absolute p-4" style="width:500px ;top: 40%;left: 50%;transform: translate(-50%,-50%);z-index: 10;border-radius: 5px;">
        <div class="d-flex justify-content-between align-items-center">
            <h5>الأسئلة الغير مكتملة</h5>
            <i class="fa-solid fa-close border px-2 py-1" onclick="hidePopUp()" style="cursor:pointer ;"></i>
        </div>
        <hr>
        <div class="py-4 text-center">
          <h5><i class="fa-solid fa-circle-info"></i> ليس هناك أى أسئلة غير مكتملة لمراجعتها</h5>
        </div>
        <hr>
        <div class="text-center pt-2"><div class="btn border text-light" onclick="hidePopUp()">حسنا</div></div>
      </div>
      <div class="review-pop-up-1 d-none bg-primary text-light shadow-sm position-absolute p-4" style="width:500px ;top: 40%;left: 50%;transform: translate(-50%,-50%);z-index: 10;border-radius: 5px;">
        <div class="d-flex justify-content-between align-items-center">
            <h5>إنهاء المراجعة</h5>
            <i class="fa-solid fa-close border px-2 py-1" onclick="hidePopUp()" style="cursor:pointer ;"></i>
        </div>
        <hr>
        <div class="py-4 text-center">
          <h5><i class="fa-solid fa-triangle-exclamation text-warning"></i>الرجاء التأكيد على رغبتك فى إنهاء هذه المراجعة. إذا نقرت فوق "نعم" لن تكون هناك إمكانية لعودة إلى هذه المراجعة والإجابة على الاسئلة (عدد الاسئلة - 24 التى لم تكتمل)</h5>
        </div>
        <hr>
        <div class="d-flex justify-content-center gap-3">
            <div class="text-center pt-2"><div class="btn border text-light" onclick="hidePopUp()">لا</div></div>
            <div class="text-center pt-2"><div class="btn border text-light" onclick="showSecondPopUp()">نعم</div></div>
          </div>
      </div>
      <div class="review-pop-up-2 d-none bg-primary text-light shadow-sm position-absolute p-4" style="width:500px ;top: 40%;left: 50%;transform: translate(-50%,-50%);z-index: 10;border-radius: 5px;">
        <div class="d-flex justify-content-between align-items-center">
          <h5>إنهاء المراجعة</h5>
            <i class="fa-solid fa-close border px-2 py-1" onclick="hidePopUp()" style="cursor:pointer ;"></i>
        </div>
        <hr>
        <div class="py-4 text-center">
          <h5><i class="fa-solid fa-circle-info"></i> هل أنت متأكد من أنك تريد إنهاء هذه المراجعة ؟</h5>
        </div>
        <hr>
        <div class="d-flex justify-content-center gap-3">
          <div class="text-center pt-2"><div class="btn border text-light" onclick="hidePopUp()">لا</div></div>
          <div class="text-center pt-2"><div class="btn border text-light" onclick="goToResult()">نعم</div></div>
        </div>
      </div>
      <nav class="bg-primary text-light w-100">
        <div class="d-flex justify-content-between container-fluid">
            <h2> {{ $quiz->name }}</h2>
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-clock mb-1"></i>
                <h6>الوقت المستغرق</h6>
                <!-- <span class="rotate-icon"><i class="fa-solid fa-arrows-rotate"></i></span> -->
                <h6 id="timer">22:34</h6>
            </div>
        </div>
      </nav>
      <div class="py-3 d-flex align-items-center justify-content-center text-center">
        <h2 class="p-2">درجتك :</h2>
        <h1 class="p-2 text-danger">{{ $studentexam->studentmark }}/{{ $studentexam->totalmark }}</h1>
  </div>
      <h4 class="text-center">مراجعة الإختبار</h4>
      <div class="bg-primary container-fluid text-light py-2 fw-bold w-100">ارشادات</div>
      <section class="container-fluid p-3">
        <p>فيما يلى ملخص لإجابتك يمكنك مراجعة أسئلتك بثلاث (3) طرق مختلفة</p>
        <p>الأزرار الموجودة فى الركن السفلى الأيسر تطابق هذه الخيارات :</p>
        <ul>
            <li>قم بمراجعة كل أسئلتك وإجاباتك</li>
            <li>قم بمراجعة كل أسئلتك الغير مكتملة</li>
            <li>قم بمراجعة الأسئلة المميزة بعلامة المراجعة</li>
        </ul>
        <p>يمكنك أيضا النقر فوق رقم سؤال لربطه مباشرة بموقعه فى الإختبار</p>
      </section>
      @if($quiz->has_levels == 0)
      <div class="d-flex mb-2 bg-primary text-light justify-content-between container-fluid">
        <div class=" py-2 fw-bold">  عرض الاسئلة</div>
        <div class="d-flex align-items-center gap-2">
            <div class="fw-bold">(غير مكتمل/غير مرئى 14/24)</div>
            <p class="m-0" data-bs-toggle="collapse" href="#part1" role="button" aria-expanded="false" aria-controls="part1"><i class="fa-solid fa-caret-down"></i></p>
        </div>
     </div> 
        <div class="row">
            @foreach ($questions  as $item )
            <a href="{{ url('review-question/'.$item->id)}}" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span> {!!  optional($item->question)->customTitle !!}</span>
                        </div>
                        @if($item->status == 0)
                    <span class="text-danger">غير مكتمل</span>
                    @else
                    <span class="text-inf"> مكتمل</span>
                    @endif
                </div>
            </a>
            @endforeach
           
          
           
           
        </div>
   
     @else
      <div class="d-flex mb-2 bg-primary text-light justify-content-between container-fluid">
        <div class=" py-2 fw-bold"> القسم الثانى</div>
        <div class="d-flex align-items-center gap-2">
            <div class="fw-bold">(غير مكتمل/غير مرئى 14/24)</div>
            <p class="m-0" data-bs-toggle="collapse" href="#part2" role="button" aria-expanded="false" aria-controls="part2"><i class="fa-solid fa-caret-down"></i></p>
        </div>
     </div> 
     <section class="container-fluid collapse multi-collapse" id="part2">
        <div class="row">
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 1</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all unique">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 2</span>
                    </div>
                    
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 3</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 4</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 5</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all unique">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 6</span>
                    </div>
                    
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all unique">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 7</span>
                    </div>
                    
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 8</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all unique">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 9</span>
                    </div>
                    
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 10</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 11</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 12</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 13</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all unique">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 14</span>
                    </div>
                   
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 15</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 16</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 17</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all unique">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 18</span>
                    </div>
                    
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all unique">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 19</span>
                    </div>
                    
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 20</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 21</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 22</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 23</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
            <a href="review-question-answer.html" class="text-decoration-none text-dark col-md-4 border p-3 all uncompleted">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="fa-solid fa-flag text-secondary"></i></span>
                        <span>سؤال 24</span>
                    </div>
                    <span class="text-danger">غير مكتمل</span>
                </div>
            </a>
        </div>
     </section>
     @endif
     
    
      <footer class="bg-primary position-absolute text-light w-100 bottom-0">
        <div class="d-flex container-fluid justify-content-between align-items-center">
            <div>
                <h4 class="equations ps-2 p-1 mb-0 fw-bold" onclick="showSecondPopUp()"><i class="fa-solid fa-arrow-right-from-bracket"></i> إنهاء المراجعة</h4>
            </div>
            <div class="d-flex">
                <h4 class="review-all mb-0 p-1 pe-2 fw-bold" onclick="reviewAllFunction()"><i class="fa-solid fa-bars"></i> مراجعة الكل</h4>
                <h4 class="review-uncompleted mb-0 p-1 pe-2 fw-bold" onclick="reviewUncompletedFunction()"><i class="fa-regular fa-circle-xmark"></i> مراجعة الغير مكتملة</h4>
                <h4 class="review-unique mb-0 p-1 pe-2 fw-bold" onclick="reviewUniqueFunction()"><i class="fa-solid fa-flag"></i> مراجعة المميز بعلامة</h4>
            </div>
        </div>
      </footer>

          <!--scirpt Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/review.js"></script>
    <!--scirpt Files-->
  </body>
</html>
