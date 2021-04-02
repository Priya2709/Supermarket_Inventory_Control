<?php 
$con=mysqli_connect('localhost','root','','demo1'); 
$query="select * from addproduct1"; 
$result=mysqli_query($con,$query); 
$count=0;
if(mysqli_num_rows($result)>0)
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			$count++;
		}
	}
?>


<!DOCTYPE html> 
<html> 
	<head> 
		<title> LIST OF PRODUCTS </title>
		
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
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="4"><h2>LIST OF PRODUCTS</h2>
	<h4>Available : <b><?php echo $count;?></b></h5></th> 
	
		</tr> 
			  
			  <th> PRODUCTNAME</th> 
			  <th> QUANTITY </th> 
			  <th> PRICE </th> 
			  
		</tr> 
		
		<?php
		 $query="select * from addproduct1";       
$result=mysqli_query($con,$query);                             
 while($rows=mysqli_fetch_assoc($result)) 
      { 
      ?> 
		<tr> 
		<td><?php echo $rows['productname']; ?></td> 
		<td><?php echo $rows['quantity']; ?></td> 
		<td><?php echo $rows['price']; ?></td> 
		</tr> 
	<?php 
               } 
          ?> 

	</table> 
	</body> 
	</html>