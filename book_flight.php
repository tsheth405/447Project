<?php
// book_flight.php
session_start();

if (isset($_SESSION['user_id']) && isset($_POST['flight_id'])) {
    $user_id = $_SESSION['user_id'];
    $flight_id = $_POST['flight_id'];

    // Database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert booking
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, flight_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $flight_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to a confirmation page or display a success message
} else {
    // Redirect to login or show an error message
}
?>