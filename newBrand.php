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
    <meta name="description"
        content="Herringbone is an independantly owned gift shop and cafe located in Peebleshire, stocking handmade and locally sourced unique gifts...">
    <meta name="author" content="Amber Degner-Budd">
    <meta name="keywords"
        content="Gift shop, Cafe, Scottish gifts, Handmade, Locally sourced, Scottish makers, Local makers">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/504c189bcb.js" crossorigin="anonymous"></script>
</head>

<body class="background">
    <div class="newBrand-main"></div>
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

    <div class="newBrand-Cont">
    <div class="new-brand">
        <h1>New Brand</h1>
    </div>

    <div>
        <div>

        <form method='post' enctype='multipart/form-data' class="newBrand-form">
            <input type='text' name='BrandName' placeholder='Brand name' required class="newBrand-name">
            <textarea type='text' name='BrandDescription' placeholder='A description of the brand' required></textarea>
            <input type='file' required accept='.jpg, .jpeg, .png' name='BrandImage' id='imageUpload' class="newBrand-imgupload">
            <input type='submit' name='upload' class="newBrand-button" value="ADD NEW BRAND">
        </form>

        <?php
        if (isset($_POST['upload'])) {
            // set the directory for the uploaded image
            $targetDir = "images/brands/";
            $file = $_FILES['BrandImage'];
            $brandName = $connection->real_escape_string($_POST['BrandName']);
            $brandDescription = $connection->real_escape_string($_POST['BrandDescription']);

            // check that uploaded file matches the allowed types
            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            if (!in_array($file['type'], $allowedTypes)) {
                die("Invalid file type. Only JPG, JPEG, and PNG are allowed.");
            }

            // set maximum file size (2mb)
            $maxFileSize = 2 * 1024 * 1024;
            if ($file['size'] > $maxFileSize) {
                die("File size exceeds 2MB limit, please upload a smaller file.");
            }

            // specify the target file path
            $fileName = basename($file['name']);
            $targetFile = $targetDir . $fileName;

            // upload image file to the database after it has been uploaded to server
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                // Prepare the SQL insert statement
                $insert = "INSERT INTO brands (BrandName, brandImage, brandDescription) VALUES ('$brandName', '$targetFile', '$brandDescription')";

                if ($connection->query($insert)) {
                    echo "<script>
                alert('Brand Successfully Added');
                window.location.href = 'AdminBrands.php';
            </script>";
                } else {
                    echo "Error saving brand to database: " . $connection->error;
                }
            } else {
                die("Failed to move the uploaded file.");
            }
        }
        ?>
</div>
</div>
</div>
<!-- limits the number of images allowed to upload -->
<script>
    $(function () {
        $("input[type = 'submit']").click(function () {
            var $fileUpload = $("input[type='file']");
            if (parseInt($fileUpload.get(0).files.length) > 1) {
                alert("You are only allowed to upload a maximum of 1 file");
            }
        });
    });
</script>
<script src="AdminNav.js"></script>
</body>


</html>