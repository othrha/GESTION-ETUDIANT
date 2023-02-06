<?php
session_start();
    if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
        header('location: login.php');
    } else {
        $username = $_SESSION['username'];
    }
?>