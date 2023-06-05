<?php include('partials/menu.php'); ?>
<div class="maincontent">
	<div class="wrapper">
		<h1 style="background-color:#d35400;">Change Password</h1>
		<br><br>
<?php  
if (isset($_GET['id'])) {
  $id=$_GET['id'];
}

?>

<form action="" method="post">
	<table class="tbl-30">
	
		<tr>
			<td>New Password</td>
			<td><input type="password" name="newpass" required placeholder="	New Password"></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" name="confirmpass" required placeholder="	Confirm Password"></td>
		</tr>
		<tr>
	<td colspan="4">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="submit" name="submit" value="Change Password" class="btn-secondary">
	</td>
</tr>
	</table>
</form>
	</div>
</div>
<?php 
if(isset($_POST['submit']))
{
//get dat from form
	$id=$_POST['id'];
	$newpass=$_POST['newpass'];
	$confirmpass=$_POST['confirmpass'];

	
	

//check user with current id and current password exists
	$sql="SELECT *FROM admintbl WHERE id=$id";
	$result=mysqli_query($con,$sql);
	if($result==true)
	{
		$count=mysqli_num_rows($result);
		if($count==1)
		{
			//user exists and password can be changed
			if($newpass==$confirmpass)
			{
				$sql2="UPDATE admintbl set
				password='$newpass'
				WHERE id=$id
				";
				$result=mysqli_query($con,$sql2);
				if($result==true)
				{
	        $_SESSION['notfound']="<div class='success'>Password Updated Successfully</div>";
			header("location:".SITEURL.'admin/manage_admin.php');
				}
				else
				{
			$_SESSION['notfound']="<div class='error'>Cant Update Password </div>";
			header("location:".SITEURL.'admin/manage_admin.php');
				}

			}
			else
			{
			$_SESSION['notfound']="<div class='error'>Password mismatch</div>";
			header("location:".SITEURL.'admin/manage_admin.php');
			}

		}
		else
		{
			//user doesnt exist and password cant be changed
			$_SESSION['notfound']="<div class='error'>User Not Found</div>";
			header("location:".SITEURL.'admin/manage_admin.php');
		}
	}
//check if new and confirm match
//change password if all above id true


}
?>


<?php include('partials/footer.php'); ?>