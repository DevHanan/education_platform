var timerElement = document.getElementById('timer');
window.onload = function() {
    var timeLeft = 25 * 60; // 25 minutes in seconds
    updateTimerDisplay(timeLeft, timerElement);

    var timerInterval = setInterval(function() {
      timeLeft--;
      updateTimerDisplay(timeLeft, timerElement);

      if (timeLeft <= 0) {
        clearInterval(timerInterval);
        window.location.href = 'quez-department-review.html'; // Change to the URL you want to redirect to
      }
    }, 1000);
  };

  function updateTimerDisplay(timeLeft, timerElement) {
    var minutes = Math.floor(timeLeft / 60);
    var seconds = timeLeft % 60;
    timerElement.textContent = (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
  }

  let nextBtn = document.querySelector('.next-btn')
  document.querySelector('.next-btn').addEventListener('click', function() {
    window.location.href = 'quez-department-review.html';
  })