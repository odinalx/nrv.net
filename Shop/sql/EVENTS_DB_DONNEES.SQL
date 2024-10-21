\c events_db 

INSERT INTO lieux (name, address, seated_capacity, standing_capacity, images) 
VALUES 
('Le Zenith', 'Avenue de la Libération, Nancy', 2000, 1000, 'zenith.jpg'),
('La Forge', 'Rue de la Forge, Nancy', 500, 300, 'forge.jpg'),
('L’Autre Canal', 'Avenue de l’Europe, Nancy', 700, 400, 'autre_canal.jpg'),
('L’Auditorium', 'Rue des États-Unis, Nancy', 1000, 500, 'auditorium.jpg');


INSERT INTO soirees (name, theme, soiree_date, start_time, normal_price, reduced_price, lieu_id) 
VALUES 
('Soirée Rock', 'Rock', '2024-06-01', '18:00:00', 25.00, 15.00, 1),
('Soirée Blues', 'Blues', '2024-06-02', '19:00:00', 20.00, 12.00, 2),
('Festival Métal', 'Métal', '2024-06-03', '20:00:00', 30.00, 20.00, 1),
('Nuit de la Chanson', 'Chanson', '2024-06-04', '21:00:00', 18.00, 10.00, 3),
('Jazz au Canal', 'Jazz', '2024-06-05', '19:30:00', 22.00, 14.00, 4),
('Électronique Fiesta', 'Électronique', '2024-06-06', '23:00:00', 28.00, 18.00, 2),
('Pop Night', 'Pop', '2024-06-07', '20:00:00', 24.00, 16.00, 3),
('Rock Alternatif', 'Rock Alternatif', '2024-06-08', '21:30:00', 26.00, 17.00, 4),
('Acoustic Evening', 'Acoustique', '2024-06-09', '17:00:00', 15.00, 8.00, 1),
('Talents en Scène', 'Divers', '2024-06-10', '19:00:00', 19.00, 11.00, 2);


INSERT INTO spectacles (titre, artistes, style, images, estimated_start_time, lieu_id, soiree_id) 
VALUES 
('Concert de Rock', 'Groupe Rock 1', 'Rock', 'rock.jpg', '20:00:00', 1, 1),
('Soirée Blues', 'Artiste Blues 1', 'Blues', 'blues.jpg', '21:00:00', 2, 2),
('Metal Night', 'Groupe Metal 1', 'Métal', 'metal.jpg', '22:00:00', 1, 3),
('Chanson Française', 'Chanteur 1', 'Chanson', 'chanson.jpg', '19:00:00', 3, 4),
('Jazz Session', 'Artiste Jazz 1', 'Jazz', 'jazz.jpg', '20:30:00', 4, 5),
('Festival de Musique Électronique', 'DJ Électronique 1', 'Électronique', 'electro.jpg', '23:00:00', 2, 6),
('Concert de Pop', 'Groupe Pop 1', 'Pop', 'pop.jpg', '18:00:00', 3, 7),
('Soirée Rock Alternatif', 'Groupe Rock Alternatif 1', 'Rock Alternatif', 'alt_rock.jpg', '21:30:00', 4, 8),
('Performance Acoustique', 'Artiste Acoustique 1', 'Acoustique', 'acoustic.jpg', '17:00:00', 1, 9),
('Nuit des Talents', 'Groupe Local 1', 'Divers', 'divers.jpg', '19:30:00', 2, 10);
