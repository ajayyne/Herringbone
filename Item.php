<?php include 'connection.php';
// $_GET = id / category of item;
$itemCategory = 2;
?>
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
            <h1>Herringbone</h1>
        </div>
    </div>


    <main class="item-main">

        <div class="item-cont flex flex-col">
            <div class="item-img">
                <img src="images/products/candles/Skye_freshmint.png">
            </div>
            <div class="item-content">
                <h1>Wild Mint & Thyme Container Candle</h1>
                <h2>Skye Candle Company</h2>
                <div id="description-wrapper">
                    <p id="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et iaculis ante.
                        Nulla auctor turpis nec diam consectetur pulvinar. Quisque mattis ornare mauris non viverra.
                        Nunc lobortis pellentesque lectus, vel consectetur nisl sagittis vitae. Nam vestibulum ligula a
                        felis egestas pellentesque. Aenean dictum vel augue sed finibus. Sed sed nisi tortor.</p>
                </div>
                <em>
                    <p id="toggle-btn" onclick="toggleDescription()">See More...</p>
                </em>
                <br>

                <!-- only show if there are product options -->
                <div class="color-display flex">
                    <p>red</p>
                    <p>blue</p>
                </div>

                <div class="price-quant flex">
                    <div>
                        <p>£12.00</p>
                    </div>
                    <div>
                        <label for="quantity" class="quant-label">Quantity</label>
                        <input name="quantity" type="number" required min="1" max="5">
                    </div>
                </div>
                <div class="item-btn">
                    <button>ADD TO BASKET</button>
                </div>
            </div>
        </div>

        <em>
            <h3 class="recomend">You may also like...</h3>
        </em>

        <div class="splide-cont flex-center">
            <section class="splide" aria-label="Carousel">
                <div class="splide__track">
                    <div class="splide__list">

                        <?php
                        $getSimilar = "SELECT ProductName, BrandName, Price, ImageURL FROM products AS p
                LEFT JOIN brands as b ON b.BrandID = p.BrandID
                LEFT JOIN product_option as po ON po.ProductID = p.ProductID
                LEFT JOIN image as i ON po.ProdOptionID = i.ProdOptionID
                WHERE p.CategoryID = $itemCategory";
                        $runSimilar = mysqli_query($connection, $getSimilar);
                        while ($displaySimilar = mysqli_fetch_array($runSimilar)) {
                            echo "<div class='splide__slide'>
                                <div class='bs-item flex flex-col radius'>
                                    <img src='{$displaySimilar['ImageURL']}'>
                                    <p class='overlay'><em>{$displaySimilar['BrandName']}</em></p>
                                    <div class='bs-desc'>
                                        <p><strong>{$displaySimilar['BrandName']}</strong><br><span class='bestseller-name'>{$displaySimilar['ProductName']}</span><br>£{$displaySimilar['Price']}</p>
                                    </div>
                                </div>
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
    <script src="navigation.js"></script>
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
</body>

</html>