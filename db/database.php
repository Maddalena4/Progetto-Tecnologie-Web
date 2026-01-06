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

    public function getCorsiByFacolta($idfacolta) {
    $stmt = $this->db->prepare(
        "SELECT * FROM corso WHERE idfacolta = ?"
    );
    $stmt->bind_param("i", $idfacolta);
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

    public function getAllCorsi() {
    $stmt = $this->db->prepare("SELECT * FROM corso");
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function addCorso($nome, $anno, $idfacolta) {
        $stmt = $this->db->prepare(
            "INSERT INTO corso (nome, anno, idfacolta)
            VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sii", $nome, $anno, $idfacolta);
        return $stmt->execute();
    }

    public function updateCorso($id, $nome, $anno) {
        $stmt = $this->db->prepare(
            "UPDATE corso SET nome=?, anno=? WHERE idcorso=?"
        );
        $stmt->bind_param("sii", $nome, $anno, $id);
        return $stmt->execute();
    }

    public function deleteCorso($id) {
        $stmt = $this->db->prepare("DELETE FROM corso WHERE idcorso=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getTipologiaByIdFacolta($idFacolta){
        $stmt = $this->db->prepare("SELECT tipologia FROM facolta WHERE idFacolta = ?");
        $stmt->bind_param("i", $idFacolta);
        return $stmt->execute();        
    }

    public function getPdfByCorso($idcorso) {
        $stmt = $this->db->prepare(
            "SELECT * FROM pdf WHERE idcorso = ?"
        );
        $stmt->bind_param("i", $idcorso);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Inserimento PDF
    public function addPdf($iduser, $idcorso, $nomefile, $path) {
        $stmt = $this->db->prepare(
            "INSERT INTO pdf (iduser, idcorso, nomefile, path)
            VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("iiss", $iduser, $idcorso, $nomefile, $path);
        return $stmt->execute();
    }


    public function followCorso($idcorso, $iduser) {
        $stmt = $this->db->prepare(
            "INSERT IGNORE INTO user_corso (iduser, idcorso) VALUES (?, ?)"
        );
        $stmt->bind_param("ii", $iduser, $idcorso);
        return $stmt->execute();
    }

    public function isCorsoSeguito($idcorso, $iduser) {
        $stmt = $this->db->prepare(
            "SELECT 1 FROM user_corso WHERE iduser = ? AND idcorso = ?"
        );
        $stmt->bind_param("ii", $iduser, $idcorso);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function unfollowCorso($idcorso, $iduser) {
        $stmt = $this->db->prepare("DELETE FROM user_corso WHERE iduser = ? AND idcorso = ?");
        $stmt->bind_param("ii", $iduser, $idcorso);
        return $stmt->execute();
    }

    public function getPdfByUser($iduser) {
        $stmt = $this->db->prepare(
            "SELECT * FROM pdf WHERE iduser = ?"
        );
        $stmt->bind_param("i", $iduser);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getCorsiSeguitiByUser($iduser) {
        $stmt = $this->db->prepare(
            "SELECT 
                c.idcorso,
                c.nome,
                c.anno,
                f.nome AS nome_facolta
            FROM corso c
            JOIN user_corso uc ON c.idcorso = uc.idcorso
            JOIN facolta f ON c.idfacolta = f.idfacolta
            WHERE uc.iduser = ?"
        );
        $stmt->bind_param("i", $iduser);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllPdf($search = null) {
        if ($search) {
            $stmt = $this->db->prepare(
                "SELECT pdf.*, corso.nome AS corso_nome
                FROM pdf
                JOIN corso ON pdf.idcorso = corso.idcorso
                WHERE pdf.nomefile LIKE ?
                ORDER BY pdf.data_upload DESC"
            );
            $like = "%" . $search . "%";
            $stmt->bind_param("s", $like);
        } else {
            $stmt = $this->db->prepare(
                "SELECT pdf.*, corso.nome AS corso_nome
                FROM pdf
                JOIN corso ON pdf.idcorso = corso.idcorso
                ORDER BY pdf.data_upload DESC"
            );
        }

        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function valutaPdf($idpdf, $iduser, $valore) {
        $stmt = $this->db->prepare("
            INSERT INTO valutazione_pdf (idpdf, iduser, valore)
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE valore = VALUES(valore)");
        $stmt->bind_param("iii", $idpdf, $iduser, $valore);
        return $stmt->execute();
    }


    public function getMediaValutazionePdf($idpdf) {
        $stmt = $this->db->prepare("
            SELECT ROUND(AVG(valore), 1) AS media, COUNT(*) AS totale
            FROM valutazione_pdf
            WHERE idpdf = ?");
        $stmt->bind_param("i", $idpdf);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return [
                "media" => (float)$row["media"],
                "totale" => (int)$row["totale"]
            ];
        }
        return ["media" => 0, "totale" => 0];
    }

    public function getValutazioneUtentePdf($idpdf, $iduser) {
        $stmt = $this->db->prepare("
            SELECT valore
            FROM valutazione_pdf
            WHERE idpdf = ? AND iduser = ?");
        $stmt->bind_param("ii", $idpdf, $iduser);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_row();

        return $row ? (int)$row[0] : null;
    }

    public function getPdfValutatiDaUtente($iduser) {
        $stmt = $this->db->prepare("
            SELECT 
                p.idpdf,
                p.nomefile,
                p.path,
                v.valore AS voto_utente,
                ROUND(AVG(v2.valore), 1) AS media,
                COUNT(v2.idvalutazione) AS totale_voti
            FROM valutazione_pdf v
            JOIN pdf p ON p.idpdf = v.idpdf
            LEFT JOIN valutazione_pdf v2 ON v2.idpdf = p.idpdf
            WHERE v.iduser = ?
            GROUP BY p.idpdf
        ");
        $stmt->bind_param("i", $iduser);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserCheSeguonoCorso($idcorso) {
        $stmt = $this->db->prepare(
            "SELECT iduser FROM user_corso WHERE idcorso = ?"
        );
        $stmt->bind_param("i", $idcorso);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function addNotifica($iduser, $messaggio, $link = null) {
        $stmt = $this->db->prepare(
            "INSERT INTO notifica (iduser, messaggio, link)
            VALUES (?, ?, ?)"
        );
        $stmt->bind_param("iss", $iduser, $messaggio, $link);
        return $stmt->execute();
    }

    public function getNotificheByUser($iduser) {
        $stmt = $this->db->prepare(
            "SELECT *
            FROM notifica
            WHERE iduser = ?
            ORDER BY data_notifica DESC
            LIMIT 10"
        );
        $stmt->bind_param("i", $iduser);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }



}
?>