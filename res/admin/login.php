<?php include('../config/dbconnect.php') ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN LOGIN</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body background="cc.png">
<div class="login">
	<h1 style="background-color:#eb3b5a;">Admin Login</h1><br><br>
	<?php 
	if(isset($_SESSION['error']))
        {
            echo $_SESSION['error'] ;
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['nologin']))
        {
            echo $_SESSION['nologin'] ;
            unset($_SESSION['nologin']);
        }
       
        ?>
	<br><br>
	<!--login form starts here-->
	<form action="" method="post">
	Username:
	<input type="text" name="username" required placeholder="Enter Username">
	<br><br>
	Password:
	<input type="password" name="password" required placeholder="Enter Username"><br><br>
	<input type="submit" name="submit" value="Login" class="btn-primary">

	</form>
	<br>
	<p style="background-color: #8854d0; text-decoration: none;text-decoration-line: none;"><a href="../index.php">Back to Home</a></p>
<br><br><br><br>
	<p style="background-color: #eb3b5a;">Created By-<a href="https://www.facebook.com/collins.musembi.73/">Collins Musembi</p>
</div>
</body>
</html>

<?php 
if (isset($_POST['submit'])) {
	//get data from form
	//$username=$_POST['username'];
	$username= mysqli_real_escape_string($con, $_POST['username']);
	$password= mysqli_real_escape_string($con, $_POST['password']);
//sqlto check the user with username $ password exist
	$sql="SELECT * from admintbl where username='$username' and password='$password'";
//execute
	$result=mysqli_query($con,$sql);
	//count rows to check whether user exists

$count=mysqli_num_rows($result);
if($count==1)
{
//user available and login success
	$_SESSION['login']="<div class='success'>Login Successful!</div> ";
	header("location:".SITEURL.'admin/index.php');
	$_SESSION['user']=$username;//to check if user is login or not and log out will unset
}
else
{
//user not available	
	$_SESSION['error']="<div class='error'> Login Failed  password or Username</div>";
	header("location:".SITEURL.'admin/login.php');
}

}
?>