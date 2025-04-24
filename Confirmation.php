
<?php
session_start();
include 'basketCount.php';
include 'connection.php';
// get cookie
$cart = $_COOKIE['cart'] ?? [];
// set cookie back to empty string as the cart has been processed, with payment completed
setcookie('cart', '', time() + 3600, '/'); 

$orderID = $_GET['id'];

$getOrderNum = "SELECT orderNumber from orders WHERE orderID = $orderID";
$runOrderNum = mysqli_query($connection, $getOrderNum);
$orderNum = mysqli_fetch_array($runOrderNum);

echo "order completed. order number is" . $orderNum['orderNumber'] . ".";
?>