
<?php
// Start session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: loginform.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>The Disappearing Snowman</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />  
</head>
<body>
  <br>
  <br>
  <br>
    <h1>Welcome to the Disappearing Snowman Game!</h2>
    <h2>Select a Level</h2>
    <form action="play.php" method="POST">
    <label for="level"style="color:black ">Choose a level:</label>
      <select name="level" id="level">
        <option value="easy">Easy</option>
        <option value="medium">Average</option>
        <option value="hard">Difficult</option>
      </select>
      <input type="submit" value="Start Game">
    </form>


</body>
</html>