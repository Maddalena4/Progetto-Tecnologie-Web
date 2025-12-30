<?php 
session_start();

require_once "bootstrap.php";

//Controllo login
if(!isUserLoggedIn()) {
    header("Location:login.php");
    exit;
}
if(getUserRole() !== 'admin') {
    header("Location:index.php");
    exit;
}

//controllo pararmetro
if (!isset($_POST['idfacolta']) || !is_numeric($_POST['idfacolta'])) {
    header("Location: admin.php?action=facolta&error=invalid");
    exit;
}

$idFacolta = intval($_POST['idfacolta']);

//eliminazione facoltà
if ($dbh->deleteFacolta($idFacolta)) {
    header("Location: admin.php?action=facolta&success=deleted");
} else {
    header("Location: admin.php?action=facolta&error=delete_failed");
}

exit;

?>