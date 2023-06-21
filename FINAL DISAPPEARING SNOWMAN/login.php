<?php
// Start session
session_start();
include ("connect.php");


$conn = new mysqli ($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password
    // Validate the username and password
    $validUsername = "valid_username"; // Replace with your valid username
    $validPassword = "valid_password"; // Replace with your valid password
    // ...

    // Check if the username and password match the database records
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION['username'] = $username;
        header('Location: start.php');
        exit(0);
    }
     else{
        // Login failed
          // Invalid username or password
          $errorMessage = "Invalid username or password. Please try again.";
          $_SESSION['error'] = $errorMessage; // Store the error message in session
         
        
    }

   
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <h1>Welcome to the Disappearing Snowman Game!</h1>

    <?php if(isset($_SESSION['error'])): ?>
        <p style="color: red;"><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <!-- Login Form -->
    <h2>Login</h2>
    <form action="login.php" method="POST"<?php echo $_SERVER['PHP_SELF']; ?>>
        <label for="username"style="color:black ">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password"style="color:black ">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>

</html>