<?php
session_start();
if(isset($_SESSION["user"])){
}
else
{
	header("location:food login.php");
}
$_SESSION["amount"]=$_POST["amount"];

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
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

.rwty {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

.clli2 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.clli5 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.clli7 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.clli2,
.clli5,
.clli7 {
  padding: 0 16px;
}

.kner {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text],input[type=number] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-kner {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .rwty {
    flex-direction: column-reverse;
  }
  .clli2 {
    margin-bottom: 20px;
  }
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
    <li><a class="ac" href="welcome.php">Home</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#about">About</a></li>
    <li><a class="acd"><?php echo $_SESSION["user"]?></a>
    	<ul><li><a href="profile.php">Orders</a></li><li><a href="logout.php?logout">Logout</a></li></li></ul>
</div>
</div>
<div class="rwty" style="width:35%;margin-left:35%;margin-right:25%;margin-top:3%;">
  <div class="clli7">
    <div class="kner">
      <form action="wallet.php"method="post">
          <div class="clli5">
            <button ><h3>Payment</h3></button>
            <label for="fname">Accepted Cards</label>
            <div class="icon-kner">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
			
            <label for="cname">Address</label>
			 <input type="hidden" name="payment"value="wallet">
            <input type="text" id="cname"required name="address" placeholder="Address">
            <label for="ccnum">Credit card number</label>
            <input type="number" id="ccnum"required name="number"min="11111111111111" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="number" id="expmonth"required name="expmonth"min="1"max="12" placeholder="September">
            <div class="rwty">
              <div class="clli5">
                <label for="expyear">Exp Year</label>
                <input type="number" required id="expyear" name="expyear"min="2018"max="9999" placeholder="2018">
              </div>
              <div class="clli5">
                <label for="cvv">CVV</label>
                <input type="number" required id="cvv" name="cvv" min="100"max="999"   placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <button type="submit" name="wallet"id="bb" class="btn"><?php echo $_SESSION["amount"];?>  Continue to checkout</button>
      </form>
    </div>
  </div>
<script>

</script>
</body>
</html>