<?php
include "connection.php";
include "Classes.php";


// statement used if search input was used on products page

//get query string paramters
// check if search is included in query string
$search = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$colour = isset($_GET['colour']) ? $_GET['colour'] : '';
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
$getProducts = "SELECT * FROM products as p
    LEFT JOIN product_option as po ON po.ProductID = p.ProductID
    LEFT JOIN image as i ON i.ProdOptionID = po.ProdOptionID
    LEFT JOIN brands as b ON p.BrandID = b.BrandID
    LEFT JOIN categories as c ON p.CategoryID = c.CategoryID
    WHERE po.isAvailable = 1";

if($search != ''){
    $getProducts .= " AND b.BrandName LIKE '%" . $search . "%'OR p.ProductName LIKE '%" . $search . "%'
    LIMIT 0, 25";
}

if ($category != '') {
    $getProducts .= " AND FIND_IN_SET(CategoryName, '" . $category . "')";
}
if ($colour != '') {
    // Appending the condition for colour
    $getProducts .= " AND FIND_IN_SET(colour, '" . $colour . "')";
}
if ($brand != '') {
    // Appending the condition for brand
    $getProducts .= " AND FIND_IN_SET(brandName, '" . $brand . "')";
}


/*if ($price != '')
{
    $getProducts .=  " AND price = '" . $price . "'";
}
*/



$runProducts = mysqli_query($connection, $getProducts);

//create array to store product objects
$products = [];

//loop through the products returned from SQL statement, and put them into array by using classes.php
$counter = 0;
while ($displayProducts = mysqli_fetch_assoc($runProducts)) {
    $product = new Product();
    $product->setName($displayProducts['ProductName']);
    $product->setPrice($displayProducts['Price']);
    $product->setDescription($displayProducts['Description']);
    $product->setImage($displayProducts['ImageURL']);
    $product->setBrand($displayProducts['BrandName']);

    $products[$counter] = $product;
    $counter++;
}

//send array of products back to products.php through json
echo json_encode($products);

?>