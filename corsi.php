<?php
require_once 'bootstrap.php';

if (!isUserLoggedIn()) {
    header("Location: login.php");
    exit;
}

$anno = isset($_GET['anno']) ? (int)$_GET['anno'] : 1;
$idFacolta = isset($_GET['idFacolta']) ? (int)$_GET['idFacolta'] : 1;

$userEmail = $_SESSION['email'];

$templateParams["titolo"] = "Corsi - Facoltà";
$templateParams["nome"] = "templates/corsi_form.php";
$templateParams["css_file"] = "style.css";
$templateParams["usa_sidebar"] = true;

$templateParams["facolta"] = $dbh->getFacoltaById($idFacolta);
$templateParams["corso_di_studi"] = $templateParams["facolta"]['nome'] ?? 'Facoltà sconosciuta';
$templateParams["anno_selezionato"] = $anno;
$templateParams["idFacolta"] = $idFacolta;

$templateParams["corsi"] = $dbh->getCorsiByFacoltaAnno($idFacolta, $anno);

$templateParams["tipologia"] = $dbh->getTipologiaByIdFacolta($idFacolta);

require 'templates/base.php';

?>
