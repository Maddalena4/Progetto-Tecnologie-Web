<?php
require_once 'utils/functions.php';
require_once 'db/database.php';

session_start();

if (!isUserLoggedIn()) {
    header("Location: login.php");
    exit;
}

$db = getDbInstance();
$facolta_list = $db->getAllFacolta(); 

$userEmail = $_SESSION['email'];

$templateParams["titolo"] = "Home - Università di Bologna";
$templateParams["nome"] = "templates/utente_home.php";
$templateParams["css_file"] = "style.css";
$templateParams["usa_sidebar"] = true;
$templateParams["show_welcome"] = true;

require 'templates/base.php';
