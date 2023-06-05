<?php include('partials-front/menu.php'); ?>
    <?php
    ob_start();
    if(isset($_GET['food_id']))
    {
          $food_id=$_GET['food_id'];
          $sql3="SELECT * FROM foodtbl WHERE id=$food_id";
          $result=mysqli_query($con,$sql3);
          $count3=mysqli_num_rows($result);
              if($count3==1)
              {
               $row=mysqli_fetch_assoc($result);
               $title=$row['title'];
               $price=$row['price'];
               $imagename=$row['imagename'];
              }
              else
              {
                 header('location:'.SITEURL);
                
              }
    }
    else
    {
      header("location:".SITEURL);
       

    }
?>

    <section class="food-search">
        <div class="container">           
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
            <form action="" method="POST" class="order" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Selected Food</legend>
                        <div class="food-menu-img">
                                <?php
                                if($imagename=="")
                                {
                                  echo "<div class='error'>image not available:</div>";
                                }
                                else
                                {
                                    ?>
                         <img src="<?php echo SITEURL; ?>images/category/<?php echo $imagename; ?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                                ?>                        
                        </div>    
                        <div class="food-menu-desc">
                            <h3><?php echo $title; ?></h3>
                            <input type="hidden" name="title" value="<?php echo $title; ?>">
                            <p class="food-price"><?php echo 'Ksh', $price; ?></p>
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <div class="order-label">Quantity</div>
                            <input type="number" name="qty" class="input-responsive" value="1" required>                        
                        </div>
                    </fieldset>                
                    <fieldset>
                        <legend>Delivery Details</legend>
                        <div class="order-label">Full Name</div>
                        <input type="text" name="fullname" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                        <div class="order-label">Phone Number</div>
                        <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                        <div class="order-label">Email</div>
                        <input type="email" name="email" placeholder="E.g. collins@gmail.com" class="input-responsive" required>

                        <div class="order-label">Address</div>
                        <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                        <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                    </fieldset>

            </form>
            <?php
            //check submit btn
            if(isset($_POST['submit']))
            {
                $food=$_POST['title'];
                $price=$_POST['price'];
                $qty=$_POST['qty'];
                $total=$price*$qty;//total =qty *pr
                $ordate=date("Y-m-d h:i:sa");//order date
                $status="ordered";//ordered ,on delivery,cancelled
                $cname=$_POST['fullname'];
                $contact=$_POST['contact'];
                $email=$_POST['email'];
                $address=$_POST['address'];

                $sql1="INSERT INTO ordertbl SET 
                food='$food',
                price='$price',
                qty='$qty',
                total='$total',
                ordate='$ordate',
                status='$status',
                cstname='$cname',
                cstcontact='$contact',
                cstmail='$email',
                cstaddress='$address'
                ";
                $result2=mysqli_query($con,$sql1);
                if($result2==true)
                {
                $_SESSION['order']="<div class='success text-center'> Order Saved Successfully:</div>";
               header("location:".SITEURL.'index.php');

                 
                }
                else
                {
                   $_SESSION['order']="<div class='error text-center'>Order Saving Failed:</div>";
                   header('location:'.SITEURL);
                }

            }
            ?>

        </div>
    </section>
   
   <?php include('partials-front/footer.php'); ?>
