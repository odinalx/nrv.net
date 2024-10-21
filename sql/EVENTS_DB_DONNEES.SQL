USE EVENTS_DB;

INSERT INTO LIEUX (NAME, ADDRESS, SEATED_CAPACITY, STANDING_CAPACITY, IMAGES) 
VALUES 
('Zénith de Nancy', 'Rue du Zénith, 54000 Nancy', 2000, 5000, 'zenith.jpg'),
('Salle Poirel', '3 Rue Victor Poirel, 54000 Nancy', 500, 1000, 'poirel.jpg'),
('L\'Autre Canal', '45 Boulevard d\'Austrasie, 54000 Nancy', 1000, 2000, 'autre_canal.jpg'),
('Parc de la Pépinière', 'Avenue Boffrand, 54000 Nancy', 0, 8000, 'pepiniere.jpg');

INSERT INTO SPECTACLES (TITRE, ARTISTES, STYLE, IMAGES, ESTIMATED_START_TIME, LIEU_ID) 
VALUES 
('Classic Rock Night', 'The Rolling Stones', 'Classic Rock', 'rolling_stones.jpg', '19:00:00', 1),
('Blues Vibes', 'BB King', 'Blues', 'bb_king.jpg', '20:00:00', 2),
('Metal Thunder', 'Metallica', 'Metal', 'metallica.jpg', '21:00:00', 1),
('French Chanson', 'Édith Piaf', 'Chanson', 'piaf.jpg', '18:00:00', 2),
('Jazz Fusion', 'Miles Davis', 'Jazz', 'miles_davis.jpg', '20:30:00', 3),
('Indie Explosion', 'Tame Impala', 'Indie Rock', 'tame_impala.jpg', '19:30:00', 4),
('Electro Fever', 'Daft Punk', 'Electro', 'daft_punk.jpg', '22:00:00', 3),
('Reggae Jam', 'Bob Marley', 'Reggae', 'bob_marley.jpg', '19:00:00', 4),
('Pop Hits', 'Taylor Swift', 'Pop', 'taylor_swift.jpg', '21:30:00', 1),
('Latin Rhythms', 'Shakira', 'Latin', 'shakira.jpg', '20:00:00', 4);


INSERT INTO SOIREES (NAME, THEME, SOIREE_DATE, START_TIME, LIEU_ID, NORMAL_PRICE, REDUCED_PRICE) 
VALUES 
('Rock Legends', 'Soirée Rock', '2024-07-01', '19:00:00', 1, 50.00, 35.00),
('Blues Night', 'Soirée Blues', '2024-07-02', '20:00:00', 2, 40.00, 30.00),
('Metal Madness', 'Soirée Metal', '2024-07-03', '21:00:00', 1, 55.00, 40.00),
('French Classics', 'Soirée Chanson', '2024-07-04', '18:00:00', 2, 30.00, 20.00),
('Jazz Masters', 'Soirée Jazz', '2024-07-05', '20:30:00', 3, 45.00, 35.00),
('Indie Explosion', 'Soirée Indie', '2024-07-06', '19:30:00', 4, 50.00, 35.00),
('Electro Beats', 'Soirée Electro', '2024-07-07', '22:00:00', 3, 60.00, 45.00),
('Reggae Vibes', 'Soirée Reggae', '2024-07-08', '19:00:00', 4, 40.00, 30.00),
('Pop Extravaganza', 'Soirée Pop', '2024-07-09', '21:30:00', 1, 55.00, 40.00),
('Latin Heat', 'Soirée Latin', '2024-07-10', '20:00:00', 4, 50.00, 35.00);


INSERT INTO SOIREE_SPECTACLES (SOIREE_ID, SPECTACLE_ID) 
VALUES 
(1, 1), (1, 2), (2, 2), (2, 5), (3, 3), (4, 4), (5, 5), (6, 6), (7, 7), (8, 8);
