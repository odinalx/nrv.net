INSERT INTO lieu (lieu_id, nom, adresse, nb_place_assise, nb_place_debout)
VALUES
('1b1aa5ad-cdfe-4d89-b121-e92dfd530999','Le Zenith', 'Avenue de la Libération, Nancy', 2000, 1000),
('81d8b308-c442-4a08-9381-4f7e9a88183c','La Forge', 'Rue de la Forge, Nancy', 500, 300),
('3f21fbad-6fbc-420e-a3d2-1ee9452baafc','L’Autre Canal', 'Avenue de l’Europe, Nancy', 700, 400),
('f28faace-e443-41fe-b780-480fdbb9312a','L’Auditorium', 'Rue des États-Unis, Nancy', 1000, 500);

INSERT INTO lieuimage (lieuimage_id, image)
VALUES 
('a966bee0-f85e-46aa-8d18-1983a1782d92','zenith.jpg'),
('7e69765c-8068-4986-b83b-66ca0a0fa34c','forge.jpg'),
('b46f2a91-94a0-46a6-b613-92777bc96803', 'autre_canal.jpg'),
('ed3b0c9f-a912-4106-a0d1-f4dfc7a2b54a','auditorium.jpg');

INSERT INTO lieu2lieuimage (lieu_id, lieuimage_id)
VALUES 
('1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 'a966bee0-f85e-46aa-8d18-1983a1782d92'),
('81d8b308-c442-4a08-9381-4f7e9a88183c', '7e69765c-8068-4986-b83b-66ca0a0fa34c'),
('3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 'b46f2a91-94a0-46a6-b613-92777bc96803'),
('f28faace-e443-41fe-b780-480fdbb9312a', 'ed3b0c9f-a912-4106-a0d1-f4dfc7a2b54a');


#################### BD SOIREE ####################
INSERT INTO soiree (soiree_id, nom, theme, date, horaire_debut, lieu_id, tarif_normal, tarif_reduit)
VALUES
('55351cb5-c06b-400e-89b5-f8866fd9c163', 'Soirée Rock', 'Rock', '2024-06-01', '18:00:00', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 25.00, 15.00),
('b2ea189e-2ac3-4293-8b87-2824114da008', 'Soirée Blues', 'Blues', '2024-06-02', '19:00:00', '81d8b308-c442-4a08-9381-4f7e9a88183c', 20.00, 12.00),
('b279833a-478a-4603-b761-34735e396b34', 'Festival Métal', 'Métal', '2024-06-03', '20:00:00', '3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 30.00, 20.00),
('48fb140c-4d5d-471f-a897-b11f74691f7c', 'Nuit de la Chanson', 'Chanson', '2024-06-04', '21:00:00', 'f28faace-e443-41fe-b780-480fdbb9312a', 18.00, 10.00),
('39d7b04f-8b0c-4c0f-acb1-1f6169ad79ee', 'Jazz au Canal', 'Jazz', '2024-06-05', '19:30:00', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 22.00, 14.00),
('f7d5ada0-084a-4a12-ba7a-22075fdc8064', 'Électronique Fiesta', 'Électronique', '2024-06-06', '23:00:00', '81d8b308-c442-4a08-9381-4f7e9a88183c', 28.00, 18.00),
('c1234567-89ab-cdef-0123-456789abcdef', 'Pop Night', 'Pop', '2024-06-07', '20:00:00', '3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 24.00, 16.00),
('d1234567-89ab-cdef-0123-456789abcdef', 'Rock Alternatif', 'Rock Alternatif', '2024-06-08', '21:30:00', 'f28faace-e443-41fe-b780-480fdbb9312a', 26.00, 17.00),
('e1234567-89ab-cdef-0123-456789abcdef', 'Acoustic Evening', 'Acoustique', '2024-06-09', '17:00:00', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 15.00, 8.00),
('f1234567-89ab-cdef-0123-456789abcdef', 'Talents en Scène', 'Divers', '2024-06-10', '19:00:00', '81d8b308-c442-4a08-9381-4f7e9a88183c', 19.00, 11.00);

#################### BD SPECTACLE ####################
INSERT INTO spectacle (spectacle_id,titre, description, style, url_video, horaire_prev, soiree_id)
VALUES
('43856f56-3cd4-4e35-9814-f5ae888f3b77', 'Concert de Rock', 'C''est un concert de Rock', 'Rock', 'rock.mp4', '20:00:00', '55351cb5-c06b-400e-89b5-f8866fd9c163'),
('cac53278-131f-4527-a65f-138713432222', 'Soirée Blues', 'Artiste Blues 1', 'Blues', 'blues.jpg', '21:00:00', 'b2ea189e-2ac3-4293-8b87-2824114da008'),
('810f8b94-55ae-4015-a4d3-fd4ec712fd93', 'Metal Night', 'Groupe Metal 1', 'Métal', 'metal.jpg', '22:00:00', 'b279833a-478a-4603-b761-34735e396b34'),
('87cc8ddd-df4e-425e-83cb-9c152bb0369b', 'Chanson Française', 'Chanteur 1', 'Chanson', 'chanson.jpg', '19:00:00', '48fb140c-4d5d-471f-a897-b11f74691f7c'),
('1c2048fb-50a3-4df9-a453-7f396915e52e', 'Jazz Session', 'Artiste Jazz 1', 'Jazz', 'jazz.jpg', '20:30:00', '39d7b04f-8b0c-4c0f-acb1-1f6169ad79ee'),
('362be1a6-8ee6-4127-abaf-3c5d37bf9f87', 'Festival de Musique Électronique', 'DJ Électronique 1', 'Électronique', 'electro.jpg', '23:00:00', 'f7d5ada0-084a-4a12-ba7a-22075fdc8064'),
('819cce78-101e-40a1-9658-51343fe5ffa0', 'Concert de Pop', 'Groupe Pop 1', 'Pop', 'pop.jpg', '18:00:00', '48fb140c-4d5d-471f-a897-b11f74691f7c'),
('58a4a9fc-2c3f-4d70-a5ea-85280a609472', 'Soirée Rock Alternatif', 'Groupe Rock Alternatif 1', 'Rock Alternatif', 'alt_rock.jpg', '21:30:00', '55351cb5-c06b-400e-89b5-f8866fd9c163'),
('e082642d-6970-4840-ac55-a216c4feb015', 'Performance Acoustique', 'Artiste Acoustique 1', 'Acoustique', 'acoustic.jpg', '17:00:00', 'b2ea189e-2ac3-4293-8b87-2824114da008'),
('6743fe9e-3ecd-468f-9189-7949b5f1ebea', 'Nuit des Talents', 'Groupe Local 1', 'Divers', 'divers.jpg', '19:30:00', '39d7b04f-8b0c-4c0f-acb1-1f6169ad79ee');


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
