<?php include('partials/menu.php'); ?>
<div class="maincontent"> 
<h1>Manage Orders</h1>
<br><br>
<?php
if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'] ;
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'] ;
            unset($_SESSION['delete']);
        }
        ?>

     <a href="<?php echo SITEURL; ?>admin/ordered.php" class="btn-primary">New Order</a>
      <a href="<?php echo SITEURL; ?>admin/delivered.php" class="btn-primary">Delivered Order</a>
       <a href="<?php echo SITEURL; ?>admin/cancelled.php" class="btn-primary">Cancelled</a>
       <a href="<?php echo SITEURL; ?>admin/printall.php" class="btn-primary">Print</a>
     <br><br><br><br>
<table class="tblf" >
    <tr>
             <th>Id</th>
             <th>Food</th>
             <th>Price</th>
             <th>Quantity</th>
              <th>Total</th>
            <th>OrderDate</th>
            <th>Status</th>
            <th>CstName</th>
             <th>CstContact</th>
              <th>CstEmail</th>
               <th>CstAddress</th>
              <th>Action</th>
   </tr>
   <?php
   //get all orders fro mdatbas
   $sql="SELECT * FROM ordertbl ORDER BY id DESC";//display latest order first
   $result=mysqli_query($con,$sql);
   $count=mysqli_num_rows($result);
   $sn=1;
   if($count>0)
   {
      while ($row=mysqli_fetch_assoc($result)) {
          $id=$row['id'];
          $food=$row['food'];
          $price=$row['price'];
          $qty=$row['qty'];
          $total=$row['total'];
          $ordate=$row['ordate'];
          $status=$row['status'];
          $cstname=$row['cstname'];
          $cstcontact=$row['cstcontact'];
          $cstmail=$row['cstmail'];
          $cstaddress=$row['cstaddress'];
          ?>
           <tr>
          <td><?php echo $sn++; ?></td>
          <td><?php echo $food; ?></td>
          <td><?php echo "<label style='color: red;'>$price</label>"; ?></td>
          <td><?php echo $qty; ?></td>
          <td><?php echo "<label style='color: blue;'>$total</label>"; ?></td>
          <td><?php echo $ordate; ?></td>

          <td>
            <?php 
            if($status=="ordered")
            {
                echo "<label style='color: blue;'>$status</label>";
            }
            elseif ($status=="ondelivery") {
               echo "<label style='color: green;'>$status</label>";
            }
            elseif ($status=="delivered") {
               echo "<label style='color: purple;'>$status</label>";
            }
            elseif ($status=="cancelled") {
               echo "<label style='color: red;'>$status</label>";
            }
            else
            {
                echo "<label style='color: blue;'>None </label>";
            }

             ?>
                
            </td>

          <td><?php echo $cstname; ?></td>
          <td><?php echo $cstcontact; ?></td>        
          <td><?php echo $cstmail; ?></td>
          <td><?php echo $cstaddress; ?></td>
          <td>
          <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id ?>" class=" btn-secondary">Confirm</a> 
          <a href="<?php echo SITEURL; ?>admin/delete-order.php?id=<?php echo $id ?>" class=" btn-danger">Delete</a> 
          </td>
    </tr>
          <?php
      }
   }
   else
   {
    //order not avail
     echo "<tr><td colspan='12' class='error'>No Order  Added</td></tr>";
   }
   ?>
   

    <tr>
         
</table>
</div>
<?php include('partials/footer.php'); ?>