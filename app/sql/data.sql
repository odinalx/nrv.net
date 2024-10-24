INSERT INTO lieu (lieu_id, nom, adresse, nb_place_assise, nb_place_debout)
VALUES
('1b1aa5ad-cdfe-4d89-b121-e92dfd530999','Le Zenith', 'Avenue de la Libération, Nancy', 2000, 1000),
('81d8b308-c442-4a08-9381-4f7e9a88183c','Place Stanislas', 'Place Stanislas, Nancy', 500, 300),
('3f21fbad-6fbc-420e-a3d2-1ee9452baafc','L’Autre Canal', 'Avenue de l’Europe, Nancy', 700, 400),
('f28faace-e443-41fe-b780-480fdbb9312a','L’Auditorium', 'Rue des États-Unis, Nancy', 1000, 500);

INSERT INTO lieuimage (lieuimage_id, image)
VALUES 
('712623bd-fc8a-49f0-a211-bd3815b53d64','zenith1.jpg'),
('5d6c2d87-a8c1-4367-bbd1-b3dcbea2f018','zenith2.jpg'),
('74c551b8-be74-4c9a-9fd7-b1172b56832a','zenith3.jpg'),
('9319ccef-8fc6-4311-b227-ee45d5bf52ed','canal1.jpg'),
('65074ad1-4149-4592-b607-ae28ae11e280','canal2.jpg'),
('0ef9ab9a-9b5d-47b4-a3aa-ab3b7752d129','canal3.jpg'),
('e59b8b8c-0e29-40c1-a44b-8ef50a0e3946','stan1.jpg'),
('4ad152cb-6115-43db-b42e-c1a899f35867','stan2.jpg'),
('19e5d5e6-100e-4e45-b504-92304950305d','stan3.jpg'),
('9a89c7f6-7f70-4172-a9f3-3f56dc6425cc','auditorium1.jpg'),
('09849bbe-d535-400c-85c9-f6d30d7145a3','auditorium2.jpg');

INSERT INTO lieu2lieuimage (lieu_id, lieuimage_id)
VALUES 
('1b1aa5ad-cdfe-4d89-b121-e92dfd530999', '712623bd-fc8a-49f0-a211-bd3815b53d64'),
('1b1aa5ad-cdfe-4d89-b121-e92dfd530999', '5d6c2d87-a8c1-4367-bbd1-b3dcbea2f018'),
('1b1aa5ad-cdfe-4d89-b121-e92dfd530999', '74c551b8-be74-4c9a-9fd7-b1172b56832a'),
('3f21fbad-6fbc-420e-a3d2-1ee9452baafc', '9319ccef-8fc6-4311-b227-ee45d5bf52ed'),
('3f21fbad-6fbc-420e-a3d2-1ee9452baafc', '65074ad1-4149-4592-b607-ae28ae11e280'),
('3f21fbad-6fbc-420e-a3d2-1ee9452baafc', '0ef9ab9a-9b5d-47b4-a3aa-ab3b7752d129'),
('81d8b308-c442-4a08-9381-4f7e9a88183c', 'e59b8b8c-0e29-40c1-a44b-8ef50a0e3946'),
('81d8b308-c442-4a08-9381-4f7e9a88183c', '4ad152cb-6115-43db-b42e-c1a899f35867'),
('81d8b308-c442-4a08-9381-4f7e9a88183c', '19e5d5e6-100e-4e45-b504-92304950305d'),
('f28faace-e443-41fe-b780-480fdbb9312a', '9a89c7f6-7f70-4172-a9f3-3f56dc6425cc'),
('f28faace-e443-41fe-b780-480fdbb9312a', '09849bbe-d535-400c-85c9-f6d30d7145a3');


