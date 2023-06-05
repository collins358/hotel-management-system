<?php include('partials/menu.php'); ?>
<div class="maincontent"> 
<h1>Manage Food</h1>
<br><br>

<?php
if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'] ;
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'] ;
            unset($_SESSION['delete']);
        }
        ?>
        <br>
<br>

     <a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primary">Add Food</a>
     <br><br><br><br>
<table class="tblf" >
    <tr>
         <th>ID</th>
         <th>TTTLE</th>
         <th>PRICE</th>
         <th>IMAGE</th>
         <th>FEATURED</th>
         <th>ACTIVE</th>
         <th>ACTIONS</th>
    </tr>
    <?php
    $sql="SELECT * FROM foodtbl";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res) ;
    $sn=1;
    if($count>0)
    {
       while ($row=mysqli_fetch_assoc($res)) {
           $id=$row['id'];
            $title=$row['title'];
             $price=$row['price'];
              $imagename=$row['imagename'];
               $featured=$row['featured'];
                $active=$row['active'];
                ?>
         <tr>
          <td><?php echo $sn++; ?></td>
          <td><?php echo $title; ?></td>
          <td><?php echo $price; ?></td>
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

          <td>
             <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id;?> & imagename=<?php echo $imagename; ?>" class="btn-secondary">Update Food</a> 
              <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id;?> & imagename=<?php echo $imagename; ?>" class="btn-danger">Delete Food</a>
          </td>
       </tr>
                <?php

       }
    }
    else
    {
        echo "<tr><td colspan='7' class='error'>Food not Added Yet</td></tr>";
    }
    ?>
   
    
</table>
</div>
<?php include('partials/footer.php'); ?>