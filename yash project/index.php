<?php

session_start();

// if the user is logged in, and usertype is admin, redirect to admin page
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['isAdmin'] == true) {
    header("Location: admin");
    exit;
}

// if the user is logged in, and usertype is user, redirect to user page
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['isAdmin'] == false) {
    header("Location: user");
    exit;
}

// redirect to login page
header("Location: login.php");