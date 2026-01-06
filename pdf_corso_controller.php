<?php
require_once "bootstrap.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_GET['idcorso'])) {
    die("Corso non valido");
}

$idcorso = intval($_GET['idcorso']);

if (isset($_GET['action']) && $_GET['action'] === 'follow') {
    if (!isset($_SESSION['iduser'])) {
        die("Devi essere loggato");
    }

    $iduser = $_SESSION['iduser'];
    $idcorso = intval($_GET['idcorso']);

    $dbh->followCorso($idcorso, $iduser);

    header("Location: pdf_corso_controller.php?idcorso=$idcorso");
    exit;
}


if (isset($_GET['action']) && $_GET['action'] === 'unfollow') {
    if (!isset($_SESSION['iduser'])) {
        die("Devi essere loggato");
    }

    $iduser = $_SESSION['iduser'];
    $idcorso = intval($_GET['idcorso']);

    $dbh->unfollowCorso($idcorso, $iduser);

    header("Location: pdf_corso_controller.php?idcorso=$idcorso");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["idpdf"], $_POST["valore"])) {
    if (!isset($_SESSION["iduser"])) {
        die("Devi essere loggato");
    }

    $idpdf  = intval($_POST["idpdf"]);
    $valore = intval($_POST["valore"]);
    $iduser = $_SESSION["iduser"];

    if ($valore >= 1 && $valore <= 5) {
        $dbh->valutaPdf($idpdf, $iduser, $valore);
    }

    header("Location: pdf_corso_controller.php?idcorso=$idcorso");
    exit;
}


$corso = $dbh->getCorsoById($idcorso);
$pdfs = $dbh->getPdfByCorso($idcorso);

foreach ($pdfs as &$pdf) {
    $pdf["rating"] = $dbh->getMediaValutazionePdf($pdf["idpdf"]);
    $pdf["user_rating"] = isset($_SESSION["iduser"])
        ? $dbh->getValutazioneUtentePdf($pdf["idpdf"], $_SESSION["iduser"])
        : null;
}


if (!$corso) {
    die("Corso non trovato");
}

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
