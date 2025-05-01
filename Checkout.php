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

// count how many times the same item appears:
$cartQuantities = array_count_values($cartCookie);
// only get the unique ID's from the array
$uniqueCartIds = array_keys($cartQuantities);
$cartItems = getCartItems($uniqueCartIds);

if (!is_array($cartCookie)) {
    $cartItems = []; // Fallback to an empty array
}
if(empty($cartCookie)){
    header("Location: Home.php");
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
                    <li><a href="Gallery.php">GALLERY</a></li>
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



    
<main class="checkout">
<form class="cart-form radius" method="post">
<h1 class="align">Delivery & Billing Address</h1>
<div class="cart-form-responsive">
    <div class="flex flex-col">
        <div class="flex flex-col">
            <label for="name">* Full Name</label>
            <input type="text" name="name" required>
        </div>
        <div class="flex flex-col">
            <label for="email">* Email Address</label>
            <input type="email" name="email" required>
        </div>
        <div class="flex flex-col">
            <label for="address1">* Address Line 1</label>
            <input type="text" name="address1" required>
        </div>
        <div class="flex flex-col">
            <label for="address2">Address Line 2</label>
            <input type="text" name="address2">
        </div>
    </div>
    <div class="flex flex-col">
        <div class="flex flex-col">
            <label for="town">* Town</label>
            <input type="text" name="town" required>
        </div>
        <div class="flex flex-col">
            <label for="postcode">* Post Code</label>
            <input type="text" name="postcode" required>
        </div>
        <div class="flex flex-col">
            <label for="county">* County</label>
            <input type="text" name="county" required>
        </div>
        <div class="align">
            <input type="submit" value="PROCEED TO PAYMENT" class="payment-redirect"></input>
        </div>
    </div>
    </div>
</form>

<div class='cart-info-cont'>
                <div class='cart-information'>
                    <h6>Delivery</h6>
                    <p>We offer standard delivery within 3–5 business days for all in-stock items. Expedited shipping options are available at checkout for an additional fee.</p>
                </div>

                <div class='cart-information'>
                    <h6>Returns & Refunds</h6>
                    <p>We accept returns within 30 days of purchase, provided the item is unused and in its original packaging. To initiate a return, please contact our customer service team with your order details. Refunds will be processed to the original payment method once the item is received and inspected. Please note that return shipping costs are the responsibility of the customer unless the item is defective or incorrect.</p>
                </div>
            </div>

<!-- handle form -->
<?php
// redirect user on form submission -> to payment page
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customerName = htmlspecialchars($_POST['name']);
    $customerEmail = htmlspecialchars($_POST['email']);
    $address1 = htmlspecialchars($_POST['address1']);
    $address2 = htmlspecialchars($_POST['address2']);
    $town = htmlspecialchars($_POST['town']);
    $postCode = htmlspecialchars($_POST['postcode']);
    $county = htmlspecialchars($_POST['county']);
    $paymentMade = 0;
    $orderFulfilled = 0;

    // array to access prices
    $itemPrices = array();



    $delivery = 2.99;
    $total = 0;
    // loop through each id in the cookie array and calculate prices
    foreach ($cartItems as $item) {
        $id = $item['ProdOptionID'];
        // get the quantity of the item (how many times it appears in the array)
        $qty = $cartQuantities[$id];
        $price = floatval($item['Price']);
        // subtotal for each item

        // total for all items in cart
        $total = $total + ($price * $qty);
    

        // building array for each prodoptionid and its price
        $itemPrices[$id] = $price;
        echo "<div><p>" . $id . " and " . $price .  "</p></div>";
    }
    $orderTotal = $total + $delivery;

    // // send user info the database
    $insertQuery = "INSERT INTO orders (customerName, customerEmail, Address1, Address2, Town, postCode, County, paymentMade, orderFulfilled, orderTotal)
    VALUES ('{$customerName}', '{$customerEmail}', '{$address1}', '{$address2}', '{$town}', '{$postCode}', '{$county}', '{$paymentMade}', '{$orderFulfilled}', '{$orderTotal}')";
    $runInsert = mysqli_query($connection, $insertQuery);

    if($runInsert){
        $orderID = mysqli_insert_id($connection);
        // cartQuantities holds an array like this: [82 => 3, 81 => 2] with the prodOptionID and the quantity
        // creatinh array that holds ONLY the keys (unique prodOptionIDS)
        $prodOptionIDS = array_keys($cartQuantities);
        // for each key (prodOptionID) -> get the value based on the prodOptionID ($quantity)
        foreach($prodOptionIDS as $prodOptionID){

            // accesses the array of prod option id's and quantities, and gets the quantity
            $quantity = $cartQuantities[$prodOptionID];
            // accesses the array of prod option id's and prices, and gets the price
            $price = $itemPrices[$prodOptionID];
          // insert the items that were purchased one by one 
          $insertItemsQuery = "INSERT INTO ordereditems (orderID, ProdOptionID, itemPrice, itemQuantity)
          VALUES ('{$orderID}', '{$prodOptionID}', '{$price}', '{$quantity}')";
          $runInsertItems = mysqli_query($connection, $insertItemsQuery);
        }

    }else{
        echo "<script>alert('error making insert')</script>";
    }
    


    echo "<meta http-equiv='refresh' content='0;url=Payment.php?id=$orderID'>";
    exit();
}
?>


</main>




    <footer>
        <div class="flex-center">
            <img src="images/cards.jpg" class="cards" alt="Cart Payments Accepted: Visa, Mastercard, American Express, PayPal">
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

</body>


</html>