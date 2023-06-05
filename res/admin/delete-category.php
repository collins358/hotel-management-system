<?php include('../config/dbconnect.php'); ?>
<?php
//check whether id is set
if(isset($_GET['id']) AND  isset($_GET['imagename']))
{
$id=$_GET['id'];
$imagename=$_GET['imagename'];
//remove the file from image file
if($imagename!="")
{
$path="../images/category/".$imagename;
$remove=unlink($path);
//if failed to remove eoor message and stop process
if($remove==false)
{
	$_SESSION['delete']="<div class='success'>Category Failed to Remove Image</div>";
	header("location:".SITEURL.'admin/manage_category.php');
die();
}
}
 $sql="DELETE FROM categorytbl WHERE id=$id";
 $result=mysqli_query($con,$sql);
if($result==true)
{	
    
	$_SESSION['delete']="<div class='success'>Category Deleted Successfully</div>";
	header("location:".SITEURL.'admin/manage_category.php');
}
}
else
{
	//redirect to manage page
$_SESSION['notf']="<div class='error'>Not Set To Delete:</div>";
	header('location:'.SITEURL.'admin/manage_category.php');
}

?>