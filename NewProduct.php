<!-- ensure re-direct is set if admin is not logged in -->
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
    <main class="edit-cont">
        <h1>New Product</h1>
        <div>
            <form method="POST" enctype='multipart/form-data' class="edit-background edit-cont">
                <div class="edit-section1">
                    <div class="edit-prod-flex">
                        <label for="ProductName">Product Name</label>
                        <input type='text' name='ProductName' placeholder='Product Name' required>
                    </div>
                    <div class="edit-prod-flex">
                        <label for="ProductDescription">Description</label>
                        <input type='text' name='ProductDescription' placeholder='A description of the product'
                            required>
                    </div>
                    <div class="edit-prod-flex">
                        <label for="Price">Price</label>
                        <input type='number' step="0.01" name='ProductPrice' placeholder='£00.00' required>
                    </div>
                    <div class="edit-prod-flex">
                        <label for="Colour">Colour</label>
                        <select name="Colour" id="Colour">
                            <?php
                            $availableColors = [
                                '',
                                'Beige',
                                'Black',
                                'Blue',
                                'Brown',
                                'Crimson',
                                'Dark Blue',
                                'Dark Green',
                                'Forest Green',
                                'Gold',
                                'Gray',
                                'Green',
                                'Hot Pink',
                                'Ivory',
                                'Lavender',
                                'Light Blue',
                                'Light Pink',
                                'Lime Green',
                                'Navy',
                                'Orange',
                                'Pink',
                                'Plum',
                                'Purple',
                                'Red',
                                'Salmon',
                                'Silver',
                                'Tan',
                                'Taupe',
                                'Teal',
                                'White',
                                'Yellow'
                            ];
                            foreach ($availableColors as $color) {

                                $selected = ($color === $displayItem['Colour']) ? 'selected' : '';
                                echo "<option value='$color' $selected>$color</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <?php

                    echo "<div class='edit-prod-flex'>
                    <label for='Brand'>Brand</label>
                    <select type='text' name='Brand'>";
                    $getBrands = "SELECT * FROM brands";
                    $runBrands = mysqli_query($connection, $getBrands);
                    while ($displayBrands = mysqli_fetch_assoc($runBrands)) {
                        echo "<option value='{$displayBrands['BrandID']}'>{$displayBrands['BrandName']}</option>";
                    }
                    echo "
                    </select>
                    </div>

                    <div class='edit-prod-flex'>
                    <label for='Category'>Category</label>
                    <select type='text' name='Category'>";
                    $getCategories = "SELECT * FROM categories";
                    $runCategories = mysqli_query($connection, $getCategories);
                    while ($displayCategories = mysqli_fetch_assoc($runCategories)) {
                        echo "<option value='{$displayCategories['CategoryID']}'>{$displayCategories['CategoryName']}</option>";
                    }
                    echo "
                </select>
                </div>
            </div>

            <div class='edit-section2'>
            
              <div class='edit-prod-flex first-check'>
                <label for='Availability'>Is this product Available?</label>
                <div class='checks'>
                    <input type='checkbox' id='Available0' name='Availability' value='0'";
                    echo "<label for='Availale0'>No</label>
                    <input type='checkbox' id='Available1' name='Availability' value='1'";
                    echo "<label for='Available1'>Yes</label>
                </div>
            </div>
            
            <div class='edit-prod-flex'>
                <label for='Default'>Display as Default?</label>
                <div class='checks'>
                    <input type='checkbox' id='Default0' name='Default' value='0'";
                    echo "<label for='Default0'>No</label>
                    <input type='checkbox' id='Default1' name='Default' value='1'";
                    echo "<label for='Default1'>Yes</label>
                </div>
            </div>
            
            <div class='edit-prod-flex'>
                <label for='Bestseller'>Bestseller?</label>
                <div class='checks'>
                    <input type='checkbox' id='Bestseller0' name='Bestseller' value='0'";
                    echo "<label for='Bestseller0'>No</label>
                    <input type='checkbox' id='Bestseller1' name='Bestseller' value='1'";
                    echo "<label for='Bestseller1'>Yes</label>
                </div>
            </div>";


                    ?>

                    <br>
                    <input type='file' required multiple accept='.jpg, .jpeg, .png' name='files[]' id='imageUpload'
                        class="new-prod-img">
                    <input type='submit' name='submitProduct' value="Add Product" class="button new-prod-btn">
                </div>
            </form>
        </div>

        <?php
        // handle image upload for new product AND insert new product to DB
        if (isset($_POST['submitProduct'])) {
            $description = $connection->real_escape_string($_POST['ProductDescription']);


            // query to find category name that matches the selected category ID from form post
            $getCategoryName = "SELECT c.CategoryID, c.CategoryName FROM categories as c WHERE c.CategoryID = '{$_POST['Category']}'";
            $runGetCategoryName = mysqli_query($connection, $getCategoryName);
            $categoryInfo = mysqli_fetch_assoc($runGetCategoryName);

            // Set the file directory for the image
            $targetDir = "images/products/" . strtolower($categoryInfo['CategoryName']) . "/";

            // Check if the directory exists, and if not, create it
            if (!file_exists($targetDir)) {
                // Create the directory with appropriate permissions (0777 or a more restrictive mode)
                if (!mkdir($targetDir, 0777, true)) {
                    die("Failed to create directory: $targetDir");
                }
            }

            $file = $_FILES['files'];
            $fileCount = count($file['name']);

            // insert product to products table:
            $productInsert = "INSERT INTO products (CategoryID, BrandID, ProductName, Description, Price, DefaultDisplay, Bestseller) VALUES ($_POST[Category], $_POST[Brand], '$_POST[ProductName]', '{$description}', '$_POST[ProductPrice]', $_POST[Default], $_POST[Bestseller])";
            $runProductInsert = mysqli_query($connection, $productInsert);
            $ProductID = $connection->insert_id;

            // insert into product options table
            $productOptionInsert = "INSERT INTO product_option (ProductID, Colour, isAvailable) VALUES ($ProductID, '$_POST[Colour]', $_POST[Availability])";
            $runProductOptionInsert = mysqli_query($connection, $productOptionInsert);
            $prodOptionID = $connection->insert_id;

            // loop through images -> to assign the first image in loop defaultImg = 1 (true) and the rest 0 (false)
            for ($i = 0; $i < $fileCount; $i++) {
                $fileName = basename($file['name'][$i]);
                $fileType = $file['type'][$i];
                $fileSize = $file['size'][$i];
                $tmpName = $file['tmp_name'][$i];
                // specific to the product category
                $targetFile = $targetDir . $fileName;

                // Check file type
                $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!in_array($fileType, $allowedTypes)) {
                    die("Invalid file type for $fileName. Only JPG, JPEG, and PNG are allowed.");
                }

                // Set maximum file size (2MB)
                $maxFileSize = 2 * 1024 * 1024; // 2 MB
                if ($fileSize > $maxFileSize) {
                    die("File size exceeds 2MB limit for $fileName.");
                }

                // Query db to check if the file already exists
                $checkQuery = "SELECT * FROM image WHERE ImageURL = '$targetFile'";
                $result = $connection->query($checkQuery);

                // adding unique id to images if they already exist - to ensure no overrides
                if ($result->num_rows > 0) {
                    $fileName = uniqid() . "_" . $fileName;
                    $targetFile = $targetDir . $fileName;
                }

                // Insert into images table
                if (move_uploaded_file($file['tmp_name'][$i], $targetFile)) {
                    // defaultImg = 1 for the first file, defaultImg = 0 for the rest
                    $defaultImg = ($i === 0) ? 1 : 0;

                    $insertImage = "INSERT INTO image (ImageURL, ProdOptionID, defaultImg) VALUES ('$targetFile', $prodOptionID, $defaultImg)";
                    $runInsertImage = mysqli_query($connection, $insertImage);
                } else {
                    die("Failed to move the uploaded file.");
                }



                echo "<script>
                alert('Product Successfully Uploaded');
                window.location.href = 'AdminProducts.php';
                </script>";
            }
        }
        ?>


    </main>
    <!-- limits the number of images allowed to upload -->
    <script>
        $(function () {
            $("input[type = 'submit']").click(function () {
                var $fileUpload = $("input[type='file']");
                if (parseInt($fileUpload.get(0).files.length) > 5) {
                    alert("You are only allowed to upload a maximum of 5 files");
                }
            });
        });
    </script>
    <script src="AdminNav.js"></script>
</body>

</html>