<?php include('partials/menu.php'); ?>

<div class="maincontent">
	<div class="wrapper">
		<h1 style="background-color:#eb3b5a;">Update Food:</h1>
		<br><br>

		<?php 
		 if(isset($_SESSION['notup']))
        {
            echo $_SESSION['notup'] ;
            unset($_SESSION['notup']);
        }
		//check if id is set
		if(isset($_GET['id']))
		{
			//get id and other data
			$id=$_GET['id'];
			//sql query to gety details
			$sql="select * from foodtbl where id=$id";
			$result=mysqli_query($con,$sql);
			//count rows to check if id is valid
			$count=mysqli_num_rows($result);
			if ($count==1) {
				$row=mysqli_fetch_assoc($result);
				$title=$row['title'];
				$price=$row['price'];
				$current=$row['imagename'];
				$featured=$row['featured'];
				$active=$row['active'];

			}
			else
			{
				$_SESSION['add']="<div class='success'>Food Updated Failed</div>";
				header('location:'.SITEURL.'admin/manage_food.php');
			}
		}
		else
		{
			//redirect
			$_SESSION['add']="<div class='success'>Food ID is Unknown</div>";
			header('location:'.SITEURL.'admin/manage_food.php');
		}

		 ?>
	<form action="" method="post" enctype="multipart/form-data">
		<table class="tbl-30">
			<tr>
				<td>Title:</td>
				<td><input type="text" name="title" value="<?php  echo $title; ?>"></td>
			</tr>
			<tr>
				<td>Price:</td>
				<td><input type="number" name="price" value="<?php  echo $price; ?>"></td>
			</tr>
			<tr>
				<td>Current Image:</td>
				<td><?php 
				if($current!="")
				{
					?>
					<img src="<?php echo SITEURL;?>images/category/<?php echo $current;?>" width=50px>
					<?php

				}
				else
				{
					echo "<div class='error'>Image not Found!!</div>";

				}

				 ?></td>
				
		
			</tr>
			<tr>
				<td>New Image:</td>
				<td><input type="file" name="image" value=""></td>
			</tr>
			<tr>
			<td>Featured:</td>
				<td><input <?php if($featured=="yes")  {echo "checked";}?> type="radio" name="featured" value="yes">Yes
				<input <?php if($featured=="no")  {echo "checked";}?> type="radio" name="featured" value="no">No
				</td>
			</tr>
			<tr>
			<td>Active:</td>
				<td><input <?php if($active=="yes")  {echo "checked";}?> type="radio" name="active" value="yes">Yes
				<input <?php if($active=="no")  {echo "checked";}?> type="radio" name="active" value="no">No
				</td>
			</tr>
			<td colspan="2">
				<input type="hidden" name="current" value="<?php echo $current; ?>">
				<input type="hidden" name="id" value="<?php echo$id; ?>">
			<input type="submit" name="submit" value="Update Food" class="btn-secondary">
			</td>
		</table>
	</form>

	<?php
	if(isset($_POST['submit']))
	{
		//get all values from our form
		$id=$_POST['id'];
		$title=$_POST['title'];
		$price=$_POST['price'];
		$current=$_POST['current'];
		$featured=$_POST['featured'];
		$active=$_POST['active'];

		//update new image if selected and in database ansds rediredt to manage 
		//check if image selected or not
		if (isset($_FILES['image']['name'])) 
{
			$imagename=$_FILES['image']['name'];
			//check image iss available
			if($imagename!="")
			{
				//availabe
				//uploadf new and remove current
				$ext = end(explode('.',$imagename ));
	             $imagename="food_category".rand(0000,9999).'.'.$ext;
	             $sourcepath=$_FILES['image']['tmp_name'];
	              $destinationpath="../images/category/".$imagename;
	              $upload=move_uploaded_file($sourcepath, $destinationpath);
	//check if uploaded if not redirecxt with error msg
     if($upload==true)
      {
      	         $_SESSION['add']="<div class='success'>Image uploaded Successfully</div>";
	             header("location:".SITEURL.'admin/manage_food.php');

	
			}
			else
			{
				$_SESSION['add']="<div class='error'>cant upload image</div>";
	          header("location:".SITEURL.'admin/manage_food.php');
	         die();
			}
			$removepath="../images/category/".$current;
			$remove=unlink($removepath);
			//check if removed
			if ($remove==false) {
				$_SESSION['upload']="<div class='success'>Failed to remove now image</div>";
	             header("location:".SITEURL.'admin/manage_food.php');
	             die();
			}
		
		}

		else
		{
			$imagename=$current;
		}
	}
	
		$sql2="update foodtbl set
		title='$title',
		price='$price',
		imagename='$imagename',
		featured='$featured',
		active='$active'
		where id='$id'
		";
		//execute
		$result2=mysqli_query($con,$sql2);
		if($result2==true)
		{
			$_SESSION['add']="<div class='success'>Food Updated Successfully</div>";
			header("location:".SITEURL.'admin/manage_food.php');

		}
		else
		{
			$_SESSION['notup']="<div class='success'>Food not Updated</div>";
			header("location:".SITEURL.'admin/update-food.php');
		}

}
	
	?>
	</div>
</div>
<?php include('partials/footer.php'); ?>