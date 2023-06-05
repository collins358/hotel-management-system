<?php include('config/dbconnect.php'); ?>

 <?php
$sql3="SELECT *FROM foodtbl";
         $result3=mysqli_query($con,$sql3);
         $count3=mysqli_num_rows($result3);
if($count3==1){
$cart = array();
$id=$_POST['id'];
// check if the cart is empty
if (empty($_SESSION['cart'])) {
    // if empty, add item to cart
    $cart[] = $_POST['id'];
    // save cart to session
    $_SESSION['cart'] = $cart;

} else {
    // if not empty, get existing cart from session
    $cart = $_SESSION['cart'];
    // add item to cart
    $cart[] = $_POST['id']; 
    // save cart to session
    $_SESSION['cart'] = $cart;
}

// redirect back to food order page
header("Location:" .SITEURL.'foods.php');
}
?>