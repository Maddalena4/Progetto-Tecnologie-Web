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

    case 'corsi':
        $templateParams["titolo"] = "Admin - Corsi";
        $templateParams["nome"] = "templates/admin_corsi.php"; 
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
}

require 'templates/base.php';
?>