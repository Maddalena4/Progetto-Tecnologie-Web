<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    public function loginUser($email, $password) {
        $stmt = $this->db->prepare("SELECT iduser, password, role FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            return [
                'iduser' => $user['iduser'],
                'role' => $user['role']
            ];
        } else {
            return false;
        }
    }

    public function registerUser($email, $password) {
        $stmt = $this->db->prepare("SELECT iduser FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return "Email già registrata";
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param('ss', $email, $hash);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            return "Registrazione completata";
        } else {
            return "Errore durante la registrazione";
        }
    }

    public function getAllFacolta() {
        $stmt = $this->db->prepare("SELECT idfacolta, nome, tipologia FROM facolta");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAnniPerFacolta($idfacolta) {
        $stmt = $this->db->prepare("SELECT tipologia FROM facolta WHERE idfacolta = ?");
        $stmt->bind_param('i', $idfacolta);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if (!$row) {
            return [];
        }
        $tipologia = $row['tipologia'];
        if ($tipologia === 'magistrale') {
            return [1, 2];
        } elseif ($tipologia === 'triennale') {
            return [1, 2, 3];
        } else {
            return [];
        }
    }

    public function getCorsiPerFacoltaAnno($idfacolta, $anno) {
        $stmt = $this->db->prepare("
            SELECT idcorso, nome 
            FROM corso 
            WHERE facolta = ? AND anno = ?
        ");
        $stmt->bind_param('ii', $idfacolta, $anno);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPdfPerCorso($idcorso) {
        $stmt = $this->db->prepare("
            SELECT idpdf, nomefile, mime_type
            FROM pdf 
            WHERE idcorso = ?
        ");
        $stmt->bind_param('i', $idcorso);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


}

?>