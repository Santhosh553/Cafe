<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="favicon.png" type="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #dashboard-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 80%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        .filter-icon {
            cursor: pointer;
            margin-left: 10px;
        }

        #filter-container {
            text-align: right;
            margin-top: 20px;
        }

        #filter-date {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        #clear-filter {
            margin-left: 10px;
            padding: 10px 20px;
            background-color: #333;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        #clear-filter:hover {
            background-color: #555;
        }

        /* New styles for a colorful UI */
        .filter-container {
            display: flex;
            align-items: center;
        }

        .filter-icon {
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-left: 10px;
            transition: background-color 0.3s;
        }

        .filter-icon:hover {
            background-color: #555;
        }

        #filter-date {
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .dashboard-header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .cafe-logo {
            width: 100px;
            height: 100px;
            margin-right: 20px;
        }

        .scrollable-container {
            max-height: 70vh;
            overflow-y: auto;
        }

    </style>
</head>

<body>
    <div id="dashboard-container">
        <div class="dashboard-header">
            <img src="favicon.png" alt="Classic Rider Cafe Logo" class="cafe-logo">
            <h1>Welcome, Admin!</h1>
        </div>
        <div class="filter-container">
            <input type="date" id="filter-date" placeholder="Filter by date">
            <button class="filter-icon" onclick="filterTable()"><i class="fas fa-search"></i> Filter</button>
            <button class="filter-icon" id="clear-filter" onclick="clearFilter()"><i class="fas fa-times"></i> Clear</button>
        </div>
        <div class="scrollable-container">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Persons</th>
                </tr>

                <?php
                // Connect to the database
                $servername = "localhost";
                $db_username = "root";
                $db_password = "";
                $dbname = "cafe";

                $conn = new mysqli($servername, $db_username, $db_password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch and display table bookings
                $sql = "SELECT name, phone, email, date, time, persons FROM bookings";
                $result = $conn->query($sql);

                if ($result === false) {
                    echo "Error: " . $conn->error;
                } else {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td><td>" . $row["date"] . "</td><td>" . $row["time"] . "</td><td>" . $row["persons"] . "</td></tr>";
                    }
                }

                $conn->close();
                ?>

            </table>
        </div>
    </div>

    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('filter-date');
            filter = input.value;
            table = document.querySelector('table');
            tr = table.getElementsByTagName('tr');
            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName('td')[3]; // Column with date
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue === filter) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        }

        function clearFilter() {
            document.getElementById('filter-date').value = "";
            var table = document.querySelector('table');
            var tr = table.getElementsByTagName('tr');
            for (var i = 1; i < tr.length; i++) {
                tr[i].style.display = '';
            }
        }
    </script>
</body>

</html>
