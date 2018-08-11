var startstop   = document.getElementById("startstop"),
    seconds = 0,
    minutes = 0,
    hours = 0,
    timer;

function buildTimer() {
  seconds++
  if (seconds >= 60) {
    seconds = 0;
    minutes++;
    if (minutes >= 60) {
      minutes = 0;
      hours++;
    }
  }

  second.textContent = (seconds < 10 ? "0" + seconds.toString(): seconds);
  minute.textContent = (minutes < 10 ? "0" + minutes.toString(): minutes);
  hour.textContent = (hours < 10 ? "0" + hours.toString(): hours);
}

function startTimer() {
  clearTimeout(timer);
  timer = setInterval(buildTimer, 1000);
  return false;
}
function stopTimer() {
  clearTimeout(timer);
  return false;
}

startstop.onclick = function() {
  if (this.textContent === "Start") {
    this.textContent = "Stop";
    startTimer();
  } else {
    this.textContent = "Start";
    stopTimer();
  }
};

reset.onclick = function() {
  stopTimer();
  seconds = 0;
  minutes = 0;
  hours   = 0;

  hour.textContent = "00";
  minute.textContent = "00";
  second.textContent = "00";
};
