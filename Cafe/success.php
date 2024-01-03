
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <title>Booking Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .success-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .success-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #e74c3c;
            font-size: 2rem;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        ul {
            list-style: none;
        }

        li {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .back-button {
            display: inline-block;
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2rem;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-content">
            <h1>Booking Successful</h1>
            <p>Your table has been booked successfully. Thank you!</p>
            <p>Here are the details of your reservation:</p>
            <ul>
            <li><strong>Date:</strong> <?php echo isset($_GET['date']) ? htmlspecialchars($_GET['date']) : "N/A"; ?></li>
                <li><strong>Time:</strong> <?php echo isset($_GET['time']) ? htmlspecialchars($_GET['time']) : "N/A"; ?></li>
                <li><strong>Number of Guests:</strong> <?php echo isset($_GET['persons']) ? htmlspecialchars($_GET['persons']) : "N/A"; ?></li>
            </ul>
            <p>We look forward to welcoming you to our restaurant. If you have any special requests or need to make changes. <br>please contact us in advance.</p>
            <a href="index.php" class="back-button">Back to Home</a>
        </div>
    </div>
</body>
</html>
