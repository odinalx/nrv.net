INSERT INTO lieu (nom, adresse, nb_place_assise, nb_place_debout) 
VALUES 
('Le Zenith', 'Avenue de la Libération, Nancy', 2000, 1000),
('La Forge', 'Rue de la Forge, Nancy', 500, 300),
('L’Autre Canal', 'Avenue de l’Europe, Nancy', 700, 400),
('L’Auditorium', 'Rue des États-Unis, Nancy', 1000, 500);

INSERT INTO lieuimage (image)
VALUES 
('zenith.jpg'),
('forge.jpg'),
('autre_canal.jpg'),
('auditorium.jpg');

INSERT INTO lieu2lieuimage (lieu_id, lieuimage_id)
VALUES 
('1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 'a966bee0-f85e-46aa-8d18-1983a1782d92'),
('81d8b308-c442-4a08-9381-4f7e9a88183c', '7e69765c-8068-4986-b83b-66ca0a0fa34c'),
('3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 'b46f2a91-94a0-46a6-b613-92777bc96803'),
('f28faace-e443-41fe-b780-480fdbb9312a', 'ed3b0c9f-a912-4106-a0d1-f4dfc7a2b54a');


#################### BD SOIREE ####################
INSERT INTO soiree (nom, theme, date, horaire_debut, lieu_id, tarif_normal, tarif_reduit) 
VALUES 
('Soirée Rock', 'Rock', '2024-06-01', '18:00:00','1b1aa5ad-cdfe-4d89-b121-e92dfd530999' ,25.00, 15.00),
('Soirée Blues', 'Blues', '2024-06-02', '19:00:00','81d8b308-c442-4a08-9381-4f7e9a88183c' ,20.00, 12.00),
('Festival Métal', 'Métal', '2024-06-03', '20:00:00','3f21fbad-6fbc-420e-a3d2-1ee9452baafc' ,30.00, 20.00),
('Nuit de la Chanson', 'Chanson', '2024-06-04', '21:00:00','f28faace-e443-41fe-b780-480fdbb9312a' ,18.00, 10.00),
('Jazz au Canal', 'Jazz', '2024-06-05', '19:30:00','1b1aa5ad-cdfe-4d89-b121-e92dfd530999' ,22.00, 14.00),
('Électronique Fiesta', 'Électronique', '2024-06-06', '23:00:00','81d8b308-c442-4a08-9381-4f7e9a88183c' ,28.00, 18.00),
('Pop Night', 'Pop', '2024-06-07', '20:00:00','3f21fbad-6fbc-420e-a3d2-1ee9452baafc' ,24.00, 16.00),
('Rock Alternatif', 'Rock Alternatif', '2024-06-08', '21:30:00','f28faace-e443-41fe-b780-480fdbb9312a' ,26.00, 17.00),
('Acoustic Evening', 'Acoustique', '2024-06-09', '17:00:00','1b1aa5ad-cdfe-4d89-b121-e92dfd530999' ,15.00, 8.00),
('Talents en Scène', 'Divers', '2024-06-10', '19:00:00','81d8b308-c442-4a08-9381-4f7e9a88183c' ,19.00, 11.00);


#################### BD SPECTACLE ####################
INSERT INTO spectacle (titre, description, style, url_video, horaire_prev, soiree_id)
VALUES
('Concert de Rock', 'Cest un concert de Rock', 'Rock', 'rock.mp4', '20:00:00','55351cb5-c06b-400e-89b5-f8866fd9c163'),
('Soirée Blues', 'Artiste Blues 1', 'Blues', 'blues.jpg', '21:00:00', 'b2ea189e-2ac3-4293-8b87-2824114da008'),
('Metal Night', 'Groupe Metal 1', 'Métal', 'metal.jpg', '22:00:00','b279833a-478a-4603-b761-34735e396b34'),
('Chanson Française', 'Chanteur 1', 'Chanson', 'chanson.jpg', '19:00:00', '48fb140c-4d5d-471f-a897-b11f74691f7c'),
('Jazz Session', 'Artiste Jazz 1', 'Jazz', 'jazz.jpg', '20:30:00', '39d7b04f-8b0c-4c0f-acb1-1f6169ad79ee'),
('Festival de Musique Électronique', 'DJ Électronique 1', 'Électronique', 'electro.jpg', '23:00:00', 'f7d5ada0-084a-4a12-ba7a-22075fdc8064'),
('Concert de Pop', 'Groupe Pop 1', 'Pop', 'pop.jpg', '18:00:00', '48fb140c-4d5d-471f-a897-b11f74691f7c'),
('Soirée Rock Alternatif', 'Groupe Rock Alternatif 1', 'Rock Alternatif', 'alt_rock.jpg', '21:30:00','55351cb5-c06b-400e-89b5-f8866fd9c163'),
('Performance Acoustique', 'Artiste Acoustique 1', 'Acoustique', 'acoustic.jpg', '17:00:00', 'b2ea189e-2ac3-4293-8b87-2824114da008'),
('Nuit des Talents', 'Groupe Local 1', 'Divers', 'divers.jpg', '19:30:00','39d7b04f-8b0c-4c0f-acb1-1f6169ad79ee');


INSERT INTO spectacleimage (image)
VALUES 
('rock.jpg'),
('blues.jpg'),
('metal.jpg'),
('chanson.jpg'),
('jazz.jpg'),
('electro.jpg'),
('pop.jpg'),
('alt_rock.jpg'),
('acoustic.jpg'),
('divers.jpg');
