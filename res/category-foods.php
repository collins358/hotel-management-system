<?php include('partials-front/menu.php'); ?>
<?php
//check if id is passed
if(isset($_GET['category_id']))
{
  //cat id is set
  $category_id=$_GET['category_id'];  
  //get title
  $sql="SELECT title from categorytbl where id=$category_id ";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $category_title=$row['title'];

}
else
{
    header('location:'.SITEURL);
}

?>

    <section class="food-search text-center">
        <div class="container">
            
            <h2>Menu on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            $sql2="SELECT *FROM foodtbl where cat_id=$category_id order by rand() ";
            $result2=mysqli_query($con,$sql2);
            $count2=mysqli_num_rows($result2);
            if($count2>0)
            {
              while ($row2=mysqli_fetch_assoc($result2)) {
                $id=$row2['id'];
                $title=$row2['title'];
                $price=$row2['price'];
                $description=$row2['description'];
                $imagename=$row2['imagename'];
                ?>
                     <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php
                        if($imagename=="")
                        {
                         echo "<div class='error'>Image not available:</div>";
                        }
                        else
                        {
                          ?>
                     <img src=" <?php echo SITEURL; ?>images/category/<?php echo $imagename; ?>" alt="Pizza" width="40%" class="neww">
                          <?php  
                        }
                        ?>                    
                    </div>
                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price"><?php echo $price; ?></p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>
                       <a href="<?php echo SITEURL; ?>order.php?food_id=<?php  echo $id ;?>" class="btn btn-primary">Order Now</a>
                    </div>
               </div>

               <?php
              }
            }
            else
            {
                echo "<div class='error'>Food not available:</div>";
            }
            ?>          
            <div class="clearfix"></div>          
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
   <?php include('partials-front/footer.php'); ?>
