<?php include('partials/menu.php'); ?>

<div class="maincontent">
     <?php
        if(isset($_SESSION['logi']))
        {
            echo $_SESSION['logi'];
             unset($_SESSION['logi']);
        }
        ?>
    <div class="wrapper">
        <h1>Dashboard:</h1>
        <?php      
        $sqll="SELECT * FROM admintbl ";
        $res=mysqli_query($con,$sqll);
        $cou=mysqli_num_rows($res) ;   
            if($cou>0)
            {
               while($row=mysqli_fetch_assoc($res) ){              
                $user2=$row['username']; 
            }
            }
          
        ?>
        <h2 class="tt">Welcome Back, Admin</h2>

       
        <br><br>
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
             unset($_SESSION['login']);
        }
        ?>
        <br>
        <a href="<?php echo SITEURL;?>admin/manage_category.php">
        <div class="col4 text-center">
            <?php 
            $sql="SELECT * FROM categorytbl";
            $result=mysqli_query($con,$sql);
            $count=mysqli_num_rows($result);

            ?>
            <h1><?php echo $count; ?></h1>
            <br>
            Categories
        </div></a>
         <a href="<?php echo SITEURL;?>admin/manage_food.php">
        <div class="col4 text-center">
            <?php 
            $sql1="SELECT * FROM foodtbl";
            $result1=mysqli_query($con,$sql1);
            $count1=mysqli_num_rows($result1);
            ?>            
            <h1><?php echo $count1; ?></h1>
            <br>
            Foods
        </div></a>
         <a href="<?php echo SITEURL;?>admin/manage_order.php">
        <div class="col4 text-center">
             <?php 
            $sql2="SELECT * FROM ordertbl";
            $result2=mysqli_query($con,$sql2);
            $count2=mysqli_num_rows($result2);

            ?>
            <h1><?php echo $count2; ?></h1>
            <br>
            Total Orders
        </div></a>

         <div class="col4 text-center">
            <?php
            $sql3="SELECT sum(total) as Total from ordertbl WHERE status='delivered'";
            $result3=mysqli_query($con,$sql3);
            $row3=mysqli_fetch_assoc($result3);
            $total=$row3['Total'];
            ?>
            <h1><?php echo 'Ksh ',$total; ?></h1>
            <br>
            Total Money
        </div>
    </div>
     <br><br> <br><br> <br><br> <br><br>
</div>

   
<?php include('partials/footer.php'); ?>
        
