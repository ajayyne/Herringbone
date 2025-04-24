
<?php
session_start();
include 'basketCount.php';
include 'connection.php';
$orderID = $_GET['id'];

$getOrderNum = "SELECT orderNumber from orders WHERE orderID = $orderID";
$runOrderNum = mysqli_query($connection, $getOrderNum);
$orderNum = mysqli_fetch_array($runOrderNum);

echo "order completed. order number is" . $orderNum['orderNumber'] . ".";
?>

<!-- set basket count = 0 and empty the cart cookie -->