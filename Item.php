<?php
session_start();
include 'connection.php';
$prodOptionID = $_GET['id'];
$itemCategory = $_GET['category'];
$brandName = $_GET['brand'];
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
                    <li><a href="Gallery.html">Gallery</a></li>
                    <li><a href="cafe.html">Cafe</a></li>
                    <li><a href="Contact.php">Contact Us</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="items-icons">
                        <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
                        <i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>
                        <!-- <div class="basket-counter"><p>2</p></div> -->
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
                    <li><a href="cafe.html">CAFE</a></li>
                    <li><a href="Contact.php">CONTACT US</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="items-icons">
                        <a href="Favorites.php"><i class="fa-solid fa-heart" style="color: #ffffff;"></i></a>
                        <i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>
                        <!-- <div class="basket-counter"><p>2</p></div> -->
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


    <main class="item-main">

        <?php
        // statement to get all data for product with matching ID
        $getItem = "SELECT p.ProductID, p.ProductName, p.Description, p.Price, b.BrandName, i.ImageURL, po.Colour, po.ProdOptionID FROM product_option as po
        LEFT JOIN products as p ON po.ProductID = p.ProductID 
        LEFT JOIN image as i ON i.ProdOptionID = po.ProdOptionID 
        LEFT JOIN brands as b ON p.BrandID = b.BrandID 
        LEFT JOIN categories as c ON p.CategoryID = c.CategoryID 
        WHERE po.ProdOptionID = $prodOptionID";
        $runItem = mysqli_query($connection, $getItem);
        $displayItem = mysqli_fetch_assoc($runItem);
        if ($displayItem) {
            echo "<div class='item-cont flex flex-col'>
            <div id='slider1' class='splide'>
                <div class='splide__track'>
                    <ul class='splide__list item-list'>";

            $imageQuery = "SELECT i.ImageURL, p.ProductName from image as i 
            LEFT JOIN product_option as po ON po.ProdOptionID = i.ProdOptionID 
            LEFT JOIN products as p ON p.ProductID = po.ProductID
            WHERE po.ProdOptionID = $prodOptionID";
            $runimages = mysqli_query($connection, $imageQuery);
            while ($displayImages = mysqli_fetch_assoc($runimages)) {
                // echo "<div class='item-img'>
                echo "<li class='splide__slide item-img'>
                        <img src='{$displayImages['ImageURL']}' alt='{$displayImages['ProductName']}'>
                    </li>";
            }

            echo "      </ul>
                    </div>
                </div>
                    <div class='item-content'>
                        <div class='flex hello'>
                            <h1>{$displayItem['ProductName']}</h1>
                            <div class='favorite-btn flex' data-id='{$displayItem['ProdOptionID']}'>
                                <i class='fa-regular fa-heart favorite-icon'></i>
                            </div>
                        </div>
                    
                     


                    <h2>{$displayItem['BrandName']}</h2>
                    <div id='description-wrapper'>
                        <p id='description'>{$displayItem['Description']}</p>
                    </div>
                    <em>
                        <p id='toggle-btn' onclick='toggleDescription()'>See More...</p>
                    </em>
                    <br>
                    <div class='color-display flex'>";

            $productID = $displayItem['ProductID'];
            $getColours = "SELECT po.Colour, po.ProdOptionID, b.BrandName from product_option as po
            LEFT JOIN products as p ON po.ProductID = p.ProductID
            LEFT JOIN brands as b ON p.BrandID = b.BrandID
                    WHERE po.ProductID = $productID";
            $runColours = mysqli_query($connection, $getColours);
            while ($displayColours = mysqli_fetch_assoc($runColours)) {
                if ($displayColours['Colour'] != '' || $displayColours['Colour'] != NULL) {
                    echo "<a href='Item.php?id={$displayColours['ProdOptionID']}&category=" . $itemCategory . "&brand={$displayColours['BrandName']}'><p>{$displayColours['Colour']}</p></a>";
                }
            }

            echo "</div>
                    <div class='price-quant flex'>
                        <div>
                            <p>£{$displayItem['Price']}</p>
                        </div>
                        <div>
                            <label for='quantity' class='quant-label'>Quantity</label>
                            <input name='quantity' type='number' required min='1' max='5'>
                        </div>
                    </div>
                    <div class='item-btn'>
                        <a href='Basket.php?prodOptionID='{$prodOptionID}'><button>ADD TO BASKET</button></a>
                    </div>
                </div>
            </div>";
        }
        ?>


        <!-- brand section -->
        <section class="brand-sect flex-col radius">
            <?php
            $getBrand = "SELECT * FROM brands WHERE BrandName = '$brandName'";
            $runBrand = mysqli_query($connection, $getBrand);
            while ($brandInfo = mysqli_fetch_assoc($runBrand)) {
                echo "<div>
                    <h6>" . strtoupper($brandInfo['BrandName']) . "</h6>
                    <p>{$brandInfo['brandDescription']}</p>
                    </div>
                    <div class='brand-img'>
                        <img src='{$brandInfo['brandImage']}' class='radius' alt='{$brandInfo['BrandName']}'>
                    </div>
                    ";
            }
            ?>

        </section>



        <em>
            <h3 class="recomend">You may also like...</h3>
        </em>

        <div class="splide-cont flex-center">
            <section id="slider2" class="splide" aria-label="Carousel">
                <div class="splide__track">
                    <div class="splide__list">

                        <?php
                        $getSimilar = "SELECT po.ProdOptionID, p.ProductID, p.ProductName, b.BrandName, p.Price, i.ImageURL, c.CategoryID FROM products AS p
                LEFT JOIN brands as b ON b.BrandID = p.BrandID
                LEFT JOIN product_option as po ON po.ProductID = p.ProductID
                LEFT JOIN image as i ON po.ProdOptionID = i.ProdOptionID
                LEFT JOIN categories as c ON c.CategoryID = p.CategoryID
                WHERE p.CategoryID = $itemCategory
                GROUP BY ProductName";
                        $runSimilar = mysqli_query($connection, $getSimilar);
                        while ($displaySimilar = mysqli_fetch_array($runSimilar)) {
                            echo "<div class='splide__slide'>
                                <a href='Item.php?id={$displaySimilar['ProdOptionID']}&category={$displaySimilar['CategoryID']}&brand={$displaySimilar['BrandName']}'><div class='bs-item flex flex-col radius'>
                                    <img src='{$displaySimilar['ImageURL']}' alt='{$displaySimilar['ProductName']}'>
                                    <p class='overlay'><em>{$displaySimilar['BrandName']}</em></p>
                                    <div class='bs-desc'>
                                        <p><strong>{$displaySimilar['BrandName']}</strong><br><span class='bestseller-name'>{$displaySimilar['ProductName']}</span><br>£{$displaySimilar['Price']}</p>
                                    </div>
                                </div></a>
                            </div>";
                        } ?>
                    </div>
                </div>
        </div>
        </section>
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
    <script>
        function toggleDescription() {
            const wrapper = document.getElementById("description-wrapper");
            const toggleBtn = document.getElementById("toggle-btn");

            if (wrapper.classList.contains("expand")) {
                wrapper.classList.remove("expand");
                toggleBtn.innerText = "Show More...";
            } else {
                wrapper.classList.add("expand");
                toggleBtn.innerText = "Show Less...";
            }
        }
    </script>
    <script>
        AOS.init({
            offset: 100,
            easing: 'ease-in-out',
            once: true
        });
    </script>
    <script src="navigation.js"></script>
    <!-- product images slider -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Splide('#slider1', {
                type: 'loop',
                perPage: 1,
                arrows: true,
                drag: true,
                breakpoints: {
                    768: {
                        perPage: 1,
                        arrows: false,
                    },
                }
            }).mount();
        });
    </script>
    <script src="favorites.js"></script>
    <!-- recomennded slider -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var splide = new Splide('#slider2', {
                perPage: 4,
                gap: '1.5rem',
                breakpoints: {
                    800: {
                        perPage: 3,
                        gap: '.7rem',
                        height: '6rem',
                    },
                    640: {
                        perPage: 2,
                        gap: '.7rem',
                        height: '6rem',
                    },
                    480: {
                        perPage: 1,
                        gap: '.7rem',
                        height: '6rem',
                    },
                },
            });

            splide.mount();
        });
    </script>
</body>

</html>