
<?php
session_start();
define('SITEURL', 'http://localhost/restaurant/res/'); 
 $con=mysqli_connect('localhost','root','','fooddb') or die(mysqli_error());//db connection
?>