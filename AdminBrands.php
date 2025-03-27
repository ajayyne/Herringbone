<?php
    session_start();
    include 'connection.php';
    // $adminID;
    // $userType;
    // if($adminID == '' || empty($adminID) || $userType == '' || empty($userType) || $userType != 'Admin'){
    //     header("Location: Home.php");
    // }else{

    // }
     ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herringbone</title>
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

</main>
    <h1>All Brands</h1>


    <?php
// get all brands from db
$getBrands = "SELECT * FROM brands";
$runBrands = mysqli_query($connection, $getBrands);
while($displayBrands = mysqli_fetch_array($runBrands)){
    echo "
    <div class='flex'>
    <form method='post' id='updatingBrand'>
        <input type='text' value='{$displayBrands['BrandName']}' name='BrandName'></input>
        <input type='hidden' value='{$displayBrands['BrandID']}' name='BrandID'>
        <input type='submit' name='updateBrand' value='update'>
    </form>

    <form method='post' id='deletingBrand'>
        <input type='submit' name='deleteBrand' value='delete'>
        <input type='hidden' value='{$displayBrands['BrandID']}' name='BrandID'>
    </form>
    </div>";
}


        //  if update button is pressed - WORKING, add "Update Brand Name?"
        if (isset($_POST['updateBrand'])){
            $update = "UPDATE brands SET BrandName = '$_POST[BrandName]' WHERE BrandID = '$_POST[BrandID]'";
            $runUpdate = mysqli_query($connection, $update);
            if ($runUpdate) {
                echo '<script>alert("Brand Name Successfully Updated")</script>';
                header("Refresh:0");
            } else {
                echo '<script>alert("Update Failed")</script>';
            }
        }

        //   if delete button is pressed - WORKING, add "are you sure you want to delete?"
        if (isset($_POST['deleteBrand'])){
            $delete = "DELETE FROM brands WHERE BrandID='$_POST[BrandID]'";
            $runDelete = mysqli_query($connection, $delete);
            if ($runDelete) {
                echo '<script>alert("Brand Successfully Deleted")</script>';
                header("Refresh:0");
            } else {
                echo '<script>alert("Deletion Failed")</script>';
            }
        }
?>

<a href="newBrand.php"><button>Add A New Brand</button></a>

<main>





</main>

</body>
</html>