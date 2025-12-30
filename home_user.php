<?php
require_once 'bootstrap.php';


if (!isUserLoggedIn()) {
    header("Location: login.php");
    exit;
}

$facolta_list = $dbh->getAllFacolta(); 

$userEmail = $_SESSION['email'];

$templateParams["titolo"] = "Home - Università di Bologna";
$templateParams["nome"] = "templates/utente_home.php";
$templateParams["css_file"] = "style.css";
$templateParams["usa_sidebar"] = true;
$templateParams["show_welcome"] = true;

require 'templates/base.php';
?>