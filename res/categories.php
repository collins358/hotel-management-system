<?php include('partials-front/menu.php'); ?>

    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore All Available Foods</h2>
        </div>
        <?php 
        $sql="SELECT *FROM categorytbl where active='yes' order by rand() ";
            $result=mysqli_query($con,$sql);
            //count num of rows 
            $count=mysqli_num_rows($result);
            if($count>0)
            {
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
                    <table border="3"><tr><td>
    <img src=" <?php echo SITEURL; ?>images/category/<?php echo $imagename; ?>" alt="Pizza" width="60%" class="neww"></td></tr></table>
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
          

            
           
           <div class="clearfix"></div>
        </div>
    </section>
   <?php include('partials-front/footer.php'); ?>
