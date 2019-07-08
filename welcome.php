<?php
session_start();
if(isset($_SESSION["user"])){
}
else
{
	header("location:food login.php");
}
?>
<?php
$con=mysqli_connect('localhost','root','','online_food');
if(!$con)
{
	die('please check your connection'.mysqli_error($con));
}
$sql = "SELECT * FROM menu ORDER BY price";
$result = $con->query($sql);

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
</head>
<body>
<section>
  <div class="cbar">
  <ul>
  <li><a class="ac" href="#home">Category</a></li>
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

<div style="display:block;width:80%;margin-left:15%;" class="hline"><a>Order_Online<span class="glyphicon glyphicon-shopping-cart"></span></a></div>
<div class="container"style="margin-left:18%;height:600px">
  <h2>Restaurant</h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <div style="width:100%;height:600px"><img src="galleryphoto/photo/1.jpg" alt="Los Angeles" style="width:100%;"></div>
        <div class="carousel-caption">
          <h3>NEW Way</h3>
          <p>New way to adapt</p>
        </div>
      </div>

      <div class="item">
        <div style="width:100%;height:600px"><img src="galleryphoto/photo/2.jpg" alt="Chicago" style="width:100%;"></div>
        <div class="carousel-caption">
          <h3>NEW Way</h3>
          <p>New way to adapt</p>
        </div>
      </div>
    
      <div class="item">
        <div style="width:100%;height:600px"><img src="galleryphoto/photo/3.jpg" alt="New york" style="width:100%;"></div>
        <div class="carousel-caption">
          <h3>NEW Way</h3>
          <p>New way to adapt</p>
        </div>
      </div>
      <div class="item">
        <div style="width:100%;height:600px"><img src="galleryphoto/photo/4.jpg" alt="New york" style="width:100%;"></div>
        <div class="carousel-caption">
          <h3>NEW Way</h3>
          <p>New way to adapt</p>
        </div>
      </div>
      <div class="item">
        <div style="width:100%;height:600px"><img src="galleryphoto/photo/5.jpg" alt="New york" style="width:100%;"></div>
        <div class="carousel-caption">
          <h3>NEW Way</h3>
          <p>New way to adapt</p>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div style="display:block;width:80%;margin-left:18%;margin-top:9%;background:blue"><h2 style="text-align:center"> <span class="well"style="display:block width:50%">Menu</span></h2><a style="margin-left:90%"> <span   data-toggle="collapse" data-target="#demo"class=" btn btn-default glyphicon glyphicon-triangle-bottom"></span></h2></a></div>
<div style="width:80%;margin-left:18%;" id="demo"class="table-responsive-md containers collapse">
<table id="as">
	<div ><tr><th><a>Dishes:</a></th><th ><a>prices</a></th><th></th></tr></div>

<?php if ($result->num_rows > 0)
    while($row1 = $result->fetch_assoc()) 
	{
?>
	<?php echo "<div ><tr><td><a>".$row1['item']."</a></td><td><a>".$row1['price']." RS</a></td><td>";?><form id="form1"name="form1"method="post"action="addcart.php">
	                                                                                                  <input type="hidden"name="pid"id="pid"value="<?php echo$row1['ID'];?>"/>
																									  <input type="submit"name="button"id="button"value="add"/></form></td></tr></div>
  <?php
}
	?>
</table>
<div id="rt"><a id="ap">checkout (Go to cart)</a></div>
</div>
</div>
</body>
</html>