INSERT INTO soiree (soiree_id, nom, theme, date, horaire_debut, lieu_id, tarif_normal, tarif_reduit,places_dispo)
VALUES
('55351cb5-c06b-400e-89b5-f8866fd9c163', 'Soirée Rock', 'Rock', '2024-06-01', '18:00:00', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 25.00, 15.00,3000),
('b2ea189e-2ac3-4293-8b87-2824114da008', 'Soirée Blues', 'Blues', '2024-06-02', '19:00:00', '81d8b308-c442-4a08-9381-4f7e9a88183c', 20.00, 12.00,800),
('b279833a-478a-4603-b761-34735e396b34', 'Festival Métal', 'Métal', '2024-06-03', '20:00:00', '3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 30.00, 20.00,1100),
('48fb140c-4d5d-471f-a897-b11f74691f7c', 'Nuit de la Chanson', 'Chanson', '2024-06-04', '21:00:00', 'f28faace-e443-41fe-b780-480fdbb9312a', 18.00, 10.00,1500),
('39d7b04f-8b0c-4c0f-acb1-1f6169ad79ee', 'Jazz au Canal', 'Jazz', '2024-06-05', '19:30:00', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 22.00, 14.00,3000),
('f7d5ada0-084a-4a12-ba7a-22075fdc8064', 'Électronique Fiesta', 'Électronique', '2024-06-06', '23:00:00', '81d8b308-c442-4a08-9381-4f7e9a88183c', 28.00, 18.00,800),
('c1234567-89ab-cdef-0123-456789abcdef', 'Pop Night', 'Pop', '2024-06-07', '20:00:00', '3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 24.00, 16.00,1100),
('d1234567-89ab-cdef-0123-456789abcdef', 'Rock Alternatif', 'Rock Alternatif', '2024-06-08', '21:30:00', 'f28faace-e443-41fe-b780-480fdbb9312a', 26.00, 17.00,1500),
('e1234567-89ab-cdef-0123-456789abcdef', 'Acoustic Evening', 'Acoustique', '2024-06-09', '17:00:00', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 15.00, 8.00,3000),
('f1234567-89ab-cdef-0123-456789abcdef', 'Talents en Scène', 'Divers', '2024-06-10', '19:00:00', '81d8b308-c442-4a08-9381-4f7e9a88183c', 19.00, 11.00,800);

INSERT INTO spectacle (spectacle_id,titre, description, style, url_video, horaire_prev, soiree_id)
VALUES
('43856f56-3cd4-4e35-9814-f5ae888f3b77', 'Concert de Rock', 'C''est un concert de Rock', 'Rock', 'rock.mp4', '20:00:00', '55351cb5-c06b-400e-89b5-f8866fd9c163'),
('cac53278-131f-4527-a65f-138713432222', 'Soirée Blues', 'Artiste Blues 1', 'Blues', 'blues.mp4', '21:00:00', 'b2ea189e-2ac3-4293-8b87-2824114da008'),
('810f8b94-55ae-4015-a4d3-fd4ec712fd93', 'Metal Night', 'Groupe Metal 1', 'Métal', 'metal.mp4', '22:00:00', 'b279833a-478a-4603-b761-34735e396b34'),
('87cc8ddd-df4e-425e-83cb-9c152bb0369b', 'Chanson Française', 'Chanteur 1', 'Chanson', 'chanson.mp4', '19:00:00', '48fb140c-4d5d-471f-a897-b11f74691f7c'),
('1c2048fb-50a3-4df9-a453-7f396915e52e', 'Jazz Session', 'Artiste Jazz 1', 'Jazz', 'jazz.mp4', '20:30:00', '39d7b04f-8b0c-4c0f-acb1-1f6169ad79ee'),
('362be1a6-8ee6-4127-abaf-3c5d37bf9f87', 'Festival de Musique Électronique', 'DJ Électronique 1', 'Électronique', 'electro.mp4', '23:00:00', 'f7d5ada0-084a-4a12-ba7a-22075fdc8064'),
('819cce78-101e-40a1-9658-51343fe5ffa0', 'Concert de Pop', 'Groupe Pop 1', 'Pop', 'pop.mp4', '18:00:00', '48fb140c-4d5d-471f-a897-b11f74691f7c'),
('58a4a9fc-2c3f-4d70-a5ea-85280a609472', 'Soirée Rock Alternatif', 'Groupe Rock Alternatif 1', 'Rock Alternatif', 'gens.mp4', '21:30:00', '55351cb5-c06b-400e-89b5-f8866fd9c163'),
('e082642d-6970-4840-ac55-a216c4feb015', 'Performance Acoustique', 'Artiste Acoustique 1', 'Acoustique', 'acoustic.mp4', '17:00:00', 'b2ea189e-2ac3-4293-8b87-2824114da008'),
('6743fe9e-3ecd-468f-9189-7949b5f1ebea', 'Nuit des Talents', 'Groupe Local 1', 'Divers', 'disco.mp4', '19:30:00', '39d7b04f-8b0c-4c0f-acb1-1f6169ad79ee');


INSERT INTO spectacleimage (spectacleimage_id, image)
VALUES
('eeb1d0c5-46c9-4a93-8973-148de6bb19d0', 'rock.jpg'),
('e1c305bb-2f02-46a2-bac4-14fdc8b5f5ae', 'blues.jpg'),
('2632d9b6-7bb8-466e-9cc5-f1d255ddec1e', 'metal.jpg'),
('5650ef0b-3bf1-4c28-a73a-46ac098def46', 'chanson.jpg'),
('2801b3da-799e-4953-b2a9-563fbb808340', 'jazz.jpg'),
('81a9b177-a68c-4f0a-8143-0cd47de07a70', 'electro.jpg'),
('51186c68-2be4-4695-bce0-775a5d8bf0ab', 'pop.jpg'),
('6a7ccffa-f238-4555-8812-f29450ab6525', 'alt_rock.jpg'),
('52a7ed02-1ada-4bb3-b06b-a38a547837ef', 'acoustic.jpg'),
('283078ea-dd03-4f05-8856-e3f420413e43', 'divers.jpg');

INSERT INTO spectacle2spectacleimage (spectacle_id, spectacleimage_id)
VALUES
('43856f56-3cd4-4e35-9814-f5ae888f3b77', 'eeb1d0c5-46c9-4a93-8973-148de6bb19d0'),
('cac53278-131f-4527-a65f-138713432222', 'e1c305bb-2f02-46a2-bac4-14fdc8b5f5ae'),
('810f8b94-55ae-4015-a4d3-fd4ec712fd93', 'eeb1d0c5-46c9-4a93-8973-148de6bb19d0'),
('87cc8ddd-df4e-425e-83cb-9c152bb0369b', 'e1c305bb-2f02-46a2-bac4-14fdc8b5f5ae'),
('1c2048fb-50a3-4df9-a453-7f396915e52e', '2632d9b6-7bb8-466e-9cc5-f1d255ddec1e'),
('362be1a6-8ee6-4127-abaf-3c5d37bf9f87', '2801b3da-799e-4953-b2a9-563fbb808340'),
('819cce78-101e-40a1-9658-51343fe5ffa0', '2632d9b6-7bb8-466e-9cc5-f1d255ddec1e'),
('58a4a9fc-2c3f-4d70-a5ea-85280a609472', '2801b3da-799e-4953-b2a9-563fbb808340'),
('e082642d-6970-4840-ac55-a216c4feb015', '52a7ed02-1ada-4bb3-b06b-a38a547837ef'),
('6743fe9e-3ecd-468f-9189-7949b5f1ebea', '283078ea-dd03-4f05-8856-e3f420413e43');


INSERT INTO utilisateur (user_id, nom, prenom, email, password, role)
VALUES
('1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 'Dupont', 'Jean', 'jean@gmail.com', 'password', 'admin'),
('81d8b308-c442-4a08-9381-4f7e9a88183c', 'Durand', 'Paul', 'paul@gmail.com' , 'oui', 'user'),
('e9e224d3-7d15-4078-bf52-2ef5036e5747', 'Doe', 'John', 'john@gmail.com', 'mdp', 'user');

INSERT INTO panier(panier_id, user_id)
VALUES
('f76e2644-f264-4d54-992b-ed0d2e28bd91', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999'),
('b1bca165-01e7-4fc0-b0a1-9d513f3d845b', '81d8b308-c442-4a08-9381-4f7e9a88183c');

INSERT INTO billet_panier(id,panier_id,soiree_id,quantite,prix)
VALUES
('4a54f88a-7dbe-412c-8b5b-9e1e9a492bb0','f76e2644-f264-4d54-992b-ed0d2e28bd91','55351cb5-c06b-400e-89b5-f8866fd9c163',2,50.00),
('625f9f16-737f-40b3-a61d-ff95a2b99d8f','b1bca165-01e7-4fc0-b0a1-9d513f3d845b','b2ea189e-2ac3-4293-8b87-2824114da008',1,20.00);

INSERT INTO commande (commande_id,user_id,panier_id,prix_total,status)
VALUES
('180b1348-9721-4e5c-9417-18dbf6f7ce27','1b1aa5ad-cdfe-4d89-b121-e92dfd530999','f76e2644-f264-4d54-992b-ed0d2e28bd91',100.00,'en attente'),
('06f3b61c-3cd1-4a29-b86b-df0fc7fd9602','81d8b308-c442-4a08-9381-4f7e9a88183c','b1bca165-01e7-4fc0-b0a1-9d513f3d845b',20.00,'en attente');


INSERT INTO billet(billet_id,commande_id,soiree_id)
VALUES
('f2fd4fc6-2613-4407-8ac3-efe0206e3109','180b1348-9721-4e5c-9417-18dbf6f7ce27','55351cb5-c06b-400e-89b5-f8866fd9c163'),
('4505ea3b-55df-4864-808d-9c9942275fbc','06f3b61c-3cd1-4a29-b86b-df0fc7fd9602','b2ea189e-2ac3-4293-8b87-2824114da008');


INSERT INTO artiste(artiste_id,nom,prenom)
VALUES
('5e260c64-a6c1-491c-b2b5-44ee2dfb367e','Arcelin','Nino'),
('166f1042-bdf0-4023-9169-e62e9005f41c','Vela-Mena','Dimitri'),
('50e25062-c083-474e-a500-0e23661b80cc','Ratovobodo','Nicka'),
('f9b45070-120f-49a4-9f4c-9b648ba3586d','Amaglio','Matias');

INSERT INTO spectacle2artiste(spectacle_id,artiste_id)
VALUES
('43856f56-3cd4-4e35-9814-f5ae888f3b77','5e260c64-a6c1-491c-b2b5-44ee2dfb367e'),
('cac53278-131f-4527-a65f-138713432222','166f1042-bdf0-4023-9169-e62e9005f41c'),
('810f8b94-55ae-4015-a4d3-fd4ec712fd93','50e25062-c083-474e-a500-0e23661b80cc'),
('87cc8ddd-df4e-425e-83cb-9c152bb0369b','f9b45070-120f-49a4-9f4c-9b648ba3586d');