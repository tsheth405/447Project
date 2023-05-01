<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
// Send SQL query
$query = 'SELECT Arrival_Time, Departure_Time, Flight_Number, Departure_Airport, Arrival_Airport FROM flights';
$result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));

// Print results in HTML
echo "<table>\n";
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>
