<?php
$con=mysqli_connect('localhost','root','','online_food');
$a=$_POST['item'];
$b=$_POST['price'];
if(!$con)
{
	die('please check your connection'.mysqli_error($con));
}
$q = "insert into menu(menu_id,item,price) values( 1,'$a','$b')" ;
$i=mysqli_query($con,$q);

mysqli_close($con);
if($i==1)
{
	header("location:testt.php");
}
 ?>
