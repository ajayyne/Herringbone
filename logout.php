<?php
session_start();
// unset all session variables, by setting to an empty array
$_SESSION = array();
session_destroy();
header("Location: AdminLogin.php"); 
exit;
?>