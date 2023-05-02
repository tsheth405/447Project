<?php
// book_flight.php
session_start();

//$_SESSION['username'] = 'bob';

if (isset($_SESSION['username']) && isset($_POST['flight_number'])) {
    $user_id = $_SESSION['username'];
    $flight_number = $_POST['flight_number'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user has already booked this flight
    $stmt = $conn->prepare("SELECT * FROM Trips WHERE User_ID = ? AND Flight_Number = ?");
    $stmt->bind_param("ss", $user_id, $flight_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If the user has already booked this flight, display an error message
        echo "<script>alert('You have already booked this flight.');</script>";
    } else {
        // Insert the trip into the trips table
        $seat_number = rand(1, 50);

        $stmt = $conn->prepare("INSERT INTO Trips (Flight_Number, User_ID, Seat_Number) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $flight_number, $user_id, $seat_number);
        $stmt->execute();
        $stmt->close();

        // Display a success message
        echo "<script>alert('Your trip has been booked.');</script>";
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to login or show an error message
}
?>
