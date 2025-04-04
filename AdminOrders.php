<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("Location: Home.php");
}
if($_SESSION['userType'] != $user['admin'] || empty($_SESSION['userType']) || $_SESSION['userType'] === null){
    header("Location: Home.php");
}
?>