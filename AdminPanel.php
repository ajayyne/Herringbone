<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herringbone</title>
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

    <?php
    session_start();
    include 'connection.php';

    // // check that admin is logged in to allow page access:
    // if ($adminID != NULL || !empty($adminID)) {
    //     if ($_SESSION['userType'] == 'Admin') {
    //         // page content goes here
    
    //     echo "
    //     <main>
    //         <div class='admin-links'>
    //             <a href='AdminProducts.php'><div class='link-box radius text-center'>
    //                 <h1>PRODUCTS</h1>
    //             </div></a>
    //             <a href='AdminBrands.php'><div class='link-box radius text-center'>
    //                 <h1>BRANDS</h1>
    //             </div></a>
    //             <a href='AdminOrders.php'><div class='link-box radius text-center'>
    //                 <h1>MANAGE ORDERS</h1>
    //             </div></a>
    //         </div>
    //     </main>";

    //     }
    // } else {
    //     header("Location: Home.php");
    // }
    // ?>


<main>
            <div class='admin-links'>
                <a href='AdminProducts.php'><div class='link-box radius text-center'>
                    <h1>PRODUCTS</h1>
                </div></a>
                <a href='AdminBrands.php'><div class='link-box radius text-center'>
                    <h1>BRANDS</h1>
                </div></a>
                <a href='AdminOrders.php'><div class='link-box radius text-center'>
                    <h1>MANAGE ORDERS</h1>
                </div></a>
            </div>
        </main>
</body>

</html>