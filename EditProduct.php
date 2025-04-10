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
$itemID = $_GET['ProdOptionID'];

// update product - WORKING
if (isset($_POST['update'])) {
    $description = $connection->real_escape_string($_POST['Description']);

    $update = "UPDATE products AS p
    INNER JOIN product_option AS po ON p.ProductID = po.ProductID
    INNER JOIN brands AS b ON b.BrandID = p.BrandID
    INNER JOIN categories AS c ON c.CategoryID = p.CategoryID
    SET 
        p.ProductName = '$_POST[productName]', 
        p.Description = '{$description}',
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

    // echo "<script>alert('{$_POST['ProdOptionID']}')</script>";
    //  echo "<script>alert('{$_POST['ProductID']}')</script>";

    $delete = "DELETE FROM product_option WHERE ProdOptionID ='{$_POST['ProdOptionID']}'";
    $runDelete = mysqli_query($connection, $delete);
    // if (!$runDelete) {
    //     echo "<script>alert(Error in product_option query)</script>";
    // }

    $deleteProduct = "DELETE FROM products WHERE ProductID = '{$_POST['ProductID']}'";
    $runDeleteProduct = mysqli_query($connection, $deleteProduct);
    // if (!$runDeleteProduct) {
    //     echo "<script>alert(Error in products query)</script>";
    // }

    $deleteImages = "DELETE FROM image WHERE ProdOptionID = '{$_POST['ProdOptionID']}'";
    $runDeleteImages = mysqli_query($connection, $deleteImages);

    // get all image file paths in db that match the prod option ID -> to delete them from server
    $getAllImages = "SELECT * FROM image WHERE ProdOptionID = '$_POST[ProdOptionID]'";
    $runGetAllImages = mysqli_query($connection, $getAllImages);
    // this holds an array with imageID, imageURl, and ProdOptionID
    $allImages = [];
    while ($images = mysqli_fetch_assoc($runGetAllImages)) {
        // populating the above array - each row will be in the array
        $allImages[] = $images;
    }

    foreach ($allImages as $image) {
        //  ImageURL from the returned rows in DB
        $ImgfilePath = $image['ImageURL'];
        if (file_exists($ImgfilePath)) {
            if (unlink($ImgfilePath)) {
                echo "<script>alert('Image {$ImgfilePath} deleted successfully')</script>";
            } else {
                echo "<script>alert('Error deleting Image {$ImgfilePath}')</script>";
            }
        } else {
            echo "<script>alert('Image {$ImgfilePath} does not exist')</script>";
        }
    }

    // if (!$runDeleteImages) {
    //     echo "<script>alert(Error in this query)</script>";
    // }

    if ($runDeleteProduct && $runDelete && $runDeleteImages) {
        echo "<script>
                alert('Product Successfully Deleted');
                window.location.href = 'AdminProducts.php';
            </script>";
    } else {
        echo '<script>alert("Deletion Failed")</script>';
    }
}

