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




    <div class="privacy-policy">
    <h1>Privacy Policy</h1>
    <p><strong>Effective Date:</strong>29/05/2025</p>

    <p><strong>Herringbone</strong> is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website <strong>www.herringbone.co.uk.</strong>. Please read this Privacy Policy carefully. If you do not agree with the terms of this policy, please do not use our website.</p>
    <br><br>
    <h2>1. Information We Collect</h2>
    <p>We may collect information about you in a variety of ways, including:</p>
    <ul>
        <p><strong>Information You Provide to Us:</strong> Personal Data such as your name, email address, phone number, and any other information you provide directly when contacting us or filling out forms on our website.</p>
        <p><strong>Automatically Collected Information:</strong> Device Information such as your IP address, browser type, device type, operating system, and the pages you visit on our site. We also use cookies to enhance your experience.</p>
        <p><strong>Third-Party Information:</strong> Information from analytics providers to better understand our audience and improve the website.</p>
    </ul>
    <br>
    <h2>2. How We Use Your Information</h2>
    <br>
    <p>We may use the information we collect for the following purposes:</p>
    <ul>
        <p>To operate, maintain, and improve our website.</p>
        <p>To personalize your user experience.</p>
        <p>To send you updates, newsletters, or promotional materials (only if you have opted-in).</p>
        <p>To respond to your inquiries and provide customer support.</p>
        <p>To comply with legal obligations or enforce our terms.</p>
    </ul>
    <br>
    <h2>3. Sharing Your Information</h2>
    <p>We may share your information in the following situations:</p>
    <ul>
        <p><strong>With Service Providers:</strong> Third-party vendors perform services on our behalf.</p>
        <p><strong>Compliance with Laws:</strong> We may disclose your information to comply with legal or regulatory requirements.</p>
        <p><strong>Business Transfers:</strong> In the event of a merger, sale, or acquisition, your information may be transferred as part of the assets.</p>
    </ul>
    <br>
    <h2>4. Your Privacy Rights</h2>
    <p>Depending on your location, you may have the following rights:</p>
    <ul>
        <p><strong>Access and Update:</strong> Request access to or correction of your personal data.</p>
        <p><strong>Opt-Out:</strong> Withdraw consent for certain uses of your personal data, such as marketing emails.</p>
        <p><strong>Data Deletion:</strong> Request that we delete your personal data, subject to legal obligations.</p>
    </ul>
    <p>To exercise your rights, contact us at: info@herringbone.co.uk</p>
    <br>
    <h2>5. Data Security</h2>
    <br>
    <p>We implement appropriate technical and organizational measures to protect your personal data. However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>
    <br>
    <h2>6. Third-Party Websites</h2>
    <p>Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of those websites.</p>
    <br>
    <h2>7. Updates to This Privacy Policy</h2>
    <p>We may update this Privacy Policy from time to time. When we do, we will revise the "Effective Date" at the top of this page. Please review this policy periodically to stay informed of any changes.</p>
    <br>
    <h2>8. Contact Us</h2>
    <p>If you have any questions about this Privacy Policy, please contact us at:</p>
    <p><strong>Email:</strong> info@herringbone.co.uk<br>
       <strong>Phone:</strong> 01721 749 749<br>
       <strong>Address:</strong> 56 High Street
Peebleshire
EH45 8SW</p>
    </div>


    
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
    <script src="navigation.js"></script>
</body>
</html>