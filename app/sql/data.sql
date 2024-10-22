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
('ee90f779-5b6e-4220-8fdc-da08b59adc27', '11ad14dd-c601-4efe-8fef-4653b3bf720b'),
('2e7fe11d-779f-410c-ae36-b33d07ed9e67', 'bc09bd5f-fb23-49a3-b657-63d83cfb3d74'),
('aa998ef9-cbff-4fb3-9790-8946b4d047c1', '4b0a4783-3bb9-4c74-8fb4-cbe628f551cf'),
('c2c6ab13-456a-44b5-b1f4-92c740dfc0c5', '6b879482-a5ad-4adb-aec8-bcf387ced0a0');


#################### BD SOIREE ####################
INSERT INTO soiree (nom, theme, date, horaire_debut, lieu_id, tarif_normal, tarif_reduit) 
VALUES 
('Soirée Rock', 'Rock', '2024-06-01', '18:00:00','ee90f779-5b6e-4220-8fdc-da08b59adc27' ,25.00, 15.00),
('Soirée Blues', 'Blues', '2024-06-02', '19:00:00','2e7fe11d-779f-410c-ae36-b33d07ed9e67' ,20.00, 12.00),
('Festival Métal', 'Métal', '2024-06-03', '20:00:00','aa998ef9-cbff-4fb3-9790-8946b4d047c1' ,30.00, 20.00),
('Nuit de la Chanson', 'Chanson', '2024-06-04', '21:00:00','c2c6ab13-456a-44b5-b1f4-92c740dfc0c5' ,18.00, 10.00),
('Jazz au Canal', 'Jazz', '2024-06-05', '19:30:00','ee90f779-5b6e-4220-8fdc-da08b59adc27' ,22.00, 14.00),
('Électronique Fiesta', 'Électronique', '2024-06-06', '23:00:00','2e7fe11d-779f-410c-ae36-b33d07ed9e67' ,28.00, 18.00),
('Pop Night', 'Pop', '2024-06-07', '20:00:00','aa998ef9-cbff-4fb3-9790-8946b4d047c1' ,24.00, 16.00),
('Rock Alternatif', 'Rock Alternatif', '2024-06-08', '21:30:00','c2c6ab13-456a-44b5-b1f4-92c740dfc0c5' ,26.00, 17.00),
('Acoustic Evening', 'Acoustique', '2024-06-09', '17:00:00','ee90f779-5b6e-4220-8fdc-da08b59adc27' ,15.00, 8.00),
('Talents en Scène', 'Divers', '2024-06-10', '19:00:00','2e7fe11d-779f-410c-ae36-b33d07ed9e67' ,19.00, 11.00);


#################### BD SPECTACLE ####################
INSERT INTO spectacle (titre, description, style, url_video, horaire_prev, soiree_id)
VALUES
('Concert de Rock', 'Cest un concert de Rock', 'Rock', 'rock.mp4', '20:00:00','ea6ab11a-0b93-4d7d-89fb-a633af64a097'),
('Soirée Blues', 'Artiste Blues 1', 'Blues', 'blues.jpg', '21:00:00', '622a3f74-271b-4243-8e1f-21c603467bd2'),
('Metal Night', 'Groupe Metal 1', 'Métal', 'metal.jpg', '22:00:00','e77e9b60-d30f-4ee2-9b9c-6c0c4266d5fb'),
('Chanson Française', 'Chanteur 1', 'Chanson', 'chanson.jpg', '19:00:00', 'ad47a163-14bc-476e-91e6-f7a8d954e7fb'),
('Jazz Session', 'Artiste Jazz 1', 'Jazz', 'jazz.jpg', '20:30:00', 'e141449f-f798-4fe6-8a11-451785996d90'),
('Festival de Musique Électronique', 'DJ Électronique 1', 'Électronique', 'electro.jpg', '23:00:00', '101d5395-90e9-4b9f-95a6-9dd6f5e4f844'),
('Concert de Pop', 'Groupe Pop 1', 'Pop', 'pop.jpg', '18:00:00', 'ad47a163-14bc-476e-91e6-f7a8d954e7fb'),
('Soirée Rock Alternatif', 'Groupe Rock Alternatif 1', 'Rock Alternatif', 'alt_rock.jpg', '21:30:00','ea6ab11a-0b93-4d7d-89fb-a633af64a097'),
('Performance Acoustique', 'Artiste Acoustique 1', 'Acoustique', 'acoustic.jpg', '17:00:00', '622a3f74-271b-4243-8e1f-21c603467bd2'),
('Nuit des Talents', 'Groupe Local 1', 'Divers', 'divers.jpg', '19:30:00','e141449f-f798-4fe6-8a11-451785996d90');


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
