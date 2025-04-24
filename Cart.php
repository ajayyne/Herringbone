<?php
session_start();
include 'connection.php';
include 'basketCount.php';
// Prevent caching of the cart page
header("Cache-Control: no-cache, must-revalidate");
header("Expires: 0");


// Fetch cart from cookie and decode json
if (isset($_COOKIE['cart'])) {
    $cartCookie = json_decode($_COOKIE['cart'], true);
} else {
    // If there's no cookie set, return an empty array
    $cartCookie = [];
}

// // Fetch the cart items
// $cartItems = getCartItems($cartCookie);

// count how many times the same item appears:
$cartQuantities = array_count_values($cartCookie);
// only get the unique ID's from the array
$uniqueCartIds = array_keys($cartQuantities);
$cartItems = getCartItems($uniqueCartIds);

if (!is_array($cartCookie)) {
    $cartItems = []; // Fallback to an empty array
}




// Get the cart item details from DB
function getCartItems($cartIds)
{
    global $connection;

    // If there are no favorites, return an empty array
    if (empty($cartIds)) {
        return [];
    }

    // Sanitize and prepare the favorite IDs
    $CartIds = implode(',', array_map('intval', $cartIds));
    $getCart = "SELECT * FROM product_option as po
    LEFT JOIN image as i ON i.ProdOptionID = po.ProdOptionID
        LEFT JOIN Products as p ON po.ProductID = p.ProductID
        WHERE po.ProdOptionID IN ($CartIds)";



    // Execute the query and add error checking
    $cartItems = mysqli_query($connection, $getCart);
    if (!$cartItems) {
        echo "SQL Error: " . mysqli_error($connection);
        return []; // Return an empty array on error
    }

    // Fetch all results and return them
    return mysqli_fetch_all($cartItems, MYSQLI_ASSOC);
}


?>

