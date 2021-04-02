<?php
session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "demo1";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");
if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
   // $gender= $_POST['gender'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $confirmpassword1 = $_POST['confirmpassword1'];
    $val=0;
    if ($password != $confirmpassword1) {
        $val=1;
      //  array_push($errors, "Passwords do not match");
      echo '<script>alert("PASSWORD DO NOT MATCH")</script>';
      echo" </br>";

    }


    $user_check_query2 = "SELECT * FROM register where username ='" . $username . "' OR email ='" . $email . "' LIMIT 1";

    $results = mysqli_query($con, $user_check_query2);
    $user = mysqli_fetch_assoc($results);

    if ($user) {

        if ($user['username'] === $username) {
            //array_push($errors, "Username already exists");
            $val=1;
            echo '<script>alert("USERNAME ALREADY EXISTS")</script>';
            echo" </br>";
        }
        if ($user['email'] === $email) {
            $val=1;
           // array_push($errors, "This email id already has a registered username");
           echo '<script>alert("MAIL ID ALREADY EXISTS")</script>';
       echo "</br>";
            }

    }
    if ($val == 0) {

        $query1 = "INSERT INTO register (username, email, phonenumber, password) values  ('$username', '$email', '$phonenumber', '$password')";


        mysqli_query($con, $query1);
        
        
        //echo '<script>alert("REGISTER SUCCESSFULLY")</script>';
        header('location: dashboard.html');
    }
}
?>
