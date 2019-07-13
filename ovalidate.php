<?php
require_once("connect.php");
session_start();
if(isset($_POST["login"]))
{
	if(empty($_POST["username"])||empty($_POST["password"]))
	{
		header("location:Ownerlogin.php?Empty=Please fill the box");
	}
	else
	{
	$q="select * from owner where username='".($_POST["username"])."' and password='".($_POST["password"])."'";
	$result=mysqli_query($con,$q);
	     if(mysqli_fetch_assoc($result))
	    {
	       $_SESSION["owner"]=$_POST["username"];
	        header("location:admin.php");
	     }
		 else
		 {
			 header("location:Ownerlogin.php?Invalid= invalid username and password");
		 }
	
	}
	
}