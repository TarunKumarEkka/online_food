<?php
require_once("connect.php");
session_start();
if(isset($_POST["login"]))
{
	if(empty($_POST["username"])||empty($_POST["password"]))
	{
		header("location:food login.php?Empty=Please fill the box");
	}
	else
	{
	$q="select * from customer where username='".($_POST["username"])."' and password='".($_POST["password"])."'";
	$result=mysqli_query($con,$q);
	     if($row =mysqli_fetch_assoc($result))
	    {
	       $_SESSION["user"]=$_POST["username"];
		   $_SESSION["key"]=$_POST["password"];
    $_SESSION["c_id"]=$row["customer_id"];
	    $_SESSION["name"]=$row["customer_name"];
	
		  
	        header("location:welcome.php");
	     }
		 else
		 {
			 header("location:food login.php?Invalid= invalid username and password");
		 }
	
	}
	
}