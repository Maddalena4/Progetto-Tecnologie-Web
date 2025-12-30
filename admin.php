<?php

require_once 'bootstrap.php';

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
        $idFacolta = intval($_GET['idfacolta']);
        $templateParams["titolo"] = "Admin - Modifica Facoltà";
        $templateParams["nome"] = "templates/admin_modifica_facolta.php";
        $templateParams["facolta"] = $dbh->getFacoltaById($idFacolta);
        break; 

    case 'corsi':

    if (isset($_GET['idfacolta']) && is_numeric($_GET['idfacolta'])) {
        $idFacolta = intval($_GET['idfacolta']);
        $corsi = $dbh->getCorsiByFacolta($idFacolta);
    } else {
        $corsi = $dbh->getAllCorsi();
        $idFacolta = null;
    }

    $templateParams["titolo"] = "Admin - Corsi";
    $templateParams["nome"] = "templates/admin_corsi.php";
    $templateParams["lista_facolta"] = $dbh->getAllFacolta();
    $templateParams["corsi"] = $corsi;
    $templateParams["idfacolta"] = $idFacolta;
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
}


require 'templates/base.php';
?>