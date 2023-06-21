<?php

// Start session
session_start();
include ("connect.php");


// Fetch the highest score from the database
$query = "SELECT * FROM scores ORDER BY score DESC LIMIT 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $playerName = $row['username'];
    $highScore = $row['score'];

    echo "Best High Score: " . $highScore . " (Player: " . $playerName . ")";
} else {
    echo "No high scores found.";
}

// Close the database connection
$conn->close();
?>



