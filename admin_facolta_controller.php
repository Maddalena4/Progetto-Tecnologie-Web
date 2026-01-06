<?php
session_start();
require_once "bootstrap.php";

if (!isUserLoggedIn() || getUserRole() !== 'admin') {
    header("Location: index.php");
    exit;
}

$action = $_POST['action'] ?? null;

if ($action === 'create') {

    if (empty($_POST['nome_facolta']) || empty($_POST['tipologia'])) {
        header("Location: admin.php?action=crea_facolta&error=missing");
        exit;
    }

    if ($dbh->addFacolta($_POST['nome_facolta'], $_POST['tipologia'])) {
        header("Location: admin.php?action=facolta&success=created");
    } else {
        header("Location: admin.php?action=crea_facolta&error=db");
    }
    exit;
}

if ($action === 'update') {

    if (
        empty($_POST['idfacolta']) ||
        empty($_POST['nome_facolta']) ||
        empty($_POST['tipologia'])
    ) {
        header("Location: admin.php?action=facolta&error=missing");
        exit;
    }

    if ($dbh->updateFacolta(
        intval($_POST['idfacolta']),
        $_POST['nome_facolta'],
        $_POST['tipologia']
    )) {
        header("Location: admin.php?action=facolta&success=updated");
    } else {
        header("Location: admin.php?action=modifica_facolta&idfacolta=" . $_POST['idfacolta'] . "&error=db");
    }
    exit;
}

if ($action === 'delete') {

    if (!isset($_POST['idfacolta']) || !is_numeric($_POST['idfacolta'])) {
        header("Location: admin.php?action=facolta&error=invalid");
        exit;
    }

    if ($dbh->deleteFacolta(intval($_POST['idfacolta']))) {
        header("Location: admin.php?action=facolta&success=deleted");
    } else {
        header("Location: admin.php?action=facolta&error=delete_failed");
    }
    exit;
}

header("Location: admin.php?action=facolta&error=invalid_action");
exit;
