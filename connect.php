<?php
$con=mysqli_connect('localhost','root','','online_food');
mysqli_select_db($con,'online_food');
if(!$con)
{
	die('please check your connection'.mysqli_error($con));
}

?>