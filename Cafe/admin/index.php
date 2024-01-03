<?php
session_start(); // Start or resume the session

$valid_username = "Admin"; // Replace with your valid username
$valid_password = "admin"; // Replace with your valid password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == $valid_username && $password == $valid_password) {
        // Redirect to the dashboard or another page on successful login
        header("Location: dashboard.php");
        exit;
    } else {
        // Set the error message and store it in a session variable
        $_SESSION["error_message"] = "Invalid username or password. Please try again.";
    }
}

// Clear the error message after displaying it
if (isset($_SESSION["error_message"])) {
    unset($_SESSION["error_message"]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <title>Classic Rider Cafe</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
    <script>
        // JavaScript to clear the error message after a delay and reset the form
        window.addEventListener('load', function () {
            <?php
            if (isset($_SESSION["error_message"])) {
                echo 'setTimeout(function() {
                    document.querySelector(".error-message").style.display = "none";
                }, 5000);'; // Display the error message for 5 seconds
            }
            ?>
        });
    </script>
</head>
<body>
<div class="login-container">
    <span class="cafe-name">
        Classic Rider Cafe
    </span>
    <br>
    <img src="favicon.png" alt="Classic Rider Cafe Logo" class="cafe-logo">
    <form method="post">
        <br>
        <label for="username">Admin:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="Login">
    </form>
    <?php
    if (isset($_SESSION["error_message"])) {
        echo '<div class="error-message">' . $_SESSION["error_message"] . '</div>';
    }
    ?>
</div>
</body>
</html>
