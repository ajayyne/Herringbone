<?php
include "connection.php";

// Fetch favorites from cookie
if (isset($_COOKIE['favorites'])) {
   // echo $_COOKIE['favorites'];
    $favoritesCookie = json_decode($_COOKIE['favorites'], true);
    echo('x:' . $_COOKIE['favorites'] . 'end');
} else {
    // If there's no cookie set, return an empty array
    $favoritesCookie = [];
}

// Fetch the favorite products
$favoriteItems = getFavoriteProducts($favoritesCookie);

// Ensure $favorites is an array to avoid warnings
if (!is_array($favoritesCookie)) {
    $favoriteItems = []; // Fallback to an empty array
}

// Get the favorite item details from DB
function getFavoriteProducts($favIds) {
    global $connection;

    // If there are no favorites, return an empty array
    if (empty($favIds)) {
        return [];
    }

    // Sanitize and prepare the favorite IDs
    $FaveIds = implode(',', array_map('intval', $favIds));
    $getFavorites = "SELECT * FROM product_option as po
        LEFT JOIN Products as p ON po.ProductID = p.ProductID
        WHERE ProdOptionID IN ($FaveIds)";
         
    echo "Favorite IDs: {$favIds[0]}"; //array
    echo $FaveIds; //0
    

    // Execute the query and add error checking
    $favoriteItems = mysqli_query($connection, $getFavorites);
    if (!$favoriteItems) {
        echo "SQL Error: " . mysqli_error($connection);
        return []; // Return an empty array on error
    }

    // Fetch all results and return them
    return mysqli_fetch_all($favoriteItems, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites</title>
</head>

<body>
    <h1>Your Favorites</h1>
    <div class="product-list">
        <?php 
        foreach ($favoriteItems as $product) {
            echo "<div class='product-item'>
                <h3>{$product['ProductName']}</h3>
                <p>Brand:{$product['BrandName']}</p>
                <p>Price:{$product['Price']}</p>
                <button class='favorite-btn' data-id='{$product['ProductID']}'>
                    <span class='heart-icon'>❤️</span> Add to Favorites
                </button>
                </div>";
        }
        ?>



    </div>
    <script src="favorites.js"></script>
</body>

</html>