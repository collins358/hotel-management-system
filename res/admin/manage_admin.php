<?php include('partials/menu.php'); ?>

<div class="maincontent">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>
        <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'] ;
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
             unset($_SESSION['delete']);
        }
        if(isset($_SESSION['none']))
        {
            echo $_SESSION['none'];
             unset($_SESSION['none']);
        }
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
             unset($_SESSION['update']);
        }
         if(isset($_SESSION['notfound']))
        {
            echo $_SESSION['notfound'];
             unset($_SESSION['notfound']);
        }
         if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
             unset($_SESSION['login']);
        }

         ?>
        
        <br><br>
     <a href="add-admin.php" class="btn-primary">Add Admin</a>
     <br><br>
<table class="tblf" >
    <tr>
         <th>ID</th>
         <th>FULLNAME</th>
         <th>USERNAME</th>
         <th>ACTIONS</th>
    </tr>
<?php
$sql="SELECT * FROM admintbl";
$result=mysqli_query($con,$sql);
if($result==true){
    $count=mysqli_num_rows($result);
    $sn=1;//create variable ans assign value

    if($count>0)
    {
while($rows=mysqli_fetch_assoc($result))
{
    $id=$rows['id'];
    $fname=$rows['fname'];
    $username=$rows['username'];
?>
 <tr>
          <td><?php echo $sn++; ?></td>
          <td><?php  echo $fname; ?></td>
          <td><?php  echo $username; ?></td>
          <td>
            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
             <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a> 
              <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
          </td>
    </tr>
  <?php     
    }
}

}

?> 

</div>
 </div>





