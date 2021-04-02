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


<?php
if(isset($_POST["add"]))
{
	$prname=$_POST["prodname"];
	$entquan=$_POST["quan"];
	$q="select quantity,price,fixedproductquantity from addproduct1 where productname='{$prname}'";
  $result=mysqli_query($con,$q);

	if(mysqli_num_rows($result)>0)
	{
		while($rows=mysqli_fetch_assoc($result))
		{
    
      $dbquan=$rows["quantity"];
      
      $price=$rows["price"];
      $fixed=$rows["fixedproductquantity"];
		}
  }
  $check=$dbquan/$fixed;
  if($check<=0.25)
  {
    echo '<script>alert("STOCK IS LESS")</script>';
    
       $to='priyaproject27@gmail.com';
       $subject='STOCKSDETAILS.exe';
       $message=$prname.'  STOCK IS LESS....PLEASE ORDER IT. QUANTITY AVAILABLE  '.$dbquan;
       $headers='From:[priyadharshinipiri]@gmail.com'."\r\n";
                  'MIME-Version:1.0'."\r\n";
                  'Content-type:text/html;charset=utf-8';
                  if(mail($to,$subject,$message,$headers))
                  echo "Email sent";
                  else
                  echo "NOT SENT";
  }
  
	$upquan=$dbquan-$entquan;
	$quer="update addproduct1 set quantity={$upquan} where productname='{$prname}'";
	$res=mysqli_query($con,$quer);
	$qu="insert into buyedproducts (Productname,Quantity,price) values('{$prname}',{$entquan},{$price})";
	$r=mysqli_query($con,$qu);
	if($res==TRUE && $r==TRUE)
	{
    echo "Updated";
    
		header("refresh:0.2,url=billingsection.php");
	}
	else
	{
		echo "Not updated";
		header("refresh:0.2,url=billingsection.php");
	}
}
?>

<!DOCTYPE html> 
<html> 
	<head> 
		<title> LIST OF PRODUCTS </title>
		
		<style>
			
#prodname
{
	display:none;
}

	body{
    margin: 2;
    padding: 0;
    background-image: url(c1.jpg);
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
			  <th>Quantity buyed</th>
						<th>Add</th>
			  
		</tr> 
		
		<?php $query="select * from addproduct1"; 
$result=mysqli_query($con,$query); 
 while($rows=mysqli_fetch_assoc($result)) 
      { 
      ?> 
      <tr> 
      <td><?php 
	            $prod=$rows['productname'];
				echo $prod;
		?></td> 
      <td><?php echo $rows['quantity']; ?></td> 
      <td><?php echo $rows['price']; ?></td> 
	  <td><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  	  <input type="number" name="quan" >
	  <input type="text" id="prodname" name="prodname" value=<?php echo $prod;?>>
	  </td>
	  <td><input type="Submit" name="add" value="ADD">
	  </form></td>
      </tr> 
    <?php 
                 } 
            ?> 
                    <tr>
     
                </tbody>
			</table>
			
   
 
			<center><button class="button button4"><a href="bill.php"><input type="Submit" value="Bill"></a></button></center>
	</body> 
	</html>