<?php
require_once "bootstrap.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["iduser"])) {
    die("Devi essere loggato per vedere i PDF valutati");
}

$iduser = $_SESSION["iduser"];

// Recupero PDF valutati dall'utente
$pdfsValutati = $dbh->getPdfValutatiDaUtente($iduser);

$templateParams = [
    "titolo" => "I miei PDF valutati",
    "nome" => "templates/pdf_valutati.php",
    "css_file" => "style.css",
    "usa_sidebar" => true,
    "pdfs" => $pdfsValutati
];

require "templates/base.php";
