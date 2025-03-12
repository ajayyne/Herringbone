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
                    <li><a href="Contact.html">Contact Us</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="search-cont flex">
                        <input type="text" id="search" class="radius">
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
                    <li><a href="Contact.html">CONTACT US</a></li>
                </ul>
                <div class="icons icons-desk flex flex-even">
                    <div class="search-cont flex">
                        <input type="text" id="search" class="radius">
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
        <!-- generate filters using php/sql -->
        <div class="filter-cont flex flex-col">
            <button id="filterButton">FILTERS</button>
            <div class="filters flex flex-even" id="filters">
                <div class="filtersColours flex flex-col">
                    <div>
                        <p><em>COLOUR</em></p>
                    </div>
                    <div class="colours flex flex-even">
                    <?php
                        //get all current colours, brands and prices stored in database
                        $getColours = "SELECT Colour FROM product_option";
                        //render out colours where colour column has a value
                        $runColours = mysqli_query($connection, $getColours);
                        //create counter to make unique id for each input below
                        $idCounter = 0;
                        while($displayColours = mysqli_fetch_assoc($runColours)){
                            if($displayColours['Colour'] != ''){
                            echo "<div class='flex colour'>
                                    <input type='checkbox' class='radio colourCheckbox' value='{$displayColours['Colour']}' id='chkColour" .  $idCounter . "'>
                                    <p>{$displayColours['Colour']}</p>
                                </div>";
                                $idCounter ++;
                            }
                        }
                    ?>
                    </div>
                </div>
                <div class="filtersBrands flex flex-col">
                    <div>
                        <p><em>BRAND</em></p>
                    </div>
                    <div class="brands flex flex-even">
                        <?php
                        $getBrands = "SELECT BrandName FROM brands";
                        $runBrands = mysqli_query($connection, $getBrands);
                        $idCounter = 0;
                        while($displayBrands = mysqli_fetch_assoc($runBrands)){
                            echo "<div class='flex flex colour'>
                            <input type='checkbox' class='radio brandCheckbox' value='{$displayBrands['BrandName']}' id='chkBrand" .  $idCounter . "'>
                            <p>{$displayBrands['BrandName']}</p>
                        </div>";
                        $idCounter ++;
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
                            <input type="radio" class="radio" value="<20" id="userInput">
                            <p>Under £20</p>
                        </div>
                        <div class="flex colour">
                            <input type="radio" class="radio" value="<30" id="userInput">
                            <p>Under £30</p>
                        </div>
                        <div class="flex colour">
                            <input type="radio" class="radio" value="<50" id="userInput">
                            <p>Under £50</p>
                        </div>
                    </div>
                </div>
                <div class="filterButtons flex flex-even">
                    <button id="clearFilters">Clear All</button>
                    <button id="applyFilters" onclick="applyFilters()">Apply Filters</button>
                </div>
            </div>


            <!-- CATEGORIES - IMPORT FROM PHP -->
            <div class="categories-desk">
                <p class="category">CANDLES</p>
                <p class="category">GLASSWARE</p>
                <p class="category">ACCESSORIES</p>
                <p class="category">HOME DECOR</p>
                <p class="category">BATH & BODY</p>
            </div>
        </div>


        <div class="prod-display" id="prod-container">

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
        //function runs when 'Apply Filters' is clicked
        function applyFilters(){
            //holds all colour inputs in an array
            const colourInputs = document.getElementsByClassName('colourCheckbox');
            //create string variable to hold query string
            let selectedColours = "";
            //loop through colour inputs
            let i = 0;
            for(i=0;i<colourInputs.length;i++){
                let colour = colourInputs[i];
                //if colour is selected, add it to query string
                if(colour.checked){
                    selectedColours += colour.value + ",";
                }
            }

            //trim off ',' at the end of the query string.
            // The comma needs trimmed off of the query string
            selectedColours = selectedColours.replace(/,$/, '');

            const brandInputs = document.getElementsByClassName('brandCheckbox');
            let selectedBrands = "";
            for(i=0;i<brandInputs.length;i++){
                let brand = brandInputs[i];
                if(brand.checked){
                    selectedBrands += brand.value + ",";
                }
            }
            //call loadProducts to re-load the products with applied filters
            loadProducts(selectedColours, selectedBrands, '');
        }



        function loadProducts(colour, brand, price){

            //AJAX request
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function () {
                //parse array of products
                //productList contains an array of products + all their info
                const productList =
                    JSON.parse(this.responseText);


                const Container = document.getElementById('prod-container');
                Container.innerHTML = '';


                //loop through each product object in the array
                for (let i = 0; i < productList.length; i++) {
                    // Create a div for each product
                    const productDiv = document.createElement('div');
                    productDiv.classList.add('product', 'radius');

                    //create image element
                    const imgElement = document.createElement('img');
                    imgElement.setAttribute('src', productList[i].Image);
                    imgElement.setAttribute('alt', productList[i].Name);
                    imgElement.classList.add('radius')

                    //append image element to parent container (productDiv)
                    productDiv.appendChild(imgElement);

                    //create product name element
                    const nameElement = document.createElement('h6');
                    productDiv.appendChild(nameElement);
                    //setting product name inside of nameElement
                    nameElement.innerHTML = productList[i].Name;

                    //create brand name element
                    const brandElement = document.createElement('p');
                    productDiv.appendChild(brandElement);
                    brandElement.innerHTML = productList[i].Brand;

                    //create description paragraph
                    const priceElement = document.createElement('p');
                    priceElement.innerHTML = productList[i].Price;
                    productDiv.appendChild(priceElement);

                    // Create and append description
                    const descriptionElement = document.createElement('p'); 
                    descriptionElement.innerHTML = productList[i].Description; 
                    descriptionElement.classList.add('limited-lines');
                    //appending to parent container
                    productDiv.appendChild(descriptionElement); 

                    // Append the individual product div to the parent - Container
                    Container.appendChild(productDiv);
                }

            }

            //Build request URL, based on the parameters passed to this function
            //example request might be something like getProducts.php?colour=red&brand=nike&price=&lt;15
            let requestUrl = 'getProducts.php';

            if (colour != '' || brand != '' || price != '')
            {
                requestUrl += '?';
            }

            if (colour != '')
            {
                requestUrl += 'colour=' + colour + '&';
            }

            if (brand != '')
            {
                requestUrl += 'brand=' + brand + '&';
            }

            if (price != '')
            {
                requestUrl += 'price=' + price;
            }

      
            xmlhttp.open("GET", requestUrl);
            xmlhttp.send();
        }
        //call function on load
        loadProducts('', '', '');
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