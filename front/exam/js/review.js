let uncompletedPopUp = document.querySelector(".uncompleted-pop-up")
let uniquePopUp = document.querySelector(".unique-pop-up")
let reviewPopUp1 = document.querySelector(".review-pop-up-1")
let reviewPopUp2 = document.querySelector(".review-pop-up-2")
let overlay = document.querySelector(".overlay")
function hidePopUp(){
    uncompletedPopUp.classList.add("d-none")
    uniquePopUp.classList.add("d-none")
    reviewPopUp1.classList.add("d-none")
    reviewPopUp2.classList.add("d-none")
    overlay.classList.add("d-none")
}
overlay.addEventListener("click", () => {
    uncompletedPopUp.classList.add("d-none")
    uniquePopUp.classList.add("d-none")
    reviewPopUp1.classList.add("d-none")
    reviewPopUp2.classList.add("d-none")
    overlay.classList.add("d-none")
  });

  function finish(){
    reviewPopUp1.classList.remove("d-none")
    overlay.classList.remove("d-none")
  }

  function showSecondPopUp(){
    reviewPopUp1.classList.add("d-none")
    reviewPopUp2.classList.remove("d-none")
    overlay.classList.remove("d-none")
  }

//   function goToFinalReview(){
//     window.location.href = 'quez-final-review.html';
//   }

  function goToResult(){
    window.location.href = 'result.html';
  }

  

let allQuestions= document.querySelectorAll(".all")
let uncompletedQuestions= document.querySelectorAll(".uncompleted")
let uniqueQuestions= document.querySelectorAll(".unique")
function reviewAllFunction(){
    allQuestions.forEach((quez)=>{
        quez.classList.remove("d-none")
    })
}
function reviewUncompletedFunction(){
    if(uncompletedQuestions.length >0){
        uniqueQuestions.forEach((quez)=>{
            quez.classList.add("d-none")
        })
        uncompletedQuestions.forEach((quez)=>{
            quez.classList.remove("d-none")
        })
    }
    else{
        uncompletedPopUp.classList.remove("d-none")
        overlay.classList.remove("d-none")
    }
}
function reviewUniqueFunction(){
    uncompletedQuestions.forEach((quez)=>{
        quez.classList.add("d-none")
    })
    if(uniqueQuestions.length >0){
        uniqueQuestions.forEach((quez)=>{
            quez.classList.remove("d-none")
        })
    }
    else{
        uniquePopUp.classList.remove("d-none")
        overlay.classList.remove("d-none")
    }
}
