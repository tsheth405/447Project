<?php
session_start(); // start the session

echo '<button style="position: absolute; top: 10px; right: 10px;" onclick="location.href=\'home.php\'">HOME</button>';
echo '<button style="position: absolute; top: 40px; right: 10px; class="logout" onclick="location.href=\'logout.php\'">Log out</button>';


// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_SESSION['username']) && isset($_POST['flight_number'])) {
    $name = $_SESSION['username'];
    $flight_number = $_POST['flight_number'];
    
    //title
    echo '<h1 style="font-size: 50px; margin-top: 100px; text-align: center;">Confirmation</h1>';

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

    // Get the user_id associated with the given username
    $sql = "SELECT id FROM userinfo WHERE username = '$name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];
    } else {
    echo "Error: user not found";
    exit;
    }

    // Check if the user has already booked the selected flight
    $sql = "SELECT * FROM Trips WHERE Flight_Number = '$flight_number' AND User_ID = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<p style="font-size: 24px; text-align: center;">Flight '.$flight_number.' has already been booked!</p>';
    } else {
        $seat_number = rand(1, 50);
        $boarding_pass = rand(1, 50)*1234;
        $sql = "INSERT INTO `Trips` (`BoardingPass_Number`, `Flight_Number`, `Seat_Number`, `User_ID`, `username`) 
        VALUES ('$boarding_pass','$flight_number', '$seat_number', '$user_id', '$name')";
        $query = mysqli_query($conn, $sql);
        echo '<h2 style="font-size: 30px; margin-top: 50px; text-align: center;">Flight ' . $flight_number . ' has been booked</h2>';
    }
    
    // Close the database connection
    $conn->close();
}

?>
