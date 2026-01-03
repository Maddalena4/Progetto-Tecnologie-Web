INSERT INTO user (email, password, role) VALUES
('maddalena.prandini@studio.unibo.it', 'ok', 'admin'),
('ciao.ciao@gmail.com', 'prova', 'user');

INSERT INTO facolta (nome, tipologia) VALUES
('Informatica', 'triennale'),
('Ingegneria', 'triennale'),
('Data Science', 'magistrale');

INSERT INTO corso (idfacolta, nome, anno) VALUES
(1, 'Programmazione I', 1),
(1, 'Basi di Dati', 2),
(2, 'Analisi Matematica', 1),
(3, 'Machine Learning', 1);

INSERT INTO user_corso (iduser, idcorso) VALUES
(2, 1),
(2, 2),
(2, 4);

INSERT INTO pdf (idcorso, nomefile, path)
VALUES
(1, 'analisi.pdf', 'upload/pdf/analisi.pdf');
