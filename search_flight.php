<?php
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

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Flight Number: " . $row["flight_number"]. "<br>";
        echo "Departing From: " . $row["origin"]. "<br>";
        echo "Arriving At: " . $row["destination"]. "<br>";
        echo "Departure Time: " . $row["departure_time"]. "<br>";
        echo "Flight Time: " . $row["flight_time"]. "<br>";
        echo "Plane Type: " . $row["plane_type"]. "<br>";

        echo "<form action='book_flight.php' method='post'>";
        echo "<input type='hidden' name='flight_id' value='" . $row["flight_id"] . "'>";
        echo "<button type='submit'>Book Flight</button>";
        echo "</form><br>";
    }
} else {
    echo "No flight found with the provided search parameters.";
}

$conn->close();
?>
