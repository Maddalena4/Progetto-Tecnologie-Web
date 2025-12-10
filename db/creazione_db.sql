SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `pdfexchangeplatform` DEFAULT CHARACTER SET utf8 ;
USE `pdfexchangeplatform` ;

CREATE TABLE IF NOT EXISTS `pdfexchangeplatform`.`user` (
    `iduser` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(512) NOT NULL,
    `role` ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    PRIMARY KEY (`idautore`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `pdfexchangeplatform`.`facolta` (
    `idfacolta` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(100) NOT NULL,
    `tipologia` ENUM('triennale', 'magistrale') NOT NULL,
    PRIMARY KEY(`idfacolta`)
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `pdfexchangeplatform`.`corso` (
    `idcorso` INT NOT NULL AUTO_INCREMENT,
    `idfacolta` INT NOT NULL,
    `nome` VARCHAR(100) NOT NULL,
    `anno` TINYINT NOT NULL,
    PRIMARY KEY (`idcorso`),
    INDEX `fk_corso_facolta_idx` (`idfacolta` ASC),
    CONSTRAINT `chk_anno_valid`
        CHECK (`anno` IN (1, 2, 3)),
    CONSTRAINT `fk_corso_facolta`
        FOREIGN KEY (`idfacolta`)
        REFERENCES `pdfexchangeplatform`.`facolta`(`idfacolta`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) 
ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `pdfexchangeplatform`.`pdf` (
    `idpdf` INT NOT NULL AUTO_INCREMENT,
    `idcorso` INT NOT NULL,
    `nomefile` VARCHAR(255) NOT NULL,
    `contenuto` LONGBLOB NOT NULL,
    `mime_type` VARCHAR(50) NOT NULL DEFAULT 'application/pdf',
    `upload_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`idpdf`),
    INDEX `fk_pdf_corso_idx` (`idcorso` ASC),
    CONSTRAINT `fk_pdf_corso`
        FOREIGN KEY (`idcorso`)
        REFERENCES `pdfexchangeplatform`.`corso` (`idcorso`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `pdfexchangeplatform`.`valutazione_pdf` (
    `idvalutazione` INT NOT NULL AUTO_INCREMENT,
    `idpdf` INT NOT NULL,
    `iduser` INT NOT NULL,
    `valore` TINYINT NOT NULL CHECK (`valore` BETWEEN 1 AND 5),
    PRIMARY KEY (`idvalutazione`),
    UNIQUE KEY `unique_user_pdf` (`idpdf`, `iduser`),
    FOREIGN KEY (`idpdf`) REFERENCES `pdfexchangeplatform`.`pdf` (`idpdf`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`iduser`) REFERENCES `pdfexchangeplatform`.`users` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `pdfexchangeplatform`.`user_corso` (
    `iduser` INT NOT NULL,
    `idcorso` INT NOT NULL,
    PRIMARY KEY (`iduser`, `idcorso`),
    FOREIGN KEY (`iduser`) REFERENCES `pdfexchangeplatform`.`users`(`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`idcorso`) REFERENCES `pdfexchangeplatform`.`corso`(`idcorso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
