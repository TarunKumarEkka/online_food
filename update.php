<?php
require_once("connect.php");
session_start();
if(isset($_POST["but"]))
{
	
	
	$q="UPDATE menu SET`price`='".($_POST["np"])."' WHERE ID='".($_POST["pid"])."'";
	$result=mysqli_query($con,$q);
	        header("location:admin.php");
		 
	
}