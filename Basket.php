<?php
session_start();
include 'connection.php';
$prodOptionID = $_GET['prodOptionID'];
?>

<!DOCTYPE html>
< lang="en">

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
            <a href="Home.php">
                <h1>Herringbone</h1>
            </a>
        </div>
    </div>






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
                <a href="https://www.facebook.com/Herringbonegiftspeebles/" target="_blank"><img
                        src="images/facebook.png" alt="Facebook Icon" width="20px"></a>
                <a href=""><img src="images/instagram.png" alt="Instagram Icon" width="25px"></a>
            </div>
            <div class="flex flex-center">
                <p>Herringbone 2025 ©</p>
            </div>
        </footer>
        <script src="navigation.js"></script>
    </body>
    

    </html>