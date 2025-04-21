
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
                    <li><a href="cafe.html">Cafe</a></li>
                    <li><a href="Contact.php">Contact Us</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="items-icons">
                        <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
                        <i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>
                        <div class="basket-counter"><p>2</p></div>
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
                        <a href="Favorites.php" class="icon-link"><i class="fa-solid fa-heart" style="color: #ffffff;"></i></a>
                        <a><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i></a>
                        <div class="basket-counter"><p>2</p></div>
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

    <p>This Cookie Policy explains how <strong>Herringbone</strong> uses cookies and similar technologies to recognize you when you visit our website at www.herringbone.co.uk. It explains what these technologies are and why we use them, as well as your rights to control our use of them.</p>
    <br><br>
    <h2>1. What Are Cookies?</h2>
    <p>Cookies are small data files that are placed on your device when you visit a website. Cookies are widely used by website owners to make their websites work, or to work more efficiently, as well as to provide reporting information.
    Cookies set by the website owner (in this case, Herringbone) are called “first-party cookies.” Cookies set by parties other than the website owner are called “third-party cookies.” Third-party cookies enable third-party features or functionality to be provided on or through the website (e.g., analytics, advertising, and social media).</p>
    
    <br>
    <h2>2. Why Do We Use Cookies</h2>
    <br>
    <p>We use first-party and third-party cookies for several reasons. Some cookies are required for technical reasons in order for our Website to operate, and we refer to these as "essential" or "strictly necessary" cookies. Other cookies enable us to track and target the interests of our users to enhance the experience on our Website. Third parties serve cookies through our Website for advertising, analytics, and other purposes.</p>
    <br>
    <h2>3. Types Of Cookies We Use</h2>
    <p>Essential Cookies: These cookies are necessary to provide you with services available through our Website and to use some of its features.<br>
Performance and Functionality Cookies: These cookies are used to enhance the performance and functionality of our Website but are non-essential to its use.
<br>Analytics and Customization Cookies: These cookies collect information that is used either in aggregate form to help us understand how our Website is being used or to help us customize our Website for you.
<br>Advertising Cookies: These cookies are used to make advertising messages more relevant to you.</p>
   
    <br>
    <h2>4. How Can You Control Cookies</h2>
    <p>You have the right to decide whether to accept or reject cookies. You can exercise your cookie preferences by adjusting the settings on your browser. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer.
Please note that if you choose to reject cookies, you may still use our Website though your access to some functionality and areas may be restricted.</p>    
    <br>
    <h2>5. Changes To The Cookie Policy</h2>
    <br>
    <p>We may update this Cookie Policy from time to time in order to reflect, for example, changes to the cookies we use or for other operational, legal, or regulatory reasons. Please revisit this Cookie Policy regularly to stay informed about our use of cookies and related technologies.</p>
    <br>
    <h2>6. Where Can You Get Further Information</h2>
    <p>If you have any questions about our use of cookies or other technologies, please email us at www.herringbone.co.uk.</p>
    <br>
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
                    <a href="CookiePolicy.php">
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
    <script src="navigation.js"></script>
</body>
</html>