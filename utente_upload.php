<?php
require_once 'bootstrap.php';

if (!isUserLoggedIn()) {
    header("Location: login.php");
    exit;
}

$iduser = $_SESSION["iduser"];

// PRENDO SOLO I PDF DELL’UTENTE
$files = $dbh->getPdfByUser($iduser);

$templateParams["titolo"] = "Upload";
$templateParams["nome"] = "templates/utente_upload_template.php";
$templateParams["css_file"] = "style.css";
$templateParams["usa_sidebar"] = true;
$templateParams["show_welcome"] = false;
$templateParams["files"] = $files;

require 'templates/base.php';
