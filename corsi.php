<?php
require_once 'bootstrap.php';

if (!isUserLoggedIn()) {
    header("Location: login.php");
    exit;
}

// Parametri dalla query string
$anno = isset($_GET['anno']) ? (int)$_GET['anno'] : 1;
$idFacolta = isset($_GET['idFacolta']) ? (int)$_GET['idFacolta'] : 1;

$userEmail = $_SESSION['email'];

// Titolo e template
$templateParams["titolo"] = "Corsi - Facoltà";
$templateParams["nome"] = "templates/corsi_form.php";
$templateParams["css_file"] = "style.css";
$templateParams["usa_sidebar"] = true;

// Recupera nome facoltà
$templateParams["facolta"] = $dbh->getFacoltaById($idFacolta);
$templateParams["corso_di_studi"] = $templateParams["facolta"]['nome'] ?? 'Facoltà sconosciuta';
$templateParams["anno_selezionato"] = $anno;
$templateParams["idFacolta"] = $idFacolta;

// Recupera corsi dal DB
$templateParams["corsi"] = $dbh->getCorsiByFacoltaAnno($idFacolta, $anno);

$templateParams["tipologia"] = $dbh->getTipologiaByIdFacolta($idFacolta);

require 'templates/base.php';

?>
