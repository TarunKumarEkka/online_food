 <?php
 session_start();
 $con=mysqli_connect('localhost','root','','online_food');
mysqli_select_db($con,'online_food');
$sql = "SELECT * FROM menu ORDER BY price";
$w="select * from customer where username='".($_SESSION["user"])."' and password='".($_SESSION["key"])."'";
$re = $con->query($w);
if ($re->num_rows > 0)
    while($row = $re->fetch_assoc()) 
	{
?>
	<?php $df=$row['customer_id'];?>
  <?php
}
?>
<?php
$result1 = $con->query($sql);
$se="SELECT * FROM cart WHERE card_id='$df';";
$result2=$con->query($se);
 ?><!doctype html>
<html>
<head>
	<title>online food order</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet"href="food.css">
</head>
<body>
<section>
  <div class="cbar">
  <ul>
  <li><a class="ac" href="index.php">Category</a></li>
  <li><a href="#news">Breakfast</a></li>
  <li><a href="#contact">BBQ</a></li>
  <li><a href="#about">Chinese</a></li>
  <li><a href="#news">south Indian</a></li>
  <li><a href="#contact">Street Food</a></li>
  <li><a href="#about">Beverages</a></li>
  <li><a href="#about">Continental</a></li>
  <li><a href="#about">Biryani</a></li>
  <li><a href="#about">Dessert</a></li>
</ul>
</div>
</section><div style="display:block;width:80%;margin-left:15%;"class="he">
  <a href="#default" class="lo">Food online</a>
  <div class="he-rig">
    <li><a class="ac" href="#home">Home</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#about">About</a></li>
<?php
if(isset($_SESSION["user"]))
{
	echo'<li><a class="acd">'.$_SESSION["user"].'</a>
    	<ul><li><a href="#">Profile</a></li><li><a href="logout.php?logout">Logout</a></li></li></ul>';
}
else
{
	 header("location:food login.php?Invalid=First login");}
?>
    
</div>
</div>
<div style="display:block;width:80%;margin-left:18%;margin-top:3%;background:blue"><h2 style="text-align:center"> <span class="well"style="display:block width:50%">cart</span></h2><a style="margin-left:90%"> <span   data-toggle="collapse" data-target="#demo"class=" btn btn-default glyphicon glyphicon-triangle-bottom"></span></h2></a></div>
<div style="display:block;width:80%;margin-left:18%;" id="demo"class="table-responsive-md containers collapse">
<table id="as">
	<div ><tr><th ><a>Date</a></th><th><a>Dishes:</a></th><th ><a>prices</a></th><th ><a>quantity</a></th><th>Amount</th><th>X</th></tr></div>
	<?php $am=0; if ($result2->num_rows > 0)
    while($row2 = $result2->fetch_assoc()) 
	{
?>
	<?php $am=$am+$row2['quantity']*$row2['amount'];echo "<div ><tr><td><a>".$row2['Date']."</a></td><td><a>".$row2['item_name']."</a></td><td><a>".$row2['amount']." RS</a></td><td><a><form method='post'action='addcart.php'>
  <input type='number' name='quantity' min='1' max='5' value='".$row2['quantity']."'><input type='hidden'name='item'value='".$row2['item_name']."'/><input type='submit'name='button1'id='button'value='y'/>
</form></a></td><td><a>".$row2['quantity']*$row2['amount']." RS</a></td><td>";?><form method="post"action="addcart.php">
	                                                                                                  <input type="hidden"name="item"value="<?php echo$row2['item_name'];?>"/>
																									  <input type="submit"name="butt"value="X"/></form></td></tr></div>
  <?php
}
	?>


</table>
<div id="rt"><a id="ap"> checkout <?php echo 'Grand amount '.$am.'';?></a></div>
</div>
</div>
<div style="display:block;width:80%;margin-left:18%;margin-top:9%;background:blue"><h2 style="text-align:center"> <span class="well"style="display:block width:50%">Menu</span></h2><a style="margin-left:90%"> <span   data-toggle="collapse" data-target="#demo"class=" btn btn-default glyphicon glyphicon-triangle-bottom"></span></h2></a></div>
<div style="display:block;width:80%;margin-left:18%;" id="demo"class="table-responsive-md containers collapse">
<table id="as">
	<div ><tr><th><a>Dishes:</a></th><th ><a>prices</a></th><th></th></tr></div>

<?php if ($result1->num_rows > 0)
    while($row1 = $result1->fetch_assoc()) 
	{
?>
	<?php echo "<div ><tr><td><a>".$row1['item']."</a></td><td><a>".$row1['price']." RS</a></td><td>";?><form id="form1"name="form1"method="post"action="addcart.php">
	                                                                                                  <input type="hidden"name="pid"id="pid"value="<?php echo$row1['ID'];?>"/>
																									  <input type="submit"name="button"id="button"value="add"/></form></td></tr></div>
  <?php
}
	?>
</table>
</div>
</div>

</body>
</html>