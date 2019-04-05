<?php 
if(isset($_POST['submit']))
{
	$newfilename=$_POST['filename'];
	if(empty($newfilename))
	{
		$newfilename="gallery";
	}
	else
	{
		$newfilename=strtolower(str_replace(" ","-",$newfilename));
	}
	$imagetitle=$_POST['filetitle'];
	$imagedesc=$_POST['filedesc'];

	$file=$_FILES['file'];
	$filename=$file["name"];
	$filenType=$file["type"];
	$fileTempName=$file["tmp_name"];
	$fileError=$file["error"];
	$fileSize=$file["size"];
	$fileExt=explode(".",$filename);
	$fileactualext=strtolower(end($fileExt));
	$allowed=array("jpg","jpeg","png");
	if(in_array($fileactualext,$allowed))
	{
		if($fileError===0)
		{
           if($fileSize<2000000)
           {
              $imageFullName=$newfilename.".".uniqid("",true).".".$fileactualext;
              $destination= "photo/". $imageFullName;
              include_once"dbh.inc.php"; 
              if(empty($imagetitle)||empty($imagedesc))
              {
              	header("location:../photo.inc.php?upload=empty");
              	exit();
              }
              else
              {
              	$sql="SELECT * FROM gallery;";
              	$stmt=mysqli_stmt_init($con);
              	if(!mysqli_stmt_prepare($stmt,$sql))
              	{
              		echo"SQL ATATEMENT FAILED!";
              	}
              	else
              	{
              		mysqli_stmt_execute($stmt);
              		$result=mysqli_stmt_get_result($stmt);
              		$rowcount=mysqli_num_rows($result); 
              		$setorder=$rowcount+1;
              		$sql="INSERT INTO gallery(titlegallery,descgallery,imgfullname,ordergallery)values(?,?,?,?);"; 
              		if(!mysqli_stmt_prepare($stmt,$sql))
              	      {
              		echo"SQL ATATEMENT FAILED!";
              	      }  
              	    else
              	    {
              		mysqli_stmt_bind_param($stmt,"ssss",$imagetitle,
	$imagedesc,$imageFullName,$setorder);
              		mysqli_stmt_execute($stmt); 
              		move_uploaded_file($fileTempName,$destination);
              		header("location:../photo.inc.php?upload=success");
              		} 
                }
              } 
              }
           }
           else
           {
           	echo"file size exceed";
           	exit();
           }
		}
		else
		{
			echo"you had an error";
			exit();
		}

	}
	else
	{
		echo"you need to upload a proper file type";
		exit();
	}
?>