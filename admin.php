<?php

require_once 'db/database.php';
require_once 'utils/functions.php';

session_start();

// Controllo sicurezza: Verifica login e ruolo
if(!isUserLoggedIn() || getUserRole() !== 'admin'){
    header("Location: registrazione.php");
    exit;
}

$db = getDbInstance();
$action = $_GET['action'] ?? 'home';

$templateParams["css_file"] = "style.css"; 
$templateParams["usa_sidebar"] = true;

switch($action){
    case 'facolta':
        $templateParams["titolo"] = "Admin - Facoltà";
        $templateParams["nome"] = "templates/admin_facolta.php";
        $templateParams["facolta"] = $db->getAllFacolta();
        break;

    case 'corsi':
        $templateParams["titolo"] = "Admin - Corsi";
        $templateParams["nome"] = "templates/admin_corsi.php"; 
        break;

    case 'home':
    default:
        $templateParams["titolo"] = "Admin - Dashboard";
        $templateParams["nome"] = "templates/admin_home.php";
        $templateParams["stats"] = $db->getDashboardStats();
        break;
}

require 'templates/base.php';
?>