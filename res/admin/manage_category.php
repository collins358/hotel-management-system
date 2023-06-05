
<?php include('partials/menu.php'); ?>
<div class="maincontent"> 
<h1>Manage Category</h1>
<br>
<?php
if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'] ;
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['notf']))
        {
            echo $_SESSION['notf'] ;
            unset($_SESSION['notf']);
        }
          if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'] ;
            unset($_SESSION['delete']);
        }
         if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'] ;
            unset($_SESSION['upload']);
        }
        if(isset($_SESSION['failremove']))
        {
            echo $_SESSION['failremove'] ;
            unset($_SESSION['failremove']);
        }
        if(isset($_SESSION['updatedd']))
        {
            echo $_SESSION['updatedd'] ;
            unset($_SESSION['updatedd']);
        }

        ?>
     <br><br><br> 
     <a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary" >Add Category</a>
     <br><br>  <br><br>
<table class="tblf" >
    <tr>
         <th>ID</th>
         <th>TITLE</th>
         <th>IMAGE</th>
         <th>FEATURE</th>
         <th>ACTIVE</th>
         <th>MODIFY</th>
    </tr>
<?php
$sql="SELECT *FROM categorytbl";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
//check if there is data in database
 $sn=1;
if($count>0)
   
{
//get data
    while ($row=mysqli_fetch_assoc($result)) {
      $id=$row['id'];
       $title=$row['title'];
        $imagename=$row['imagename'];
         $featured=$row['featured'];
          $active=$row['active'];
          ?>
         <tr>
          <td><?php echo $sn++; ?></td>
          <td><?php echo $title; ?></td>

          <td><?php 
          //check ehther image name is avalsble
          if($imagename!="")
          {
            ?>
            <img src="<?php echo SITEURL; ?>images/category/<?php echo $imagename; ?>" width="50px">
            <?php

          }

          else
          {
            echo "<div class='error'>No image  Added</div>";
          }

           ?>

              
          </td>

          <td><?php echo $featured; ?></td>
          <td><?php echo $active; ?></td>
          <td colspan="2">
             <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a> 
              <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id; ?>&imagename=<?php echo $imagename; ?>" class="btn-danger">Delete Category</a>
          </td>
         </tr>




          <?php

    }
}
else
{
//when no data
    ?>
    <tr><td colspan="6"><div class="error">No Category Added:</div></td></tr>
    <?php

}

?>

    
   
</table>
</div>
<?php include('partials/footer.php'); ?>


