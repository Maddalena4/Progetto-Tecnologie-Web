<?php

function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " active ";
    }
}

function isUserLoggedIn(){
    return !empty($_SESSION['iduser']);
}

function registerLoggedUser($user){
    $_SESSION["iduser"] = $user["iduser"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["role"] = $user["role"];
}

function getUserRole(){
    return !empty($_SESSION['role']) ? $_SESSION['role'] : null;
}

function uploadPdf($path, $file){
    $fileName = basename($file["name"]);
    $fullPath = $path.$fileName;
    
    $maxKB = 5000;
    $acceptedExtensions = array("pdf");
    $result = 0;
    $msg = "";

    if ($file["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    $fileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($fileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $fileName = pathinfo(basename($file["name"]), PATHINFO_FILENAME)."_$i.".$fileType;
        }
        while(file_exists($path.$fileName));
        $fullPath = $path.$fileName;
    }

    if(strlen($msg)==0){
        if(!move_uploaded_file($file["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento del file.";
        }
        else{
            $result = 1;
            $msg = $fileName;
        }
    }
    return array($result, $msg);
}
?>