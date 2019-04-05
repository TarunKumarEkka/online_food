<!doctype html>
<html>
<head>
<title>Log in</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="form.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <script src="form.js"></script>
</head>
<body>

  <div class="ds ">

<?php
  if((@$_GET["Empty"])==true)
{	
?>
<div class="well text-danger"><?php echo$_GET["Empty"]?></div>
<?php
}
?>
<?php
if((@$_GET["Invalid"])==true)
{	
?>
<div style="font-size:15px"class="text-danger well"><?php echo $_GET["Invalid"] ?></div>
<?php
}
?>
<div  id="fgf">
<form action="validate.php"method="post"onsubmit="validate()">
<table >
<div ><h3 ><a>USER Login</a></h3>
<div class="dff">
<div ><tr><td>Username:</td></tr><tr><td ><input placeholder="Useername"type="text" name="username"required></td></tr></div>
<div ><tr><td>Password:</td></tr><tr><td ><input placeholder="password"type="password" name="password"style="width:100%"required></td></tr></div>
<div ><tr><td><button type="submit" name="login">login</button></td></tr></div>
</table>
</tr></td>
</form>
</div>
<h3 ><p><a class="fs" href="val.html" style="text-align:center;">Not  a member sign up here</a></p></h3>
</div>
</body>
</html></body>
</html>