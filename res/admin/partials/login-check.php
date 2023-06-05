<?php
//check if user is loeg in or nor
 
if(!isset($_SESSION['user']))//if login is not set redirect to login
{
$_SESSION['nologin']="<div class='error'>Please login to Admin Panel.</div>";
header("location:".SITEURL.'admin/login.php');

}



?>
