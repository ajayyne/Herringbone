<?php
session_start();
include "connection.php";
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
                    <div class="search-cont flex">
                        <input type="text" id="search" class="radius" name="search">
                        <i class="fa-solid fa-magnifying-glass mobileSearch" id="mobileSearch"></i>
                    </div>

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
            <div class="desk-nav">

                <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="Products.php">SHOP</a></li>
                    <li><a href="Gallery.php">GALLERY</a></li>
                    <li><a href="cafe.php">CAFE</a></li>
                    <li><a href="Contact.php">CONTACT US</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="search-cont flex">
                        <input type="text" id="deskSearch" class="radius" name="search">
                        <i class="fa-solid fa-magnifying-glass searchIcon" id="searchIcon"></i>
                    </div>

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




        <div id="info-container">

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
    <script>

        // Function to load products based on parameters
        function loadProducts(search = '', category = '', colour = '', brand = '', price = '') {

            let requestUrl = generateGetproductsURL(search, category, colour, brand, price);

            // AJAX request to fetch products
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function () {
                const productList = JSON.parse(this.responseText);


                const infoCont = document.getElementById('info-container');
                infoCont.innerHTML = '';

                infoCont.classList.add('product-div', 'flex')
                const innerInfo = document.createElement('div');
                innerInfo.classList.add('radius', 'flex-center');
                infoCont.appendChild(innerInfo);
                const Info = document.createElement('div');
                Info.classList.add('product-div-info');
                innerInfo.appendChild(Info);

                const infoImage = document.createElement('img');
                innerInfo.appendChild(infoImage);
          
                if (category) {
                    let descriptionText = "<h1>" + category + "</h1><br><p>";
                   
                    switch (category.toLowerCase()) {
                        case "bags":
                            descriptionText += "Explore our stylish bag collection, featuring designs that effortlessly blend functionality and fashion. Whether you're seeking a chic tote for everyday errands or a sleek backpack for your adventures, our curated selection has something for everyone. Crafted from high-quality materials, each bag is designed to enhance your style while providing ample space and organization for all your essentials.";
                            break;
                        case "candles":
                            descriptionText += "Discover our enchanting candle collection, where each hand-poured creation is designed to transform your space with warmth and light. From soothing lavender to invigorating citrus, our diverse range of scents caters to every mood and occasion. Explore beautifully crafted candles in elegant containers that not only elevate your decor but also make the perfect gift for any candle lover.";
                            break;
                        case "cards":
                            descriptionText += "Browse our delightful collection of cards, perfect for every occasion and sentiment. From heartfelt greetings to whimsical designs, each card is crafted with care to help you express your thoughts in a meaningful way. Whether you're celebrating a birthday, sending love, or offering thanks, our unique selection ensures you’ll find the ideal card to make every message special.";
                            break;
                        case "scarves":
                            descriptionText += "Explore our luxurious scarf collection, where elegance meets versatility in every piece. From cozy knits for chilly days to lightweight wraps for layering, our diverse range of colors and patterns allows you to express your unique style effortlessly. Perfect for any occasion, these scarves are the ultimate accessory to enhance your outfit while providing warmth and comfort.";
                            break;
                        case "art prints":
                            descriptionText += "Immerse yourself in our stunning collection of art prints, designed to inspire and elevate your living space. Featuring a variety of styles, from modern abstracts to timeless classics, each print is carefully curated to bring vibrant colors and captivating imagery to your walls. Transform your home or office with these beautiful pieces that add a touch of creativity and personality to any environment.";
                            break;
                        case "home decor":
                            descriptionText += "Discover our exquisite home décor collection, where style meets comfort to elevate any living space. From elegant wall art and plush textiles to unique decorative accents, each piece is thoughtfully curated to add personality and charm to your home. Transform your environment with our diverse assortment and let your style shine through every detail.";
                            break;
                        case "jewellery":
                            descriptionText += "Browse our exquisite jewelry collection, where timeless elegance meets contemporary design. From delicate necklaces to statement earrings, each piece is crafted with precision and care, ensuring a perfect fit for any occasion. Whether you're treating yourself or searching for the ideal gift, our stunning selection offers something special to elevate every outfit and celebrate personal style.";
                            break;
                        default:
                            break;
                    }


                    + "</p>";

                    "";
                    Info.innerHTML = descriptionText;

                    infoImage.src = "images/categoryimg/" + category + ".png";

                } else {
                    Info.innerHTML = "<h1>Uniquely Scottish</h1><br><p>We stock a wide selection of authentic Scottish gifts that celebrate the rich culture and heritage of the region. From traditional Scottish tartan bags to exquisite artisan jewelry and home decor, every item tells a story of Scotland's vibrant traditions. Whether you’re seeking the perfect souvenir or a special gift, we offer a delightful experience that truly embodies the spirit of Scotland.</p>";
                    infoImage.src = "images/categoryimg/default.jpg";
                }


                //get products container from HTML
                const container = document.getElementById('prod-container');

                // Clear the container - clears each time so that duplicate products are not shown
                container.innerHTML = '';

                // Populate container with product items
                if (productList.length > 0) {

                    productList.forEach((product) => {


                        if (product.availability == 1) {
                            // wrap each item in an a tag

                            const link = document.createElement('a');
                            link.setAttribute('href', 'Item.php?id=' + product.prodOptionID + '&category=' + product.Category + '&brand=' + product.Brand);


                            const productDiv = document.createElement('div');
                            productDiv.classList.add('product', 'radius');
                            productDiv.appendChild(link);

                            const imgElement = document.createElement('img');
                            imgElement.setAttribute('src', product.Image);
                            imgElement.setAttribute('alt', product.Name);
                            imgElement.classList.add('radius');
                            productDiv.appendChild(imgElement);
                            link.appendChild(imgElement);

                            const nameElement = document.createElement('h6');
                            nameElement.innerText = product.Name;
                            nameElement.classList.add('truncate');
                            productDiv.appendChild(nameElement);

                            const priceHolder = document.createElement('div');
                            priceHolder.classList.add('price-holder');

                            const brandElement = document.createElement('p');
                            brandElement.innerText = product.Brand;
                            priceHolder.appendChild(brandElement);
                            brandElement.classList.add('product-brand');


                            const priceElement = document.createElement('p');
                            priceElement.innerText = '£' + product.Price;
                            priceElement.classList.add('price');
                            priceHolder.appendChild(priceElement);

                            productDiv.appendChild(priceHolder);

                            const cartButton = document.createElement('button');
                            cartButton.innerText = "ADD TO BASKET";
                            cartButton.classList.add('cart-btn');
                            cartButton.setAttribute('data-id', product.prodOptionID);
                            productDiv.appendChild(cartButton);

                            container.appendChild(productDiv);
                        }
                    });
                } else {
                    container.innerHTML = '<p>No products found.</p>';
                }
            };

            //error message
            xmlhttp.onerror = function () {
                console.error("Failed to load products.");
            };

            xmlhttp.open("GET", requestUrl, true);
            xmlhttp.send();
        }
        // search query string for 'category', if it doesnt exist -> call loadProducts with no params
        const url = window.location.href;
        const urlObj = new URL(url);
        const params = new URLSearchParams(urlObj.search);
        const paramValue = params.get('category');

        console.log(paramValue);
        if (paramValue === null) {
            loadProducts();
        } else {
            loadProducts('', paramValue);
        }
    </script>
    <script src="cart.js"></script>
</body>

</html>