<!-- php include -->
<?php
session_start();
include 'connection.php';
include 'basketCount.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/504c189bcb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

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
                    <li><a href="Gallery.php">Gallery</a></li>
                    <li><a href="cafe.php">Cafe</a></li>
                    <li><a href="Contact.php">Contact Us</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="items-icons">
                        <a href="Favorites.php" class="icon-link"><i class="fa-solid fa-heart"
                                style="color: #ffffff;"></i></a>
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
                        <a href="Favorites.php" class="icon-link"><i class="fa-solid fa-heart"
                                style="color: #ffffff;"></i></a>
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
        <div class="banner flex flex-center" alt="Herringbone Cafe">
            <h1 data-aos="fade-in" data-aos-duration="1000">HERRINGBONE</br><span data-aos-duration="4000">GIFTS &
                    CAFE</span></h1>
        </div>

        <!-- call to actions -->
        <div class="flex flex-col cta-container" data-aos="fade-up">
            <div>
                <div class="background-img1 flex flex-col">
                    <div class="cta">
                        <h1>Candles</h1>
                        <a href="Products.php?category=candles"><button>Shop Here</button></a>
                    </div>
                </div>
            </div>
            <div class="flex flex-between cta-2">
                <div class="background-img2 flex flex-col">
                    <div class="cta2">
                        <h1>Home</h1>
                        <a href="Products.php?category=home%20decor"><button>Shop Here</button></a>
                    </div>
                </div>
                <div class="background-img3 flex flex-col">
                    <div class="cta2">
                        <h1>Accessories</h1>
                        <a href="Products.php?category=Accessories"><button>Shop Here</button></a>
                    </div>
                </div>
            </div>
        </div>




        <h2 class="bestseller-title">EXPLORE OUR BESTSELLERS</h2>



        <div class="splide-cont flex-center">
            <section class="splide" aria-label="Carousel">
                <div class="splide__track">
                    <div class="splide__list">

                        <!-- PHP HERE TO GRAB PRODUCTS FROM DB -->
                        <?php
                        $getBestsellers = "SELECT p.ProductID, p.ProductName, po.ProdOptionID, b.BrandName, p.Price, i.ImageURL, c.CategoryID FROM products AS p
                    LEFT JOIN brands as b ON b.BrandID = p.BrandID
                    LEFT JOIN product_option as po ON po.ProductID = p.ProductID
                    LEFT JOIN categories as c ON c.CategoryID = p.CategoryID
                    LEFT JOIN image as i ON po.ProdOptionID = i.ProdOptionID AND i.defaultImg = 1
                    WHERE Bestseller = 1
                    GROUP BY p.ProductID";

                        $runBestsellers = mysqli_query($connection, $getBestsellers);

                        if (!$runBestsellers) {
                            die("Query failed: " . mysqli_error($connection));
                        } else {

                            while ($displayBestsellers = mysqli_fetch_array($runBestsellers)) {
                                echo "<div class='splide__slide'>
            <a href='Item.php?id={$displayBestsellers['ProdOptionID']}&category={$displayBestsellers['CategoryID']}&brand={$displayBestsellers['BrandName']}'>
            <div class='bs-item flex flex-col radius'>
            <img src='{$displayBestsellers['ImageURL']}' alt='{$displayBestsellers['ProductName']}'>
            <p class='overlay'><em>{$displayBestsellers['BrandName']}</em></p>
            <div class='bs-desc'>
                <p><strong>{$displayBestsellers['BrandName']}</strong><br>
                   <span class='bestseller-name'>{$displayBestsellers['ProductName']}</span><br>
                   £{$displayBestsellers['Price']}</p>
                    </div>
                </div></a>
            </div>";
                            }
                        }
                        ?>
                    </div>
                </div>
        </div>
        </section>
        </div>

        <div class="new flex flex-col" data-aos="fade-up" data-aos-duration="500">
            <div class="new-img-cont flex flex-col">
                <div class="flex harris-imgs">
                    <img src="images/products/candles/harris_seilebost.jpg" alt="Essence of Harris Seilebost">
                    <img src="images/products/candles/harris_losgaintir.jpg" alt="Essence of Harris Losgaintir">
                    <img src="images/products/candles/harris_horgabost.jpg" class="harris-hidden" alt="Essence of Harris Horgabost">

                </div>
                <div>
                    <img src="images/brands/harris2.jpg" class="harris" alt="Essence of Harris">
                </div>
            </div>

            <div class="new-info align">
                <h1><strong>New In Store</strong></h1>
                <p>Introducing our new range from Essence of Harris<br>The original Hebridean Soy Wax Candle Company.
                    They hand pour all of their own luxuriously scented candles and diffusers on the beautiful Isle of
                    Harris. </p>
            </div>
        </div>



        <!-- STATIC CONTENT ABOUT THE SHOP -->


        <div class="home-cafe" alt="No.56 Cafe">
            <div class="cafe-text" data-aos="flip-up" data-aos-duration="300">
                <h3>No. 56 Cafe</h3>
                <p>A dog friendly cafe serving up delicious savouries, sweets and fresh barista made coffee from Fife's
                    Forth Roasters</p>
                <a href="Cafe.php">
                    <p><em>View Our Menu</em></p>
                </a>
            </div>
        </div>


        <!-- FAQ's -->

        <!-- img on the left -->
        <div class="faq flex flex-col">
            <img src="images/gallery/exterior2.jpg" alt="Herringbone window display and outdoor seating" class="radius">
            <!-- accordion on the right -->
            <div class="accordion-cont flex flex-col">
                <div>
                    <div class="acc-border">
                        <div class="align faq-title">
                            <h2>FAQ's</h2>
                        </div>

                        <button class="accordion">Are you dog friendly?</button>
                        <div class="panel">
                            <p>Yes! We allow dogs in our shop downstairs, and the No.56 cafe upstairs. We love to
                                welcome dogs into our space while you enjoy browsing, or a coffee upstairs.</p>
                        </div>
                        <button class="accordion" >Are all of your products
                            Scottish?</button>
                        <div class="panel">
                            <p>We try our very best to support local artists and makers. We stock some of Scotlands most
                                well known brands such as Islander and Heathergems. </p>
                        </div>
                        <button class="accordion">Do you offer vegetarian/vegan/gluten free options?</button>
                        <div class="panel">
                            <p>Our cafe offers a wide selection of treats for vegetarians, vegans and those who are gluten free. We also have
                                various alternative milks available. If you are unsure of anything when ordering, please check with a member of staff.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </main>



    <footer>
        <div class="flex-center">
            <img src="images/cards.png" class="cards" alt="Cart Payments Accepted: Visa, Mastercard, American Express, PayPal">
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


    <div id="cookie-popup">
        <p>This site uses cookies to enhance your experience! View our <a href="CookiePolicy.php">Cookie Policy</a> to
            learn more.</p>
        <button id="cookie-accept">Got it!</button>
    </div>


    <script src="navigation.js"></script>
    <script>
        AOS.init({
            offset: 100,
            easing: 'ease-in-out',
            once: true
        });
    </script>
    <!-- script for accordion -->
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var splide = new Splide('.splide', {
                perPage: 4,
                loop: true,
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
    <!-- cookie pop up -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // get div and accept button
            const popup = document.getElementById('cookie-popup');
            const button = document.getElementById('cookie-accept');

            // store acceptance in local storage 
            const accepted = localStorage.getItem('cookieAccepted');
            console.log('cookieAccepted:', accepted);

            // base visibility of cookie pop up on acceptance or not
            if (!accepted) {
                console.log('No consent yet — showing popup');
                popup.classList.add('visible');
            } else {
                console.log('Consent already given — popup will remain hidden');
            }

            button.addEventListener('click', () => {
                console.log('Saving cookie consent');
                localStorage.setItem('cookieAccepted', 'true');
                popup.classList.remove('visible');
            });
        });
    </script>
</body>

</html>