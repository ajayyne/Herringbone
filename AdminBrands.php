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


//  if update button is pressed - WORKING, add "Update Brand Name?"
if (isset($_POST['updateBrand'])) {
    $update = "UPDATE brands SET BrandName = '$_POST[BrandName]' WHERE BrandID = '$_POST[BrandID]'";
    $runUpdate = mysqli_query($connection, $update);
    if ($runUpdate) {
        echo "<script>
        alert('Brand Successfully Updated');
        window.location.href = 'AdminBrands.php';
        </script>";
    } else {
        echo '<script>alert("Update Failed")</script>';
    }
}



if (isset($_POST['deleteBrand'])) {

    $brandID = intval($_POST['BrandID']);

    $delete = "DELETE FROM brands WHERE BrandID = $brandID";
    $runDelete = mysqli_query($connection, $delete);

    if ($runDelete) {
        echo "<script>
        alert('Brand Successfully Deleted');
        window.location.href = 'AdminBrands.php';
        </script>";
        exit;
    } else {
        echo '<script>alert("Deletion Failed");</script>';
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
    <main class="background brands-main">
       


        <div class="flex admin-page-title">
            <h1>All Brands</h1>
            <a href="newBrand.php"><button class="new-btn">Add A New Brand</button></a>
        </div>

        <div class="brands-cont">

        <table>

        <?php
        // get all brands from db
        $getBrands = "SELECT * FROM brands";
        $runBrands = mysqli_query($connection, $getBrands);
        while ($displayBrands = mysqli_fetch_array($runBrands)) {
            echo "
            <div>
    <div class='flex brand'>
    <form method='post' id='updatingBrand'>
        <input type='text' value='{$displayBrands['BrandName']}' name='BrandName' class='brandDropdown'></input>
        <input type='hidden' value='{$displayBrands['BrandID']}' name='BrandID'>
        <div class='brand-buttons flex'>
        <input type='submit' name='updateBrand' value='Update Brand' class='confirmUpdate brandUpdate radius'>
    </form>

    <form method='post' id='deletingBrand'>
        <input type='submit' name='deleteBrand' value='Delete Brand' class='openDeleteModal confirmDelete radius brandDelete'>
        </div>
        <input type='hidden' value='{$displayBrands['BrandID']}' name='BrandID'>
    </form>
    </div>
    </div>";
        }

        // php for updating and deleting brands - top of document
        ?>
        </table>
</div>
        

    </main>
    <!-- <script src="deleteModal.js"></script> -->
    <script>
        document.querySelectorAll('.confirmDelete').forEach(button => {
            button.addEventListener('click', function (event) {
                const userConfirmed = confirm("Are you sure you want to delete this brand?");
                if (!userConfirmed) {
                    // if user cancels, dont submit form
                    event.preventDefault();
                }
            });
        });
    </script>
    <script src="AdminNav.js"></script>
</body>

</html>