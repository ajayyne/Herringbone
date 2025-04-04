<?php
session_start();
include "connection.php";

// if username and password match AND this matches having an admin ID
// in database:
// assign these session variables:
// $_SESSION['adminID'] = $adminID;
// $_SESSION['userType'] = 'Admin';

?>

<!-- HTML Form -->
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
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>


    <?php
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $password = trim($_POST['password']);
    $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

    // check that user exists with case-sensitive comparison (using BINARY)
    $checkQuery = "SELECT * FROM adminpanel WHERE BINARY userName = '{$username}' AND BINARY userPassword = '{$password}'";
    $runQuery = mysqli_query($connection, $checkQuery);
    if (mysqli_num_rows($runQuery) < 1) {
        echo "Invalid Username or Password";
    } else if (mysqli_num_rows($runQuery) === 1) {
        // Store user data in the session
        $user = mysqli_fetch_assoc($runQuery);
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['userName'];
        $_SESSION['ID'] = $user['adminID'];
        header("Location: AdminPanel.php"); 
        exit;
    }
}

    ?>
</body>

</html>