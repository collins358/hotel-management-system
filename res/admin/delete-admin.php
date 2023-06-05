

<?php
 include('../config/dbconnect.php'); 
 $id=$_GET['id'];

 $sql="DELETE FROM admintbl WHERE id=$id";
 $result=mysqli_query($con,$sql);
if($result==true)
{	
    
	$_SESSION['delete']="<div class='success'>Admin Deleted Successfully</div>";
	header("location:".SITEURL.'admin/manage_admin.php');
}


else
{
$_SESSION['delete']="<div class='error'>Error in Deletion</div>";
	header("location:".SITEURL.'admin/delete_admin.php');
}

?>