// deleting images - WORKING
if (isset($_POST['deleteImage'])) {

    // if (!is_writable($filepath)) {
    //     echo "<script>alert('File is not writable. Check permissions.')</script>";
    // }

    // delete from server (file directory)
    $filepath = $_POST['hidden2'];
    // echo "<script>alert('{$filepath}')</script>";
    if (file_exists($filepath)) {
        // Delete the file
        if (unlink($filepath)) {
            echo "<script>alert(Image deleted from server successfully.)</script>";
        } else {
            echo "<script>alert(Error deleting the Image.)</script>";
        }
    } else {
        echo "<script>alert(The Image does not exist.)</script>";
    }

    // delete from database
    $deleteimg = "DELETE FROM image WHERE ImageID = $_POST[hidden]";
    $runDeleteImg = mysqli_query($connection, $deleteimg);
    if ($runDeleteImg) {
        echo '<script>alert("Image Successfully Deleted from Database.")</script>';
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
WHERE po.ProdOptionID = $itemID";
    $runItem = mysqli_query($connection, $getItem);
    while ($displayItem = mysqli_fetch_assoc($runItem)) {
        echo "<div>
        <form method='POST' class='edit-cont'>
            <input type='hidden' value='{$displayItem['ProdOptionID']}' name='ProdOptionID'>
            <input type='hidden' value='{$displayItem['ProductID']}' name='ProductID'>
            <div class='edit-prod-flex prod-title'>
                <label for='productName'>Product Name</label>
                <input type='text' placeholder='{$displayItem['ProductName']}' name='productName' value='{$displayItem['ProductName']}'>
            </div>
            <div class='edit-background radius'>
            <div class='edit-section1'>
             <div class='edit-prod-flex'>
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
                 <div class='edit-prod-flex'>
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
               
              <div class='edit-prod-flex'>
                <label for='colour'>Colour</label>
                <select name='Colour' id='colour'>";
                    $availableColors = ['Beige', 'Black', 'Blue', 'Brown', 'Crimson', 'Dark Blue', 'Dark Green', 'Forest Green', 'Gold', 'Gray', 'Green', 'Hot Pink', 'Ivory', 'Lavender', 'Light Blue', 'Light Pink', 'Lime Green', 'Navy', 'Orange', 'Pink', 'Plum', 
                'Purple', 'Red', 'Salmon', 'Silver', 'Tan', 'Taupe', 'Teal', 'White', 'Yellow'];
                    
                // loop through array, mark the item selected where the db matches the colour in the array
                    foreach ($availableColors as $color) {
                    $selected = ($color === $displayItem['Colour']) ? 'selected' : ''; 
                    echo "<option value='$color' $selected>$color</option>";
                    }
        echo "</select>
            </div>
               <div class='edit-prod-flex'>
                    <label for='Price'>Price</label>
                    <input type='text' placeholder='{$displayItem['Price']}' name='Price' value='{$displayItem['Price']}'>
                </div>
                 <div class='edit-prod-flex'>
                    <label for='description'>Product Description</label>
                    <textarea rows='4' name='Description'>"; echo htmlspecialchars($displayItem['Description']); echo "</textarea>
                </div>
                </div>
                <br>
                <br>
                <div class='edit-section2'>
                <div class='checks-cont'>
                <div class='edit-prod-flex checks'>
                    <label for='Availability'>Is this product Available?</label>
                    <div>
                    <input type='checkbox' id='Available0' name='Availability' value='0'";
        if ($displayItem['isAvailable'] == 0)
            echo 'checked>';
        echo "<label for='Availale0'>No</label>
                    <input type='checkbox' id='Available1' name='Availability' value='1'";
        if ($displayItem['isAvailable'] == 1)
            echo 'checked>';
        echo "<label for='Available1'>Yes</label>
            </div>
                </div>
                
                <div class='edit-prod-flex checks'>
                
                    <label for='Default'>Display as Default?</label>
                    <div>
                    <input type='checkbox' id='Default0' name='Default' value='0'";
        if ($displayItem['DefaultDisplay'] == 0)
            echo 'checked>';
        echo "<label for='Default0'>No</label>
                    <input type='checkbox' id='Default1' name='Default' value='1'";
        if ($displayItem['DefaultDisplay'] == 1)
            echo 'checked>';
        echo "<label for='Default1'>Yes</label>
            </div>
                </div>
                <div class='edit-prod-flex checks'>
                    <label for='Bestseller'>Bestseller?</label>
                    <div>
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
                </div>
                </div>
                </div>
               
               
                <div class='edit-buttons'>
                    <div class='flex update-delete-btns'>
                        <div>
                            <input name='update' type='submit' id='updateItem' value='Update Item' class='button confirmUpdate'>
                        </div>
                        <div>
                            <input name='delete' type='submit' id='deleteItem' value='Delete Item' class='confirmDelete button'>
                        </div>
                    </div>
                    <div class='flex update-delete-btns'>
                        <input name='showImages' type='submit' id='showImages' value='Show Images' class='button'>
                    </div>
                </div>


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
            <div class='edit-cont radius'>
            <div class='edit-imgs-cont radius'>
            <div>
                <form method='post' enctype='multipart/form-data' class='new-imgcont'>
                <p>Upload New Images</p>
                <label for='imageUpload'>
                    <input type='hidden' name='category' value='{$displayItem['CategoryName']}'>
                    <input type='hidden' name='prodOptionID' value='{$displayItem['ProdOptionID']}'>
                    <input type='file' accept='.jpg, .jpeg, .png' name='newImg' id='imageUpload'>
                    <input type='submit' name='uploadImg' value='Upload Image' class='button image-uploadBtn'>
                </form>
            </div>";

            $getImages = "SELECT c.CategoryID, c.CategoryName, i.ImageID, i.ImageURL, i.ProdOptionID, po.ProdOptionID, p.ProductID FROM image as i
        LEFT JOIN product_option as po ON i.ProdOptionID = po.ProdOptionID
        LEFT JOIN products as p ON p.ProductID = po.ProductID
        LEFT JOIN categories as c ON c.CategoryID = p.CategoryID
        WHERE po.ProdOptionID = $_POST[ProdOptionID]";
            $runImage = mysqli_query($connection, $getImages);


            echo "<div class='flex prod-imgs'>";
            while ($images = mysqli_fetch_assoc($runImage)) {
                echo "
                <div class='item-imgs'>
                <img src='{$images['ImageURL']}'>
                <form method='POST'>
                    <input type='hidden' name='hidden' value='{$images['ImageID']}'>
                    <input type='hidden' name='hidden2' value='{$images['ImageURL']}'>
                    <input type='submit' value='delete' id='deleteImage' name='deleteImage' class='button'>
                     
                </form>
             
            </div>";
            }
            echo "  </div>
            </div>";
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
                echo "<script>alert('Invalid file type. Only JPG, JPEG, and PNG are allowed.')</script>";
            }

            // Set maximum file size (2MB)
            $maxFileSize = 2 * 1024 * 1024;
            if ($file['size'] > $maxFileSize) {
                die("File size exceeds 2MB limit. Please upload a smaller file.");
            }

            // Upload image file to the database AFTER it has been uploaded to server
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {

                // query db to find out if there is already an image associated with the product option
                $checkDbImages = "SELECT * FROM image WHERE prodOptionID = $displayItem[ProdOptionID] AND defaultImg = 1";
                $runCheck = mysqli_query($connection, $checkDbImages);
                if (mysqli_num_rows($runCheck) > 0) {
                    $defaultImg = 0;
                } else {
                    $defaultImg = 1;
                }

                $insert = "INSERT INTO image (ImageURL, ProdOptionID, defaultImg) VALUES ('$targetFile', '$_POST[prodOptionID]', $defaultImg)";
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