<?php
session_start();
?><!DOCTYPE HTML>

<html>
	<head>
		<title>TEST</title>
		<meta charset="utf-8" />
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet"href="photo.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
	<body>
<div style="display:block;background:blue"><h2 style="text-align:center"> <span class="well"style="display:block width:50%">Gallery</span></h2><a style="margin-left:90%"> <span   data-toggle="collapse" data-target="#demo"class=" btn btn-default glyphicon glyphicon-triangle-bottom"></span></h2></a></div>
<div id="demo"class=" containers collapse">
<ul>
	<?php
	include_once 'galleryphoto/dbh.inc.php';
	$sql="SELECT * FROM gallery ORDER BY ordergallery DESC;";
	$stmt=mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		echo"Sql statement failed";
	}
	else
	{
		mysqli_stmt_execute($stmt);
		$result=mysqli_stmt_get_result($stmt);
		while ($row=mysqli_fetch_assoc($result)) {
			 echo'<li><div >
   <img id="img01"alt= "ds"src="galleryphoto/photo/'.$row["imgfullname"].'"class="img-responsive img-thumbnail">
<div><h4 style="color:blue;text-align:center;text-decoration:underline;"><b>'.$row["titlegallery"].'</b></h4><p class="ts">'.$row["descgallery"].'</p><br></div></div></li>';
		}
	}
 ?>
  </ul>
</div>
</div>
<?php
if(isset($_SESSION['user'])){
echo'<div class="gallery-uploads">
    <div><h3>Upload Images</h3></div>
	<form action="galleryphoto/gallery.inc.php"method="post"enctype="multipart/form-data">
		<input type="text"name="filename"placeholder="file_name....">
		<input type="text"name="filetitle"placeholder="image_title....">
		<input type="text"name="filedesc"placeholder="image_description....">
		<input type="file"name="file">
		<button type="submit"name="submit">Upload</button>
</form>
</div>';echo"".$_SESSION["user"]."";}
?>
</body>
</html>
