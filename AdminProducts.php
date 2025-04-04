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
    <main>

        <a href="NewProduct.php"><button>Add New Product</button></a>

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
                        link.setAttribute('href', 'EditProduct.php?ProductID=' + product.productID);


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

</body>