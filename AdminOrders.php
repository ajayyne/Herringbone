<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: Home.php");
    exit;
}

if (empty($_SESSION['ID']) || $_SESSION['ID'] === null) {
    header("Location: Home.php");
    exit;
}
// get admin ID
$userID = $_SESSION['ID'];
// get username from this
$getusername = "SELECT userName FROM adminpanel WHERE adminID = $userID";
$runusername = mysqli_query($connection, $getusername);
$username = mysqli_fetch_array($runusername);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herringbone</title>
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.png">
    <meta name="description"
        content="Herringbone is an independantly owned gift shop and cafe located in Peebleshire, stocking handmade and locally sourced unique gifts...">
    <meta name="author" content="Amber Degner-Budd">
    <meta name="keywords"
        content="Gift shop, Cafe, Scottish gifts, Handmade, Locally sourced, Scottish makers, Local makers">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/504c189bcb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body class="orders">
<div class="navbar">
        <button class="hamburger" id="hamburger">
            &#9776;
        </button>

        <div class="user flex">
            <i class="fa-solid fa-user user-icon" style="color: #ffffff;"></i>
            <?php echo "<p class='user-display'>Hi,  {$username['userName']}</p>"; ?>
        </div>

    </div>
    <nav class="sidebar" id="sidebar">
        <button class="close-btn" id="close-btn">&times;</button>
        <ul>
            <li><a href="AdminPanel.php">Home</a></li>
            <li><a href="AdminProducts.php">All Products</a></li>
            <li><a href="AdminBrands.php">Brands</a></li>
            <li><a href="AdminOrders.php">Manage Orders</a></li>
            <br>
            <div class="flex logout">
                <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>
                <li><a href="logout.php" id="logout">Log Out</a></li>
            </div>
        </ul>
    </nav>


    <div class="order-container flex flex-col">


    <div class="flex flex-col">
    <h1 class="order-heading radius">Uncompleted Orders</h1>


<?php
    

    echo "<table class='orderTable OT1'>
                <tr>
                    <th>Customer Name:</th>
                    <th>Address:</th>
                    <th>Items Ordered:</th>
                    <th>Total Order Price:</th>
                    <th>Payment Recieved:</th>
                    <th>Order Fulfilled:</th>
                </tr>
                ";
            
    // get orders that have yet to be completed
    $getOrders = "SELECT * FROM orders as o 
    LEFT JOIN ordereditems as oi ON oi.orderID = o.orderID
    LEFT JOIN product_option as po ON po.ProdOptionID = oi.ProdOptionID
    LEFT JOIN products as p ON p.ProductID = po.ProductID
    WHERE o.orderFulfilled = 0";
    $runOrders = mysqli_query($connection, $getOrders);
    while($uncompleted = mysqli_fetch_array($runOrders)){
        echo "
                <tr>
                <td>{$uncompleted['customerName']}</td>
                 <td>{$uncompleted['Address1']}, {$uncompleted['Address2']}, {$uncompleted['Town']}, {$uncompleted['postCode']}, {$uncompleted['County']}</td>
                 <td>{$uncompleted['ProductName']} x{$uncompleted['itemQuantity']} ({$uncompleted['Colour']})</td>
                 <td>{$uncompleted['orderTotal']}</td>
                 <td>{$uncompleted['paymentMade']}</td>
                 <form method='post' id='orderForm'>
                 <input type='hidden' value='{$uncompleted['orderID']}' name='orderID'>
                 <td><input type='submit' id='completeOrder' name='complete' value='Mark as Completed' class='radius'></td>
                 </form>
                </tr>";
    }

    echo "</table>
    </div>";

    

    if (isset($_POST['complete'])) {
        $complete = "UPDATE orders SET orderFulfilled = 1 WHERE orderID = $_POST[orderID]";
        $runComplete = mysqli_query($connection, $complete);
        if($runComplete){
            echo "<script>alert('order fulfilled')</script>";
        }
    }
    ?>
    

    <div class="flex flex-col">
    <h1 class="order-heading radius">Completed Orders</h1>


    <?php
echo "<table class='orderTable OT2'>";
    // get orders that are already completed
    $getCompletedOrders = "SELECT * FROM orders WHERE orderFulfilled = 1";
    $runCompletedOrders = mysqli_query($connection, $getCompletedOrders);
    while($completed = mysqli_fetch_array($runCompletedOrders)){
        echo "  <tr>
                    <th>Customer Name:</th>
                    <th>Address:</th>
                    <th>Items Ordered:</th>
                    <th>Total Order Price:</th>
                    <th>Payment Recieved:</th>
                    <th>Order Fulfilled:</th>
                </tr>";

             // get orders that have yet to be completed
    $getCompleted = "SELECT * FROM orders as o 
    LEFT JOIN ordereditems as oi ON oi.orderID = o.orderID
    LEFT JOIN product_option as po ON po.ProdOptionID = oi.ProdOptionID
    LEFT JOIN products as p ON p.ProductID = po.ProductID
    WHERE o.orderFulfilled = 1";
    $runCompleted = mysqli_query($connection, $getCompleted);
    while($completedOrders = mysqli_fetch_array($runCompleted)){
        echo "
                <tr>
                <td>{$completedOrders['customerName']}</td>
                 <td>{$completedOrders['Address1']}, {$completedOrders['Address2']}, {$completedOrders['Town']}, {$completedOrders['postCode']}, {$completedOrders['County']}</td>
                 <td>{$completedOrders['ProductName']} x{$completedOrders['itemQuantity']} ({$completedOrders['Colour']})</td>
                 <td>{$completedOrders['orderTotal']}</td>
                 <td>{$completedOrders['paymentMade']}</td>
                 <td>Yes</td>
                </tr>";
    }
  
}
echo "</form>";
?>
</div>
</div>


    
    <script src="AdminNav.js"></script>
    <script>
    const orders = document.querySelectorAll('.order-heading');
    const orderTables = document.querySelectorAll('.orderTable');

    orders.forEach((order, index) => {
        order.addEventListener('click', () => {
            orderTables[index].classList.toggle('orderVisible');
        });
    });
    </script>
    </body>
</html>

