<?php
session_start();

$host = "localhost";
$user = "root";
$password ="";
$db = "demo1";
$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");
if (isset($_POST['productname'])) {
    $productname = $_POST['productname'];
            $query1 = "DELETE  from addproduct1 where productname='$productname'";
        mysqli_query($con, $query1);
   
        //header('location: patientreg.php');
     echo '<script>alert("DELETE SUCCESSFULLY")</script>';
    
}
?>