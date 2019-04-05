<?php
$con=mysqli_connect('localhost','root','','online_food');
if(!$con)
{
	die('please check your connection'.mysqli_error($con));
}

?>