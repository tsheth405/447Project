<?php
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


// Send SQL query
$query = 'SELECT Arrival_Time, Departure_Time, Flight_Number, Departure_Airport, Arrival_Airport FROM flights';
$result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));

// Print results in HTML
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<div style='border: 5px solid black; padding: 10px; margin-bottom: 10px;'>\n";
    echo "<div style='display:flex;justify-content:flex-start;'>\n";
    echo "<h2 style='font-size:40px; margin-right: 70px;'>".$line['Flight_Number']."</h2>\n";
    echo "<div>\n";
    echo "<div style='font-size:30px; margin-right: 70px;''><b>Departure</b></div>\n";
    echo "<div style='font-size:20px;'><b>Time: </b>".date('g:i a', strtotime($line['Departure_Time']))."</div>\n";
    echo "<div style='font-size:20px;'><b>Airport: </b>".$line['Departure_Airport']."</div>\n";
    echo "</div>\n";
    echo "<div>\n";
    echo "<div style='font-size:30px;'><b>Arrival</b></div>\n";
    echo "<div style='font-size:20px;'><b>Time: </b>".date('g:i a', strtotime($line['Arrival_Time']))."</div>\n";
    echo "<div style='font-size:20px;'><b>Airport: </b>".$line['Arrival_Airport']."</div>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "<button onclick=\"if(confirm('Are you sure you want to cancel this flight ".$line['Flight_Number']."?')) {location.href='cancel.php?flight=".$line['Flight_Number']."';}\">Cancel Flight</button>\n";
    //echo "<button onclick=\"location.href='moreinfo.php'\">View More Info</button>\n";
    //echo "<button onclick=\"location.href='moreinfo.php?flight=" . $row["Flight_Number"] . "'\">View More Info</button>\n";
    echo "<button onclick=\"location.href='moreinfo.php?flight_number=" . $row["Flight_Number"] . "'\">View More Info</button>\n";
    echo "</div>\n";
}

// Free resultset
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>
