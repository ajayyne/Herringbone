<?php
session_start();
include "connection.php";
// number will be changing when more items added
$basketCount = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herringbone</title>
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.png">
    <meta name="description"
        content="Herringbone stocks a unique range of handmade and locally sourced gifts. Browse our candles, glassware, and home decor.">
    <meta name="author" content="Amber Degner-Budd">
    <meta name="keywords"
        content="Gift shop, Cafe, Scottish gifts, Handmade, Locally sourced, Scottish makers, Local makers">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
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
                    <li><a href="Gallery.html">Gallery</a></li>
                    <li><a href="Contact.php">Contact Us</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="search-cont flex">
                        <input type="text" id="search" class="radius" name="search">
                        <i class="fa-solid fa-magnifying-glass searchIcon"></i>
                    </div>

                    <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
                    <div class="basket-icon">
                        <i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>
                        <?php
                        // if basket is not empty - display this
                        echo "<div class='basket-counter'><p>{$basketCount}</p></div>";
                        ?>
                    </div>


                </div>
            </div>
            <div class="desk-nav">
                <img src="images/icons/logo.jpg" class="logo">
                <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="Products.php">SHOP</a></li>
                    <li><a href="Gallery.html">GALLERY</a></li>
                    <li><a href="Contact.php">CONTACT US</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="search-cont flex">
                        <input type="text" id="deskSearch" class="radius" name="search">
                        <i class="fa-solid fa-magnifying-glass searchIcon" id="searchIcon"></i>
                    </div>

                    <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
                    <div class="basket-icon">
                        <i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>
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


    <div class="flex flex-col main-container">
        <div class="categories-mobile">

            <!-- mobile display of categories -->
            <?php
            $getCategories = "SELECT CategoryName FROM categories";
            $runCategories = mysqli_query($connection, $getCategories);
            //used to assign unique id to each category
            $catCounter = 0;
            while ($listCategories = mysqli_fetch_assoc($runCategories)) {
                echo "<p class='category-mob' id='category" . $catCounter . "'>{$listCategories['CategoryName']}</p>";
            }
            ?>
        </div>

        <!-- generate filters using php/sql -->
        <div class="filter-main">
            <div class="filter-cont flex flex-col">
                <div class="filter-btn-container">
                    <input type="checkbox" id="toggleCheckbox" style="display: none;">
                    <label for="toggleCheckbox" id="filterButton">
                        FILTERS
                        <img src="images/icons/arrow-down.png" class="arrow-down" id="arrow">
                    </label>
                </div>
                <div class="filters-mob">
                    <div class="filters flex flex-even" id="filters">
                        <div class="filtersColours flex flex-col">
                            <div>
                                <p><em>COLOUR</em></p>
                            </div>
                            <div class="colours flex flex-col">
                                <?php
                                //get all current colours, brands and prices stored in database
                                $getColours = "SELECT Colour FROM product_option";
                                //render out colours where colour column has a value
                                $runColours = mysqli_query($connection, $getColours);
                                //create counter to make unique id for each input below
                                $idCounter = 0;
                                while ($displayColours = mysqli_fetch_assoc($runColours)) {
                                    if ($displayColours['Colour'] != '') {
                                        echo "<div class='flex colour'>
                                            <input type='checkbox' class='radio colourCheckbox' value='{$displayColours['Colour']}' id='chkColour" . $idCounter . "'>
                                            <p>{$displayColours['Colour']}</p>
                                        </div>";
                                        $idCounter++;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="filtersBrands flex flex-col">
                            <div>
                                <p><em>BRAND</em></p>
                            </div>
                            <div class="brands flex flex-col">
                                <?php
                                $getBrands = "SELECT BrandName FROM brands";
                                $runBrands = mysqli_query($connection, $getBrands);
                                $idCounter = 0;
                                while ($displayBrands = mysqli_fetch_assoc($runBrands)) {
                                    echo "<div class='flex flex colour'>
                                    <input type='checkbox' class='radio brandCheckbox' value='{$displayBrands['BrandName']}' id='chkBrand" . $idCounter . "'>
                                    <p>{$displayBrands['BrandName']}</p>
                                </div>";
                                    $idCounter++;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="filtersColours flex flex-col">
                            <div>
                                <p><em>PRICE</em></p>
                            </div>
                            <div class="colours flex flex-even">
                                <div class="flex colour">
                                    <input type="radio" class="radio priceInput" value="20.00" id="userInput"
                                        name="price">
                                    <p>Under £20</p>
                                </div>
                                <div class="flex colour">
                                    <input type="radio" class="radio priceInput" value="30.00" id="userInput"
                                        name="price">
                                    <p>Under £30</p>
                                </div>
                                <div class="flex colour">
                                    <input type="radio" class="radio priceInput" value="50.00" id="userInput"
                                        name="price">
                                    <p>Under £50</p>
                                </div>
                            </div>
                        </div>
                        <div class="filterButtons flex flex-even">
                            <button id="clearFilters">Clear All</button>
                            <button id="applyFilters" onclick="applyFilters()">Apply Filters</button>
                        </div>
                    </div>
                </div>




                <div class="categories-desk">
                    <a href="products.php">
                        <p class="category">All Products</p>
                    </a>
                    <!-- CATEGORIES - IMPORT FROM PHP -->
                    <?php
                    $getCategories = "SELECT CategoryName FROM categories";
                    $runCategories = mysqli_query($connection, $getCategories);
                    while ($listCategories = mysqli_fetch_assoc($runCategories)) {
                        echo "<p class='category'>{$listCategories['CategoryName']}</p>";
                    }
                    ?>
                </div>
            </div>
        </div>


        <!-- header of product page -->
        <div class="product-div flex">
            <div class="flex-center radius">
                <div class="product-div-info">
                    <h1>LOCALLY SOURCED</h1>
                    </br>
                    <p>Herringbone takes pride in sourcing local Scottish products, some which are handmade by talented
                        makers.<br>Herringbone takes pride in sourcing local Scottish products, some which are handmade
                        by talented makers.</p>
                </div>
                <img src="images/gallery/shop3.jpg">
            </div>
        </div>

        <div class="prod-display" id="prod-container">
            <!-- dynamic content here -->
        </div>



    </div>

    <footer class="products-footer">
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
            <div class="flex flex-between">
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
    <!-- script to filter, search and display products -->
    <script src="products.js"></script>
    <!-- navigation script -->
    <script>
        document.getElementById('toggle').addEventListener('click', function () {
            const border = document.querySelector('.header');
            border.classList.toggle('shrink'); // Add or remove the 'shrink' class
        });
    </script>
    <script src="navigation.js"></script>
    <script src="filters.js"></script>
    <script>
      AOS.init({
    offset: 100, 
    easing: 'ease-in-out',
    once: true 
});
    </script>
</body>

</html>