<?php
session_start();
$con=mysqli_connect('localhost','root','','online_food');
if(!$con)
{
	die('please check your connection'.mysqli_error($con));
}

 ?>
 <!doctype html>
<html>
<head>
	<title>online food order</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet"href="food.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 600px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>
<section>
  <div class="cbar">
  <ul>
  <li><a class="ac" href="welcome.php">Category</a></li>
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
    <li><a class="ac" href="index.php">Home</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#about">About</a></li>
    <li><a >Login</a>
    	<ul><li><a href="food login.php">customer</a></li><li><a href="Ownerlogin.php">owner</a></li></li></ul>
</div>
</div>

<div style="display:block;width:80%;margin-left:15%;" class="hline"><a href="cart.php">Order_Online<span class="glyphicon glyphicon-shopping-cart"></span></a></div>
<div class="container"style="margin-left:18%;height:600px">
<h2 style="text-align:center">provide order details</h2>

<div class="card">
  <?php $q="select * from customer where customer_id='".($_SESSION["c_id"])."'";
	$result=mysqli_query($con,$q);
	     if($row =mysqli_fetch_assoc($result))
			echo "<h1>Name :<b>".$row['customer_name']."</b></h1><h1>contact no:<b>".$row['mobileno']."</b></h1>";
	    ?>
  <h2>Address : <b><?php echo $_SESSION["address"]?></b></h1>
  <h2>Total: <b><?php echo $_SESSION["amount"]?> RS</b></h2>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <form action="balance.php"method="post">
  <button type="submit" name="balance"id="bb" class="btn"><?php echo $_SESSION["amount"];?>  Continue to checkout</button>
      </form>
</div>

</body>
</html>
