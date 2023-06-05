<?php include('partials/menu.php'); ?>
<div class="maincontent">
	<div class="wrapper">
		<h1 style="background-color: violet;">Add Admin</h1>
		<br><br>
		<?php 
if(isset($_SESSION['add']))
{
	echo $_SESSION['add'];
	unset($_SESSION['add']);
}
	?>

<form action="" method="post">
	<table class="tbl-30">
		<div class="siz">
		<tr>
			<td>Full Name:</td>
			<td><input type="text" name="fname" required placeholder="Enter your Name "></td>
	</tr>
	<tr>
			<td>Username:</td>
			<td><input type="text" name="username" required placeholder="Your username "></td>
	</tr>
	<tr>
			<td>Password:</td>
			<td><input type="password" name="password" required placeholder="Your Password "></td>
	</tr>
<tr>
	<td colspan="2">
		<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
	</td>
</tr>
</div>
	</table>
</form>



	</div>
</div>



<?php
//check if button is working
if(isset($_POST['submit']))
{
	//get data from the form
    $fname=$_POST['fname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    //save data in database   
    $query="INSERT INTO admintbl(fname,username,password) VALUES('$fname','$username','$password')";
	$result=mysqli_query($con,$query) or die(mysqli_error());
if ($result==true) {
	$_SESSION['add']="<div class='success'>Admin Added Successfully!</div>";
	header("location:".SITEURL.'admin/manage_admin.php');
}
else{
	$_SESSION['add']="Failed to Add ";
	header("location:".SITEURL.'admin/add_admin.php');
}
}

?>
<?php include('partials/footer.php'); ?>
