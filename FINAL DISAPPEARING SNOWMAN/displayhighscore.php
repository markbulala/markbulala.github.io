<?php
include 'highscore.php'; // Include the game functions

// Establish database connection
$conn = connectToDatabase();

// Your game code...

// Assuming $playerName contains the username of the player
if ($playerWon) {
    incrementWinStreak($conn, $playerName);
    $currentWinStreak = getWinStreak($conn, $playerName);
    // Update the high score if the current win streak is higher
    $currentHighScore = getHighScore($conn, $playerName);
    if ($currentWinStreak > $currentHighScore) {
        updateHighScore($conn, $playerName, $currentWinStreak);
    }
} else {
    resetWinStreak($conn, $playerName);
}

// More game code...

// Close the database connection
$conn->close();
?>