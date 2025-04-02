<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herringbone</title>
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.png">
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.png">
    <meta name="description"
        content="Herringbone is an independantly owned gift shop and cafe located in Peebleshire, stocking handmade and locally sourced unique gifts...">
    <meta name="author" content="Amber Degner-Budd">
    <meta name="keywords"
        content="Gift shop, Cafe, Scottish gifts, Handmade, Locally sourced, Scottish makers, Local makers">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/504c189bcb.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>

        <a href="NewProduct.php"><button>Add New Product</button></a>

        <?php
        session_start();
        include 'connection.php';
        // // check that admin is logged in to allow page access:
        // if ($adminID != NULL || !empty($adminID)) {
        //     if ($_SESSION['userType'] == 'Admin') {
        //         // page content goes here
        
        echo "<div>
            <form>
                <input type='text' name='search' id='search' class='radius'> 
                <i class='fa-solid fa-magnifying-glass searchIcon' id='searchIcon'></i>
            </form>
        </div>";

        // <!-- get all products: image, title, brand, category -->
        $getProducts = "SELECT p.ProductID, po.ProdOptionID, i.ImageURL, p.ProductName, b.BrandName FROM product_option as po
        LEFT JOIN image as i ON i.ProdOptionID = po.ProdOptionID
        LEFT JOIN products as p ON p.ProductID = po.ProductID
        LEFT JOIN brands as b ON b.BrandID = p.BrandID
        WHERE i.defaultImg = 1
        GROUP BY p.ProductID LIMIT 0, 25";
        $runProducts = mysqli_query($connection, $getProducts);
        while ($displayProducts = mysqli_fetch_assoc($runProducts)) {
            echo "
            <a href='EditProduct.php?ProductID={$displayProducts['ProductID']}'><div class='product-tile flex radius'>
                <img src='{$displayProducts['ImageURL']}' alt='{$displayProducts['ProductName']}'>
                <div class='flex'>
                    <p>{$displayProducts['ProductName']} - 
                       {$displayProducts['BrandName']}</p>
                </div>
            </div></a>";
        }
        
        
        ?>
    </main>
<script src="products.js"></script>
</body>