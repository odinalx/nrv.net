
CREATE DATABASE events_db;
\c events_db  


CREATE TABLE lieux (
    id_lieu SERIAL PRIMARY KEY,  
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    seated_capacity INT NOT NULL,
    standing_capacity INT NOT NULL,
    images TEXT
);



CREATE TABLE spectacles (
    spectacle_id SERIAL PRIMARY KEY,  
    titre VARCHAR(255) NOT NULL,
    artistes VARCHAR(255) NOT NULL,
    style VARCHAR(255) NOT NULL,
    images TEXT,
    estimated_start_time TIME,
    lieu_id INT,
    FOREIGN KEY (lieu_id) REFERENCES lieux(id_lieu)
);


CREATE TABLE soirees (
    id_soiree SERIAL PRIMARY KEY,  
    name VARCHAR(255) NOT NULL,
    theme VARCHAR(255),
    soiree_date DATE NOT NULL,
    start_time TIME NOT NULL,
    normal_price DECIMAL(10, 2),
    reduced_price DECIMAL(10, 2),
    lieu_id INT,
    FOREIGN KEY (lieu_id) REFERENCES lieux(id_lieu)
);



CREATE TABLE soiree_spectacles (
    soiree_spectacle_id SERIAL PRIMARY KEY,  
    soiree_id INT, 
    spectacle_id INT,  
    FOREIGN KEY (soiree_id) REFERENCES soirees(id_soiree),
    FOREIGN KEY (spectacle_id) REFERENCES spectacles(spectacle_id)
);


