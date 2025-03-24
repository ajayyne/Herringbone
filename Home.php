<!-- php include -->
<?php include 'connection.php' ?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/504c189bcb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="css/main.css" rel="stylesheet">
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
                    <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
                    <i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>
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
                    <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
                    <i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>
                </div>
            </div>
        </header>
        <div class="flex flex-center title">
            <a href="Home.php"><h1>Herringbone</h1></a>
        </div>
    </div>

    <main>
        <div class="banner flex flex-center">
            <h1>HERRINGBONE</br>GIFTS</h1>
        </div>


        <h2 class="bestseller-title">EXPLORE OUR BESTSELLERS</h2>


        <div class="splide-cont flex-center">
            <section class="splide" aria-label="Carousel">
                <div class="splide__track">
                    <div class="splide__list">

                    <!-- PHP HERE TO GRAB PRODUCTS FROM DB -->
                    <?php
                    $getBestsellers = "SELECT ProductName, BrandName, Price, ImageURL FROM products AS p
                    LEFT JOIN brands as b ON b.BrandID = p.BrandID
                    LEFT JOIN product_option as po ON po.ProductID = p.ProductID
                    LEFT JOIN image as i ON po.ProdOptionID = i.ProdOptionID
                    WHERE Bestseller = 1";

                    $runBestsellers = mysqli_query($connection, $getBestsellers);
                    while ($displayBestsellers = mysqli_fetch_array($runBestsellers)) {
                        echo "<div class='splide__slide'>
                                <div class='bs-item flex flex-col radius'>
                                    <img src='{$displayBestsellers['ImageURL']}'>
                                    <p class='overlay'><em>{$displayBestsellers['BrandName']}</em></p>
                                    <div class='bs-desc'>
                                        <p><strong>{$displayBestsellers['BrandName']}</strong><br><span class='bestseller-name'>{$displayBestsellers['ProductName']}</span><br>£{$displayBestsellers['Price']}</p>
                                    </div>
                                </div>
                            </div>";
                    } ?>
               </div>
            </div>
        </div>
        </section>
        </div>



        <!-- STATIC CONTENT -->
        <div class="flex-center bio" data-aos="fade-in" data-aos-duration="1000">
            <div class="align bio-about radius">
                <h2>All About Us</h2>
                <p>At Herringbone, we stock the best locally sources Scottish gifts. Our ranges include Candles, Bags,
                    Home Decor, Jewellery and more! <br> You're sure to find something truly unique. <br> We also own
                    the cafe located upstairs from the gift shop - The No. 56 Cafe, here you can find delicious
                    savouries and sweet treats, with coffee from Forth Bridge Roasters in Fife.<br> We hope to see you
                    in the shop soon!</p>
            </div>
            <div>
                <img src="images/home-header.jpg" at="Herringbone Staff" class="radius">
            </div>
        </div>

        <div class="home-cafe">
            <div class="cafe-text">
                <h3>No. 56 Cafe</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc justo dolor.</p>
                <a>
                    <p><em>View Our Menu</em></p>
                </a>
            </div>
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
    <!-- initialize carousel slider -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var splide = new Splide('.splide', {
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
    <script>
        AOS.init();
    </script>
</body>

</html>