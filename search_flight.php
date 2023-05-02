<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        h1 {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .container {
            padding: 0 20px;
        }
    </style>
</head>
<body>
    <h1>Flight Search Results</h1>
    <div class="container">
        <?php
        // Your PHP code for searching flights and displaying results
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get search parameters from the form
        $flight_number = $_POST['flight_number'];
        $departure_location = $_POST['departure_location'];
        $arrival_location = $_POST['arrival_location'];
        $departure_date = $_POST['departure_date'];
        $departure_time = $_POST['departure_time'];

        // Query to search for the flights based on the search parameters
        $sql = "SELECT * FROM flights WHERE (flight_number = ? OR ? = '') AND (origin = ? OR ? = '') AND (destination = ? OR ? = '') AND (DATE(departure_time) = ? OR ? = '0000-00-00') AND (TIME(departure_time) >= ? OR ? = '00:00')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssss", $flight_number, $flight_number, $departure_location, $departure_location, $arrival_location, $arrival_location, $departure_date, $departure_date, $departure_time, $departure_time);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display search results
        echo "<table>";
        echo "<tr><th>Flight Number</th><th>Departure</th><th>Arrival</th><th>Departure Time</th><th>Flight Time</th><th>Plane Type</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['flight_number'] . "</td>";
            echo "<td>" . $row['origin'] . "</td>";
            echo "<td>" . $row['destination'] . "</td>";
            echo "<td>" . $row['departure_time'] . "</td>";
            echo "<td>" . $row['flight_time'] . "</td>";
            echo "<td>" . $row['plane_type'] . "</td>";
            echo "<td>";
            echo "<form action='book_flight.php' method='post'>";
            echo "<input type='hidden' name='flight_id' value='" . $row['flight_id'] . "'>";
            echo "<button type='submit'>Book Flight</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>

