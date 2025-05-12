<?php
session_start();
include 'connection.php';
include 'basketCount.php';
$orderID= $_GET['id'];


if(empty($orderID) || $orderID = null || $orderID = ""){
    header("Location: Home.php");
}
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
                        <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
                        <i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>

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
                        <a href="Favorites.php" class="icon-link"><i class="fa-solid fa-heart"
                                style="color: #ffffff;"></i></a>
                        <a><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i></a>

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


    <main class="payment">
        <div class="flex flex-center">
            <form method="post" class="payment-form flex flex-col radius">

            <h1 class="align">Payment Details</h1>
            <div class="flex card-desk-flex">
            <div class="apply-margin">
                <div class="flex flex-col">
                    <label for="cardName">Card Holder Name:</label>
                    <input type="text" name="cardName" required placeholder="John Doe" pattern="[A-Za-z]+ [A-Za-z]+" maxlength="40" title="Please only enter letters and ensure the name is 40 characters or less">
                </div>
                <div class="flex flex-col">
                    <label for="cardNumber">Card Number:</label>
                    <input id="card" type="text" pattern="\d{4} \d{4} \d{4} \d{4}" maxlength="19" inputmode="numeric"
                        placeholder="1234 5678 9012 3456" required>
                </div>
            </div>
            <div>
                <div class="flex flex-col">
                    <label for="expiry">Expiry Date:</label>
                    <input type="text" name="expiry" required placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/\d{2}" maxlength="5" inputmode="numeric" class="expiry" title="Please enter a valid date MM/YY">
                </div>
                <div class="flex flex-col">
                    <label for="expiry">Security Code:</label>
                    <input type="text" name="expiry" required placeholder="123"  maxlength="3" inputmode="numeric" class="security" title="Please enter a valid security code with 3 numbers">
                </div>
            </div>
            </div>
                <div>
                    <input type="submit" value="COMPLETE PAYMENT" class="complete-payment" name="mastercard">
                </div>
            </form>
        </div>
    </main>

    <?php

    if(isset($_POST['mastercard'])){
        // make sure the orderID is in scope (this was an issue so putting it inside the if statement solved the problem)
        if (isset($_GET['id'])) {
        $orderID = intval($_GET['id']);
        echo "UPDATE orders SET paymentMade = 1 WHERE orderID = $orderID";
        // sql insert payment into the orders table 
        // 1=true which means payment has been made
        $paymentInsert = "UPDATE orders SET paymentMade = 1
        WHERE orderID = $orderID"; 
        $runpaymentInsert = mysqli_query($connection, $paymentInsert);

        if($runpaymentInsert){
            echo "<meta http-equiv='refresh' content='0;url=Confirmation.php?id=$orderID'>";
        }
    }}
    ?>






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
                     <a href="CookiePolicy.php" target="_blank">
                        <p>Cookies Policy</p>
                    </a>
                    <a href="Privacy.php" target="_blank">
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
    <!-- for card number input -->
    <script>
    const input = document.getElementById('card');

    input.addEventListener('input', () => {
      let value = input.value.replace(/\D/g, '');        // Remove non-digit characters
      value = value.match(/.{1,4}/g)?.join(' ') || '';   // Insert space every 4 digits
      input.value = value;
    });
  </script>
    <script src="favorites.js"></script>
    <script src="cart.js"></script>
    <script src="navigation.js"></script>
</body>

</html>