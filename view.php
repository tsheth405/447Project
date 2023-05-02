<head>
  <style>
    body {
        background: url('https://images.unsplash.com/photo-1566566220367-af8d77269124?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGFpcnBvcnR8ZW58MHx8MHx8&w=1000&q=80') no-repeat center center fixed;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<?php
session_start(); // start the session

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

//title
echo '<h1 style="font-size: 50px;">Your Flights</h1>';

// Home button
echo '<button style="position: absolute; top: 10px; right: 10px;" onclick="location.href=\'home.php\'">HOME</button>';

echo '<button style="position: absolute; top: 40px; right: 10px; class="logout" onclick="location.href=\'logout.php\'">Log out</button>';

// Get the username from the session
$username = $_SESSION['username'];

// Send SQL query
$sql = "SELECT f.Arrival_Time, f.Departure_Time, f.Flight_Number, f.Departure_Airport, f.Arrival_Airport 
        FROM Flights f 
        JOIN Trips t ON f.Flight_Number = t.Flight_Number 
        JOIN userinfo u ON t.User_ID = u.id 
        WHERE u.username = '$username'";
$result = mysqli_query($conn, $sql) or die('Query failed: ' . mysqli_error($conn));

// Print results in HTML
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<div style='border: 5px solid black; padding: 10px; margin-bottom: 10px; background-color: white;'>\n";
    echo "<div style='display:flex;justify-content:flex-start;'>\n";
    echo "<h2 style='font-size:40px; margin-right: 150px;'>".$line['Flight_Number']."</h2>\n";
    echo "<div>\n";
    echo "<div style='font-size:30px; margin-right: 200px;''><b>Departure</b></div>\n";
    echo "<div style='font-size:20px;'><b>Time: </b>".date('F j, Y g:i a', strtotime($line['Departure_Time']))."</div>\n";
    echo "<div style='font-size:20px;'><b>Airport: </b>".$line['Departure_Airport']."</div>\n";
    echo "</div>\n";
    echo "<div>\n";
    echo "<div style='font-size:30px;'><b>Arrival</b></div>\n";
    //echo "<div style='font-size:20px;'><b>Time: </b>".date('g:i a', strtotime($line['Arrival_Time']))."</div>\n";
    echo "<div style='font-size:20px;'><b>Time: </b>".date('F j, Y g:i a', strtotime($line['Arrival_Time']))."</div>\n";
    echo "<div style='font-size:20px;'><b>Airport: </b>".$line['Arrival_Airport']."</div>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<button onclick=\"if(confirm('Are you sure you want to cancel this flight ".$line['Flight_Number']."?')) {location.href='cancel.php?flight=".$line['Flight_Number']."';}\">Cancel Flight</button>\n";
    echo "<button onclick=\"location.href='moreinfo.php?flight_number=".$line["Flight_Number"] . "'\">View More Info</button>\n";
    echo "</div>\n";
}

// Free resultset
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>

