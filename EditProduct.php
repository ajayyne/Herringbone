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

// get item id
$itemID = $_GET['ProductID'];

// update product - WORKING
if (isset($_POST['update'])) {
    $update = "UPDATE products AS p
    INNER JOIN product_option AS po ON p.ProductID = po.ProductID
    INNER JOIN brands AS b ON b.BrandID = p.BrandID
    INNER JOIN categories AS c ON c.CategoryID = p.CategoryID
    SET 
        p.ProductName = '$_POST[productName]',
        p.Description = '$_POST[Description]',
        po.Colour = '$_POST[Colour]',
        po.isAvailable = '$_POST[Availability]',
        p.DefaultDisplay = '$_POST[Default]',
        p.Bestseller = '$_POST[Bestseller]',
        p.BrandID = '$_POST[Brand]',  
        p.CategoryID = '$_POST[Category]' 
    WHERE po.ProdOptionID = '$_POST[ProdOptionID]';";

    $runUpdate = mysqli_query($connection, $update);
    if ($runUpdate) {
        echo '<script>alert("Product Successfully Updated")</script>';
        header("Refresh:0");
    } else {
        echo '<script>alert("Update Failed")</script>';
    }
}

// delete product - WORKING
// delete from products, product_option, and image tables
if (isset($_POST['delete'])) {
    $delete = "DELETE FROM product_option WHERE ProdOptionID ='$_POST[ProdOptionID]'";
    $runDelete = mysqli_query($connection, $delete);

    $deleteProduct = "DELETE FROM products WHERE ProductID = '$_POST[ProductID]'";
    $runDeleteProduct =  mysqli_query($connection, $deleteProduct);

    $deleteImages = "DELETE FROM image WHERE ProdOptionID = '$_POST[ProdOptionID]'";
    $runDeleteImages = mysqli_query($connection, $deleteImages);
    if ($runDeleteProduct && $runDelete && $runDeleteImages) {
        // using js allows alert to appear before page re-direct
        echo"<script>
            alert('Product Successfully Deleted');
            window.location.href = 'AdminProducts.php';
        </script>";
    } else {
        echo '<script>alert("Deletion Failed")</script>';
    }
}

