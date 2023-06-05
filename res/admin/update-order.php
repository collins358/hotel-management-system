<?php include('partials/menu.php'); ?>
<div class="maincontent">
	<div class="wrapper">
		<h1>Update Order</h1>
		<br><br>
		<?php
		if(isset($_GET['id']))
		{
           $id=$_GET['id'];
           $sql="SELECT * FROM ordertbl WHERE id=$id";
           $result=mysqli_query($con,$sql);
           $count=mysqli_num_rows($result);
           if($count==1)
           {
           	//detail avail
           	$row=mysqli_fetch_assoc($result);                    	
            $food=$row['food'];
            $price=$row['price'];
            $qty=$row['qty'];
            $status=$row['status'];
            $cstname=$row['cstname'];
            $cstcontact=$row['cstcontact'];
            $cstmail=$row['cstmail'];
            $cstaddress=$row['cstaddress'];
           }
       
           else
           {
           	//not avail
           	header('location:'.SITEURL.'admin/manage_order.php');
           }
		}
		else
		{
			header('location:'.SITEURL.'admin/manage_order.php');
		}
		?>

		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Food Name</td>
					<td><b><?php echo $food; ?></b></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><b><?php echo 'Ksh',$price; ?></b></td>
				</tr>
				<tr>
					<td>Qty</td>
					<td><input type="number" name="qty" readonly value="<?php echo $qty; ?>"></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><select name="status">
						<option <?php if($status=="ordered"){echo "selected";} ?> value="ordered" >ordered</option>
						<option <?php if($status=="ondelivery"){echo "selected";} ?> value="ondelivery" >OnDelivery</option>
						<option <?php if($status=="delivered"){echo "selected";} ?> value="delivered" >Delivered</option>
						<option <?php if($status=="cancelled"){echo "selected";} ?> value="cancelled" >Cancelled</option>
					</select>
						</td>
				</tr>
            
				<tr>
					<td>Customer Name</td>
					<td><input type="text" name="cstname" value="<?php echo $cstname; ?>"></td>
				</tr>
				<tr>
					<td>Customer Contact</td>
					<td><input type="text" name="cstcontact" value="<?php echo $cstcontact; ?>"></td>
				</tr>
				<tr>
					<td>Customer Email</td>
					<td><input type="text" name="cstmail" value="<?php echo $cstmail; ?>"></td>
				</tr>
				<tr>
					<td>Customer Address</td>
				 	<td><textarea name="cstaddress" cols="30" rows="4"><?php echo $cstaddress; ?></textarea></td>
				</tr>
				 <tr>
				 	<input type="hidden" name="id" value="<?php echo $id; ?>">
				 	<input type="hidden" name="price" value="<?php echo $price; ?>">
					<td colspan="2"><input type="submit" name="submit" value="Update Order" class="btn-secondary"></td>
					
				</tr>
			</table>

		</form>
		<?php
		if(isset($_POST['submit']))
		{
			$id=$_POST['id'];
			$price=$_POST['price'];
			$qty=$_POST['qty'];
			$total= $price * $qty;			
			$status=$_POST['status'];
			$cstname=$_POST['cstname'];
			$cstcontact=$_POST['cstcontact'];
			$cstmail=$_POST['cstmail'];
			$cstaddress=$_POST['cstaddress'];

			$sql2="UPDATE ordertbl SET
               qty=$qty,
               total=$total,
               status='$status',
               cstname='$cstname',
               cstcontact='$cstcontact',
               cstmail='$cstmail',
               cstaddress='$cstaddress'
               WHERE id=$id
			";
			$result2=mysqli_query($con,$sql2);
			if($result2==true)
			{
              $_SESSION['update']="<div class='success'>Order Updated Successfully?</div>";
              header("location:".SITEURL.'admin/manage_order.php');
			}
			else
			{
             $_SESSION['update']="<div class='error'> Failed To  Updated  Order Successfully?</div>";
              header("location:".SITEURL.'admin/manage_order.php');
			}
		}
		?>
	</div>
</div>





<?php include('partials/footer.php'); ?>
