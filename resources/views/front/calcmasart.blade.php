@extends('front.layouts.master')
@section('title', 'حساب التنسيق')
@section('content')
@include('front.layouts.common.navbar')
<style>
  input[type="text"] {
    text-align: center;
    color: #0075ff;
  }

  .div {
    width: 100%;
  }

  .div::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 350px;
    background: #0075ff;
    z-index: -1;
  }

  .main-div {
    padding-top: 120px;
  }

  .girls {
    display: none;
  }

  .transition {
    transition: all 0.2s;
  }

  .transition:hover {
    transform: translateY(-1px);
  }
</style>
<div class="overlay d-none" style="width: 100%;height: 100%;position: absolute;top: 0;left: 0;background-color: rgba(0, 0, 0, 0.418);z-index: 9;"></div>
<div class="pop-up d-none bg-white shadow-sm position-absolute p-4" style="width:350px ;top: 80%;left: 50%;transform: translate(-50%,-50%);z-index: 10;border-radius: 5px;">
  <form method="get" action="{{url('available-facultities')}}">

    <div class="d-flex justify-content-between align-items-center">
      <h5>المجموع الأعتباري</h5>
      <i class="fa-solid fa-close" onclick="hidePopUp()" style="cursor:pointer ;"></i>
    </div>
    <hr>
    <div class="py-4 text-center">
      <h3> 410 / <span class="text-primary" id="result">0.0000</span></h3>
      <input type="hidden" name="result2" id="result2">
    </div>
    <hr>
    <div class="text-center pt-2">
      <button type="submit" class="btn btn-primary">تنسيق {{ date('y')}}</button>
      <!-- <div class="btn btn-primary" onclick="goToResults()">تنسيق {{ date('y')}}</div> -->

    </div>
  </form>
