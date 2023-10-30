<?php

session_start();
include("../db.php");

// if the user is logged in, and usertype is admin, redirect to admin page
if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['isAdmin'] == false)) {
    header("Location: ../login.php");
    exit;
}