<?php
require_once 'bootstrap.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $loginResult = $dbh->loginUser($_POST['email'], $_POST['password']);

    if ($loginResult) {
        registerLoggedUser($loginResult);

        $ruolo = getUserRole(); 

        if ($ruolo === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: home_user.php");
        }
        exit;
    } else {
        $errorMsg = "Email o password errati.";
    }
}

$templateParams["titolo"] = "Login";
$templateParams["nome"] = "templates/login_form.php";
$templateParams["css_file"] = "registrazione.css";
$templateParams["usa_sidebar"] = false;
$templateParams["errore_login"] = $errorMsg;
$templateParams["show_welcome"] = false;

require 'templates/base.php';
?>