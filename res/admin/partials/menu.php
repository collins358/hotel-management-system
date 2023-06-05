
 <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />

        <script src="admin/assets/vendor/jquery/jquery.min.js"></script>
        <script src="admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

         <?php include('../config/dbconnect.php'); ?>  <!-- ../ is for getting out of admin page to config page -->

 <?php include('login-check.php'); ?>  

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FOOD ORDER WEBSITE-HOME PAGE</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">	
<body>

 <div class="menu tcenter">
 	<div class="wrapper">
 		
 		<ul>
 			<li><a href="index.php">Home</a></li>
 			<li><a href="manage_admin.php">Admin</a></li>
 			<li><a href="manage_category.php">Category</a></li>
 			<li><a href="manage_food.php">Food</a></li>
 			<li><a href="manage_order.php">Order</a></li>
 			<li><a href="logout.php">LogOut</a></li>
 		</ul>
 	</div>
 </div>