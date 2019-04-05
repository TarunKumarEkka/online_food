<?php
$con=mysqli_connect('localhost','root','','online_food');
if(!$con)
{
	die('please check your connection'.mysqli_error($con));
}
$sql = "SELECT * FROM menu ORDER BY price";
$result = $con->query($sql);

 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>TEST</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="form.js"></script>
 <style type="text/css">
 	table tr td 
{   
background-image:url('tile.png');
}
 </style>
</head>
<body>
	<form action="jk.php"method="post">
		<table >
<div ><h3 ><a>add menu</a></h3>
		<div ><tr><td><a>Name:</a><a>    price:</a></td></tr><tr><td ><input type="text" name="item"placeholder="name"></td><td><input type="number" name="price"placeholder="$"></td></tr></div>
		<div ><tr><td><input type="submit"></td></tr></div>
	</table>
</form>
<table id="as">
	<div ><tr><th><a>Dishes:</a></th><th ><a>prices</a></th></tr></div>

<?php if ($result->num_rows > 0)
    while($row = $result->fetch_assoc()) 
	{
?>
	<?php echo "<div ><tr><td><a>".$row['item']."</a></td><td><a>".$row['price']."</a></td></tr></div>";?>
  <?php
}
	?>
</table>
</div>
</body>
</html>
