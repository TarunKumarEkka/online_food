<?php
$a=$_POST['startup_name'];
$b=$_POST['owner_name'];
$c=$_POST['email'];
$d=$_POST['mobileno'];
$e=$_POST['area'];
$f=$_POST['sex'];
$g=$_POST['description'];
$h=$_POST['username'];
$i=$_POST['password'];
$j=$_POST['DIPP'];
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'startup1');
$q="insert into user(startup_name,owner_name,email,contact,description,sex,username,password,DIPP) values( '$a','$b','$c','$d','$g','$f','$h','$i','$j')";
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

</pre>
</body>
</html>
