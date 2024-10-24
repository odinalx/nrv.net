CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

DROP TABLE IF EXISTS "lieu" CASCADE;

CREATE TABLE lieu (
    lieu_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    nom VARCHAR(255) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    nb_place_assise INT NOT NULL,
    nb_place_debout INT NOT NULL   
);

DROP TABLE IF EXISTS "lieuimage" CASCADE;

CREATE TABLE lieuimage (
    lieuimage_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    image VARCHAR(255) NOT NULL
);

DROP TABLE IF EXISTS "lieu2lieuimage" CASCADE;

CREATE TABLE lieu2lieuimage (
    lieu_id UUID NOT NULL,
    lieuimage_id UUID NOT NULL,
    PRIMARY KEY (lieu_id, lieuimage_id),
    FOREIGN KEY (lieu_id) REFERENCES lieu(lieu_id),
    FOREIGN KEY (lieuimage_id) REFERENCES lieuimage(lieuimage_id)
);

DROP TABLE IF EXISTS "soiree" CASCADE;

CREATE TABLE soiree (
    soiree_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    nom VARCHAR(255) NOT NULL,
    theme VARCHAR(255) NOT NULL,
    date VARCHAR(255) NOT NULL,
    horaire_debut VARCHAR(255) NOT NULL,
    lieu_id UUID NOT NULL,
    tarif_normal FLOAT NOT NULL,
    tarif_reduit FLOAT NOT NULL,
    places_dispo INT NOT NULL,
    FOREIGN KEY (lieu_id) REFERENCES lieu(lieu_id)
);

DROP TABLE IF EXISTS "spectacle" CASCADE;

CREATE TABLE spectacle (
    spectacle_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    style VARCHAR(255) NOT NULL,
    url_video VARCHAR(255) NOT NULL,
    horaire_prev VARCHAR(255) NOT NULL,
    soiree_id UUID NOT NULL,
    FOREIGN KEY (soiree_id) REFERENCES soiree(soiree_id)
);

DROP TABLE IF EXISTS "artiste" CASCADE;

CREATE TABLE artiste (
    artiste_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL  
);

DROP TABLE IF EXISTS "spectacle2artiste" CASCADE;

CREATE TABLE spectacle2artiste (
    spectacle_id UUID NOT NULL,
    artiste_id UUID NOT NULL,
    PRIMARY KEY (spectacle_id, artiste_id),
    FOREIGN KEY (spectacle_id) REFERENCES spectacle(spectacle_id),
    FOREIGN KEY (artiste_id) REFERENCES artiste(artiste_id)
);

DROP TABLE IF EXISTS "spectacleimage" CASCADE;

CREATE TABLE spectacleimage (
    spectacleimage_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    image VARCHAR(255) NOT NULL
);

DROP TABLE IF EXISTS "spectacle2spectacleimage" CASCADE;

CREATE TABLE spectacle2spectacleimage (
    spectacle_id UUID NOT NULL,
    spectacleimage_id UUID NOT NULL,
    PRIMARY KEY (spectacle_id, spectacleimage_id),
    FOREIGN KEY (spectacle_id) REFERENCES spectacle(spectacle_id),
    FOREIGN KEY (spectacleimage_id) REFERENCES spectacleimage(spectacleimage_id)
);

DROP TABLE IF EXISTS "utilisateur" CASCADE;

CREATE TABLE utilisateur (
    user_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL
);

DROP TABLE IF EXISTS "panier" CASCADE;

CREATE TABLE panier (
    panier_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    user_id UUID NOT NULL,
    is_validated BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES utilisateur(user_id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS "billet_panier" CASCADE;

CREATE TABLE billet_panier (
    id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    panier_id UUID NOT NULL,
    soiree_id UUID NOT NULL,
    quantite INT NOT NULL,
    prix FLOAT NOT NULL,
    FOREIGN KEY (panier_id) REFERENCES panier(panier_id) ON DELETE CASCADE,
    FOREIGN KEY (soiree_id) REFERENCES soiree(soiree_id)
);

DROP TABLE IF EXISTS "commande" CASCADE;

CREATE TABLE commande (
    commande_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    user_id UUID NOT NULL,
    panier_id UUID NOT NULL,
    prix_total FLOAT NOT NULL,
    status VARCHAR(50) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES utilisateur(user_id),
    FOREIGN KEY (panier_id) REFERENCES panier(panier_id)
);

DROP TABLE IF EXISTS "billet" CASCADE;

CREATE TABLE billet (
    billet_id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    commande_id UUID NOT NULL,
    soiree_id UUID NOT NULL,
    FOREIGN KEY (commande_id) REFERENCES commande(commande_id),
    FOREIGN KEY (soiree_id) REFERENCES soiree(soiree_id)
);







