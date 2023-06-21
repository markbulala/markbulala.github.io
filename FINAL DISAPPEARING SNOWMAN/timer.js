function startTimer(timeLimit) {
    var timeLeft = timeLimit;
    var timerElement = document.getElementById('time-left');
    timerElement.innerText = timeLeft;

    var timerInterval = setInterval(function() {
        if (timeLeft > 0) {
            timeLeft--;
            timerElement.innerText = timeLeft;
        } else {
            clearInterval(timerInterval);
            alert("Time's up!");
        }
    }, 1000);
}

function startGame() {
    var levelSelect = document.getElementById('level-select');
    var level = levelSelect.value;

    // Send an AJAX request to the server to get the time limit for the selected level
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var timeLimit = parseInt(xhr.responseText);

                if (!isNaN(timeLimit)) {
                    startTimer(timeLimit);
                } else {
                    alert("Invalid response from the server.");
                }
            } else {
                alert("Error occurred while retrieving level data.");
            }
        }
    };

    xhr.open("GET", "get_level_data.php?level=" + level, true);
    xhr.send();
}
