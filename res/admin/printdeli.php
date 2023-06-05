<?php include('partials/menu.php'); ?>
<br><br>
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=4000,height=4000');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

<div id="divToPrint" style="display:none;">
  <div style="width:200px;height:300px;background-color:teal;">
          
<div class="maincontent"> 
<h1>Delivered Orders</h1>
<br><br>

    
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
            
   </tr>
   <?php
   //get all orders fro mdatbas
   $sql="SELECT * FROM ordertbl where status='delivered'";//display latest order first
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
          
    </tr>
          <?php
      }
   }
   else
   {
    //order not avail
     echo "<tr><td colspan='12' class='error'>No Order  Delivered</td></tr>";
   }
   ?>
   

    <tr>
         
</table>
</div>
  </div>
</div>
<div>
  <input type="button" value="print" class="btn-primary" onclick="PrintDiv();" />
</div><br><br>
<?php include('partials/footer.php'); ?>

