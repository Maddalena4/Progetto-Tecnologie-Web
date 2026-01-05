<?php
require_once 'bootstrap.php';

if (!isUserLoggedIn()) {
    header("Location: login.php");
    exit;
}

$search = $_GET['q'] ?? null;

$templateParams["titolo"] = "Libreria PDF";
$templateParams["nome"] = "templates/utente_libreria_template.php";
$templateParams["css_file"] = "style.css";
$templateParams["usa_sidebar"] = true;

$templateParams["pdf_list"] = $dbh->getAllPdf($search);

require 'templates/base.php';
