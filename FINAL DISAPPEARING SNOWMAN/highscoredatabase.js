document.addEventListener("DOMContentLoaded", function() {
    // Fetch the high score from the server
    fetchHighScore();
});

function fetchHighScore() {
    fetch("highscore.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("highScore").textContent = data;
        })
        .catch(error => {
            console.log(error);
        });
}