// deleting images - WORKING
if (isset($_POST['deleteImage'])) {

    // delete from server (file directory)
    $filepath = $_POST['hidden2'];
    if (file_exists($file_path)) {
        // Delete the file
        if (unlink($file_path)) {
            echo "Image deleted from server successfully.";
        } else {
            echo "Error deleting the Image.";
        }
    } else {
        echo "The Image does not exist.";
    }

    // delete from database
    $deleteimg = "DELETE FROM image WHERE ImageID = $_POST[hidden]";
    $runDeleteImg = mysqli_query($connection, $deleteimg);
    if ($runDeleteImg) {
        echo '<script>alert("Image Successfully Deleted")</script>';
        header("Refresh:0");
    } else {
        echo '<script>alert("Deletion Failed")</script>';
    }
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

    <!-- Delete Modal for Products -->
    <!-- <div id="productDeleteModal" class="modal">
         Inner content 
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Are you sure you want to delete this product?</p>
            <form method="POST" id="deleteProductForm">
                 pass product option id 
                <input type="hidden" name="ProdOptionID" id="ProdOptionID">
                <button type="button" class="close">Close</button>
                <button type="submit" id="confirmProductDeletion" name="deleteProduct">Delete</button>
            </form>
        </div>
    </div> -->

    <?php
    // get item details from db
    $getItem = "SELECT b.BrandName, b.BrandID, c.CategoryID, c.CategoryName, p.ProductID, po.ProdOptionID, p.ProductName, p.Description, po.Colour, po.isAvailable, p.Price, p.DefaultDisplay, p.Bestseller FROM product_option as po
LEFT JOIN products as p ON po.ProductID = p.ProductID
LEFT JOIN categories as c ON c.CategoryID = p.CategoryID
LEFT JOIN brands as b ON b.BrandID = p.BrandID
WHERE p.ProductID = $itemID";
    $runItem = mysqli_query($connection, $getItem);
    while ($displayItem = mysqli_fetch_assoc($runItem)) {
        echo "<div>
        <form method='POST'>
            <input type='hidden' value='{$displayItem['ProdOptionID']}' name='ProdOptionID'>
            <input type='hidden' value='{$displayItem['ProductID']}' name='ProductID'>
            <div>
                <label for='productName'>Product Name</label>
                <input type='text' placeholder='{$displayItem['ProductName']}' name='productName' value='{$displayItem['ProductName']}'>
            </div>
            <div>
                <label for='description'>Product Description</label>
                <input type='text' placeholder='{$displayItem['Description']}' name='Description' value='{$displayItem['Description']}'>
            </div>
            <div>
                <label for='colour'>Colour</label>
                <input type='text' placeholder='{$displayItem['Colour']}' name='Colour' value='{$displayItem['Colour']}'>
            </div>
            <div>
                <label for='Availability'>Is this product Available?</label>
                <input type='checkbox' id='Available0' name='Availability' value='0'";
        if ($displayItem['isAvailable'] == 0)
            echo 'checked>';
        echo "<label for='Availale0'>No</label>
                <input type='checkbox' id='Available1' name='Availability' value='1'";
        if ($displayItem['isAvailable'] == 1)
            echo 'checked>';
        echo "<label for='Available1'>Yes</label>
            </div>
            <div>
                <label for='Price'>Price</label>
                <input type='text' placeholder='{$displayItem['Price']}' name='Price' value='{$displayItem['Price']}'>
            </div>
            <div>
                <label for='Default'>Display as Default?</label>
                <input type='checkbox' id='Default0' name='Default' value='0'";
        if ($displayItem['DefaultDisplay'] == 0)
            echo 'checked>';
        echo "<label for='Default0'>No</label>
                <input type='checkbox' id='Default1' name='Default' value='1'";
        if ($displayItem['DefaultDisplay'] == 1)
            echo 'checked>';
        echo "<label for='Default1'>Yes</label>
            </div>
            <div>
                <label for='Bestseller'>Bestseller?</label>
                <input type='checkbox' id='Bestseller0' name='Bestseller' value='0'";
        if ($displayItem['Bestseller'] == 0)
            echo 'checked>';
        echo "<label for='Bestseller0'>No</label>
                <input type='checkbox' id='Bestseller1' name='Bestseller' value='1'";
        if ($displayItem['Bestseller'] == 1)
            echo 'checked>';
        echo "<label for='Bestseller1'>Yes</label>
            </div>
            <div>
                <label for='Category'>Category</label>
                <select type='text' placeholder='{$displayItem['CategoryName']}' name='Category' value='{$displayItem['CategoryID']}'>";
        $getCategories = "SELECT * FROM categories";
        $runCategories = mysqli_query($connection, $getCategories);
        while ($displayCategories = mysqli_fetch_assoc($runCategories)) {
            $selected = ($displayCategories['CategoryID'] == $displayItem['CategoryID']) ? 'selected' : ''; // Check if this category is currently selected
            echo "<option value='{$displayCategories['CategoryID']}' $selected>{$displayCategories['CategoryName']}</option>";
        }
        echo "
            </select>
            </div>
            <div>
                <label for='Brand'>Brand</label>
                <select type='text' placeholder='{$displayItem['BrandName']}' name='Brand' value='{$displayItem['BrandID']}'>";
        $getBrands = "SELECT * FROM brands";
        $runBrands = mysqli_query($connection, $getBrands);
        while ($displayBrands = mysqli_fetch_assoc($runBrands)) {
            $selected = ($displayBrands['BrandID'] == $displayItem['BrandID']) ? 'selected' : ''; // Check if this brand is currently selected
            echo "<option value='{$displayBrands['BrandID']}' $selected>{$displayBrands['BrandName']}</option>";
        }
        echo "
             </select>
            </div>
            <div>
                <input name='update' type='submit' id='updateItem' value='Update Item'>
            </div>
             <div>
                <input name='delete' type='submit' id='deleteItem' value='Delete Item' class='confirmDelete'>
            </div>
            <div>
                <input name='showImages' type='submit' id='showImages' value='Show Images'>
            </div>
        </form>
    </div>
    <br>
    <br>
    ";

        // images: upload
        // cycle through and print images
        if (isset($_POST['showImages']) && $_POST['ProdOptionID'] == $displayItem['ProdOptionID']) {

            // upload new image
            echo "
            <div>
                <form method='post' enctype='multipart/form-data'>
                <label for='imageUpload'>
                    <input type='hidden' name='category' value='{$displayItem['CategoryName']}'>
                    <input type='hidden' name='prodOptionID' value='{$displayItem['ProdOptionID']}'>
                    <input type='file' accept='.jpg, .jpeg, .png' name='newImg' id='imageUpload'>
                    <input type='submit' name='uploadImg' value='Upload Image'>
                </form>
            </div>";

            $getImages = "SELECT c.CategoryID, c.CategoryName, i.ImageID, i.ImageURL, i.ProdOptionID, po.ProdOptionID, p.ProductID FROM image as i
        LEFT JOIN product_option as po ON i.ProdOptionID = po.ProdOptionID
        LEFT JOIN products as p ON p.ProductID = po.ProductID
        LEFT JOIN categories as c ON c.CategoryID = p.CategoryID
        WHERE po.ProdOptionID = $_POST[ProdOptionID]";
            $runImage = mysqli_query($connection, $getImages);



            while ($images = mysqli_fetch_assoc($runImage)) {
                echo "<div class='item-imgs'>
                <img src='{$images['ImageURL']}'>
                <form method='POST'>
                    <input type='hidden' name='hidden' value='{$images['ImageID']}'>
                    <input type='hidden' name='hidden2' value='{$images['ImageURL']}'>
                    <input type='submit' value='delete' id='deleteImage' name='deleteImage'>
                </form>
            </div>";
            }
        }

        if (isset($_POST['uploadImg'])) {
            // Upload image to server and database:
            $targetDir = "images/products/" . strtolower($_POST['category']) . "/";

            $file = $_FILES['newImg'];
            $fileName = basename($file['name']);
            $targetFile = $targetDir . $fileName;

            // Check if the image already exists in the database
            $checkQuery = "SELECT * FROM image WHERE ImageURL = '$targetFile'";
            $result = $connection->query($checkQuery);

            if ($result->num_rows > 0) {
                $fileName = uniqid() . "_" . $fileName; // Append unique identifier
                $targetFile = $targetDir . $fileName;
            }

            // Check that uploaded file matches the allowed types
            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            if (!in_array($file['type'], $allowedTypes)) {
                die("Invalid file type. Only JPG, JPEG, and PNG are allowed.");
            }

            // Set maximum file size (2MB)
            $maxFileSize = 2 * 1024 * 1024;
            if ($file['size'] > $maxFileSize) {
                die("File size exceeds 2MB limit. Please upload a smaller file.");
            }

            // Upload image file to the database AFTER it has been uploaded to server
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                $insert = "INSERT INTO image (ImageURL, ProdOptionID, defaultImg) VALUES ('$targetFile', '$_POST[prodOptionID]', 0)";
                if ($connection->query($insert)) {
                    echo "<script>alert('Image successfully added.')</script>";
                } else {
                    echo "<script>alert('Error saving image to the database.')</script> ";
                }
            } else {
                die("Failed to move the uploaded file.");
            }
        }
    }

    ?>
    
    
    <!-- <script>
        // Get the modal element
        const productModal = document.getElementById('productDeleteModal');
        const closeButtons = document.querySelectorAll('.close');

        // Get all "Delete" buttons for products
        const deleteProductButtons = document.querySelectorAll('#deleteItem');

        // Open the modal and set the ProductID dynamically
        deleteProductButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default form submission
                const productOptionID = this.dataset.ProdOptionID; // Get ProductID from button's data attribute
                document.getElementById('productID').value = productOptionID; // Set ProductID in modal form
                productModal.style.display = "block"; // Show the modal
            });
        });

        // Close the modal when clicking close buttons
        closeButtons.forEach(button => {
            button.addEventListener('click', function () {
                productModal.style.display = "none"; // Hide the modal
            });
        });
    </script> -->
    <script>
document.querySelectorAll('.confirmDelete').forEach(button => {
    button.addEventListener('click', function (event) {
        const userConfirmed = confirm("Are you sure you want to delete this product?");
        if (!userConfirmed) {
            // if user cancels, dont submit form
            event.preventDefault();
        }
    });
});
     </script>
</body>

</html>