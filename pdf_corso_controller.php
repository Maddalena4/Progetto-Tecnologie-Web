<?php
require_once "bootstrap.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_GET['idcorso'])) {
    die("Corso non valido");
}

$idcorso = intval($_GET['idcorso']);

// Gestione azione follow tramite GET
if (isset($_GET['action']) && $_GET['action'] === 'follow') {
    if (!isset($_SESSION['iduser'])) {
        die("Devi essere loggato");
    }

    $iduser = $_SESSION['iduser'];
    $idcorso = intval($_GET['idcorso']); // assicurati di prendere idcorso da GET

    $dbh->followCorso($idcorso, $iduser);

    header("Location: pdf_corso_controller.php?idcorso=$idcorso");
    exit;
}

$corso = $dbh->getCorsoById($idcorso);
$pdfs  = $dbh->getPdfByCorso($idcorso);

if (!$corso) {
    die("Corso non trovato");
}

// Verifica se l’utente segue già il corso
$isSeguito = false;
if (isset($_SESSION['iduser'])) {
    $isSeguito = $dbh->isCorsoSeguito($idcorso, $_SESSION['iduser']);
}

$templateParams = [
    "titolo" => $corso["nome"],
    "nome" => "templates/pdf_corso.php",
    "css_file" => "style.css",
    "usa_sidebar" => true,
    "corso" => $corso,
    "pdfs" => $pdfs,
    "isSeguito" => $isSeguito
];

require "templates/base.php";
