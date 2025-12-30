<?php 
session_start();

require_once "database.php";
require_once "utils/functions.php";

//Controllo login
if(!isUserLoggedIn()) {
    header("Location:login.php");
    exit;
}
if(getUserRole() !== 'admin') {
    header("Location:index.php");
    exit;
}



>