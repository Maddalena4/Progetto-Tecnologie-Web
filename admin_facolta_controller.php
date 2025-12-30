<?php
session_start();
require_once "bootstrap.php";

// Sicurezza
if (!isUserLoggedIn() || getUserRole() !== 'admin') {
    header("Location: index.php");
    exit;
}

// Crea Facoltà
if (isset($_POST['action']) && $_POST['action'] === 'create') {

    if (empty($_POST['nome_facolta']) || empty($_POST['tipologia'])) {
        header("Location: admin.php?action=crea_facolta&error=missing");
        exit;
    }

    $nome = $_POST['nome_facolta'];
    $tipologia = $_POST['tipologia'];

    if ($dbh->addFacolta($nome, $tipologia)) {
        header("Location: admin.php?action=facolta&success=created");
    } else {
        header("Location: admin.php?action=crea_facolta&error=db");
    }
    exit;
}

// Elimina Facoltà
if (isset($_POST['idfacolta']) && is_numeric($_POST['idfacolta'])) {

    $idFacolta = intval($_POST['idfacolta']);

    if ($dbh->deleteFacolta($idFacolta)) {
        header("Location: admin.php?action=facolta&success=deleted");
    } else {
        header("Location: admin.php?action=facolta&error=delete_failed");
    }
    exit;
}

// Se nessuna azione valida è stata eseguita, reindirizza alla pagina delle facoltà
header("Location: admin.php?action=facolta&error=invalid_action");
exit;
