<?php
require_once 'db/database.php';
require_once 'utils/functions.php';

session_start();

$errore = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $repeat = $_POST['repeat_password'];

    if ($password !== $repeat) {
        $errore = "Le password non coincidono";
    } else {
        $db = getDbInstance();
        $msg = $db->registerUser($email, $password);

        if ($msg === "Registrazione completata") {
            header("Location: index.php");
            exit;
        } else {
            $errore = $msg; // Email già registrata
        }
    }
}

$templateParams["titolo"] = "Registrazione";
$templateParams["nome"] = "templates/registrazione_form.php";
$templateParams["css_file"] = "registrazione.css";
$templateParams["usa_sidebar"] = false;
$templateParams["errore"] = $errore;

require 'templates/base.php';
?>