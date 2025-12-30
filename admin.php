<?php

require_once 'bootstrap.php';

// Controllo sicurezza: Verifica login e ruolo
if(!isUserLoggedIn() || getUserRole() !== 'admin'){
    header("Location: registrazione.php");
    exit;
}

$action = $_GET['action'] ?? 'home';

$templateParams["css_file"] = "style.css"; 
$templateParams["usa_sidebar"] = true;

switch($action){
    case 'facolta':
        $templateParams["titolo"] = "Admin - Facoltà";
        $templateParams["nome"] = "templates/admin_facolta.php";
        $templateParams["facolta"] = $dbh->getAllFacolta();
        break;

    case 'home':
    default:
        $templateParams["titolo"] = "Admin - Dashboard";
        $templateParams["nome"] = "templates/admin_home.php";
        $templateParams["stats"] = $dbh->getDashboardStats();
        break;

    case 'crea_facolta':
        $templateParams["titolo"] = "Admin - Crea Facoltà";
        $templateParams["nome"] = "templates/crea_facolta.php";
        break;

    case 'modifica_facolta':
    if (!isset($_GET['idfacolta']) || !is_numeric($_GET['idfacolta'])) {
        header("Location: admin.php?action=facolta&error=invalid");
        exit;
    }

    case 'corsi':
    if (!isset($_GET['idfacolta']) || !is_numeric($_GET['idfacolta'])) {
        header("Location: admin.php?action=facolta");
        exit;
    }

    $idFacolta = intval($_GET['idfacolta']);
    $anno = $_GET['anno'] ?? 1;

    $templateParams["titolo"] = "Admin - Corsi";
    $templateParams["nome"] = "templates/admin_corsi.php";
    $templateParams["corsi"] = $dbh->getCorsiByFacoltaAnno($idFacolta, $anno);
    $templateParams["idfacolta"] = $idFacolta;
    $templateParams["anno"] = $anno;
    break;

    case 'crea_corso':
        $templateParams["titolo"] = "Admin - Crea Corso";
        $templateParams["nome"] = "templates/admin_crea_corso.php";
        $templateParams["idfacolta"] = $_GET['idfacolta'];
        break;

    case 'modifica_corso':
        $templateParams["titolo"] = "Admin - Modifica Corso";
        $templateParams["nome"] = "templates/admin_modifica_corso.php";
        $templateParams["corso"] = $dbh->getCorsoById($_GET['idcorso']);
        break;


    $idFacolta = intval($_GET['idfacolta']);
    $templateParams["titolo"] = "Admin - Modifica Facoltà";
    $templateParams["nome"] = "templates/admin_modifica_facolta.php";
    $templateParams["facolta"] = $dbh->getFacoltaById($idFacolta);
    break;
}

require 'templates/base.php';
?>