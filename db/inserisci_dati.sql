INSERT INTO user (email, password, role) VALUES
('admin@mail.it', '$2y$10$Z9mZrY5t6dJrY1Yqv2cVSOe9yQwF6E1rK6Vn5YqJ6NqE6OZ5uXy', 'admin'),
('user@mail.it', '$2y$10$Z9mZrY5t6dJrY1Yqv2cVSOe9yQwF6E1rK6Vn5YqJ6NqE6OZ5uXy', 'user');

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
