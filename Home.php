<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herringbone</title>
    <meta name="description"
        content="Herringbone is an independantly owned gift shop and cafe located in Peebleshire, stocking handmade and locally sourced unique gifts...">
    <meta name="author" content="Amber Degner-Budd">
    <meta name="keywords" content="Gift shop, Cafe, Scottish gifts, Handmade, Locally sourced, Scottish makers, Local makers">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <li><a href="Home.html">Home</a></li>
                <li><a href="Products.php">Shop</a></li>
                <li><a href="Gallery.php">Gallery</a></li>
                <li><a href="Contact.php">Contact Us</a></li>
            </ul>
            <div class="icons flex flex-even">
                <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
                <i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>
            </div>
        </div>
        <div class="desk-nav">
            <ul>
                <li><a href="Home.html">HOME</a></li>
                <li><a href="Products.php">SHOP</a></li>
                <li><a href="Gallery.php">GALLERY</a></li>
                <li><a href="Contact.php">CONTACT US</a></li>
            </ul>
            <div class="icons icons-desk flex flex-even">
                <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
                <i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>
            </div>
        </div>
    </header>
    <div class="flex flex-center title">
        <h1>Herringbone</h1>
    </div>
</div>

    <main>
        <div class="banner flex flex-center">
            <h1>HERRINGBONE</br>GIFTS</h1>
        </div>

        <!-- PHP HERE TO GRAB PRODUCTS FROM DB -->
         <div class="bs-cont">
            <div class="flex flex-col">
                <h2><em>OUR BESTSELLERS</em></h2>
                <div class="bestsellers flex flex-center">
                    <div class="slider flex flex-even">
                        <div class="bs-item flex flex-col radius">
                            <img src="images/product1.jpg">
                            <div class="bs-desc">
                                <p><strong>BRAND NAME</strong><br>Product Name<br>£12.99</p>
                            </div>
                        </div>
                        <div class="bs-item flex flex-col radius">
                            <img src="images/Product2.png">
                            <div class="bs-desc">
                                <p><strong>BRAND NAME</strong><br>Product Name<br>£12.99</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- STATIC CONTENT -->
         <div class="flex-center bio">
            <div class="align bio-about radius">
                <h2>All About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc justo dolor, varius et mauris nec, varius imperdiet nulla. Phasellus interdum interdum magna.</p>
            </div>
            <div>
                <img src="images/home-header.jpg" at="Herringbone Staff" class="radius">
            </div>
         </div>

         <div class="home-cafe">
            <div class="cafe-text">
                <h3>No. 56 Cafe</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc justo dolor.</p>
                <a><p><em>View Our Menu</em></p></a>
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
            <div class="flex flex-between">
                <div class="footer-links links">
                    <h6>Important Links</h6>
                    <a><p>About Us</p></a>
                    <a><p>Cookies Policy</p></a>
                    <a><p>Delivery & Returns</p></a>
                </div>
                <div class="flex flex-between">
                    <div class="footer-links ft-contact">
                        <h6>Get In Touch</h6>
                        <a href="Contact.php"><p>Contact Us</p></a>
                        <p>01721 748 376</p>
                        <p>info@herringbone.co.uk</p>
                    </div>
                </div>
            
            </div>
        </div>
        
        <div class=" flex flex-center socials">
            <a href="https://www.facebook.com/Herringbonegiftspeebles/"><img src="images/facebook.png" alt="Facebook Icon" width="20px"></a>
            <a href=""><img src="images/instagram.png" alt="Instagram Icon" width="25px"></a>
        </div>
        <div class="flex flex-center">
            <p>Herringbone 2025 ©</p>
        </div>
    </footer>
    <script>
        document.getElementById('toggle').addEventListener('click', function () {
            const border = document.querySelector('.header');
            border.classList.toggle('shrink'); // Add or remove the 'shrink' class
        });
    </script>
    <script src="navigation.js"></script>
</body>
</html>