<!DOCTYPE html>

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
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script src="https://kit.fontawesome.com/504c189bcb.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="head">
        <header class="header">
            <div class="mobile-nav flex flex-between">
                <nav>
                    <div class="hamburger-container" id="toggle">
                        <div class="hamburger-1 hamburger">
                        </div>
                        <div class="hamburger-2 hamburger">
                        </div>
                        <div class="hamburger-3 hamburger">
                        </div>
                    </div>
                </nav>
                <ul class="navigation flex flex-col" id="myList">
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="Products.php">Shop</a></li>
                    <li><a href="Gallery.php">Gallery</a></li>
                    <li><a href="cafe.php">Cafe</a></li>
                    <li><a href="Contact.php">Contact Us</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="items-icons">
                    <a href="Favorites.php" class="icon-link"><i class="fa-solid fa-heart" style="color: #ffffff;"></i></a>
                    <a href="Cart.php"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i></a>
                        <?php
                        // if basket is not empty - display this
                        echo "<div class='basket-counter'><p>{$basketCount}</p></div>";
                        ?>
                    </div>
                </div>
            </div>
            <div class="desk-nav">

                <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="Products.php">SHOP</a></li>
                    <li><a href="Gallery.html">GALLERY</a></li>
                    <li><a href="cafe.php">CAFE</a></li>
                    <li><a href="Contact.php">CONTACT US</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="items-icons">
                    <a href="Favorites.php" class="icon-link"><i class="fa-solid fa-heart" style="color: #ffffff;"></i></a>
                    <a href="Cart.php"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i></a>
                        <?php
                        // if basket is not empty - display this
                        echo "<div class='basket-counter'><p>{$basketCount}</p></div>";
                        ?>
                    </div>
                </div>
            </div>
        </header>
        <div class="flex flex-center title">
            <a href="Home.php">
                <h1>Herringbone</h1>
            </a>
        </div>
    </div>


    <?php

    // if cookie is not empty -> echo out cart page
    if ($cartCookie && !empty($cartCookie)) {

        echo "<div class='cart-cont'>
        <div class='cart-items'>";

        $total = 0;
        $delivery = 2.99;
        foreach ($cartItems as $item) {
            $id = $item['ProdOptionID'];
            // get the quantity of the item (how many times it appears in the array)
            $qty = $cartQuantities[$id];
            $price = floatval($item['Price']);
            // subtotal for each item
            $subtotal = $price * $qty;
            // total for all items in cart
            $total += $subtotal;
            $cartTotal = $total + $delivery;

            echo "<div class='product-item cart-item flex radius'>
                    <img src='{$item['ImageURL']}' alt='Product Image'>
                    <div class='cart-item-text'>
                        <h6>{$item['ProductName']}</h6>
                        <div class='flex flex-between cart-price'>
                            <p>£{$item['Price']}</p>
                            <p>x {$qty}</p>
                        </div>
                        <p>Subtotal: <strong>£" . number_format($subtotal, 2) . "</strong></p>
                    </div>
                    <span class='deleteCartItem' data-item-id='{$item['ProdOptionID']}'>X</span>
                </div>";
        }



        echo "
        </div>
      

            <div class='total-container cart-total radius flex flex-col'>
                <h6 class='align'><strong>ORDER SUMMARY</strong></h6>
                <div class='total-info'>
                    <p class='subtotal'><strong>Subtotal: £" . number_format($total, 2) . "</strong></p>
                    <p class='delivery'><strong>Delivery: £" . number_format($delivery, 2) . "</strong></p>
                    <p class='cartTotal'><strong>TOTAL:</strong> £" . number_format($cartTotal, 2) . "</p>
                </div>
                <img src='images/cards.jpg'>
                <button><a href='Checkout.php'>Proceed To Checkout</a></button>
            </div>

            <div class='cart-information'>
    <h6>Delivery</h6>
    <p>We offer standard delivery within 3–5 business days for all in-stock items. Expedited shipping options are available at checkout for an additional fee.</p>
</div>

<div class='cart-information'>
    <h6>Returns & Refunds</h6>
    <p>We accept returns within 30 days of purchase, provided the item is unused and in its original packaging. To initiate a return, please contact our customer service team with your order details. Refunds will be processed to the original payment method once the item is received and inspected. Please note that return shipping costs are the responsibility of the customer unless the item is defective or incorrect.</p>
</div>";
    } else {
        echo "
        <div class='cart-cont flex flex-center'>
            <p class='empty-cart'><strong>Looks Like your cart is empty...</strong></p>
        </div>";
    }
    ?>







    <footer>
        <div class="flex-center">
            <img src="images/cards.jpg" class="cards">
        </div>

        <div class="footer-flex">
            <div class="flex flex-between ft-info">
                <div class="visit">
                    <h6>Visit Us</h6>
                    <p>56 High Street<br>Peebleshire<br>EH45 8SW</p>
                </div>
                <div>
                    <h6>Opening Hours</h6>
                    <p>Mon-Sat: 10-4<br>Sat: 10-4<br>Sun: 10-4</p>
                </div>
            </div>
            <div class="flex flex-between ft-info2">
                <div class="footer-links links">
                    <h6>Important Links</h6>
                    <a>
                        <p>About Us</p>
                    </a>
                    <a>
                        <p>Cookies Policy</p>
                    </a>
                    <a>
                        <p>Privacy Policy</p>
                    </a>
                    <a>
                        <p>Delivery & Returns</p>
                    </a>
                </div>
                <div class="flex flex-between">
                    <div class="footer-links ft-contact">
                        <h6>Get In Touch</h6>
                        <a href="Contact.php">
                            <p>Contact Us</p>
                        </a>
                        <p>01721 748 376</p>
                        <p>info@herringbone.co.uk</p>
                    </div>
                </div>

            </div>
        </div>

        <div class=" flex flex-center socials">
            <a href="https://www.facebook.com/Herringbonegiftspeebles/" target="_blank"><img src="images/facebook.png"
                    alt="Facebook Icon" width="20px"></a>
            <a href=""><img src="images/instagram.png" alt="Instagram Icon" width="25px"></a>
        </div>
        <div class="flex flex-center">
            <p>Herringbone 2025 ©</p>
        </div>
    </footer>
    <script src="navigation.js"></script>
    <script src="cart.js"></script>

</body>


</html>