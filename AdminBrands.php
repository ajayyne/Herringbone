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

    <main>
        <!-- modal for deleting pop up -->
        <!-- <div id="deleteModal" class="deleteModal modal">
            <!- Inner content 
            <div class="inner-deleteModal inner-modal">
                <span class="close">X</span>
                <p>Are you sure you want to delete?</p>
                <form method="POST" id="deleteForm">
                    <input type="hidden" name="BrandID" id="brandID">
                    <button type="button" id="close">Close</button>
                    <button type="submit" id="confirmDeletion" name="deleteBrand">Delete</button>
                </form>
            </div>
        </div> -->


        <h1>All Brands</h1>


        <?php
        // get all brands from db
        $getBrands = "SELECT * FROM brands";
        $runBrands = mysqli_query($connection, $getBrands);
        while ($displayBrands = mysqli_fetch_array($runBrands)) {
            echo "
    <div class='flex'>
    <form method='post' id='updatingBrand'>
        <input type='text' value='{$displayBrands['BrandName']}' name='BrandName'></input>
        <input type='hidden' value='{$displayBrands['BrandID']}' name='BrandID'>
        <input type='submit' name='updateBrand' value='update'>
    </form>

    <form method='post' id='deletingBrand'>
        <input type='submit' name='deleteBrand' value='delete' class='openDeleteModal confirmDelete'>
        <input type='hidden' value='{$displayBrands['BrandID']}' name='BrandID'>
    </form>
    </div>";
        }

        // php for updating and deleting brands - top of document
        ?>

        <a href="newBrand.php"><button>Add A New Brand</button></a>

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
</body>

</html>