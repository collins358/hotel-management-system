<?php include('partials/menu.php'); ?>

<div class="maincontent">
	<div class="wrapper">
		<h1>Add Category</h1>
		<br><br>
		<?php
		if(isset($_SESSION['error']))
        {
            echo $_SESSION['error'] ;
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'] ;
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'] ;
            unset($_SESSION['upload']);
        }


        ?>
        <br><br>
		<a href="#" class="btn-primary">Add Category</a>
		<br><br>
		<form action="" method="post" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title:</td>
					<td><input type="text" name="title"  placeholder="Category Title"></td>
				</tr>
				<tr>
					<td>Select Image:</td>
					<td><input type="file" name="image" placeholder="Choose Image"></td>
				</tr>
				<tr>
					<tr>
						<td>Featured:</td>
						<td><input type="radio" name="featured"  value="yes">Yes
						<input type="radio" name="featured"  value="no">No
					</td>
					</tr>
					<tr>
						<td>Active:</td>
					<td><input type="radio" name="active" value="yes">Yes
						<input type="radio" name="active" value="no">No
					</td>
					</tr>
					<tr>
						<td colspan="4">
							<input type="submit" name="submit" value="Add Category" class="btn-secondary">
							
						</td>
					</tr>

				
			</table>
		</form>
<?php
if (isset($_POST['submit'])) {
	$title=$_POST['title'];
	if(isset($_POST['featured']))
	{
$featured=$_POST['featured'];
	}
	else
	{
$featured="no";
	}
if(isset($_POST['active']))
	{
$active=$_POST['active'];
	}
	else
	{
$active="no";
	}
	//check image is set
	if(isset($_FILES['image']['name']))
{
	//upload here

	$imagename=$_FILES['image']['name'];
	if($imagename !="")
	{
	//get extensuion for jpg,gif,jpeg
	$ext = end(explode('.',$imagename ));
	$imagename="food_category".rand(000,999).'.'.$ext;
	$sourcepath=$_FILES['image']['tmp_name'];

	$destinationpath="../images/category/".$imagename;
	$upload=move_uploaded_file($sourcepath, $destinationpath);
	//check if uploaded if not redirecxt with error msg
if($upload==false)
{
	$_SESSION['upload']="<div class='error'>Failed to save image</div>";
	header("location:".SITEURL.'admin/add-category.php');
	die();
}
}
}
else
{
	//blank
	$imagename="";
}
	//(insert)
	$sql="INSERT INTO categorytbl set
	title='$title',
	imagename='$imagename',
	featured='$featured',
	active='$active'
	";
	//execute
	$result=mysqli_query($con,$sql);
//check query executed
	if($result==true)
	{
$_SESSION['add']="<div class='success'>Category Added Successfully</div>";
header('location:'.SITEURL.'admin/manage_category.php');
	}
	else
	{
$_SESSION['error']="<div class='error'>Category Failed</div>";
header('location:'.SITEURL.'admin/add-category.php');
	}


  }  



?>


	</div>
</div>


<?php include('partials/footer.php'); ?>

