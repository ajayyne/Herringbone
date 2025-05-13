<?php

include 'basketCount.php';

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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/504c189bcb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
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
                                      <div class="basket-icon">

                        <a href="Cart.php"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i></a>
                        <?php
                        // if basket is not empty - display this
                        echo "<div class='basket-counter'><p>{$basketCount}</p></div>";
                        ?>
                    </div>
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
                                       <div class="basket-icon">

                        <a href="Cart.php"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i></a>
                        <?php
                        // if basket is not empty - display this
                        echo "<div class='basket-counter'><p>{$basketCount}</p></div>";
                        ?>
                    </div>
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

    <main>
        <div class="container gallery">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 img-container">
                    <img src="images/gallery/coffee.png" alt="Forth Bridge Roasters Coffee" class="img-fluid" onclick="openImageModal(this)">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-9 mb-4 img-container">
                    <img src="images/gallery/interior.jpg" alt="No.56 Cafe" class="img-fluid"
                        onclick="openImageModal(this)">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 col-md-8 col-lg-6 mb-4 img-container">
                    <img src="images/gallery/window.jpg" alt="Herringbone window display" class="img-fluid" onclick="openImageModal(this)">
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 img-container">
                    <img src="images/gallery/saws.jpg" alt="Painted Saws in Herringbone shop window" class="img-fluid" onclick="openImageModal(this)">
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 img-container">
                    <img src="images/gallery/exterior2.jpg" alt="Herringbone shop exterior" class="img-fluid"
                        onclick="openImageModal(this)">
                </div>
                
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 img-container">
                    <img src="images/gallery/exterior.jpg" alt="Herringbone shop exterior" class="img-fluid"
                        onclick="openImageModal(this)">
                </div>
               
                <div class="col-12 col-sm-6 col-md-2 col-lg-8 mb-4 img-container">
                    <img src="images/gallery/interior2.jpg" alt="No.56 cafe" class="img-fluid"
                        onclick="openImageModal(this)">
                </div>
                <div class="col-12 col-sm-6 col-md-2 col-lg-8 mb-4 img-container">
                    <img src="images/gallery/cow.jpg" alt="Interior shop featuring Highland Cow decor" class="img-fluid"
                        onclick="openImageModal(this)">
                </div>
            </div>
        </div>
        </div>
        <!-- modal to show full size images -->
        <div id="imageModal" class="modal">
            <span class="close" onclick="closeImageModal()">&times;</span>
            <img class="modal-content" id="modalImage">
        </div>


    </main>










    <footer>
        <div class="flex-center">
            <img src="images/cards.png" class="cards">
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
    <script>
        document.getElementById('toggle').addEventListener('click', function () {
            const border = document.querySelector('.header');
            border.classList.toggle('shrink'); // Add or remove the 'shrink' class
        });
    </script>
    <script src="navigation.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to open the modal and display the clicked image
        function openImageModal(image) {
            const modal = document.getElementById("imageModal");
            const modalImage = document.getElementById("modalImage");

            modal.style.display = "flex"; // Show the modal
            modalImage.src = image.src; // Set the modal image source to the clicked image's source
        }

        // Function to close the modal
        function closeImageModal() {
            const modal = document.getElementById("imageModal");
            modal.style.display = "none"; // Hide the modal
        }
    </script>
</body>

</html>