<?php
// count the number of items in the basket (cart array)
if (isset($_COOKIE['cart'])) {
    $cartCookie = json_decode($_COOKIE['cart'], true);
} else {
    $cartCookie = [];
}

if (is_array($cartCookie)) {
    $basketCount = count($cartCookie);
} else {
    $basketCount = 0;
}
?>