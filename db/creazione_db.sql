CREATE SCHEMA IF NOT EXISTS pdfexchangeplatform DEFAULT CHARACTER SET utf8;
USE pdfexchangeplatform;

-- UTENTI
CREATE TABLE user (
    iduser INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(512) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB;

-- FACOLTÀ
CREATE TABLE facolta (
    idfacolta INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    tipologia ENUM('triennale', 'magistrale') NOT NULL
) ENGINE=InnoDB;

-- CORSI
CREATE TABLE corso (
    idcorso INT AUTO_INCREMENT PRIMARY KEY,
    idfacolta INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    anno TINYINT NOT NULL CHECK (anno BETWEEN 1 AND 3),
    FOREIGN KEY (idfacolta)
        REFERENCES facolta(idfacolta)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE pdf (
    idpdf INT AUTO_INCREMENT PRIMARY KEY,
    iduser INT NOT NULL,
    idcorso INT NOT NULL,
    nomefile VARCHAR(255) NOT NULL,
    path VARCHAR(255) NOT NULL,
    data_upload DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_pdf_user
        FOREIGN KEY (iduser)
        REFERENCES user(iduser)
        ON DELETE CASCADE,

    CONSTRAINT fk_pdf_corso
        FOREIGN KEY (idcorso)
        REFERENCES corso(idcorso)
        ON DELETE CASCADE
)ENGINE=InnoDB;

-- VALUTAZIONI PDF
CREATE TABLE valutazione_pdf (
    idvalutazione INT AUTO_INCREMENT PRIMARY KEY,
    idpdf INT NOT NULL,
    iduser INT NOT NULL,
    valore TINYINT NOT NULL CHECK (valore BETWEEN 1 AND 5),
    UNIQUE (idpdf, iduser),
    FOREIGN KEY (idpdf)
        REFERENCES pdf(idpdf)
        ON DELETE CASCADE,
    FOREIGN KEY (iduser)
        REFERENCES user(iduser)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- RELAZIONE USER - CORSO
CREATE TABLE user_corso (
    iduser INT NOT NULL,
    idcorso INT NOT NULL,
    PRIMARY KEY (iduser, idcorso),
    FOREIGN KEY (iduser)
        REFERENCES user(iduser)
        ON DELETE CASCADE,
    FOREIGN KEY (idcorso)
        REFERENCES corso(idcorso)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE notifica (
    idnotifica INT(11) NOT NULL AUTO_INCREMENT,
    iduser INT(11) NOT NULL,
    messaggio VARCHAR(255) NOT NULL,
    link VARCHAR(255) DEFAULT NULL,
    is_read TINYINT(1) NOT NULL DEFAULT 0,
    data_notifica DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (idnotifica),
    KEY idx_notifica_user (iduser),
    CONSTRAINT fk_notifica_user
        FOREIGN KEY (iduser)
        REFERENCES user(iduser)
        ON DELETE CASCADE
);
