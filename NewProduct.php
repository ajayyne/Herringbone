<!-- ensure re-direct is set if admin is not logged in -->
<?php
include "connection.php";
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
    <main>
        <div>
            <form method="POST" enctype='multipart/form-data'>
                <div>
                    <label for="ProductName">Title</label>
                    <input type='text' name='ProductName' placeholder='Product Name' required>
                </div>
                <div>
                    <label for="ProductDescription">Description</label>
                    <input type='text' name='ProductDescription' placeholder='A description of the product' required>
                </div>
                <div>
                    <label for="Price">Price</label>
                    <input type='text' name='ProductPrice' placeholder='£00.00' required>
                </div>
                <div>
                    <label for="Colour">Colour</label>
                    <input type='text' name='Colour' placeholder='Red'>
                </div>
                <?php
                // get brands and categories for drop downs
                $getList = "SELECT c.CategoryName, c.CategoryID, b.BrandName, b.BrandID, po.isAvailable, p.Bestseller, p.DefaultDisplay FROM Categories as c
                LEFT JOIN products as p ON p.CategoryID = c.CategoryID
                LEFT JOIN product_option as po ON p.ProductID = po.ProductID
                LEFT JOIN brands as b ON p.BrandID = b.BrandID";
                $runList = mysqli_query($connection, $getList);
                $List = mysqli_fetch_array($runList);


                echo "<div>
                <label for='Brand'>Brand</label>
                <select type='text' placeholder='{$List['BrandName']}' name='Brand' value='{$List['BrandID']}'>";
                $getBrands = "SELECT * FROM brands";
                $runBrands = mysqli_query($connection, $getBrands);
                while ($displayBrands = mysqli_fetch_assoc($runBrands)) {
                    // Check if this brand is currently selected
                    $selected = ($displayBrands['BrandID'] == $List['BrandID']) ? 'selected' : '';
                    echo "<option value='{$displayBrands['BrandID']}' $selected>{$displayBrands['BrandName']}</option>";
                }
                echo "
                </select>
                </div>

                <div>
                <label for='Category'>Category</label>
                <select type='text' placeholder='{$List['CategoryName']}' name='Category' value='{$List['CategoryID']}'>";
                $getCategories = "SELECT * FROM categories";
                $runCategories = mysqli_query($connection, $getCategories);
                $selectedCategory = '';

                while ($displayCategories = mysqli_fetch_assoc($runCategories)) {
                    // Check if this category is the selected one
                    if ($displayCategories['CategoryID'] == $List['CategoryID']) {
                        // Save the selected CategoryName for later use
                        $selectedCategory = $displayCategories['CategoryName'];
                        echo "<option value='{$displayCategories['CategoryID']}' selected>{$displayCategories['CategoryName']}</option>";
                    } else {
                        echo "<option value='{$displayCategories['CategoryID']}'>{$displayCategories['CategoryName']}</option>";
                    }
                }
                echo "
            </select>
            </div>
            
              <div>
                <label for='Availability'>Is this product Available?</label>
                <input type='checkbox' id='Available0' name='Availability' value='0'";
                if ($List['isAvailable'] == 0)
                    echo 'checked>';
                echo "<label for='Availale0'>No</label>
                <input type='checkbox' id='Available1' name='Availability' value='1'";
                if ($List['isAvailable'] == 1)
                    echo 'checked>';
                echo "<label for='Available1'>Yes</label>
            </div>
            
            <div>
                <label for='Default'>Display as Default?</label>
                <input type='checkbox' id='Default0' name='Default' value='0'";
                if ($List['DefaultDisplay'] == 0)
                    echo 'checked>';
                echo "<label for='Default0'>No</label>
                <input type='checkbox' id='Default1' name='Default' value='1'";
                if ($List['DefaultDisplay'] == 1)
                    echo 'checked>';
                echo "<label for='Default1'>Yes</label>
            </div>
            
            <div>
                <label for='Bestseller'>Bestseller?</label>
                <input type='checkbox' id='Bestseller0' name='Bestseller' value='0'";
                if ($List['Bestseller'] == 0)
                    echo 'checked>';
                echo "<label for='Bestseller0'>No</label>
                <input type='checkbox' id='Bestseller1' name='Bestseller' value='1'";
                if ($List['Bestseller'] == 1)
                    echo 'checked>';
                echo "<label for='Bestseller1'>Yes</label>
            </div>";


                ?>

                <br>
                <input type='file' required multiple accept='.jpg, .jpeg, .png' name='files[]' id='imageUpload'>
                <input type='submit' name='submitProduct' value="Add Product">
            </form>
        </div>

        <?php
        // handle image upload for new product AND insert new product to DB
        if (isset($_POST['submitProduct'])) {

                 // insert product to products table:
                 $productInsert = "INSERT INTO products (CategoryID, BrandID, ProductName, Description, Price, DefaultDisplay, Bestseller) VALUES ($_POST[Category], $_POST[Brand], '$_POST[ProductName]', '$_POST[ProductDescription]', '$_POST[ProductPrice]', $_POST[Default], $_POST[Bestseller])";
                 $runProductInsert = mysqli_query($connection, $productInsert);
                 $ProductID = $connection->insert_id;
     
                 // insert into product options table
                 $productOptionInsert = "INSERT INTO product_option (ProductID, Colour, isAvailable) VALUES ($ProductID, '$_POST[Colour]', $_POST[Availability])";
                 $runProductOptionInsert = mysqli_query($connection, $productOptionInsert);
                 $prodOptionID = $connection->insert_id;
                 
            // set the directory for the uploaded image
            $targetDir = "images/products/" . strtolower($selectedCategory) . "/";
            $file = $_FILES['files'];
            $fileCount = count($file['name']);

            for ($i = 0; $i < $fileCount; $i++) {
                $fileName = basename($file['name'][$i]);
                $fileType = $file['type'][$i];
                $fileSize = $file['size'][$i];
                $tmpName = $file['tmp_name'][$i];
                $targetDir = "images/products/";
                $targetFile = $targetDir . $fileName;

                // Check file type
                $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!in_array($fileType, $allowedTypes)) {
                    die("Invalid file type for $fileName. Only JPG, JPEG, and PNG are allowed.");
                }

                // set maximum file size (2mb)
                $maxFileSize = 2 * 1024 * 1024; // 2 MB
                if ($fileSize > $maxFileSize) {
                    die("File size exceeds 2MB limit for $fileName.");
                }


                // specify the target file path
                $fileName = basename($file['name'][$i]);
                $targetFile = $targetDir . $fileName;
                // Query the database to check if the file already exists
                $checkQuery = "SELECT * FROM image WHERE ImageURL = '$targetFile'";
                $result = $connection->query($checkQuery);

                if ($result->num_rows > 0) {
                    $fileName = uniqid() . "_" . $fileName; 
                    $targetFile = $targetDir . $fileName;
                }
            
            // insert into images
            if (move_uploaded_file($file['tmp_name'][$i], $targetFile)) {
                   // defaultImg = 1 for the first file,defaultImg = 0 for the rest of the images
                   if($i === 0){
                    $defaultImg = 1;
            }else{
                $defaultImg = 0;
            }
                // Prepare the SQL insert statement
                $insertImage = "INSERT INTO image (ImageURL, ProdOptionID, defaultImg) VALUES ('$targetFile', $prodOptionID, $defaultImg)";
                $runInsertImage = mysqli_query($connection, $insertImage);
            } else {
                die("Failed to move the uploaded file.");
            }
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
</body>

</html>