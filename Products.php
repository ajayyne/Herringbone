<?php
include "connection.php";
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
                    <div class="search-cont flex">
                        <input type="text" id="search" class="radius" name="search">
                        <i class="fa-solid fa-magnifying-glass searchIcon"></i>
                    </div>
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
                    <div class="search-cont flex">
                        <input type="text" id="deskSearch" class="radius" name="search">
                        <i class="fa-solid fa-magnifying-glass searchIcon"></i>
                    </div>
                    <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
                    <i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>
                </div>
            </div>
        </header>
        <div class="flex flex-center title">
            <h1>Herringbone</h1>
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
                    <button id="filterButton">FILTERS</button>
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
                                    <input type="radio" class="radio" value="<20" id="userInput" name="price">
                                    <p>Under £20</p>
                                </div>
                                <div class="flex colour">
                                    <input type="radio" class="radio" value="<30" id="userInput" name="price">
                                    <p>Under £30</p>
                                </div>
                                <div class="flex colour">
                                    <input type="radio" class="radio" value="<50" id="userInput" name="price">
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


        <!-- header of product page -->
        <div class="product-div flex">
            <div class="flex-center radius">
                <div class="product-div-info">
                    <h1>LOCALLY SOURCED</h1>
                    </br>
                    <p>Herringbone takes pride in sourcing local Scottish products, some which are handmade by talented
                        makers.<br>Herringbone takes pride in sourcing local Scottish products, some which are handmade
                        by talented makers.</p>
                </div>
                <img src="images/gallery/shop3.jpg">
            </div>
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

        document.addEventListener('DOMContentLoaded', () => {
            //search bar:
            const searchInput = document.getElementById("deskSearch");

            searchInput.addEventListener("keyup", function (event) {
                if (event.key === "Enter") {
                    let search = searchInput.value;
                    event.preventDefault();
                    clearFilters();
                    loadProducts(search);
                }
            });
        });

        //filters and categories are independant of eachother

        //HANDLE CATEGORIES FIRST:
        // Global scope for selected category
        let selectedCategory = "";

        document.addEventListener('DOMContentLoaded', () => {
            //get category containers
            const desktopContainer = document.querySelector('.categories-desk'); // Desktop container
            const mobileContainer = document.querySelector('.categories-mobile'); // Mobile container


            // Desktop container event listener
            if (desktopContainer) {
                desktopContainer.addEventListener('click', (event) => {
                    if (event.target.classList.contains('category')) {
                        //get content within the category (its value)
                        const category = event.target.innerText.trim();
                        //assign to selectedCategory parameter
                        selectedCategory = category;
                        //call product load again - with no other filters attached
                        loadProducts('', selectedCategory, '', '', '');
                    }
                });
            }

            // Mobile container event listener
            if (mobileContainer) {
                mobileContainer.addEventListener('click', (event) => {
                    if (event.target.classList.contains('category-mob')) {
                        const categoryMob = event.target.innerText.trim();
                        selectedCategory = categoryMob;
                        loadProducts('', selectedCategory, '', '', '');
                    }
                });
            }
        });

        // HANDLE FILTERS:
        function applyFilters() {
            //get all checkboxes
            const colourInputs = document.getElementsByClassName('colourCheckbox');
            let selectedColours = "";

            // Collect selected colours, loop through and get checked boxes
            for (let i = 0; i < colourInputs.length; i++) {
                if (colourInputs[i].checked) {
                    selectedColours += colourInputs[i].value + ",";
                }
            }

            // Remove trailing comma
            selectedColours = selectedColours.replace(/,$/, '');

            const brandInputs = document.getElementsByClassName('brandCheckbox');
            let selectedBrands = "";

            // Collect selected brands
            for (let i = 0; i < brandInputs.length; i++) {
                if (brandInputs[i].checked) {
                    selectedBrands += brandInputs[i].value + ",";
                }
            }
            selectedBrands = selectedBrands.replace(/,$/, '');

            // Call loadProducts with applied filters
            loadProducts('', selectedCategory, selectedColours, selectedBrands, '');
        }

        // Function to load products based on parameters
        function loadProducts(search = '', category = '', colour = '', brand = '', price = '') {
            // Build the request URL
            let requestUrl = 'getProducts.php';
            let queryString = '';

            //if search bar was used
            if(search !== ''){
                queryString += `search=${encodeURIComponent(search)}&`;
            }

            // Include category if clicked
            if (category !== '') {
                queryString += `category=${encodeURIComponent(category)}&`;
            }
      
            if (colour !== '') {
                queryString += `colour=${encodeURIComponent(colour)}&`;
            }
            if (brand !== '') {
                queryString += `brand=${encodeURIComponent(brand)}&`;
            }
            if (price !== '') {
                queryString += `price=${encodeURIComponent(price)}`;
            }

            // Remove trailing '&' from the querystring
            queryString = queryString.replace(/&$/, '');

             // Append filters to the request URL
             if (queryString !== '')
             {
                requestUrl = requestUrl + '?' + queryString;
             }
             
            // AJAX request to fetch products
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function () {
                const productList = JSON.parse(this.responseText);

                //get products container from HTML
                const container = document.getElementById('prod-container');

                // Clear the container - clears each time so that duplicate products are not shown
                container.innerHTML = '';

                // Populate container with product items
                if (productList.length > 0) {

                    productList.forEach((product) => {

                        // wrap each item in an a tag
                        const link = document.createElement('a');
                        link.setAttribute('href', 'Item.php?id=' + product.productID);
                        

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
                        cartButton.innerText = "ADD TO CART";
                        cartButton.classList.add('cart-btn');
                        productDiv.appendChild(cartButton);

                        container.appendChild(productDiv);
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

        function clearFiltersAndLoad()
        {
            clearFilters();
            loadProducts();
        }

        // Function to clear filters
        function clearFilters() {
            // Uncheck all checkboxes
            const colourCheckboxes = document.querySelectorAll('.colourCheckbox');
            const brandCheckboxes = document.querySelectorAll('.brandCheckbox');

            colourCheckboxes.forEach((checkbox) => (checkbox.checked = false));
            brandCheckboxes.forEach((checkbox) => (checkbox.checked = false));
        }

        // Attach clearFilters function to the "clear filters" button
        document.addEventListener('DOMContentLoaded', () => {
            const clearButton = document.getElementById('clearFilters');
            if (clearButton) {
                clearButton.addEventListener('click', clearFiltersAndLoad);
            }
        });

        // The first initial load of products with no filters
        //search, category, colour, brand, price parameters initially empty
        loadProducts();
    </script>

    <!-- navigation script -->
    <script>
        document.getElementById('toggle').addEventListener('click', function () {
            const border = document.querySelector('.header');
            border.classList.toggle('shrink'); // Add or remove the 'shrink' class
        });
    </script>
    <script src="navigation.js"></script>
    <script src="filters.js"></script>
</body>

</html>