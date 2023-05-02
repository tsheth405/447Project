<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'user';

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $sql = "SELECT * FROM userinfo WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);


    if ($result->num_rows == 1) {

        // Set session variables
        $_SESSION['username'] = $username;

        // Redirect to protected page
        header('Location: home.php');
        exit;

    } else {
        // Display error message
        $error = 'Invalid username or password';
    }

    $conn->close();
}
?>