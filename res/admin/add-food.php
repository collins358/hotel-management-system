<?php include('partials/menu.php'); ?>

<div class="maincontent">
	<div class="wrapper">
		<h1>Add Food:</h1>
		<br><br>
		<?php 
		 if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'] ;
            unset($_SESSION['upload']);
        }
        ?>

		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title:</td>
					<td><input type="text" name="title" placeholder="Add Title" value=""></td>
				</tr>
				<tr>
					<td>Description:</td>
					<td><textarea name="description" cols="30"  rows="3" placeholder="Description Food"></textarea></td>
				</tr>
				<tr>
					<td>Price:</td>
					<td><input type="number" name="price" placeholder="Price of Food" value=""></td>
				</tr>
				<tr>
					<td>Select Image:</td>
					<td><input type="file" name="image" placeholder="Add image" value=""></td>
				</tr>
				<tr>
					<td>Category:</td>
					<td>
						<select name="category">
							<?php
							//create php code to display categories display in dropdown
							$sql="SELECT *FROM categorytbl where active='yes'";
							$result=mysqli_query($con,$sql);
							$count=mysqli_num_rows($result);
							if($count>0)
							{//have categories
								while ($row=mysqli_fetch_assoc($result)) {
									$id=$row['id'];
									$title=$row['title'];
									?>
									<option value="<?php echo $id; ?>"><?php echo $title; ?></option>
									<?php								
								}


							}
							else
							{//no categories
								?> 
								<option value="0">No Categories</option>
								 <?php


							}
							?>
							
						</select>
					</td>

				</tr>
				<tr>
					<td>Featured:</td>
					<td><input type="radio" value="yes" name="featured" value="">Yes
						<input type="radio" value="no" name="featured"  value="">No
					</td>
				</tr>
				<tr>
					<td>Active:</td>
					<td><input type="radio" value="yes" name="active"  value="">Yes
						<input type="radio" value="no" name="active"  value="">No
					</td>
				</tr>
				<tr>
				<td colspan="2">
				<input type="submit" name="submit" value="Add Food" class="btn-secondary">
			</td>
			</tr>
			</table>			
		</form>
		<?php
	
	if (isset($_POST['submit'])) {
	   $title=$_POST['title'];
	    $description=$_POST['description'];
	     $price=$_POST['price'];
	      $category=$_POST['category'];

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
	//check if sele t image button is clicked
	if(isset($_FILES['image']['name']))
	{
		$imagename=$_FILES['image']['name'];
		if($imagename!="")
		{
			//image is selected and rename and redirect
			$ext=end(explode('.', $imagename));//explode separsates name and jpg into 2 and end picks only the last part which is jpg
			$imagename="food_category-".rand(0000,9999).".".$ext;//new image will be like food-category34.jpg
			//get source and destination
			$src=$_FILES['image']['tmp_name'];
			$dst="../images/category/".$imagename;
			$upload=move_uploaded_file($src,$dst);
			if ($upload==false) {//failed to upload $ stop process
               $_SESSION['upload']="<div class='success'>Failed to upload image</div>";
	            header("location:".SITEURL.'admin/add_food.php');
				die();				
			}
			else
			{

			}

		}

	}
	else
	{
		$imagename="";
	}
	//query to add food
	$sql2="INSERT INTO foodtbl set
        title='$title',
        description='$description',
        price=$price,
        imagename='$imagename',
        cat_id=$category,
        featured='$featured',
        active='$active'
	";
	$result2=mysqli_query($con,$sql2);
	if($result2==true)
	{
        $_SESSION['add']="<div class='success'>Food Added Successfully</div>";
	      header("location:".SITEURL.'admin/manage_food.php');
	}
	else
	{
     $_SESSION['upload']="<div class='success'>Failed To Add Food</div>";
	  header("location:".SITEURL.'admin/add_food.php');
	}
}
    
         ?>


	</div>
</div>
<?php include('partials/footer.php'); ?>
