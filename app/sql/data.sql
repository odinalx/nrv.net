INSERT INTO lieu (lieu_id, nom, adresse, nb_place_assise, nb_place_debout)
VALUES
('1b1aa5ad-cdfe-4d89-b121-e92dfd530999','Le Zenith', 'Avenue de la Libération, Nancy', 2000, 1000),
('81d8b308-c442-4a08-9381-4f7e9a88183c','Place Stanislas', 'Place Stanislas, Nancy', 500, 300),
('3f21fbad-6fbc-420e-a3d2-1ee9452baafc','L’Autre Canal', 'Avenue de l’Europe, Nancy', 700, 400),
('f28faace-e443-41fe-b780-480fdbb9312a','L’Auditorium', 'Rue des États-Unis, Nancy', 1000, 500),
('5faae5b7-d2ab-427a-8528-549c272ab0ff','Salle Poirel', 'Nancy', 500, 300);



-- Insertion des soirées
INSERT INTO soiree (soiree_id, nom, theme, date, horaire_debut, lieu_id, tarif_normal, tarif_reduit, places_dispo) 
VALUES
('5606553a-df69-4335-b9d5-f7d484f90f3c', 'Soirée 1A', 'Festival dAutomne', '2024-10-01', '19:00', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 25.00, 15.00, 200),
('e4c320bf-4c3f-4bdf-9a4c-c1e866565fb7', 'Soirée 1B', 'Festival dAutomne', '2024-10-01', '20:30', '81d8b308-c442-4a08-9381-4f7e9a88183c', 30.00, 20.00, 150),
('5d6f7eb7-a9f6-4622-8be2-4636daa07f32', 'Soirée 1C', 'Festival dAutomne', '2024-10-01', '22:00', '3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 28.00, 18.00, 300),
('d561f0fc-0728-4d28-bef1-bf464c41c2a7', 'Soirée 2A', 'Nuit de Musique', '2024-10-02', '19:00', 'f28faace-e443-41fe-b780-480fdbb9312a', 30.00, 20.00, 150),
('ec03f980-b00d-4f6c-8b66-9df3604697b1', 'Soirée 2B', 'Nuit de Musique', '2024-10-02', '20:30', '5faae5b7-d2ab-427a-8528-549c272ab0ff', 35.00, 25.00, 100),
('f7bb53f0-7d48-4dfb-a30f-da2a6d6ffb20', 'Soirée 2C', 'Nuit de Musique', '2024-10-02', '22:00', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 40.00, 30.00, 250),
('5a3f4a59-76aa-42ea-93a2-981d0e217aef', 'Soirée 3A', 'Concert de Rock', '2024-10-03', '19:00', '81d8b308-c442-4a08-9381-4f7e9a88183c', 25.00, 15.00, 200),
('98ccc6e0-4240-47ed-a3b6-9fc6d3b111c8', 'Soirée 3B', 'Concert de Rock', '2024-10-03', '20:30', '3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 30.00, 20.00, 150),
('4ce6a707-0d57-4133-9034-522265e268de', 'Soirée 3C', 'Concert de Rock', '2024-10-03', '22:00', 'f28faace-e443-41fe-b780-480fdbb9312a', 28.00, 18.00, 300),
('7fd15b02-5dca-469d-9b80-c02b0516b4e4', 'Soirée 4A', 'Nuit de Jazz', '2024-10-04', '19:00', '5faae5b7-d2ab-427a-8528-549c272ab0ff', 30.00, 20.00, 150),
('0fa8c12b-23e3-4da5-bcf8-71c9558c3105', 'Soirée 4B', 'Nuit de Jazz', '2024-10-04', '20:30', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 35.00, 25.00, 100),
('4361c53e-16d5-4e8c-8ac1-f5d0c85bfd06', 'Soirée 4C', 'Nuit de Jazz', '2024-10-04', '22:00', '81d8b308-c442-4a08-9381-4f7e9a88183c', 40.00, 30.00, 250),
('e3fbb2dd-aa67-4615-801a-bd77dc5cd3df', 'Soirée 5A', 'Chanson Française', '2024-10-05', '19:00', '3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 25.00, 15.00, 200),
('83fb40d5-d93f-4b68-b8e3-94c579b04296', 'Soirée 5B', 'Chanson Française', '2024-10-05', '20:30', 'f28faace-e443-41fe-b780-480fdbb9312a', 30.00, 20.00, 150),
('0feca218-e1c4-4790-a228-9d52b601f269', 'Soirée 5C', 'Chanson Française', '2024-10-05', '22:00', '5faae5b7-d2ab-427a-8528-549c272ab0ff', 28.00, 18.00, 300),
('85df71ef-93b0-4954-bdc8-049e1cf6d6a6', 'Soirée 6A', 'Festival du Blues', '2024-10-06', '19:00', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 30.00, 20.00, 150),
('233be783-19d8-4fbd-a471-9826fe7ca5d1', 'Soirée 6B', 'Festival du Blues', '2024-10-06', '20:30', '81d8b308-c442-4a08-9381-4f7e9a88183c', 35.00, 25.00, 100),
('50503344-3fcc-4305-a6c4-039845022499', 'Soirée 6C', 'Festival du Blues', '2024-10-06', '22:00', '3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 40.00, 30.00, 250),
('0ad2ed7f-4e9f-4bd0-9f8a-4d83bfaad219', 'Soirée 7A', 'Nuit Électro', '2024-10-07', '19:00', 'f28faace-e443-41fe-b780-480fdbb9312a', 25.00, 15.00, 200),
('bf39555c-596d-4805-866a-253840ea8511', 'Soirée 7B', 'Nuit Électro', '2024-10-07', '20:30', '5faae5b7-d2ab-427a-8528-549c272ab0ff', 30.00, 20.00, 150),
('c426d0c4-4c35-45fa-aa23-59f879be01ef', 'Soirée 7C', 'Nuit Électro', '2024-10-07', '22:00', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 28.00, 18.00, 300),
('8d6e570d-94f9-4cfb-9df2-37e57b908edd', 'Soirée 8A', 'Rock Indépendant', '2024-10-08', '19:00', '81d8b308-c442-4a08-9381-4f7e9a88183c', 30.00, 20.00, 150),
('1dbacb97-44f8-436c-a84a-77da13eeadb4', 'Soirée 8B', 'Rock Indépendant', '2024-10-08', '20:30', '3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 35.00, 25.00, 100),
('bf016256-e50e-4ddf-b45f-79d7664e90b7', 'Soirée 8C', 'Rock Indépendant', '2024-10-08', '22:00', 'f28faace-e443-41fe-b780-480fdbb9312a', 40.00, 30.00, 250),
('8befbf94-576d-4cba-a18f-8b239f6fee7d', 'Soirée 9A', 'Chanson Pop', '2024-10-09', '19:00', '5faae5b7-d2ab-427a-8528-549c272ab0ff', 25.00, 15.00, 200),
('44fc05c1-0f7e-4b30-99d4-809ee17562a6', 'Soirée 9B', 'Chanson Pop', '2024-10-09', '20:30', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 30.00, 20.00, 150),
('a92f670c-4955-4668-b36d-2249170e56e0', 'Soirée 9C', 'Chanson Pop', '2024-10-09', '22:00', '81d8b308-c442-4a08-9381-4f7e9a88183c', 28.00, 18.00, 300),

('f6331f71-9375-4f6c-96d5-73123e940f4e', 'Soirée 10A', 'Nuit de Folk', '2024-10-10', '19:00', '3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 30.00, 20.00, 150),
('a71da349-d148-47f6-a8dd-1c432433f505', 'Soirée 10B', 'Nuit de Folk', '2024-10-10', '20:30', 'f28faace-e443-41fe-b780-480fdbb9312a', 35.00, 25.00, 100),
('1ce1ef55-775e-496c-b53f-dea2db81f064', 'Soirée 10C', 'Nuit de Folk', '2024-10-10', '22:00', '5faae5b7-d2ab-427a-8528-549c272ab0ff', 40.00, 30.00, 250),

('6fc5f633-7ce7-4d8b-87f2-89cd35aa08ed', 'Soirée 11A', 'Nuit Acoustique', '2024-10-11', '19:00', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 25.00, 15.00, 200),
('57a2f342-fb50-4a41-9038-0e3a72c1975e', 'Soirée 11B', 'Nuit Acoustique', '2024-10-11', '20:30', '81d8b308-c442-4a08-9381-4f7e9a88183c', 30.00, 20.00, 150),
('59dede82-46df-405a-a99d-3b9cf8806a65', 'Soirée 11C', 'Nuit Acoustique', '2024-10-11', '22:00', '3f21fbad-6fbc-420e-a3d2-1ee9452baafc', 28.00, 18.00, 300),

('9cf78f3c-e308-4b85-807a-e50165a433b1', 'Soirée 12A', 'Nuit de Musique Classique', '2024-10-12', '19:00', 'f28faace-e443-41fe-b780-480fdbb9312a', 30.00, 20.00, 150),
('e31528e0-9eb6-496b-b734-cfb6ab3407de', 'Soirée 12B', 'Nuit de Musique Classique', '2024-10-12', '20:30', '5faae5b7-d2ab-427a-8528-549c272ab0ff', 35.00, 25.00, 100),
('4d9be2d6-05db-44f1-88c5-5c4ffb57f733', 'Soirée 12C', 'Nuit de Musique Classique', '2024-10-12', '22:00', '1b1aa5ad-cdfe-4d89-b121-e92dfd530999', 40.00, 30.00, 250);


INSERT INTO spectacle (spectacle_id, titre, description, style, url_video, horaire_prev, soiree_id) 
VALUES
-- Soirée 1
('f2a7e9d1-4c4b-4b41-8e34-5f35cfd8068f', 'Concert de Rock', 'Un groupe de rock célèbre en concert.', 'Rock', 'rock.mp4', '20:00:00', '5606553a-df69-4335-b9d5-f7d484f90f3c'),
('6f26190e-660c-4112-b080-e4ccdd377e7b', 'Soirée Blues', 'Un artiste de blues avec une voix envoûtante.', 'Blues', 'blues.mp4', '21:00:00', '5606553a-df69-4335-b9d5-f7d484f90f3c'),
('b0fbc8da-46cc-42c4-b587-30ff82c23f79', 'Metal Night', 'Un concert de métal avec des riffs puissants.', 'Métal', 'metal.mp4', '22:00:00', '5606553a-df69-4335-b9d5-f7d484f90f3c'),

-- Soirée 2
('d8c0d77f-fd65-43a1-b627-8c5c1b39d5bb', 'Chanson Française', 'Un chanteur de chanson française avec des textes poétiques.', 'Chanson', 'chanson.mp4', '19:00:00', 'e4c320bf-4c3f-4bdf-9a4c-c1e866565fb7'),
('f1e1c582-b260-43e4-bdc3-6c2e89c34c8b', 'Jazz Session', 'Une session de jazz avec des improvisations captivantes.', 'Jazz', 'jazz.mp4', '20:30:00', 'e4c320bf-4c3f-4bdf-9a4c-c1e866565fb7'),
('9f59b3c8-b48e-43ee-b1a2-6f67b29503c0', 'Musique Électronique', 'DJ célèbre pour une nuit électrisante.', 'Électronique', 'electro.mp4', '23:00:00', 'e4c320bf-4c3f-4bdf-9a4c-c1e866565fb7'),

-- Soirée 3
('3a1238c1-d264-4ae7-a43d-e84f3bbdc317', 'Concert de Pop', 'Un groupe pop dynamique avec des hits du moment.', 'Pop', 'pop.mp4', '18:00:00', '5d6f7eb7-a9f6-4622-8be2-4636daa07f32'),
('f740391c-7dc5-4071-b760-e6d5d07b2baf', 'Rock Alternatif', 'Groupe de rock alternatif avec un son unique.', 'Rock Alternatif', 'alt_rock.mp4', '21:30:00', '5d6f7eb7-a9f6-4622-8be2-4636daa07f32'),
('ab69cb12-6464-4e76-a23a-e82ab1f68b68', 'Performance Acoustique', 'Un artiste acoustique avec des interprétations émouvantes.', 'Acoustique', 'acoustic.mp4', '17:00:00', '5d6f7eb7-a9f6-4622-8be2-4636daa07f32'),

-- Soirée 4
('1c7c62cf-e18e-42d2-a9c7-b0713c70dbbc', 'Nuit des Talents', 'Un showcase de talents locaux variés.', 'Divers', 'talents.mp4', '19:30:00', 'd561f0fc-0728-4d28-bef1-bf464c41c2a7'),
('7ff4422a-4b12-4f9a-9c72-ff928c57e645', 'Concert de Rock', 'Un groupe de rock incontournable.', 'Rock', 'rock.mp4', '20:00:00', 'd561f0fc-0728-4d28-bef1-bf464c41c2a7'),
('c08a99f4-c7ea-4a57-a3c5-63a445b81cf6', 'Soirée Blues', 'Un bluesman avec une guitare envoûtante.', 'Blues', 'blues.mp4', '21:00:00', 'd561f0fc-0728-4d28-bef1-bf464c41c2a7'),

-- Soirée 5
('6f84e3b9-f5f3-4f1c-9c8f-3a2c2e9d0735', 'Metal Night', 'Une soirée dédiée aux passionnés de métal.', 'Métal', 'metal2.mp4', '22:00:00', 'ec03f980-b00d-4f6c-8b66-9df3604697b1'),
('2d517c45-e230-479e-81f5-d0c622abc441', 'Chanson Française', 'Un concert de chanson française moderne.', 'Chanson', 'chanson2.mp4', '19:00:00', 'ec03f980-b00d-4f6c-8b66-9df3604697b1'),
('d8e2e047-75a5-42de-8ff7-7a25430468f2', 'Jazz Session', 'Des musiciens de jazz en direct.', 'Jazz', 'jazz2.mp4', '20:30:00', 'ec03f980-b00d-4f6c-8b66-9df3604697b1'),

-- Soirée 6
('2899d7a2-8bc3-4c61-9f36-48ab6f78f68e', 'Électro Party', 'DJ mixant les meilleurs morceaux.', 'Électronique', 'electro2.mp4', '23:00:00', 'f7bb53f0-7d48-4dfb-a30f-da2a6d6ffb20'),
('f5d1cbb7-4497-43c0-8b25-9a6a7c3c65e3', 'Pop Stars', 'Des artistes pop en pleine ascension.', 'Pop', 'pop2.mp4', '18:00:00', 'f7bb53f0-7d48-4dfb-a30f-da2a6d6ffb20'),
('89c73f79-fcb4-41d2-bb45-28551db54747', 'Rock Alternatif', 'Des sons uniques de rock alternatif.', 'Rock Alternatif', 'rock_alt2.mp4', '21:30:00', 'f7bb53f0-7d48-4dfb-a30f-da2a6d6ffb20'),

-- Soirée 7
('fa3e5151-bd63-4966-9c7e-614bc17c8e2b', 'Acoustic Night', 'Performance acoustique par des artistes talentueux.', 'Acoustique', 'acoustic2.mp4', '17:00:00', '5a3f4a59-76aa-42ea-93a2-981d0e217aef'),
('b4406d90-3c69-44b6-836e-4f3ee3ef78f2', 'Talents Locaux', 'Découverte de nouveaux talents.', 'Divers', 'talents2.mp4', '19:30:00', '5a3f4a59-76aa-42ea-93a2-981d0e217aef'),
('ba2836d7-6e8b-404d-81a5-393575a8241d', 'Concert de Rock', 'Un concert avec des classiques du rock.', 'Rock', 'rock3.mp4', '20:00:00', '5a3f4a59-76aa-42ea-93a2-981d0e217aef'),

-- Soirée 8
('96e4ffed-7e4e-4bc4-b90b-3decd9ed055c', 'Soirée Blues', 'Artistes blues avec une ambiance chaleureuse.', 'Blues', 'blues3.mp4', '21:00:00', '98ccc6e0-4240-47ed-a3b6-9fc6d3b111c8'),
('b812bf51-9e57-43c5-b160-6b045b9351f9', 'Metal Night', 'Un concert de métal explosif.', 'Métal', 'metal3.mp4', '22:00:00', '98ccc6e0-4240-47ed-a3b6-9fc6d3b111c8'),
('6f4e73f0-30d4-434b-ae57-fdb62db0b489', 'Chanson Française', 'Un mélange de tradition et modernité.', 'Chanson', 'chanson3.mp4', '19:00:00', '98ccc6e0-4240-47ed-a3b6-9fc6d3b111c8'),

-- Soirée 9
('fe502b41-d7c7-4c31-9f54-3da1f1a2f7e1', 'Jazz Session', 'Improvisations de jazz avec des musiciens de talent.', 'Jazz', 'jazz3.mp4', '20:30:00', '9cf78f3c-e308-4b85-807a-e50165a433b1'),
('8cc8129b-c497-4b63-a827-49dc9a69b70e', 'Festival Électronique', 'DJ électro enflamme la nuit.', 'Électronique', 'electro3.mp4', '23:00:00', '9cf78f3c-e308-4b85-807a-e50165a433b1'),
('4b5ab56f-bab8-4c15-b9f6-e84e4423b73b', 'Concert de Pop', 'Un spectacle coloré avec des hits pop.', 'Pop', 'pop3.mp4', '18:00:00', '9cf78f3c-e308-4b85-807a-e50165a433b1'),

-- Soirée 10
('845b9d64-18b5-49b8-9d1b-f07c82d10de5', 'Soirée Rock Alternatif', 'Des groupes de rock alternatif à l’affiche.', 'Rock Alternatif', 'rock_alt3.mp4', '21:30:00', '4d9be2d6-05db-44f1-88c5-5c4ffb57f733'),
('c83f3912-36d9-4948-bff9-708f2501eb88', 'Performance Acoustique', 'Un artiste acoustique en solo.', 'Acoustique', 'acoustic3.mp4', '17:00:00', '4d9be2d6-05db-44f1-88c5-5c4ffb57f733'),
('58635412-25cc-4e07-817b-7c4c9252ac62', 'Nuit des Talents', 'Émergence de nouveaux talents musicaux.', 'Divers', 'talents3.mp4', '19:30:00', '4d9be2d6-05db-44f1-88c5-5c4ffb57f733'),

-- Soirée 11
('a0a58e0b-769f-4e3d-a05d-82c31ec9bbf6', 'Concert de Rock', 'Les classiques du rock live.', 'Rock', 'rock4.mp4', '20:00:00', '0fa8c12b-23e3-4da5-bcf8-71c9558c3105'),
('f26d38d0-42ca-4fb7-83f2-d2b1e61edfd8', 'Soirée Blues', 'Des artistes blues passionnés.', 'Blues', 'blues4.mp4', '21:00:00', '0fa8c12b-23e3-4da5-bcf8-71c9558c3105'),
('21d1e325-7c8e-4932-9c79-d2b58c4775c6', 'Metal Night', 'Une soirée métal pleine d’énergie.', 'Métal', 'metal4.mp4', '22:00:00', '0fa8c12b-23e3-4da5-bcf8-71c9558c3105'),

-- Soirée 12
('b6112033-b2b3-4f4c-9fd3-b84b671b7438', 'Chanson Française', 'Des mélodies touchantes et des paroles engagées.', 'Chanson', 'chanson4.mp4', '19:00:00', '4361c53e-16d5-4e8c-8ac1-f5d0c85bfd06'),
('98cbf160-37cc-4ab6-8019-caeefde0c5f9', 'Jazz Session', 'Une soirée de jazz sous les étoiles.', 'Jazz', 'jazz4.mp4', '20:30:00', '4361c53e-16d5-4e8c-8ac1-f5d0c85bfd06'),
('bc64b123-81b9-4813-88f5-c5bc88800681', 'Festival Électronique', 'Les meilleurs DJ en direct.', 'Électronique', 'electro4.mp4', '23:00:00', '4361c53e-16d5-4e8c-8ac1-f5d0c85bfd06'),

-- Soirée 13
('6a6ff208-0a4b-4b89-b4cb-b46497ae07f8', 'Concert de Pop', 'Des artistes pop en tête des charts.', 'Pop', 'pop4.mp4', '18:00:00', 'e3fbb2dd-aa67-4615-801a-bd77dc5cd3df'),
('229e5071-e653-4c0e-bdc0-b2392b0276d3', 'Rock Alternatif', 'Des sons novateurs et captivants.', 'Rock Alternatif', 'rock_alt4.mp4', '21:30:00', 'e3fbb2dd-aa67-4615-801a-bd77dc5cd3df'),
('807a28e5-3783-493f-8551-8afedab62cf5', 'Performance Acoustique', 'Des performances intimes et mémorables.', 'Acoustique', 'acoustic4.mp4', '17:00:00', 'e3fbb2dd-aa67-4615-801a-bd77dc5cd3df'),

-- Soirée 14
('4c035b41-b4e4-4ed1-bd68-789e8b3da5af', 'Nuit des Talents', 'Mise en avant des artistes émergents.', 'Divers', 'talents4.mp4', '19:30:00', '83fb40d5-d93f-4b68-b8e3-94c579b04296'),
('5f79786d-7fc6-4e76-8833-27b25aa4a7d2', 'Concert de Rock', 'Un concert plein d’énergie et de passion.', 'Rock', 'rock5.mp4', '20:00:00', '83fb40d5-d93f-4b68-b8e3-94c579b04296'),
('db6be9eb-1c77-4659-9c98-2082555c9534', 'Soirée Blues', 'Les plus beaux standards du blues.', 'Blues', 'blues5.mp4', '21:00:00', '83fb40d5-d93f-4b68-b8e3-94c579b04296'),

-- Soirée 15
('d67f7743-4f43-4bde-a793-5585efb5e29f', 'Metal Night', 'Concert de métal à ne pas manquer.', 'Métal', 'metal5.mp4', '22:00:00', '0feca218-e1c4-4790-a228-9d52b601f269'),
('aa0c91d3-24d2-4036-9d07-44043e48741e', 'Chanson Française', 'Des chansons qui touchent le cœur.', 'Chanson', 'chanson5.mp4', '19:00:00', '0feca218-e1c4-4790-a228-9d52b601f269'),
('b77b7fae-f0f8-43ed-8f6f-68f756b48943', 'Jazz Session', 'Des improvisations de jazz envoûtantes.', 'Jazz', 'jazz5.mp4', '20:30:00', '0feca218-e1c4-4790-a228-9d52b601f269'),

-- Soirée 16
('3d24aef8-4ed7-4bc2-9e69-2e4c8826348f', 'Festival Électronique', 'Une nuit électrisante avec les meilleurs DJ.', 'Électronique', 'electro5.mp4', '23:00:00', '85df71ef-93b0-4954-bdc8-049e1cf6d6a6'),
('205e0c5f-f431-48d4-bbe1-3481bb0b5b2b', 'Pop Stars', 'Concert de stars montantes de la pop.', 'Pop', 'pop5.mp4', '18:00:00', '85df71ef-93b0-4954-bdc8-049e1cf6d6a6'),
('e2d7622b-d0e3-461e-9eb7-9cd12a1a0869', 'Rock Alternatif', 'Des performances uniques de rock alternatif.', 'Rock Alternatif', 'rock_alt5.mp4', '21:30:00', '85df71ef-93b0-4954-bdc8-049e1cf6d6a6'),

-- Soirée 17
('7440a8e6-f54a-4794-b9fc-3ee71bbfb0b2', 'Acoustic Night', 'Des artistes acoustiques en performance.', 'Acoustique', 'acoustic5.mp4', '17:00:00', '233be783-19d8-4fbd-a471-9826fe7ca5d1'),
('826799d0-b064-4df9-bb56-4cf95327c9e4', 'Talents Locaux', 'Mise en avant des artistes de la région.', 'Divers', 'talents5.mp4', '19:30:00', '233be783-19d8-4fbd-a471-9826fe7ca5d1'),
('9ac8c2b0-38cf-4de6-8498-d79f9cb83ed3', 'Concert de Rock', 'Des classiques du rock en live.', 'Rock', 'rock6.mp4', '20:00:00', '233be783-19d8-4fbd-a471-9826fe7ca5d1'),

-- Soirée 18
('07dc0a55-d5b2-4e30-935b-236be149de51', 'Soirée Blues', 'Des performances captivantes de blues.', 'Blues', 'blues6.mp4', '21:00:00', '50503344-3fcc-4305-a6c4-039845022499'),
('c65da8cd-85a3-4ab6-a5ed-501ca3cbda0b', 'Metal Night', 'Une soirée de métal intense.', 'Métal', 'metal6.mp4', '22:00:00', '50503344-3fcc-4305-a6c4-039845022499'),
('f2adfbd4-4578-4d24-88a5-caf99a0e2b5e', 'Chanson Française', 'Un concert plein d’émotion.', 'Chanson', 'chanson6.mp4', '19:00:00', '50503344-3fcc-4305-a6c4-039845022499'),

-- Soirée 19
('c61416ca-bb4d-4c79-b30d-3f85b831c94e', 'Jazz Session', 'Une ambiance jazzy envoûtante.', 'Jazz', 'jazz6.mp4', '20:30:00', '0ad2ed7f-4e9f-4bd0-9f8a-4d83bfaad219'),
('7cfcb98c-01c3-40aa-b777-f4a5dc07e737', 'Festival Électronique', 'Les meilleurs DJ de la scène électronique.', 'Électronique', 'electro6.mp4', '23:00:00', '0ad2ed7f-4e9f-4bd0-9f8a-4d83bfaad219'),
('763a793f-1eb3-4b7f-a57f-8f97a0e5277c', 'Concert de Pop', 'Un concert éclatant avec des hits populaires.', 'Pop', 'pop6.mp4', '18:00:00', '0ad2ed7f-4e9f-4bd0-9f8a-4d83bfaad219'),

-- Soirée 20
('73e7717d-e6b9-4e06-bb75-6dc49c5eae67', 'Soirée Rock Alternatif', 'Des performances de groupes alternatifs.', 'Rock Alternatif', 'rock_alt6.mp4', '21:30:00', 'bf39555c-596d-4805-866a-253840ea8511'),
('8dc7f6f9-c44c-4736-9737-82a249c71d8e', 'Performance Acoustique', 'Une soirée de musique acoustique intimiste.', 'Acoustique', 'acoustic6.mp4', '17:00:00', 'bf39555c-596d-4805-866a-253840ea8511'),
('a5c7ebc5-bae9-4913-b5eb-d502c2d6f65d', 'Nuit des Talents', 'Soutien à la scène musicale locale.', 'Divers', 'talents6.mp4', '19:30:00', 'bf39555c-596d-4805-866a-253840ea8511'),

-- Soirée 21
('7423f8b0-6060-4d90-8315-bdaabb1de36a', 'Concert de Rock', 'Des riffs qui vous feront vibrer.', 'Rock', 'rock7.mp4', '20:00:00', 'c426d0c4-4c35-45fa-aa23-59f879be01ef'),
('c67aeb36-c441-4666-8e82-dff11cb60e2e', 'Soirée Blues', 'Une ambiance blues authentique.', 'Blues', 'blues7.mp4', '21:00:00', 'c426d0c4-4c35-45fa-aa23-59f879be01ef'),
('e4bc22a5-6221-41fc-9f24-5b6c150c4c9e', 'Metal Night', 'Un concert de métal à couper le souffle.', 'Métal', 'metal7.mp4', '22:00:00', 'c426d0c4-4c35-45fa-aa23-59f879be01ef'),

-- Soirée 22
('c54dbe8f-e5d6-45d6-962f-15f8a7d98164', 'Chanson Française', 'Des mélodies françaises qui touchent.', 'Chanson', 'chanson7.mp4', '19:00:00', '8d6e570d-94f9-4cfb-9df2-37e57b908edd'),
('86b5a848-4f26-4f6d-b8f9-01c139683344', 'Jazz Session', 'Un soir de jazz inoubliable.', 'Jazz', 'jazz7.mp4', '20:30:00', '8d6e570d-94f9-4cfb-9df2-37e57b908edd'),
('c8f8c8bb-b013-4ac9-b915-9bc5ae2fc6af', 'Festival Électronique', 'Les sons électroniques envoûtants.', 'Électronique', 'electro7.mp4', '23:00:00', '8d6e570d-94f9-4cfb-9df2-37e57b908edd'),

-- Soirée 23
('1b5d86e8-f848-4e34-8dff-20369ccae5f6', 'Concert de Pop', 'Un concert de pop enflammé.', 'Pop', 'pop7.mp4', '18:00:00', '1dbacb97-44f8-436c-a84a-77da13eeadb4'),
('fc70f24f-453e-4938-83f2-cc22ac9a6768', 'Rock Alternatif', 'Des sons inédits de groupes alternatifs.', 'Rock Alternatif', 'rock_alt7.mp4', '21:30:00', '1dbacb97-44f8-436c-a84a-77da13eeadb4'),
('4cc303d3-7c6a-4d4d-8601-8cf285d7e0a3', 'Performance Acoustique', 'Des moments musicaux uniques.', 'Acoustique', 'acoustic7.mp4', '17:00:00', '1dbacb97-44f8-436c-a84a-77da13eeadb4'),

-- Soirée 24
('12c430a2-9d70-4473-bd69-237d4b9c83cf', 'Nuit des Talents', 'Un showcase d’artistes en herbe.', 'Divers', 'talents7.mp4', '19:30:00', 'bf016256-e50e-4ddf-b45f-79d7664e90b7'),
('62b6e3ed-c3ef-4a12-9e84-4d24f62946aa', 'Concert de Rock', 'Un concert de rock avec énergie.', 'Rock', 'rock8.mp4', '20:00:00', 'bf016256-e50e-4ddf-b45f-79d7664e90b7'),
('d0e7b81f-87c5-40e5-a672-8b02b6418c94', 'Soirée Blues', 'Un mélange de blues et de jazz.', 'Blues', 'blues8.mp4', '21:00:00', 'bf016256-e50e-4ddf-b45f-79d7664e90b7'),

-- Soirée 25
('e6c9a0ab-1b3b-4991-8b88-bf43f0518e2d', 'Jazz Session', 'Improvisations de jazz captivantes.', 'Jazz', 'jazz8.mp4', '20:30:00', '8befbf94-576d-4cba-a18f-8b239f6fee7d'),
('12bc8f34-cd46-4e6b-b19c-f6cb39b87654', 'Festival Électronique', 'Une nuit électrisante avec des sons électroniques.', 'Électronique', 'electro8.mp4', '23:00:00', '8befbf94-576d-4cba-a18f-8b239f6fee7d'),
('1ac5a6a9-bd72-4cb2-90c7-29f637f7e4dc', 'Concert de Pop', 'Des performances pop entraînantes.', 'Pop', 'pop8.mp4', '18:00:00', '8befbf94-576d-4cba-a18f-8b239f6fee7d'),

-- Soirée 26
('493ba0b4-0631-4e9b-8e41-e19c7a47754f', 'Rock Alternatif', 'Des groupes émergents du rock alternatif.', 'Rock Alternatif', 'rock_alt8.mp4', '21:30:00', '233be783-19d8-4fbd-a471-9826fe7ca5d1'),
('3eaeedd2-e2cf-4699-9f9c-f40c29f418f5', 'Performance Acoustique', 'Une ambiance intime avec des artistes acoustiques.', 'Acoustique', 'acoustic8.mp4', '17:00:00', '233be783-19d8-4fbd-a471-9826fe7ca5d1'),
('bcbf7618-1c5a-48c0-9f57-04d8dc57dbb2', 'Nuit des Talents', 'Mise en avant des artistes locaux.', 'Divers', 'talents8.mp4', '19:30:00', '233be783-19d8-4fbd-a471-9826fe7ca5d1'),

-- Soirée 27
('6a4d8262-d38d-4d43-beb0-46a0b9e5a4c9', 'Concert de Rock', 'Des performances énergiques de rock.', 'Rock', 'rock9.mp4', '20:00:00', '50503344-3fcc-4305-a6c4-039845022499'),
('d3e4336f-3b7a-466c-9171-9b3b9c516be0', 'Soirée Blues', 'Un mélange envoûtant de blues et de jazz.', 'Blues', 'blues9.mp4', '21:00:00', '50503344-3fcc-4305-a6c4-039845022499'),
('1c1c80ae-4f78-4a4d-b2e8-f0c7a7c6cb4a', 'Metal Night', 'Une soirée dédiée aux riffs de métal.', 'Métal', 'metal9.mp4', '22:00:00', '50503344-3fcc-4305-a6c4-039845022499'),

-- Soirée 28
('67c9e8c7-494c-4c91-b418-104c62492d47', 'Chanson Française', 'Des classiques de la chanson française.', 'Chanson', 'chanson8.mp4', '19:00:00', '8d6e570d-94f9-4cfb-9df2-37e57b908edd'),
('5145032e-64f0-42b5-8ef8-98242aa7a290', 'Jazz Session', 'Un voyage musical à travers le jazz.', 'Jazz', 'jazz9.mp4', '20:30:00', '8d6e570d-94f9-4cfb-9df2-37e57b908edd'),
('a3f9611f-ecb5-45de-9b39-23608e1b7ef2', 'Festival Électronique', 'Des DJ qui enflamment la scène.', 'Électronique', 'electro9.mp4', '23:00:00', '8d6e570d-94f9-4cfb-9df2-37e57b908edd'),

-- Soirée 29
('b78871c7-ec3e-43c6-b3a6-02cfb9ffca80', 'Concert de Pop', 'Un spectacle vibrant avec des artistes populaires.', 'Pop', 'pop9.mp4', '18:00:00', '1dbacb97-44f8-436c-a84a-77da13eeadb4'),
('a2eea678-9aa4-4586-bf47-c8b1cfeb2fbd', 'Rock Alternatif', 'Exploration des sons alternatifs contemporains.', 'Rock Alternatif', 'rock_alt9.mp4', '21:30:00', '1dbacb97-44f8-436c-a84a-77da13eeadb4'),
('cceee688-2757-4426-bb6b-e28fd0672c54', 'Performance Acoustique', 'Un moment de douceur avec des performances acoustiques.', 'Acoustique', 'acoustic9.mp4', '17:00:00', '1dbacb97-44f8-436c-a84a-77da13eeadb4'),

-- Soirée 30
('9d8d6e5f-59e5-4033-9d9d-4d841f76c39c', 'Nuit des Talents', 'Célébration des artistes émergents.', 'Divers', 'talents9.mp4', '19:30:00', '1ce1ef55-775e-496c-b53f-dea2db81f064'),
('3e30e0c1-3014-4dfd-9445-63f2e3a1e399', 'Concert de Rock', 'Un concert rempli de riffs puissants.', 'Rock', 'rock10.mp4', '20:00:00', '1ce1ef55-775e-496c-b53f-dea2db81f064'),
('5ed1bb84-314b-4046-b445-66b1705e7e79', 'Soirée Blues', 'Blues, passion et improvisation.', 'Blues', 'blues10.mp4', '21:00:00', '1ce1ef55-775e-496c-b53f-dea2db81f064');


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
('f2a7e9d1-4c4b-4b41-8e34-5f35cfd8068f','eeb1d0c5-46c9-4a93-8973-148de6bb19d0'),
('6f26190e-660c-4112-b080-e4ccdd377e7b','e1c305bb-2f02-46a2-bac4-14fdc8b5f5ae'),
('b0fbc8da-46cc-42c4-b587-30ff82c23f79','2632d9b6-7bb8-466e-9cc5-f1d255ddec1e'),
('d8c0d77f-fd65-43a1-b627-8c5c1b39d5bb','5650ef0b-3bf1-4c28-a73a-46ac098def46'),
('f1e1c582-b260-43e4-bdc3-6c2e89c34c8b', '2801b3da-799e-4953-b2a9-563fbb808340'),
('9f59b3c8-b48e-43ee-b1a2-6f67b29503c0','81a9b177-a68c-4f0a-8143-0cd47de07a70'),
('3a1238c1-d264-4ae7-a43d-e84f3bbdc317','51186c68-2be4-4695-bce0-775a5d8bf0ab'),
('f740391c-7dc5-4071-b760-e6d5d07b2baf','5650ef0b-3bf1-4c28-a73a-46ac098def46'),
('ab69cb12-6464-4e76-a23a-e82ab1f68b68','2801b3da-799e-4953-b2a9-563fbb808340'),
('1c7c62cf-e18e-42d2-a9c7-b0713c70dbbc','81a9b177-a68c-4f0a-8143-0cd47de07a70'),
('7ff4422a-4b12-4f9a-9c72-ff928c57e645','6a7ccffa-f238-4555-8812-f29450ab6525'),
('c08a99f4-c7ea-4a57-a3c5-63a445b81cf6','eeb1d0c5-46c9-4a93-8973-148de6bb19d0'),
('6f84e3b9-f5f3-4f1c-9c8f-3a2c2e9d0735','e1c305bb-2f02-46a2-bac4-14fdc8b5f5ae'),
('2d517c45-e230-479e-81f5-d0c622abc441','2632d9b6-7bb8-466e-9cc5-f1d255ddec1e'),
('d8e2e047-75a5-42de-8ff7-7a25430468f2','5650ef0b-3bf1-4c28-a73a-46ac098def46'),
('2899d7a2-8bc3-4c61-9f36-48ab6f78f68e','2801b3da-799e-4953-b2a9-563fbb808340'),
('f5d1cbb7-4497-43c0-8b25-9a6a7c3c65e3','81a9b177-a68c-4f0a-8143-0cd47de07a70'),
('89c73f79-fcb4-41d2-bb45-28551db54747','51186c68-2be4-4695-bce0-775a5d8bf0ab'),
('fa3e5151-bd63-4966-9c7e-614bc17c8e2b','6a7ccffa-f238-4555-8812-f29450ab6525'),
('b4406d90-3c69-44b6-836e-4f3ee3ef78f2','51186c68-2be4-4695-bce0-775a5d8bf0ab'),
('ba2836d7-6e8b-404d-81a5-393575a8241d','52a7ed02-1ada-4bb3-b06b-a38a547837ef'),
('96e4ffed-7e4e-4bc4-b90b-3decd9ed055c','eeb1d0c5-46c9-4a93-8973-148de6bb19d0'),
('b812bf51-9e57-43c5-b160-6b045b9351f9','e1c305bb-2f02-46a2-bac4-14fdc8b5f5ae'),
('6f4e73f0-30d4-434b-ae57-fdb62db0b489','2632d9b6-7bb8-466e-9cc5-f1d255ddec1e'),
('fe502b41-d7c7-4c31-9f54-3da1f1a2f7e1','5650ef0b-3bf1-4c28-a73a-46ac098def46'),
('8cc8129b-c497-4b63-a827-49dc9a69b70e','2801b3da-799e-4953-b2a9-563fbb808340'),
('4b5ab56f-bab8-4c15-b9f6-e84e4423b73b','81a9b177-a68c-4f0a-8143-0cd47de07a70'),
('845b9d64-18b5-49b8-9d1b-f07c82d10de5','283078ea-dd03-4f05-8856-e3f420413e43'),
('c83f3912-36d9-4948-bff9-708f2501eb88','51186c68-2be4-4695-bce0-775a5d8bf0ab'),
('58635412-25cc-4e07-817b-7c4c9252ac62','5650ef0b-3bf1-4c28-a73a-46ac098def46'),
('a0a58e0b-769f-4e3d-a05d-82c31ec9bbf6','2801b3da-799e-4953-b2a9-563fbb808340'),
('f26d38d0-42ca-4fb7-83f2-d2b1e61edfd8','51186c68-2be4-4695-bce0-775a5d8bf0ab'),
('21d1e325-7c8e-4932-9c79-d2b58c4775c6','81a9b177-a68c-4f0a-8143-0cd47de07a70'),
('b6112033-b2b3-4f4c-9fd3-b84b671b7438','6a7ccffa-f238-4555-8812-f29450ab6525'),
('98cbf160-37cc-4ab6-8019-caeefde0c5f9','51186c68-2be4-4695-bce0-775a5d8bf0ab'),
('bc64b123-81b9-4813-88f5-c5bc88800681','eeb1d0c5-46c9-4a93-8973-148de6bb19d0'),
('6a6ff208-0a4b-4b89-b4cb-b46497ae07f8','e1c305bb-2f02-46a2-bac4-14fdc8b5f5ae'),
('229e5071-e653-4c0e-bdc0-b2392b0276d3','2632d9b6-7bb8-466e-9cc5-f1d255ddec1e'),
('807a28e5-3783-493f-8551-8afedab62cf5','5650ef0b-3bf1-4c28-a73a-46ac098def46'),
('4c035b41-b4e4-4ed1-bd68-789e8b3da5af','2801b3da-799e-4953-b2a9-563fbb808340'),
('5f79786d-7fc6-4e76-8833-27b25aa4a7d2','81a9b177-a68c-4f0a-8143-0cd47de07a70'),
('db6be9eb-1c77-4659-9c98-2082555c9534','5650ef0b-3bf1-4c28-a73a-46ac098def46'),
('d67f7743-4f43-4bde-a793-5585efb5e29f','6a7ccffa-f238-4555-8812-f29450ab6525'),
('aa0c91d3-24d2-4036-9d07-44043e48741e','81a9b177-a68c-4f0a-8143-0cd47de07a70'),
('b77b7fae-f0f8-43ed-8f6f-68f756b48943','2801b3da-799e-4953-b2a9-563fbb808340'),
('3d24aef8-4ed7-4bc2-9e69-2e4c8826348f','51186c68-2be4-4695-bce0-775a5d8bf0ab'),
('205e0c5f-f431-48d4-bbe1-3481bb0b5b2b','eeb1d0c5-46c9-4a93-8973-148de6bb19d0'),
('e2d7622b-d0e3-461e-9eb7-9cd12a1a0869','e1c305bb-2f02-46a2-bac4-14fdc8b5f5ae'),
('7440a8e6-f54a-4794-b9fc-3ee71bbfb0b2','2632d9b6-7bb8-466e-9cc5-f1d255ddec1e'),
('826799d0-b064-4df9-bb56-4cf95327c9e4','5650ef0b-3bf1-4c28-a73a-46ac098def46'),
('9ac8c2b0-38cf-4de6-8498-d79f9cb83ed3','2801b3da-799e-4953-b2a9-563fbb808340'),
('07dc0a55-d5b2-4e30-935b-236be149de51','81a9b177-a68c-4f0a-8143-0cd47de07a70'),
('c65da8cd-85a3-4ab6-a5ed-501ca3cbda0b','51186c68-2be4-4695-bce0-775a5d8bf0ab'),
('f2adfbd4-4578-4d24-88a5-caf99a0e2b5e','5650ef0b-3bf1-4c28-a73a-46ac098def46'),
('c61416ca-bb4d-4c79-b30d-3f85b831c94e','81a9b177-a68c-4f0a-8143-0cd47de07a70'),
('7cfcb98c-01c3-40aa-b777-f4a5dc07e737','2801b3da-799e-4953-b2a9-563fbb808340'),
('763a793f-1eb3-4b7f-a57f-8f97a0e5277c','5650ef0b-3bf1-4c28-a73a-46ac098def46'),
('73e7717d-e6b9-4e06-bb75-6dc49c5eae67','eeb1d0c5-46c9-4a93-8973-148de6bb19d0'),
('8dc7f6f9-c44c-4736-9737-82a249c71d8e','e1c305bb-2f02-46a2-bac4-14fdc8b5f5ae'),
('a5c7ebc5-bae9-4913-b5eb-d502c2d6f65d','2632d9b6-7bb8-466e-9cc5-f1d255ddec1e');


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
('4a54f88a-7dbe-412c-8b5b-9e1e9a492bb0','f76e2644-f264-4d54-992b-ed0d2e28bd91','5606553a-df69-4335-b9d5-f7d484f90f3c',2,50.00),
('625f9f16-737f-40b3-a61d-ff95a2b99d8f','b1bca165-01e7-4fc0-b0a1-9d513f3d845b','e4c320bf-4c3f-4bdf-9a4c-c1e866565fb7',1,20.00);

INSERT INTO commande (commande_id,user_id,panier_id,prix_total,status)
VALUES
('180b1348-9721-4e5c-9417-18dbf6f7ce27','1b1aa5ad-cdfe-4d89-b121-e92dfd530999','f76e2644-f264-4d54-992b-ed0d2e28bd91',100.00,'en attente'),
('06f3b61c-3cd1-4a29-b86b-df0fc7fd9602','81d8b308-c442-4a08-9381-4f7e9a88183c','b1bca165-01e7-4fc0-b0a1-9d513f3d845b',20.00,'en attente');


INSERT INTO billet(billet_id,commande_id,soiree_id)
VALUES
('f2fd4fc6-2613-4407-8ac3-efe0206e3109','180b1348-9721-4e5c-9417-18dbf6f7ce27','5606553a-df69-4335-b9d5-f7d484f90f3c'),
('4505ea3b-55df-4864-808d-9c9942275fbc','06f3b61c-3cd1-4a29-b86b-df0fc7fd9602','e4c320bf-4c3f-4bdf-9a4c-c1e866565fb7');


INSERT INTO artiste(artiste_id,nom,prenom)
VALUES
('5e260c64-a6c1-491c-b2b5-44ee2dfb367e','Arcelin','Nino'),
('166f1042-bdf0-4023-9169-e62e9005f41c','Vela-Mena','Dimitri'),
('50e25062-c083-474e-a500-0e23661b80cc','Ratovobodo','Nicka'),
('f9b45070-120f-49a4-9f4c-9b648ba3586d','Amaglio','Matias');

INSERT INTO spectacle2artiste(spectacle_id,artiste_id)
VALUES
('1c7c62cf-e18e-42d2-a9c7-b0713c70dbbc','5e260c64-a6c1-491c-b2b5-44ee2dfb367e'),
('7ff4422a-4b12-4f9a-9c72-ff928c57e645','166f1042-bdf0-4023-9169-e62e9005f41c'),
('c08a99f4-c7ea-4a57-a3c5-63a445b81cf6','50e25062-c083-474e-a500-0e23661b80cc'),
('c08a99f4-c7ea-4a57-a3c5-63a445b81cf6','f9b45070-120f-49a4-9f4c-9b648ba3586d');

