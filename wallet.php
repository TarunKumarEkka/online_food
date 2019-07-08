<?php
include'connect.php';
session_start();
if(isset($_POST["wallet"]))
{
	if(empty($_POST["number"])||empty($_POST["cvv"]))
	{
		header("location:checkout.php?Empty=Please fill the box");
	}
	else
	{
	$q="select * from wallet_details where number='".($_POST["number"])."' and cvv='".($_POST["cvv"])."'";
	$result=mysqli_query($con,$q);
	$_SESSION["address"]=$_POST["address"];
	     if(mysqli_fetch_assoc($result))
	    { 
				$address = htmlspecialchars($_POST['address']);
				$total=$_SESSION["amount"];
				$customer=$_SESSION["c_id"];
				date_default_timezone_set("Asia/Calcutta");
$current_date = date("Y-m-d H:i:s");
				$_SESSION["payment_type"]= htmlspecialchars($_POST['payment']);
				$sql = "INSERT INTO orders (customer_id, payment_type, address,date,deleted,total) VALUES ('$customer', '$payment_type', '$address','$current_date','0', '$total')";
					$sree=mysqli_query($con,$sql);
					$order_id = $con->insert_id;
 			      $rl = "SELECT * FROM cart";

mysqli_select_db($con,'online_food');
$datas=array();
					$result = $con->query($rl);
				if(mysqli_num_rows($result)>0)
					{
					while($row2 = mysqli_fetch_array($result))
					{
						$datas[]=$row2;
					}
              				 
					}
					foreach($datas as $data)
						{
						$value = $data['quantity'];
						$price = $data['amount'];
						$key = $data['item_id'];
							$s="INSERT INTO order_details (order_id, item_id, quantity, prize) VALUES ('$order_id','$key', '$value', '$price')";
						$result3=mysqli_query($con,$s);
						$s1="DELETE FROM cart WHERE item_id='".($data["item_id"])."'";
							$result4=mysqli_query($con,$s1);
						}
						
	            header("location:confirm.php");
	        }
	    }
}
		 else
		 {
			 header("location:checkout.php?Invalid= invalid number or cvv");
		 }