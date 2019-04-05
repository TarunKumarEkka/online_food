<?php
$a=$_POST['name'];
$b=$_POST['email'];
$c=$_POST['mobileno'];
$d=$_POST['username'];
$e=$_POST['password'];
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'online_food');
$q="insert into customer(customer_name,email,mobileno,username,password) values( '$a','$b','$c','$d','$e')";
$i=mysqli_query($con,$q);

mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<title>obito</title>

</head>
<body>

<p style="font-size:200% ;background-color:lightblue"> Hello <b><?php echo"$a"?></b>  <?php echo"$b"?><sup>th </sup>your mobileno <?php echo"$c"?>
<h3 ><a href="food login.php" style="text-align:center;">click here</a></h3>
</pre>
</body>
</html>
