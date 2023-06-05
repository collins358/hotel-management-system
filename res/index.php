

<?php include('partials-front/menu.php'); ?>
    <section class="food-search text-center">
          <?php
    if(isset($_SESSION['logi']))
    {
        echo $_SESSION['logi'];
      unset ($_SESSION['logi']);
    }
    ?>
        <div class="container">    
       <br><br>      
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>
    <?php
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset ($_SESSION['order']);
    }
     if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset ($_SESSION['login']);
    }
    ?>
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Our Food Categories</h2>
            <?php  
            //create sql to displayt catewgories from database
            $sql="SELECT *FROM categorytbl where active='yes' and featured='yes' order by rand() limit 4";
            $result=mysqli_query($con,$sql);
            //count num of rows 
            $count=mysqli_num_rows($result);
            if($count>0)
            {
              //category available
                while ($row=mysqli_fetch_assoc($result)) {
                     $id=$row['id'];
                   $title=$row['title'];
                    $imagename=$row['imagename'];
                    ?>

                <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                <div class="box-3 float-container">
                
                <?php
                //check if image is available or not
                if($imagename=="")
                {
                     echo "<div class='error'>Image not available:</div>";
                }
                else
                {
                    ?>
   
    <img src=" <?php echo SITEURL; ?>images/category/<?php echo $imagename; ?>" alt="Pizza" width="70%"   class="neww">
                    <?php
                }
                    ?>                
                    <h3 class="float-text text-white"><?php echo $title;  ?></h3>
               </div>
               </a>
                    <?php
                }
            }
            else
            {
              //category not available
                echo "<div class='error'>Category Not Added:</div>";
            }
            ?>
           </div>
         
            <div class="clearfix"></div>
        </div>
    </section>
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
        </div>

        <?php 
        $sql2="SELECT *FROM foodtbl WHERE active='yes' and featured='yes' order by rand() limit 6";
         $result2=mysqli_query($con,$sql2);
         $count2=mysqli_num_rows($result2);
         if ($count2>0) {
            while($row1=mysqli_fetch_assoc($result2))
            {
            $id=$row1['id'];
            $title=$row1['title'];
            $price=$row1['price'];
            $description=$row1['description'];
            $imagename=$row1['imagename'];
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
                  <img src="<?php echo SITEURL; ?>images/category/<?php echo $imagename; ?>" alt="# " class="img-responsive img-curve">
                  <?php 
                }
                ?>
                    
                </div>
                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price"><?php echo 'Ksh', $price; ?></p>
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

        <p class="text-center">
       <a href="cart.php">See All Foods</a>
        </p>
        </section>

   <a href=""> <img src="map.jpg" height="100PX" width="400px"><?php include('googlemap/index.php'); ?></a>

   <?php include('partials-front/footer.php'); ?>
