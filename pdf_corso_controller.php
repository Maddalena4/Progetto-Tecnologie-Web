<?php
require_once "bootstrap.php";

if (!isset($_GET['idcorso'])) {
    die("Corso non valido");
}

$idcorso = intval($_GET['idcorso']);

// FOLLOW
if (isset($_GET['action']) && $_GET['action'] === 'follow') {
    if (!isset($_SESSION['iduser'])) {
        die("Devi essere loggato");
    }

    $dbh->followCorso($idcorso, $_SESSION['iduser']);
    header("Location: pdf_corso_controller.php?idcorso=$idcorso");
    exit;
}

// UNFOLLOW
if (isset($_GET['action']) && $_GET['action'] === 'unfollow') {
    if (!isset($_SESSION['iduser'])) {
        die("Devi essere loggato");
    }

    $dbh->unfollowCorso($idcorso, $_SESSION['iduser']);
    header("Location: pdf_corso_controller.php?idcorso=$idcorso");
    exit;
}

// DATI CORSO
$corso = $dbh->getCorsoById($idcorso);
if (!$corso) {
    die("Corso non trovato");
}

// PDF (già ordinati per versione)
$pdfs = $dbh->getPdfByCorso($idcorso);

// SEGUITO
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
?>