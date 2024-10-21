USE USERS_DB;

INSERT INTO ROLES (ROLE_NAME) 
VALUES ('ADMIN'), ('USER');

INSERT INTO USERS (EMAIL, PASSWORD, NOM, PRENOM, ROLE_ID) 
VALUES 
('admin1@nrv.net', 'adminPass1', 'Dupont', 'Jean', 1),
('admin2@nrv.net', 'adminPass2', 'Lefevre', 'Marie', 1), 
('user1@nrv.net', 'userPass1', 'Martin', 'Pierre', 2), 
('user2@nrv.net', 'userPass2', 'Durand', 'Claire', 2), 
('user3@nrv.net', 'userPass3', 'Bernard', 'Luc', 2), 
('user4@nrv.net', 'userPass4', 'Moreau', 'Sophie', 2), 
('user5@nrv.net', 'userPass5', 'Petit', 'Julien', 2), 
('user6@nrv.net', 'userPass6', 'Rousseau', 'Camille', 2), 
('user7@nrv.net', 'userPass7', 'Girard', 'Antoine', 2), 
('user8@nrv.net', 'userPass8', 'Fournier', 'Elise', 2);

