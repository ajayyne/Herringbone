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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body class="login-page flex">
    <form method="POST" class="login radius flex">
    <h1 class="text-center">ADMIN LOGIN</h1>
        <div class="login-input flex">
            <label>Username:</label>
            <div class="login-icon">
                <input class="radius" type="text" name="username" placeholder="Username" required>
                <i class="fa-solid fa-user" style="color: #5c576b;"></i>
            </div>
        </div>

        <div class="login-input flex">
            <label>Password:</label>
            <div class="login-icon">
                <input class="radius" type="password" name="password" placeholder="Password" required>
                <i class="fa-solid fa-lock" style="color: #5c576b;"></i>
            </div>
        </div>
        <br>
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
        echo "<p class='login-error'>*Invalid Username or Password<p>";
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
        <button type="submit" class="login-btn radius">Login</button>
    </form>



   
</body>

</html>