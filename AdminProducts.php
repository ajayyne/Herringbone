<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: Home.php");
    exit;
}

if (empty($_SESSION['ID']) || $_SESSION['ID'] === null) {
    header("Location: Home.php");
    exit;
}
// get admin ID
$userID = $_SESSION['ID'];
// get username from this
$getusername = "SELECT userName FROM adminpanel WHERE adminID = $userID";
$runusername = mysqli_query($connection, $getusername);
$username = mysqli_fetch_array($runusername);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herringbone</title>
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.png">
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.png">
    <meta name="description"
        content="Herringbone is an independantly owned gift shop and cafe located in Peebleshire, stocking handmade and locally sourced unique gifts...">
    <meta name="author" content="Amber Degner-Budd">
    <meta name="keywords"
        content="Gift shop, Cafe, Scottish gifts, Handmade, Locally sourced, Scottish makers, Local makers">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/504c189bcb.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="navbar">
        <button class="hamburger" id="hamburger">
            &#9776;
        </button>

        <div class="user flex">
            <i class="fa-solid fa-user user-icon" style="color: #ffffff;"></i>
            <?php echo "<p class='user-display'>Hi,  {$username['userName']}</p>"; ?>
        </div>

    </div>
    <nav class="sidebar" id="sidebar">
        <button class="close-btn" id="close-btn">&times;</button>
        <ul>
            <li><a href="AdminPanel.php">Home</a></li>
            <li><a href="AdminProducts.php">All Products</a></li>
            <li><a href="AdminBrands.php">Brands</a></li>
            <li><a href="AdminOrders.php">Manage Orders</a></li>
            <br>
            <div class="flex logout">
                <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>
                <li><a href="logout.php" id="logout">Log Out</a></li>
            </div>
        </ul>
    </nav>
    <main>

        <div class="admin-page-title">
            <h1>All Products</h1>
         
            <a href="NewProduct.php"><button class="new-btn">Add New Product</button></a>
           

        </div>

        <?php



        // mobile search
        echo " <div class='search-cont flex mobile-searchbar'>
                        <input type='text' id='search' class='radius' name='search'>
                        <i class='fa-solid fa-magnifying-glass mobileSearch' id='mobileSearch'></i>
                    </div>";
        // desktop search
        echo " 
                    <div class='search-cont flex desktop-searchbar'>
                        <input type='text' id='deskSearch' class='radius' name='search'>
                        <i class='fa-solid fa-magnifying-glass searchIcon' id='searchIcon'></i>
                    </div>";

        echo "

         <div class='filter-main'>
            <div class='filter-cont flex'>
                <div class='filter-btn-container'>
                    <input type='checkbox' id='toggleCheckbox' style='display: none;'>
                    <label for='toggleCheckbox' id='filterButton'>
                        FILTERS
                        <img src='images/icons/arrow-down.png' class='arrow-down' id='arrow' alt='arrow down'>
                    </label>
                </div>

        <div class='filters-mob'>
                    <div class='filters' id='filters'>
                        <div class='filtersColours flex'>
                            <div>
                                <p><em>COLOUR</em></p>
                            </div>
                            <div class='colours flex'>";

        //get all current colours, brands and prices stored in database
        $getColours = "SELECT Colour FROM product_option GROUP BY Colour ORDER BY Colour ASC";
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
            }
            $idCounter++;
        }
        echo "
                                
                            </div>
                        </div>
                        <div class='filtersBrands flex'>
                            <div>
                                <p><em>BRAND</em></p>
                            </div>
                            <div class='brands flex'>";

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

        echo "
                                
                             
                            </div>
                        </div>
                        <div class='filterButtons flex flex-even'>
                            <button id='clearFilters'>Clear All</button>
                            <button id='applyFilters' onclick='applyFilters()'>Apply Filters</button>
                        </div>
                        </div>
                        
                    </div>
                </div>
                 </div>
        </div>";

        echo "<div id='prod-container'></div>";
        ?>

    </main>
    <script src="products.js"></script>
    <script>

        // Function to load products based on parameters
        function loadProducts(search = '', category = '', colour = '', brand = '', price = '') {

            let requestUrl = generateGetproductsURL(search, category, colour, brand, price);

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
                        link.setAttribute('href', 'EditProduct.php?ProdOptionID=' + product.prodOptionID);


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

                        // const brandElement = document.createElement('p');
                        // brandElement.innerText = product.Brand;
                        // priceHolder.appendChild(brandElement);
                        // brandElement.classList.add('product-brand');




                        productDiv.appendChild(priceHolder);

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
<script>
    const button = document.getElementById('filterButton');
const filters = document.getElementById('filters');

button.addEventListener('click', function() {
    // Check if the filter div is visible
    if (filters.style.maxHeight === "0px" || filters.style.maxHeight === "") {
        // Make the filter div visible
        filters.style.display = "flex";
        // Set overflow to visible to show content 
        filters.style.overflow = "visible"; 
        filters.style.maxHeight = filters.scrollHeight + 'px'; 
    } else {
        // Set overflow to hidden before collapsing
        filters.style.overflow = "hidden"; 
        // Set to 0 to close
        filters.style.maxHeight = "0px"; 

        // Wait for the transition to end before hiding completely
        filters.addEventListener('transitionend', function onTransitionEnd() {
            filters.style.display = "none"; 
            filters.removeEventListener('transitionend', onTransitionEnd); 
        });
    }
});

</script>
<script src="AdminNav.js"></script>

</body>