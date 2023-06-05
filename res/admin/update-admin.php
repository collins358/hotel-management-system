<?php include('partials/menu.php'); ?>

<div class="maincontent">
	<div class="wrapper">
		<h1>Update  Admin</h1>
		<br><br>
<?php
//get id of selectewd admin
$id=$_GET['id'];

//create sql query to get the details
$sql="SELECT * FROM admintbl WHERE id=$id";
$result=mysqli_query($con,$sql);
//check if query is executed
if($result==true)
{
	//check if dat is available or not
$count=mysqli_num_rows($result);
//check if we have admin data or not
if($count==1){
//get the details
$row=mysqli_fetch_assoc($result);
$fname=$row['fname']; 
$username=$row['username']; 


}
else
{
	header("location:".SITEURL.'admin/manage_admin.php');
}
}
?>



<form action="" method="post">
<table>
	<tr>
		<td>Full name</td>
		<td><input type="text" name="fname" value="<?php echo $fname;?>"></td>
	</tr>
	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value="<?php echo $username;?>"></td>
	</tr>
	

	<tr>
	<td colspan="3">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="submit" name="submit" value="Update Admin" class="btn-secondary">
	</td>
</tr>

</table>
		</form>
	</div>
</div>
<?php 
//check if the submit button is clicked or not
if (isset($_POST['submit'])) {
	 $id=$_POST['id'];
	$fname=$_POST['fname'];
    $username=$_POST['username'];
    //query to update admin
    $sql="UPDATE admintbl set 
    fname='$fname',
    username='$username' WHERE id='$id'
    ";
    //execute query
    $result=mysqli_query($con,$sql);
if($result==true)
{
$_SESSION['update']="<div class='success'>Admin Updated Successfully?</div>";
//redirect to admin page
header("location:".SITEURL.'admin/manage_admin.php');
}
else
{
$_SESSION['update']="<div class='error'>Admin not Updated Successfully?</div>";
//redirect to admin page
header("location:".SITEURL.'admin/manage_admin.php');
}

}


 ?> 

<?php include('partials/footer.php'); ?>
