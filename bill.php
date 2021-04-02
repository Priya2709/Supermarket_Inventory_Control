<?php 
$con=mysqli_connect('localhost','root','','demo1'); 
$query="select * from buyedproducts"; 
$result=mysqli_query($con,$query); 
$billamt=0;
?>

<html>
<head>
<title>
Billing section
</title>
<style>
	body{
    margin: 2;
    padding: 0;
    background-image: url(s1.jpeg);
    background-repeat: no-repeat;
    background-color:skyblue;
    background-position: center center;
    background-attachment: fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
		</style>

</head>
<body>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
      <h1 align="center"> Bill for the Products </h1>
     </div>
     <div class="col-sm-6">
           
     </div>
                </div>
            </div>
            <table class="table table-striped table-hover" align="center">
                <thead>
                    <tr>
                        <br>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
<tr></tr><tr></tr><tr></tr><tr></tr>
<?php while($rows=mysqli_fetch_assoc($result)) 
{ 
?> 
<tr> 
<td><?php echo $rows['Productname']; ?></td> 
<td><?php
    $quan= $rows['Quantity'];
    echo $quan ?></td> 
<td><?php $pric=$rows['price']; 
    echo $pric ?></td> 
    <td><?php $tot=$quan*$pric;
        $billamt=$billamt+$tot;
        echo $tot;
         ?></td> 
</tr> 
<?php 
       } 
  ?> 
                    </tr>
                </tbody>
            </table>
            <h4 align="center">         grant total 
                <?php
               echo $billamt;
                ?>
            </h4>
            <?php
            $con=mysqli_connect('localhost','root','','demo1'); 
$query="truncate table buyedproducts"; 
mysqli_query($con,$query); 
            ?>

      
        <center>
        <tr>
    <td>
      <button class="button button1"><a href="billingsection.php"><b>PREVIOUS</b></a></button>
    </td>
  </tr>
  <tr>
    <td>
      <button class="button button2"><a href="dashboard.html"><b>NEXT</b></a></button>
    </td>
  </tr>
  <tr>
    <td>
      <button class="button button3"><a href="log.html"><b>GO TO LOGIN </b></a></button>
    </td>
  </tr>
    </center>
        </div>
    </div>
    
   
</body>