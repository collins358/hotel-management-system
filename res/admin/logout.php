<?php include('../config/dbconnect.php'); ?>

<?php
session_destroy();//unset $-session[user]
header("location:".SITEURL.'admin/login.php')

?>