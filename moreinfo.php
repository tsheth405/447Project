<!DOCTYPE html>
<html>
<head>
	<title>Flight Information</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {background-color:#f5f5f5;}
		th {
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>
<body>

<h2>Flight Information</h2>

<table>
	<tr>
		<th>Flight Number</th>
		<th>Arrival Terminal</th>
		<th>Departure Terminal</th>
		<th>Arrival Gate</th>
		<th>Departure Gate</th>
		<th>Status</th>
		<th>Pilot Name</th>
		<th>Aircraft Type</th>
	</tr>

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

		// Retrieve the flight information for the specified flight number
		$flight_number = $_GET["flight_number"];
		$sql = "SELECT * FROM Flight_Info WHERE Flight_Number = '$flight_number'";
		$result = $conn->query($sql);

		// Display the information in a table
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["Flight_Number"] . "</td>";
				echo "<td>" . $row["Arrival_Terminal"] . "</td>";
				echo "<td>" . $row["Departure_Terminal"] . "</td>";
				echo "<td>" . $row["Arrival_Gate"] . "</td>";
				echo "<td>" . $row["Departure_Gate"] . "</td>";
				echo "<td>" . $row["Status"] . "</td>";
				echo "<td>" . $row["Pilot_Name"] . "</td>";
				echo "<td>" . $row["Aircraft_Type"] . "</td>";
				echo "</tr>";
			}
		} else {
			echo "You have no upcoming flights!";
		}

		$conn->close();
	?>

</table>

</body>
</html>
