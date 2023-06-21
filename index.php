
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

    // Check if a success message is set in the session
if (isset($_SESSION['success_message'])) {
    $successMessage = $_SESSION['success_message'];
    // Clear the success message from the session
    unset($_SESSION['success_message']);

}
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

<body>
    <h2>WELCOME TO DISAPPEARING SNOWMAN</h2>
    <link rel="stylesheet" type="text/css" href="login.css" />
    <div class="container" id="container">
        <div class="form-container sign-up-container">
        <form action="register.php" method="POST">
        <form action="register.php" method="post" id="registration-form">
        <h1>Register</h1>
                
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
        
            </form>
        </div>
    
        <div class="form-container sign-in-container">
            <form action="loginform.php" method="POST"<?php echo $_SERVER['PHP_SELF']; ?>>
                <h1>Log In</h1>
              
                <?php if(isset($_SESSION['error'])): ?>
        <p style="color: red;"><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
                <label for="username"style="color:black ">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password"style="color:black ">Password:</label>
        <input type="password" id="password" name="password" required>
                <a href="#">Forgot your password?</a>
                <button type="submit">Log In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info, and let's start to play</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Welcome, Student!</h1>
                    <p>Register your personal details to start to play</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="login.js"></script>
</body>
    </html>
