<?php
session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "demo1";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");
if (isset($_POST['productname'])) {
    $productname = $_POST['productname'];
    $quantity = $_POST['quantity'];
 
    $price = $_POST['price'];
    $fixedval=$quantity;
            $query1 = "INSERT INTO addproduct1(productname,quantity,price,fixedproductquantity) values ('$productname','$quantity','$price','$fixedval')";


        mysqli_query($con, $query1);
        
        //header('location: patientreg.php');
        echo '<script>alert("ADD SUCCESSFULLY")</script>';
    
}
?>
