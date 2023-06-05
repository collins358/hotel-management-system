<?php
 include('../config/dbconnect.php'); 
 $id=$_GET['id'];
 $sql="DELETE FROM ordertbl WHERE id=$id";
 $result=mysqli_query($con,$sql);
if($result==true)
{       
    $_SESSION['delete']="<div class='error'>order Deleted Successfully</div>";
    header("location:".SITEURL.'admin/manage_order.php');
}
else
{
$_SESSION['delete']="<div class='error'>Error in Deletion</div>";
    header("location:".SITEURL.'admin/manage_order.php');
}
?>