<?php
require_once 'db/database.php';
require_once 'utils/functions.php';

session_start();

$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $db = getDbInstance();
    $loginResult = $db->loginUser($_POST['email'], $_POST['password']);

    if ($loginResult) {

    $_SESSION['iduser'] = $loginResult['iduser'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['role'] = $loginResult['role'];

    if ($loginResult['role'] === 'admin') {
        header("Location: admin.php");
    } else {
        header("Location: index.php");
    }
    exit;
}

}

$templateParams["titolo"] = "Login";
$templateParams["nome"] = "templates/login_form.php";
$templateParams["css_file"] = "registrazione.css";
$templateParams["usa_sidebar"] = false;
$templateParams["errore_login"] = $errorMsg;
$templateParams["show_welcome"] = false;

require 'templates/base.php';
