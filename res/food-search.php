<?php include('partials-front/menu.php'); ?>

    <section class="food-search text-center">
        <div class="container">
            <?php
            $search= mysqli_real_escape_string( $con,$_POST['search']);
            ?>            
            <h2 >Foods on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>
        </div>
    </section>
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php              
               $sql="SELECT *FROM foodtbl where title like '%$search%' or description like '%$search%' order by rand()";
               $result=mysqli_query($con,$sql);
               $count=mysqli_num_rows($result);
               if($count>0)
               {
                //food avail
                while ($row=mysqli_fetch_assoc($result)) {
                    $id=$row['id'];
                     $title=$row['title'];
                     $price=$row['price'];
                    $description=$row['description'];
                    $imagename=$row['imagename'];
                                ?>
                     <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                            if($imagename=="")
                            {
                                 //not avail
                                  echo "<div class='error'>Image not available:</div>";
                            }
                            else
                            {
                                //image avail
                                ?>
                            <img src=" <?php echo SITEURL; ?>images/category/<?php echo $imagename; ?>" alt="Pizza" width="70%" class="neww">
                                <?php
                            }
                            ?>
                     
                        </div>

                        <div class="food-menu-desc">
                          <h4><?php echo $title;?></h4>
                          <p class="food-price"><?php echo $price;?></p>
                        <p class="food-detail">
                             <?php echo $description;?>
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
                //food absent
                echo "<div class='error'>Food not available:</div>";
               }
            ?>           
            <div class="clearfix"></div>         
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <?php include('partials-front/footer.php'); ?>
