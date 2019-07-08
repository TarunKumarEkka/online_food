<?php
session_start();
include 'connect.php';
?>
<html>
<head>
	<title>online food order</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet"href="food.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <li><a class="ac" href="welcome.php">Home</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#about">About</a></li>
    <li><a class="acd"><?php echo $_SESSION["user"]?></a>
    	<ul><li><a href="profile.php">Orders</a></li><li><a href="logout.php?logout">Logout</a></li></li></ul>
</div>
</div>
<div style="display:block;width:80%;margin-left:18%;margin-top:9%;background:blue"><h2 style="text-align:center"> <span class="well"style="display:block width:50%">Order History</span></h2><a style="margin-left:90%"> <span   data-toggle="collapse" data-target="#demo"class=" btn btn-default glyphicon glyphicon-triangle-bottom"></span></h2></a></div>
<div style="display:block;width:80%;margin-left:18%;" id="demo"class="table-responsive-md containers collapse">
<div class="container">

  <?php
	  $u="select * from orders where customer_id='".($_SESSION["c_id"])."'";
$i = $con->query($u);
if ($i->num_rows > 0)
    while($ro = $i->fetch_assoc()) 
	{
		?>
		<h2><a href="#" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-cutlery"></span>
        </a></h2>          
  <table class="table table-striped">
    <thead>
      <tr><th>Name:</th><th><?php echo $_SESSION['name'];?></th><th></th><th></th></tr>
		<?php $id=$ro['id'];
	$date=$ro['date'];
	$amount=$ro['total'];
	$payment=$ro['payment_type'];
	$address=$ro['address'];
$sno=1;
$ii="select * from order_details where order_id=$id";
$p = $con->query($ii);
?>
	  <tr><th>payment_type:</th><th><?php echo $payment;?></th><th></th><th></th></tr>
	  <tr><th>date:</th><th><?php echo $date;?></th><th></th><th></th></tr>
	  <tr><th>address:</th><th><?php echo $address;?></th></tr>
    </thead>
	<tbody>
	


	
	<?php
	while($ro1 = $p->fetch_assoc()) 
	{
?>
	<tr><td><?php echo $sno;?></td><?php $idd=$ro1['item_id']; $t="select * from menu where ID=$idd";
	$kl = $con->query($t);while($ro2 = $kl->fetch_assoc()){$item=$ro2['item'];}?><td><?php echo $item;?></td><td><?php echo $ro1['quantity']." qty";?></td><td><?php echo $ro1['prize'];?></td></tr>
  <?php $sno=$sno+1;
}
?>
<tr><td></td><td></td><td>Total :</td><td><?php echo $amount;?></td></tr>
  

    </tbody>
  </table>
  <?php $sno=1;} ?>
</div>
	
</div>
</div>

</body>
</html>
