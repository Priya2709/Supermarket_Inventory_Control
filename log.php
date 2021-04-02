<?php

session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "demo1";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    /*if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (empty($password)) {
        array_push($errors, "password is required");
    }*/
    $user_check_query = "SELECT * FROM register WHERE username='" . $username . "'AND password ='" . $password . "' LIMIT 1";;

    $results = mysqli_query($con, $user_check_query);

    if (mysqli_num_rows($results) > 0) {

        $_SESSION['username'] = $username;
        
     
      header('location: dashboard.html');
     // echo '<script>alert("LOGIN SUCCESSFULLY")</script>';
    } else {
      //  array_push($errors, "Incorrect username or password");
      echo '<script>alert("ENTER VALID USERNAME AND PASSWORD")</script>';
    }
}
mysqli_close($con);
?>