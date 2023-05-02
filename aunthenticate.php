<?php
// Connect to the database
session_start();


$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'user';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check if the connection to the database was successful
if (!$conn) {
    die('Could not connect to the database: ' . mysqli_error());
}

// Retrieve the username and password from the login form
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Build the query to check if the user exists
    $query = "SELECT * FROM userinfo WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die('Could not query the database: ' . mysqli_error());
    }

    // Check if the user was found
    if (mysqli_num_rows($result) == 1) {
        // User was found, redirect to the homepage or a welcome page
        $_SESSION['username'] = $username;
        header('Location: home.php');
    } else {
        // User was not found, display an error message
        header('Location: test.php');
    }
}

// Close the database connection
mysqli_close($conn);
?>
