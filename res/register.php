<?php include('config/dbconnect.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>USER LOGIN</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body background="images/bg.jpg">
	<div class="container wrapper">
	<h1 style="background-color:red;text-align: center;width: 90%;">Register Here</h1>
		<?php 
if(isset($_SESSION['fail']))
{
	echo $_SESSION['fail'];
	unset($_SESSION['fail']);
}
	?>
	<form action="" method="POST" class="order" enctype="multipart/form-data">                                 
                <fieldset style="width: 60%;font-weight: bolder; float: right;padding: 10  %;">
                        <legend>Login Details</legend>
                        <div class="order-label">UserName</div>
                        <input type="text" name="username" placeholder="Enter Username" class="input-responsive" required>

                        <div class="order-label">Password</div>
                        <input type="text" name="password" placeholder="Enter Password" class="input-responsive" required>

                        <div class="order-label">Confirm</div>
                        <input type="text" name="confirm" placeholder="Confirm Password" class="input-responsive" required>
                       
                        <input type="submit" name="submit" value="Register Here" class="btn btn-primary">
                 </fieldset>
            </form>

		<?php 
			if(isset($_POST['submit']))
		{
			//get data from the form
		    $username=$_POST['username'];	    
		    $password=$_POST['password'];
		    $confirm=$_POST['confirm'];	    
		    //save data in database 	    	
		    	if($password!=$confirm){
		    $_SESSION['fail']="<div class='success'>Password Mismatch!</div>";
			header("location:".SITEURL.'register.php');
		    	} 
		    	else
		    	{   		      		     		      
		    $query="INSERT INTO usertbl set 
               username='$username',
               password='$password',
               confirm='$confirm' ";            
			$result=mysqli_query($con,$query);			 		
		if ($result==true) {
			$_SESSION['reg']="<div class='success'>User Added Successfully!</div>";
			header("location:".SITEURL.'logins.php');
		}
		else{
			$_SESSION['fail']="<div class='success'>NO Details Saved </div>";
			header("location:".SITEURL.'register.php');
          }
	   }
	   	}
			
		 ?>
           
	</div>
	</div>
</div>
</body>
</html>