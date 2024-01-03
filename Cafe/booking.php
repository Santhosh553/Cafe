<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $persons = $_POST["persons"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    // Database connection settings
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "cafe";

    // Create a database connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the 'bookings' table
    $sql = "INSERT INTO bookings (name, phone, email, persons, date, time) VALUES ('$name', '$phone', '$email', '$persons', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        header("Location: success.php?date=$date&time=$time&persons=$persons");
        exit();
    } else {
        echo "<script>alert('An error occurred while processing your booking. Please try again.');</script>";
        header("Location: book.php");
        exit();
    }
    

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
