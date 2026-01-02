<?php

require_once 'bootstrap.php';

if(!isUserLoggedIn() || getUserRole() !== 'user'){
    header("Location: registrazione.php");
    exit;
}

$action = $_GET['action'] ?? 'home';

$templateParams["css_file"] = "style.css"; 
$templateParams["usa_sidebar"] = true;

switch($action){
    case 'facolta':
        $templateParams["titolo"] = "User - Facoltà";
        $templateParams["nome"] = "templates/utente_home.php";
        $templateParams["facolta"] = $dbh->getAllFacolta();
        break;

}


require 'templates/base.php';
?>