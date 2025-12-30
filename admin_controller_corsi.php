<?php
session_start();
require_once "bootstrap.php";

if (!isUserLoggedIn() || getUserRole() !== 'admin') {
    header("Location: index.php");
    exit;
}

$action = $_POST['action'] ?? null;

if ($action === 'create') {
    $dbh->addCorso(
        $_POST['nome'],
        $_POST['codice'],
        $_POST['anno'],
        $_POST['idfacolta']
    );
    header("Location: admin.php?action=corsi&idfacolta=".$_POST['idfacolta']);
    exit;
}

if ($action === 'update') {
    $dbh->updateCorso(
        $_POST['idcorso'],
        $_POST['nome'],
        $_POST['codice'],
        $_POST['anno']
    );
    header("Location: admin.php?action=facolta");
    exit;
}

if ($action === 'delete') {
    $dbh->deleteCorso($_POST['idcorso']);
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit;
}
