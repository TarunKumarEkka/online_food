<?php 
session_start();
$con=mysqli_connect('localhost','root','','online_food');
$con=mysqli_connect('localhost','root','','online_food');
if(!$con)
{
	die('please check your connection'.mysqli_error($con));
}
if($payment_type == 'Wallet')
						{$total=$_SESSION["amount"];
						$ser="SELECT * from wallet_details where wallet_id='".($_SESSION["c_id"])."'";
						$result4=mysqli_query($con,$ser);
?>
				<?php
					if ($result4->num_rows > 0)
						{
					while($row4= $result4->fetch_assoc()) 
					{
?>
					<?php $balance=$row['balance'];?>
					<?php
}
?>
<?php
 
							$balance = $balance - $total;
							$sq = "UPDATE wallet_details SET balance = $balance WHERE wallet_id = $wallet_id;";
							$con->query($sq) === TRUE;
}
?>