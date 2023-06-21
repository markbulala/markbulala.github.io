<?php
include 'highscore.php'; // Include the game functions

// Your game code...

// Assuming $playerWon is a boolean indicating if the player won or lost the round
if ($playerWon) {
    incrementWinStreak();
    $currentWinStreak = getWinStreak();
    // Update the high score if the current win streak is higher
    updateHighScore($currentWinStreak);
} else {
    resetWinStreak();
}

// More game code...
?>