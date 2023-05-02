<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: url('https://images.unsplash.com/photo-1566566220367-af8d77269124?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGFpcnBvcnR8ZW58MHx8MHx8&w=1000&q=80') no-repeat center center fixed;
        background-size: cover;
        position: relative;
        min-height: 100vh;
    }
    p.message {
        color: #3a3f44;
        font-size: 40px;
        text-align: center;
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
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
            echo '<p class="message">Flight '.$flight_number.' has been cancelled and removed from your trip list!</p>';
		} else {
			echo "Error deleting flight: " . $conn->error;
		}

		$conn->close();
	?>
</body>
