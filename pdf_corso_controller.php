<?php
    require_once "bootstrap.php";

    if (!isset($_GET['idcorso'])) {
        die("Corso non valido");
    }

    $idcorso = intval($_GET['idcorso']);

    $corso = $dbh->getCorsoById($idcorso);
    $pdfs  = $dbh->getPdfByCorso($idcorso);

    if (!$corso) {
        die("Corso non trovato");
    }

    $templateParams = [
        "titolo" => $corso["nome"],
        "nome" => "templates/pdf_corso.php",
        "css_file" => "style.css",
        "usa_sidebar" => true,
        "corso" => $corso,
        "pdfs" => $pdfs
    ];

require "templates/base.php";

?>
