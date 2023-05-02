<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Flight Cancelled</title>
</head>
<body>
	<?php

		// Connect to the database
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

        // Home button
        echo '<button style="position: absolute; top: 10px; right: 10px;" onclick="location.href=\'home.php\'">HOME</button>';
        echo '<button style="position: absolute; top: 40px; right: 10px; class="logout" onclick="location.href=\'logout.php\'">Log out</button>';

		// Get the flight number from the query string
		$flight_number = $_GET['flight'];

		// Delete the flight from the trips table
		$sql = "DELETE FROM trips WHERE Flight_Number='$flight_number'";
		if ($conn->query($sql) === TRUE) {
            echo '<p style="font-size: 24px; text-align: center;">Flight '.$flight_number.' has been cancelled and removed from your trip list!</p>';
		} else {
			echo "Error deleting flight: " . $conn->error;
		}

		$conn->close();
	?>
</body>
