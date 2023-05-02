<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $conn = mysqli_connect('localhost', 'root', '', 'user') or die("Connection Failed." .mysqli_connect_error());
        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['ssn']) && isset($_POST['passportid'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $ssn = $_POST['ssn'];
            $passportid = $_POST['passportid'];


            $sql = "INSERT INTO `userinfo` (`firstname`, `lastname`, `email`, `phone`, `username`, `password`, `ssn`, `passportid`) VALUES ('$firstname','$lastname', '$email', '$phone', '$username', '$password' , '$ssn', '$passportid')";
            $query = mysqli_query($conn, $sql);
            if($query){
                header('Location: login.php');
                exit();
            }
            else {
                echo 'error occurred';
            }
        }
    }
?>
