<?php
require_once 'bootstrap.php';

$errore = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $repeat = $_POST['repeat_password'];

    if ($password !== $repeat) {
        $errore = "Le password non coincidono";
    } else {
        $msg = $dbh->registerUser($email, $password);

        if ($msg === "Registrazione completata") {
            header("Location: login.php");
            exit;
        } else {
            $errore = $msg;
        }
    }
}

$templateParams["titolo"] = "Registrazione";
$templateParams["nome"] = "templates/registrazione_form.php";
$templateParams["css_file"] = "registrazione.css";
$templateParams["usa_sidebar"] = false;
$templateParams["show_welcome"] = false;
$templateParams["errore"] = $errore;

require 'templates/base.php';
?>