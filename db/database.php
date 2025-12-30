<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    // Login
   public function loginUser($email, $password) {
    $stmt = $this->db->prepare(
        "SELECT iduser, email, password, role FROM user WHERE email = ?"
    );
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $password === $user['password']) {
        return [
            'iduser' => $user['iduser'],
            'email'  => $user['email'],
            'role'   => $user['role']
        ];
    }

    return false;
}

    // Registrazione
   public function registerUser($email, $password) {

    // controllo email esistente
    $stmt = $this->db->prepare(
        "SELECT iduser FROM user WHERE email = ?"
    );
    $stmt->bind_param('s', $email);
    $stmt->execute();

    if ($stmt->get_result()->num_rows > 0) {
        return "Email già registrata";
    }

    // insert password IN CHIARO
    $stmt = $this->db->prepare(
        "INSERT INTO user (email, password, role) VALUES (?, ?, 'user')"
    );
    $stmt->bind_param('ss', $email, $password);

    return $stmt->execute()
        ? "Registrazione completata"
        : "Errore durante la registrazione";
}


    // Admin: Statistiche Home
    public function getDashboardStats() {
        $stats = [];
        
        $result = $this->db->query("SELECT COUNT(*) as count FROM user");
        $stats['utenti'] = $result->fetch_assoc()['count'];

        $result = $this->db->query("SELECT COUNT(*) as count FROM facolta");
        $stats['facolta'] = $result->fetch_assoc()['count'];

        $result = $this->db->query("SELECT COUNT(*) as count FROM corso");
        $stats['corsi'] = $result->fetch_assoc()['count'];

        return $stats;
    }

    // Admin: Lista Facoltà
    public function getAllFacolta() {
        $stmt = $this->db->prepare("SELECT idfacolta, nome, tipologia FROM facolta");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getFacoltaById($idFacolta){
        $stmt = $this->db->prepare("SELECT * FROM facolta WHERE idfacolta = ?");
        $stmt->bind_param("i", $idFacolta);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    
    // Admin: Corsi per facoltà e anno
    public function getCorsiByFacoltaAnno($idFacolta, $anno) {
        $stmt = $this->db->prepare("SELECT * FROM corso WHERE idfacolta = ? AND anno = ?");
        $stmt->bind_param('ii', $idFacolta, $anno);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteFacolta($idFacolta){
        $stmt = $this->db->prepare("DELETE FROM facolta WHERE idfacolta = ?");
        $stmt->bind_param("i", $idFacolta);
        return $stmt->execute();
    }

    public function addFacolta($nomeFacolta, $tipologia) {
        $stmt = $this->db->prepare(
            "INSERT INTO facolta (nome, tipologia) VALUES (?, ?)"
        );
        $stmt->bind_param("ss", $nomeFacolta, $tipologia);
        return $stmt->execute();
    }

    public function updateFacolta($idFacolta, $nuovoNome, $nuovaTipologia) {
        $stmt = $this->db->prepare("UPDATE facolta SET nome = ?, tipologia = ? WHERE idfacolta = ?");        
        $stmt->bind_param("ssi", $nuovoNome, $nuovaTipologia, $idFacolta);
        return $stmt->execute();
    }
    public function getCorsoById($id) {
    $stmt = $this->db->prepare("SELECT * FROM corso WHERE idcorso = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
    }

    public function addCorso($nome, $codice, $anno, $idfacolta) {
        $stmt = $this->db->prepare(
            "INSERT INTO corso (nome, codice, anno, idfacolta)
            VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("ssii", $nome, $codice, $anno, $idfacolta);
        return $stmt->execute();
    }

    public function updateCorso($id, $nome, $codice, $anno) {
        $stmt = $this->db->prepare(
            "UPDATE corso SET nome=?, codice=?, anno=? WHERE idcorso=?"
        );
        $stmt->bind_param("ssii", $nome, $codice, $anno, $id);
        return $stmt->execute();
    }

    public function deleteCorso($id) {
        $stmt = $this->db->prepare("DELETE FROM corso WHERE idcorso=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }


}
?>