document.querySelector('.next-btn').addEventListener('click', function() {
    var timerElement = document.getElementById('timer');
    rotateIcon = document.querySelector(".rotate-icon")
    timerElement.classList.remove('d-none');
    rotateIcon.classList.add('d-none');
    
    
    var timeLeft = 10; // 10 seconds
    timerElement.textContent = '00:' + (timeLeft < 10 ? '0' : '') + timeLeft;

    var timerInterval = setInterval(function() {
      timeLeft--;
      timerElement.textContent = '00:' + (timeLeft < 10 ? '0' : '') + timeLeft;

      if (timeLeft <= 0) {
        clearInterval(timerInterval);
        window.location.href = 'answer-question.html'; // Change to the URL you want to redirect to
      }
    }, 1000);
  });