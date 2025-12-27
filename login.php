<?php
require_once 'utils/functions.php';

$errorMsg = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $db = getDbInstance();
    $loginResult = $db->loginUser($_POST['email'], $_POST['password']);

    if($loginResult){
        $_SESSION['iduser'] = $loginResult['iduser'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['role'] = $loginResult['role'];
        
        // Redirect basato sul ruolo
        if($loginResult['role'] === 'admin'){
            header("Location: admin.php");
        } else {
            // header("Location: user_home.php"); // Da implementare
            echo "Login utente normale effettuato";
        }
        exit;
    } else {
        $errorMsg = "Email o password errati";
    }
}


$templateParams["titolo"] = "Login";
$templateParams["nome"] = "templates/login_form.php"; // Devi creare questo template con il form
$templateParams["css_file"] = "home_style.css";
$templateParams["errore_login"] = $errorMsg;

require 'templates/base.php';
?>