<?php
require_once 'bootstrap.php';


if (!isUserLoggedIn()) {
    header("Location: login.php");
    exit;
}

$templateParams["facolta"] = $dbh->getAllFacolta(); 

$userEmail = $_SESSION['email'];

$templateParams["titolo"] = "Home - Università di Bologna";
$templateParams["nome"] = "templates/utente_home.php";
$templateParams["css_file"] = "style.css";
$templateParams["usa_sidebar"] = true;
$templateParams["show_welcome"] = true;
$templateParams["notifiche"] =
    $dbh->getNotificheByUser($_SESSION["iduser"]);


require 'templates/base.php';
?>