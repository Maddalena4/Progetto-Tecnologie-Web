<?php

require_once 'db/database.php';
require_once 'utils/functions.php';

session_start();

$errore = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $azione = $_POST['azione']; 

    $db = getDbInstance();

    if($azione === 'login'){
        $loginResult = $db->loginUser($email, $password);

        if($loginResult){
            registerLoggedUser($loginResult);

            if($loginResult['role'] === 'admin'){
                header("Location: admin.php");
                exit;
            } else {
                header("Location: index.php");
                exit;
            }
        } else {
            $errore = "Email o password errati.";
        }
    } 
    elseif ($azione === 'registrazione') {
        $msg = $db->registerUser($email, $password);
        if($msg === "Registrazione completata"){
             $errore = "Registrazione riuscita! Ora puoi accedere.";
        } else {
             $errore = $msg;
        }
    }
}

$templateParams["titolo"] = "Accedi o Registrati";
$templateParams["nome"] = "templates/registrazione_view.php"; 
$templateParams["css_file"] = "home_style.css"; 
$templateParams["errore"] = $errore; 

require 'templates/base.php';
?>