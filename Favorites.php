<?php
include "connection.php";
include 'basketCount.php';
// Prevent caching of the favorites page
header("Cache-Control: no-cache, must-revalidate");
header("Expires: 0");


// Fetch favorites from cookie and decode json
if (isset($_COOKIE['favorites'])) {
    $favoritesCookie = json_decode($_COOKIE['favorites'], true);
} else {
    // If there's no cookie set, return an empty array
    $favoritesCookie = [];
}

// Fetch the favorite products
$favoriteItems = getFavoriteProducts($favoritesCookie);

// Ensure $favorites is an array to avoid warnings
if (!is_array($favoritesCookie)) {
    $favoriteItems = []; // Fallback to an empty array
}

// Get the favorite item details from DB
function getFavoriteProducts($favIds) {
    global $connection;

    // If there are no favorites, return an empty array
    if (empty($favIds)) {
        return [];
    }

    // prepare statement to get favorites
    $FaveIds = implode(',', array_map('intval', $favIds));
    $getFavorites = "SELECT * FROM product_option as po
    LEFT JOIN image as i ON i.ProdOptionID = po.ProdOptionID AND i.defaultImg = 1
        LEFT JOIN products as p ON po.ProductID = p.ProductID
        LEFT JOIN brands as b ON b.BrandID = p.BrandID
        LEFT JOIN categories as c ON p.CategoryID = c.CategoryID
        WHERE po.ProdOptionID IN ($FaveIds) ";
        
    $favoriteItems = mysqli_query($connection, $getFavorites);
    if (!$favoriteItems) {
        echo "SQL Error: " . mysqli_error($connection);
        // return an empty array if error
        return []; 
    }
    return mysqli_fetch_all($favoriteItems, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herringbone - My Favorites</title>
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.png">
    <meta name="description"
        content="View all your favorites in one place...">
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




    <main class="favorites">
    <h1>Your Favorites</h1>
    <div class="product-grid align">
        <?php 
        if($favoritesCookie && !empty($favoritesCookie)){
        foreach ($favoriteItems as $product) {
            echo "
            <a href='Item.php?id={$product['ProdOptionID']}&category={$product['CategoryID']}&brand={$product['BrandName']}'>
            <div class='product-item radius'>
                <img src='{$product['ImageURL']}'>
                <div class='flex flex-col favorite-text'>
                    <div class='flex favorite-title'>
                        <h6><strong>{$product['ProductName']}</strong></h6>
                        <div class='favorite-btn flex' data-id='{$product['ProdOptionID']}'>
                            <i class='fa-regular fa-heart favorite-icon'></i>
                        </div>
                    </div>
                    <p>£{$product['Price']}</p>
                </div>
            </div>
            </a>";
        }
    }else{
        echo "<p class='empty-faves'><strong>Looks like your favorites are empty...</strong></p>";
    }
        ?>
    </div>
    </main>
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
                    <a href="Privacy.php">
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
    <script src="favorites.js"></script>
    <script src="navigation.js"></script>
</body>

</html>