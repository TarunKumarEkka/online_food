<?php
$a=$_POST['name'];
$b=$_POST['email'];
$c=$_POST['mobileno'];
$d=$_POST['username'];
$e=$_POST['password'];
$f=$_POST['sex'];
$g=$_POST['Location'];
$h=$_POST['Restaurant'];
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'online_food');
$q="insert into owner(Reataurant_Name,Owner_name,Location,email,sex,username,password,mobileno) values( '$h','$a','$g','$b','$f','$d','$e','$c')";
$i=mysqli_query($con,$q);

mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<title>obito</title>

</head>
<body>

<p style="font-size:200% ;background-color:lightblue"> Hello <b><?php echo"$a"?></b>  <?php echo"$b"?><sup>th <?php echo"$i"?> </sup>your mobileno <?php echo"$c"?>
<h3 ><a href="food login.php" style="text-align:center;">click here</a></h3>
</pre>
</body>
</html>
