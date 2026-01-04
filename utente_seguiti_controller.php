<?php
require_once "bootstrap.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["iduser"])) {
    die("Devi essere loggato");
}

$iduser = $_SESSION["iduser"];

// prende TUTTI i corsi seguiti dall’utente
$corsiSeguiti = $dbh->getCorsiSeguitiByUser($iduser);

$templateParams = [
    "titolo" => "Corsi seguiti",
    "nome" => "templates/utente_seguiti.php",
    "css_file" => "style.css",
    "usa_sidebar" => true,
    "corsi" => $corsiSeguiti
];

require "templates/base.php";


?>