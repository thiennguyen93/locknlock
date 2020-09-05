<?php
    session_start();
    unset($_SESSION['user_info']);
    unset($_SESSION['cart']);
    header('location: ./index.php');
    exit();
?>