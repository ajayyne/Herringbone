<?php
session_start();

// if username and password match AND this matches having an admin ID
// in database:
// assign these session variables:
$_SESSION['adminID'] = $adminID;
$_SESSION['userType'] = 'Admin';

?>