</div>
<div class="div"></div>
<section class="main-div">
  <div class="container">
    <h2 class="text-center text-white mb-5" style="font-size:45px ;">معادلة المسارات</h2>
    <div class="shadow-sm p-4 bg-white" style="border-radius:20px ;">
      <div class="filter-page">
        <div class="row">
          <div class="col-4 px-1 px-md-2">
            <div id="btnSecondaryOne" onclick="secondaryOneFunction()" class="btn btn-primary shadow-sm w-100">أول ثانوى</div>
          </div>
          <div class="col-4 px-1 px-md-2">
            <div id="btnSecondaryTwo" onclick="secondaryTwoFunction()" class="btn shadow-sm text-primary w-100">ثانى ثانوى</div>
          </div>
          <div class="col-4 px-1 px-md-2">
            <div id="btnSecondaryThree" onclick="secondaryThreeFunction()" class="btn shadow-sm text-primary w-100">ثالث ثانوى</div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-2 col-4 px-1 px-md-2">
            <div class="btn btn-primary transition w-100" onclick="toggleFill()" style="border-radius: 15px;">تعبئة/تفريغ</div>
          </div>
          <div class="col-md-10 col-8">
            <div class="row align-items-center">
              <div class="col-4">
                <p class="text-secondary text-center">1</p>
              </div>
              <div class="col-4">
                <p class="text-secondary text-center">2</p>
              </div>
              <div class="col-4">
                <p class="text-secondary text-center">3</p>
              </div>
            </div>
          </div>
        </div>
        <div class="secondary-one ">
          @foreach ($first as $item )
          <div class="row mt-2">
            <div class="col-md-2 col-4 px-1 px-md-2">
              <div class="btn btn-primary transition w-100" style="border-radius: 15px;">{{ $item->name }}</div>
            </div>
            <div class="col-md-10 col-8">
              <div class="row">
                <div class="col-4"><input type="text" min="0" data-value="{{ $item->degree}}" class="form-control border-primary" name="item{{$item->id}}" style="border-radius: 10px;" @if(!in_array('1',json_decode($item->terms)?? [] )) disabled="disabled" @else value="0" @endif></div>
                <div class="col-4"><input type="text" min="0" data-value="{{ $item->degree}}" class="form-control border-primary" name="item{{$item->id}}" style="border-radius: 10px;" @if(!in_array('2',json_decode($item->terms)?? [])) disabled="disabled" @else value="0" @endif></div>
                <div class="col-4"><input type="text" min="0" data-value="{{ $item->degree}}" class="form-control border-primary" name="item{{$item->id}}" style="border-radius: 10px;" @if(!in_array('3',json_decode($item->terms)?? [])) disabled="disabled" @else value="0" @endif></div>
              </div>
            </div>
          </div>
          @endforeach


        </div>
        <div class="secondary-two d-none">

          @foreach ($second as $item2)
          <div class="row mt-2">
            <div class="col-md-2 col-4 px-1 px-md-2">
              <div class="btn btn-primary transition w-100" style="border-radius: 15px;">{{ $item2->name }}</div>
            </div>
            <div class="col-md-10 col-8">
              <div class="row">
                <div class="col-4"><input type="text" min="0" data-value="{{ $item2->degree}}" class="form-control border-primary" name="item{{$item2->id}}" style="border-radius: 10px;" @if(!in_array('1',json_decode($item2->terms) ?? [] )) disabled="disabled" @else value="0" @endif></div>
                <div class="col-4"><input type="text" min="0" data-value="{{ $item2->degree}}" class="form-control border-primary" name="item{{$item2->id}}" style="border-radius: 10px;" @if(!in_array('2',json_decode($item2->terms) ?? [] )) disabled="disabled" @else value="0" @endif></div>
                <div class="col-4"><input type="text" min="0" data-value="{{ $item2->degree}}" class="form-control border-primary" name="item{{$item2->id}}" style="border-radius: 10px;" @if(!in_array('3',json_decode($item2->terms) ?? [] )) disabled="disabled" @else value="0" @endif></div>
              </div>
            </div>
          </div>
          @endforeach


        </div>
        <div class="secondary-three d-none">
          @foreach ($third as $item3 )
          <div class="row mt-2">
            <div class="col-md-2 col-4 px-1 px-md-2">
              <div class="btn btn-primary transition w-100" style="border-radius: 15px;">{{ $item3->name }}</div>
            </div>
            <div class="col-md-10 col-8">
              <div class="row">
                <div class="col-4"><input type="text" min="0" data-value="{{ $item3->degree}}" class="form-control border-primary" name="item{{$item3->id}}" style="border-radius: 10px;" @if(!in_array('1',json_decode($item3->terms)?? [] )) disabled="disabled" @else value="0" @endif></div>
                <div class="col-4"><input type="text" min="0" data-value="{{ $item3->degree}}" class="form-control border-primary" name="item{{$item3->id}}" style="border-radius: 10px;" @if(!in_array('2',json_decode($item3->terms)?? [] )) disabled="disabled" @else value="0" @endif></div>
                <div class="col-4"><input type="text" min="0" data-value="{{ $item3->degree}}" class="form-control border-primary" name="item{{$item3->id}}" style="border-radius: 10px;" @if(!in_array('3',json_decode($item3->terms)?? [] )) disabled="disabled" @else value="0" @endif></div>
              </div>
            </div>
          </div>
          @endforeach


        </div>
        <div class="row mt-2">
          <div class="col-md-2 col-4 px-1 px-md-2">
            <div class="btn btn-primary transition w-100" style="border-radius: 15px;">القدرات</div>
          </div>
          <div class="col-md-10 col-8">
            <div class="row">
              <div class="col-12"><input type="text" class="form-control border-primary" min="0" max="205" name="abilityVal" id="abilityValinput" style="border-radius: 10px;"></div>
            </div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-12">
            <div class="btn btn-primary transition w-100" style="border-radius: 15px;" onclick="showPopUp()">حساب المعادلة</div>
          </div>
        </div>

      </div>
      <div class="results-page d-none">
        <div class="d-flex justify-content-around">
          <div class="d-flex gap-2">
            <div class="bg-primary mt-2" style="width:10px ;height:10px;border-radius: 50%;"></div>
            <p class="m-0">الكليات المتاحة</p>
          </div>
          <div class="d-flex gap-2">
            <div class="bg-secondary mt-2" style="width:10px ;height:10px;border-radius: 50%;"></div>
            <p class="m-0">الكليات الغير متاحة</p>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6">
            <div id="boysBtn" onclick="showBoys()" class="btn btn-primary shadow-sm w-100"> البنين</div>
          </div>
          <div class="col-6">
            <div id="girlsBtn" onclick="showGirls()" class="btn shadow-sm text-primary w-100">البنات</div>
          </div>
        </div>
        <div class="mt-3 border p-3">
          <div class="row boys">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-secondary w-100" style="border-radius:15px ;">411.0</div>
            </div>
          </div>
          <div class="row girls">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-primary w-100" style="border-radius:15px ;">410.0</div>
            </div>
          </div>
          <div class="row girls">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-secondary w-100" style="border-radius:15px ;">410.0</div>
            </div>
          </div>
          <div class="row girls">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-secondary w-100" style="border-radius:15px ;">410.0</div>
            </div>
          </div>
          <div class="row girls">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-secondary w-100" style="border-radius:15px ;">410.0</div>
            </div>
          </div>
          <div class="row girls">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-secondary w-100" style="border-radius:15px ;">410.0</div>
            </div>
          </div>
          <div class="row girls">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-secondary w-100" style="border-radius:15px ;">410.0</div>
            </div>
          </div>
          <div class="row girls">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-secondary w-100" style="border-radius:15px ;">410.0</div>
            </div>
          </div>
          <div class="row girls">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-secondary w-100" style="border-radius:15px ;">410.0</div>
            </div>
          </div>
          <div class="row girls">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-secondary w-100" style="border-radius:15px ;">410.0</div>
            </div>
          </div>
          <div class="row girls">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-secondary w-100" style="border-radius:15px ;">410.0</div>
            </div>
          </div>
          <div class="row girls">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-secondary w-100" style="border-radius:15px ;">410.0</div>
            </div>
          </div>
          <div class="row girls">
            <div class="col-md-10 col-8">
              <p class="text-secondary text-center border-bottom fw-bold pb-3">طب القاهرة</p>
            </div>
            <div class="col-md-2 col-4">
              <div class="btn btn-secondary w-100" style="border-radius:15px ;">410.0</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('frontscript')
