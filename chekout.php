<?php 
session_start();
$con=mysqli_connect('localhost','root','','online_food');
mysqli_select_db($con,'online_food');
if(isset($_POST["button"]))
{
$w="select * from customer where username='".($_SESSION["user"])."' and password='".($_SESSION["key"])."'";
$re = $con->query($w);
$a=$_POST['pid'];
$q="SELECT item,price FROM menu WHERE ID=$a";
$result = $con->query($q);
date_default_timezone_set("Asia/Calcutta");
$current_date = date("Y-m-d H:i:s");
if ($re->num_rows > 0)
    while($row = $re->fetch_assoc()) 
	{
?>
	<?php $df=$row['customer_id'];?>
  <?php
}
?>
<?php
if ($result->num_rows > 0)
    while($row = $result->fetch_assoc()) 
	{
?>
	<?php $itm=$row['item'];
	$pri=$row['price'];
	$sw="insert into cart(Date,card_id,item_name,quantity,amount,item_id)values('$current_date','$df','$itm',1,'$pri','$a')";
	$con->query($sw);?>
  <?php
}
}
?>
<?php
<?php
header("location:cart.php");
?>
