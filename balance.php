<?php
include'connect.php';
session_start();
if(isset($_POST["balance"]))
{
	$total=$_SESSION["amount"];
						$ser="SELECT * from wallet_details where wallet_id='".($_SESSION["c_id"])."'";
						$result4=mysqli_query($con,$ser);

					if ($result4->num_rows > 0)
						{
					while($row4= $result4->fetch_assoc()) 
					{
?>
					<?php $balance=$row4['balance'];?>
					<?php
                 }
?>
<?php
 
							$balance = $balance - $total;
							$sq = "UPDATE wallet_details SET balance = $balance WHERE wallet_id = '".($_SESSION["c_id"])."';";
							$con->query($sq) === TRUE;
							 header("location:order_placed.php");
               }
}
else
{
	 header("location:cart.php?Invalid=something went wrong");
}
?>