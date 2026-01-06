<?php
require_once 'bootstrap.php';

if (!isUserLoggedIn()) {
    header("Location: login.php");
    exit;
}

$templateParams["titolo"] = "Carica PDF";
$templateParams["nome"] = "templates/utente_carica_pdf_template.php";
$templateParams["css_file"] = "style.css";
$templateParams["usa_sidebar"] = true;
$templateParams["errore"] = '';
$templateParams["facolta_list"] = $dbh->getAllFacolta();
$templateParams["corsi_list"] = [];


if (isset($_POST["conferma_upload"])) {
    $iduser    = $_SESSION["iduser"];
    $idfacolta = $_POST["idfacolta"] ?? null;
    $idcorso   = $_POST["idcorso"] ?? null;
    $file      = $_FILES["filepdf"] ?? null;
    $uploadDir = "uploads/pdf/";

    if (!$idfacolta || !$idcorso || !$file || $file["error"] == 4) {
        $templateParams["errore"] =
            "Tutti i campi (facoltà, corso e PDF) sono obbligatori.";
    } else {

        list($result, $msg) = uploadPdf($uploadDir, $file);

        if ($result == 1) {
            $dbPath = $uploadDir . $msg;

            if ($dbh->addPdf($iduser, $idcorso, $msg, $dbPath)) {

                $corso = $dbh->getCorsoById($idcorso);
                $utentiSeguitori = $dbh->getUserCheSeguonoCorso($idcorso);

                $messaggio = 'Nuovo PDF "' . $msg . '" caricato nel corso: "' . $corso["nome"] . '"';
                $link = "pdf_corso_controller.php?idcorso=" . $idcorso;


                foreach ($utentiSeguitori as $u) {
                    if ($u["iduser"] != $iduser) {
                        $dbh->addNotifica(
                            $u["iduser"],
                            $messaggio,
                            $link
                        );
                    }
                }

                header("Location: utente_upload.php");
                exit;

            } else {
                $templateParams["errore"] =
                    "Errore nel salvataggio del PDF nel database.";
            }
        } else {
            $templateParams["errore"] = $msg;
        }
    }
}


if (isset($_GET["get_corsi"]) && !empty($_GET["idfacolta"])) {
    $idfacolta = intval($_GET["idfacolta"]);
    $corsi = $dbh->getCorsiByFacolta($idfacolta);
    header('Content-Type: application/json');
    echo json_encode($corsi);
    exit;
}

require 'templates/base.php';