<script>
  let btnSecondaryOne = document.getElementById("btnSecondaryOne")
  let btnSecondaryTwo = document.getElementById("btnSecondaryTwo")
  let btnSecondaryThree = document.getElementById("btnSecondaryThree")
  let secondarySectionOne = document.querySelector(".secondary-one")
  let secondarySectionTwo = document.querySelector(".secondary-two")
  let secondarySectionThree = document.querySelector(".secondary-three")

  function secondaryOneFunction() {
    btnSecondaryOne.classList.add("btn-primary")
    btnSecondaryOne.classList.add("text-white")
    btnSecondaryTwo.classList.remove("btn-primary")
    btnSecondaryTwo.classList.remove("text-white")
    btnSecondaryThree.classList.remove("btn-primary")
    btnSecondaryThree.classList.remove("text-white")

    secondarySectionOne.classList.remove("d-none")
    secondarySectionTwo.classList.add("d-none")
    secondarySectionThree.classList.add("d-none")
  }

  function secondaryTwoFunction() {
    btnSecondaryTwo.classList.add("btn-primary")
    btnSecondaryTwo.classList.add("text-white")
    btnSecondaryOne.classList.remove("btn-primary")
    btnSecondaryOne.classList.remove("text-white")
    btnSecondaryOne.classList.add("text-primary")
    btnSecondaryThree.classList.remove("btn-primary")
    btnSecondaryThree.classList.remove("text-white")

    secondarySectionTwo.classList.remove("d-none")
    secondarySectionOne.classList.add("d-none")
    secondarySectionThree.classList.add("d-none")
  }

  function secondaryThreeFunction() {
    btnSecondaryThree.classList.add("btn-primary")
    btnSecondaryThree.classList.add("text-white")
    btnSecondaryTwo.classList.remove("btn-primary")
    btnSecondaryTwo.classList.remove("text-white")
    btnSecondaryOne.classList.remove("btn-primary")
    btnSecondaryOne.classList.add("text-primary")
    btnSecondaryOne.classList.remove("text-white")

    secondarySectionTwo.classList.add("d-none")
    secondarySectionOne.classList.add("d-none")
    secondarySectionThree.classList.remove("d-none")
  }


  let popUp = document.querySelector(".pop-up")
  let overlay = document.querySelector(".overlay")

  function showPopUp() {
    var inputs = document.querySelectorAll('input[type="text"]:not([disabled]):not([name="abilityVal"])');
    var sum = 0;
    inputs.forEach(function(input) {
      if (input.value != '')
        sum += parseInt(input.value);
    });

    let degree = 0;
    inputs.forEach((input) => {
      degree += parseInt(input.getAttribute('data-value'));
    });


    const abilityVal = document.getElementById('abilityValinput');
    // Get the input value
    const inputValue = abilityVal.value;
    console.log(inputValue);

    // Perform a calculation on the input value
    const finalabilityVal = (inputValue * 205) / 100; //
    console.log(finalabilityVal);
    const subjectval = (sum * 205) / degree;
    console.log(subjectval);
    const finalresult = finalabilityVal + subjectval;
    console.log(finalresult);
    document.getElementById('result').innerHTML = finalresult.toFixed(3) ;
    document.getElementById('result2').value = finalresult.toFixed(3) ;

    popUp.classList.remove("d-none")
    overlay.classList.remove("d-none")
  }

  function hidePopUp() {
    popUp.classList.add("d-none")
    overlay.classList.add("d-none")
  }
  overlay.addEventListener("click", () => {
    popUp.classList.add("d-none")
    overlay.classList.add("d-none")
  });
  let filterPage = document.querySelector(".filter-page")
  let resultsPage = document.querySelector(".results-page")

  function goToResults() {
    popUp.classList.add("d-none")
    overlay.classList.add("d-none")
    resultsPage.classList.remove("d-none")
    filterPage.classList.add("d-none")
  }

  let boysBtn = document.getElementById("boysBtn")
  let girlsBtn = document.getElementById("girlsBtn")
  let boys = document.querySelectorAll(".boys")
  let girls = document.querySelectorAll(".girls")

  function showBoys() {
    boysBtn.classList.add("btn-primary")
    boysBtn.classList.add("text-white")
    girlsBtn.classList.add("text-primary")
    girlsBtn.classList.remove("text-white")
    girlsBtn.classList.remove("btn-primary")
    boys.forEach((boy) => {
      boy.style.display = "flex"
    })
    girls.forEach((boy) => {
      boy.style.display = "none"
    })
  }

  function showGirls() {
    girlsBtn.classList.add("btn-primary")
    girlsBtn.classList.add("text-white")
    boysBtn.classList.remove("btn-primary")
    boysBtn.classList.add("text-primary")
    boysBtn.classList.remove("text-white")
    girls.forEach((boy) => {
      boy.style.display = "flex"
    })
    boys.forEach((boy) => {
      boy.style.display = "none"
    })
  }

  // Function to toggle fill/empty behavior
  function toggleFill() {
    // Select all enabled inputs within the active secondary section
    let activeSection = document.querySelector('.filter-page'); // Example: Adjust based on active section
    if (!activeSection) return; // Ensure active section is found

    let inputs = activeSection.querySelectorAll('input:not([disabled])');

    inputs.forEach(input => {
      if (input.value === '') {
        input.value = '100';
      } else {
        input.value = '';
      }
    });
  }
</script>
@endpush