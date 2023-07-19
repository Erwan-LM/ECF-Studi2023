-- Création de la base de données
<<<<<<< HEAD

CREATE DATABASE garage_ecf;

USE garage_ecf;

-- Création de la table attributionrank

CREATE TABLE
    attributionrank (
        id INT(11) PRIMARY KEY,
        rank VARCHAR(255)
    );

-- Insertion des valeurs dans la table attributionrank

INSERT INTO
    attributionrank (id, rank)
VALUES (1, 'Administrateur'), (2, 'Employé');

-- Création de la table carburants

CREATE TABLE
    carburants (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        carburant VARCHAR(45)
    );

-- Insertion des valeurs dans la table carburants

INSERT INTO
    carburants (carburant)
VALUES ('Essence sans plomb'), ('Diesel'), ('GPL'), ('Bioéthanol'), ('Biodiesel'), ('Gaz naturel comprimé (GNC)'), ('Hydrogène'), ('Electrique');

-- Création de la table contacts

CREATE TABLE
    contacts (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(255),
        prenom VARCHAR(255),
        email VARCHAR(255),
        telephone VARCHAR(20),
        message TEXT,
        created_at TIMESTAMP
    );

-- Insertion des valeurs dans la table contacts

INSERT INTO
    contacts (
        nom,
        prenom,
        email,
        telephone,
        message,
        created_at
    )
VALUES (
        'Dupond',
        'Jean',
        'jean@dupond.fr',
        '0611223344',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        '2023-07-11 12:43:55'
    ), (
        'Proud',
        'Jannot',
        'proud@jannot.fr',
        '0699887766',
        'Maecenas ullamcorper turpis at diam aliquet, nec pharetra nulla rhoncus.',
        '2023-07-11 12:46:47'
    ), (
        'Loob',
        'Jhana',
        'loob@jhana.com',
        '0789289219',
        'Suspendisse potenti. Sed dictum enim vitae lacus venenatis.',
        '2023-07-11 12:55:25'
    ), (
        'Dujon',
        'Gerald',
        'dujon@gerald.fr',
        '0798979496',
        'Vestibulum tincidunt quam mi, eget pharetra lectus efficitur eget.',
        '2023-07-11 13:01:37'
    );

-- Création de la table couleurs

CREATE TABLE
    couleurs (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        couleur VARCHAR(45)
    );

-- Insertion des valeurs dans la table couleurs

INSERT INTO couleurs (couleur)
VALUES ('blanc'), ('noir'), ('bleu'), ('rouge'), ('jaune'), ('orange'), ('vert'), ('rose'), ('marron'), ('violet'), ('gris'), ('turquoise'), ('bordeau'), ('bleu marine'), ('bleu ciel'), ('mauve'), ('ocre'), ('silver');

-- Création de la table employ

CREATE TABLE
    employ (
        Id INT(11) AUTO_INCREMENT PRIMARY KEY,
        FirstName VARCHAR(255),
        LastName VARCHAR(255),
        Birthday DATE,
        email VARCHAR(255),
        password VARCHAR(255),
        role_id INT(11)
    );

-- Insertion des valeurs dans la table employ

INSERT INTO
    employ (
        FirstName,
        LastName,
        Birthday,
        email,
        password,
        role_id
    )
VALUES (
        'Vincent',
        'Parrot',
        '1980-01-10',
        'vincent.parrot@garage.com',
        '$2y$10$yUlWBTS81ml0jNzDLZc7eO/LyUWAk4yA6AviFTUVusDY/Q5/erQxO',
        1
    ), (
        'John',
        'Doe',
        '1995-05-10',
        'john.doe@garage.com',
        '$2y$10$HPstw4rmynO6msB7JtS/7uhPyVG1db0GPYxIuPJbg4ouX2cXfpmfO',
        2
    ), (
        'janna',
        'beld',
        NULL,
        'janna@beld.com',
        '$2y$10$2jwPvhjRY.lbQrHOB.H98eBXbujIA.qsWcuQkSia9f8vWUNGsoWry',
        2
    );

-- Ajout de la clé étrangère role_id dans la table employ

ALTER TABLE employ
ADD
    CONSTRAINT fk_employ_role FOREIGN KEY (role_id) REFERENCES attributionrank(id);

-- Création de la table equipements

CREATE TABLE
    equipements (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        equipement VARCHAR(255)
    );

-- Insertion des valeurs dans la table equipements

INSERT INTO
    equipements (equipement)
VALUES ('Système de navigation GPS'), ('Caméra de recul'), (
        'Système Bluetooth pour les appels mains libres'
    ), (
        'Aide au stationnement avec capteurs de proximité'
    ), (
        'Régulateur de vitesse adaptatif'
    ), (
        'Système d''assistance au maintien de voie'
    ), ('Sièges chauffants'), ('Volant chauffant'), (
        'Système de surveillance des angles morts'
    ), (
        'Détecteur de collision avant avec freinage automatique d''urgence'
    ), ('Toit panoramique'), (
        'Système audio haut de gamme'
    ), ('Connexion Wi-Fi intégrée'), ('Sièges en cuir'), (
        'Éclairage d''ambiance personnalisable'
    ), ('Démarrage sans clé'), (
        'Système de démarrage à distance'
    ), (
        'Système de divertissement arrière avec écrans intégrés aux appuie-têtes'
    ), ('Phares adaptatifs'), (
        'Système d''assistance au stationnement automatique'
    );

-- Création de la table gearbox

CREATE TABLE
    gearbox (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        boite_de_vitesse VARCHAR(45)
    );

-- Insertion des valeurs dans la table gearbox

INSERT INTO
    gearbox (boite_de_vitesse)
VALUES ('Boîte de vitesses manuelle'), (
        'Boîte de vitesses automatique'
    ), (
        'Boîte de vitesses semi-automatique'
    ), (
        'Boîte de vitesses à variation continue (CVT)'
    );

-- Création de la table horaires

CREATE TABLE
    horaires (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        jours VARCHAR(45),
        ouverture TIME,
        fermeture TIME
    );

-- Insertion des valeurs dans la table horaires

INSERT INTO
    horaires (jours, ouverture, fermeture)
VALUES (
        'Lundi',
        '08:00:00',
        '18:00:00'
    ), (
        'Mardi',
        '08:00:00',
        '18:00:00'
    ), (
        'Mercredi',
        '08:00:00',
        '18:00:00'
    ), (
        'Jeudi',
        '08:00:00',
        '18:00:00'
    ), (
        'Vendredi',
        '08:00:00',
        '18:00:00'
    ), (
        'Samedi',
        '09:00:00',
        '13:00:00'
    ), ('Dimanche', NULL, NULL);

-- Création de la table services

CREATE TABLE
    services (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255),
        paragraphe LONGTEXT
    );

-- Insertion des valeurs dans la table services

INSERT INTO
    services (title, paragraphe)
VALUES (
        'Révision de voiture',
        'L''intervalle entre deux révisions de votre voiture dépend inévitablement de la marque de la voiture et de sa motorisation. Le carnet d''entretien fourni par le constructeur doit vous indiquer à quel moment réaliser une révision ou une intervention d...'
    ), (
        'Réparation mécanique',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.'
    ), (
        'Entretien régulier',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.'
    );

-- Création de la table temoignages

CREATE TABLE
    temoignages (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(255),
        commentaire TEXT,
        note INT(11),
        valide INT(11)
    );

-- Insertion des valeurs dans la table temoignages

INSERT INTO
    temoignages (nom, commentaire, note, valide)
VALUES (
        'Mr Bean''s',
        'Il a rien dit mais semblé être ravis',
        5,
        1
    ), (
        'Jamis LT',
        'Trés bon garage !',
        4,
        1
    ), (
        'Pat Olive',
        'Très bonne adresse',
        3,
        1
    ), (
        'Pitch Oune',
        'Merci beaucoup vous êtes tous super aimable',
        5,
        1
    ), (
        'Jacki Chan',
        'On ne m''a pas laisser faire de cascade mais le service reste très agréable, je recommande !',
        3,
        1
    ), (
        'Mickel Sch',
        'Les voitures d''occasion proposé sont très bien entretenu',
        4,
        1
    ), (
        'Harricot Beurre',
        'Une qualité de service envoutante !',
        3,
        1
    ), (
        'Yod hah',
        'Très bon, ce garage il est',
        4,
        1
    ), (
        'Luffy M.D',
        'Une belle surprise les véhicule d''occasion !',
        3,
        1
    ), (
        'Saitama',
        'J''avais détruit ma voiture et ils l''ont réparé en un coup de main !',
        4,
        1
    ), (
        'Jacques Poireau',
        'Les cacahouètes sont excellente a l''accueille',
        3,
        1
    ), (
        'Tonton F',
        'Vous êtes aux top continué comme ça !',
        5,
        1
    ), (
        'Olive & T',
        'Service a la hauteur de nos attente, merci l''équipe !',
        4,
        0
    ), (
        'Forrest Gump',
        'C''est du rapide',
        3,
        0
    ), (
        'Ally McBeal',
        'Ce garage est tout simplement incroyable ! Un service impeccable, des mécaniciens compétents et des tarifs compétitifs. Je ne pourrais pas être plus satisfaite de mes visites ici. Recommandé à 100%',
        4,
        0
    );

-- Création de la table vente_occasion

CREATE TABLE
    vente_occasion (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        marque VARCHAR(255),
        modele VARCHAR(255),
        prix DECIMAL(10, 2),
        annee INT(11),
        kilometrage INT(11),
        image LONGBLOB,
        carburant VARCHAR(255),
        couleur VARCHAR(255),
        boite_de_vitesse VARCHAR(255),
        liste_equipements TEXT,
        gallery1 LONGBLOB,
        gallery2 LONGBLOB,
        gallery3 LONGBLOB
    );

-- Insertion des valeurs dans la table vente_occasion

INSERT INTO
    vente_occasion (
        marque,
        modele,
        prix,
        annee,
        kilometrage,
        image,
        carburant,
        couleur,
        boite_de_vitesse,
        liste_equipements,
        gallery1,
        gallery2,
        gallery3
    )
VALUES (
        '',
        '',
        50000.00,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Mc Laren',
        '',
        20000.00,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Toyota',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Volkswagen',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Ford',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Honda',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Chevrolet',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Nissan',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'BMW',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Mercedes-Benz',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Audi',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Hyundai',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Kia',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Tesla',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Subaru',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Mazda',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Fiat',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Renault',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Peugeot',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Jaguar',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Land Rover',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Volvo',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Porsche',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Aston Martin',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Ferrari',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Lamborghini',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Rolls-Royce',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Bentley',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Maserati',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Mini',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Alfa Romeo',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Lexus',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Tesla',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        'Alpine',
        '',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    );
=======
CREATE DATABASE garage_ecf;

-- Création de la table attributionrank
CREATE TABLE attributionrank (
  id INT(11) PRIMARY KEY,
  rank VARCHAR(255)
);

-- Insertion des valeurs dans la table attributionrank
INSERT INTO attributionrank (id, rank) VALUES
(1, 'Administrateur'),
(2, 'Employé');

-- Création de la table carburants
CREATE TABLE carburants (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  carburant VARCHAR(45)
);

-- Insertion des valeurs dans la table carburants
INSERT INTO carburants (carburant) VALUES
('Essence sans plomb'),
('Diesel'),
('GPL'),
('Bioéthanol'),
('Biodiesel'),
('Gaz naturel comprimé (GNC)'),
('Hydrogène'),
('Electrique');

-- Création de la table contacts
CREATE TABLE contacts (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255),
  prenom VARCHAR(255),
  email VARCHAR(255),
  telephone VARCHAR(20),
  message TEXT,
  created_at TIMESTAMP
);

-- Insertion des valeurs dans la table contacts
INSERT INTO contacts (nom, prenom, email, telephone, message, created_at) VALUES
('Dupond', 'Jean', 'jean@dupond.fr', '0611223344', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2023-07-11 12:43:55'),
('Proud', 'Jannot', 'proud@jannot.fr', '0699887766', 'Maecenas ullamcorper turpis at diam aliquet, nec pharetra nulla rhoncus.', '2023-07-11 12:46:47'),
('Loob', 'Jhana', 'loob@jhana.com', '0789289219', 'Suspendisse potenti. Sed dictum enim vitae lacus venenatis.', '2023-07-11 12:55:25'),
('Dujon', 'Gerald', 'dujon@gerald.fr', '0798979496', 'Vestibulum tincidunt quam mi, eget pharetra lectus efficitur eget.', '2023-07-11 13:01:37');

-- Création de la table couleurs
CREATE TABLE couleurs (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  couleur VARCHAR(45)
);

-- Insertion des valeurs dans la table couleurs
INSERT INTO couleurs (couleur) VALUES
('blanc'),
('noir'),
('bleu'),
('rouge'),
('jaune'),
('orange'),
('vert'),
('rose'),
('marron'),
('violet'),
('gris'),
('turquoise'),
('bordeau'),
('bleu marine'),
('bleu ciel'),
('mauve'),
('ocre'),
('silver');

-- Création de la table employ
CREATE TABLE employ (
  Id INT(11) AUTO_INCREMENT PRIMARY KEY,
  FirstName VARCHAR(255),
  LastName VARCHAR(255),
  Birthday DATE,
  email VARCHAR(255),
  password VARCHAR(255),
  role_id INT(11)
);

-- Insertion des valeurs dans la table employ
INSERT INTO employ (FirstName, LastName, Birthday, email, password, role_id) VALUES
('Vincent', 'Parrot', '1980-01-10', 'vincent.parrot@garage.com', '$2y$10$yUlWBTS81ml0jNzDLZc7eO/LyUWAk4yA6AviFTUVusDY/Q5/erQxO', 1),
('John', 'Doe', '1995-05-10', 'john.doe@garage.com', '$2y$10$HPstw4rmynO6msB7JtS/7uhPyVG1db0GPYxIuPJbg4ouX2cXfpmfO', 2),
('janna', 'beld', NULL, 'janna@beld.com', '$2y$10$2jwPvhjRY.lbQrHOB.H98eBXbujIA.qsWcuQkSia9f8vWUNGsoWry', 2);

-- Ajout de la clé étrangère role_id dans la table employ
ALTER TABLE employ
ADD CONSTRAINT fk_employ_role
FOREIGN KEY (role_id)
REFERENCES attributionrank(id);

-- Création de la table equipements
CREATE TABLE equipements (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  equipement VARCHAR(255)
);

-- Insertion des valeurs dans la table equipements
INSERT INTO equipements (equipement) VALUES
('Système de navigation GPS'),
('Caméra de recul'),
('Système Bluetooth pour les appels mains libres'),
('Aide au stationnement avec capteurs de proximité'),
('Régulateur de vitesse adaptatif'),
('Système d''assistance au maintien de voie'),
('Sièges chauffants'),
('Volant chauffant'),
('Système de surveillance des angles morts'),
('Détecteur de collision avant avec freinage automatique d''urgence'),
('Toit panoramique'),
('Système audio haut de gamme'),
('Connexion Wi-Fi intégrée'),
('Sièges en cuir'),
('Éclairage d''ambiance personnalisable'),
('Démarrage sans clé'),
('Système de démarrage à distance'),
('Système de divertissement arrière avec écrans intégrés aux appuie-têtes'),
('Phares adaptatifs'),
('Système d''assistance au stationnement automatique');

-- Création de la table gearbox
CREATE TABLE gearbox (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  boite_de_vitesse VARCHAR(45)
);

-- Insertion des valeurs dans la table gearbox
INSERT INTO gearbox (boite_de_vitesse) VALUES
('Boîte de vitesses manuelle'),
('Boîte de vitesses automatique'),
('Boîte de vitesses semi-automatique'),
('Boîte de vitesses à variation continue (CVT)');

-- Création de la table horaires
CREATE TABLE horaires (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  jours VARCHAR(45),
  ouverture TIME,
  fermeture TIME
);

-- Insertion des valeurs dans la table horaires
INSERT INTO horaires (jours, ouverture, fermeture) VALUES
('Lundi', '08:00:00', '18:00:00'),
('Mardi', '08:00:00', '18:00:00'),
('Mercredi', '08:00:00', '18:00:00'),
('Jeudi', '08:00:00', '18:00:00'),
('Vendredi', '08:00:00', '18:00:00'),
('Samedi', '09:00:00', '13:00:00'),
('Dimanche', NULL, NULL);

-- Création de la table services
CREATE TABLE services (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  paragraphe LONGTEXT
);

-- Insertion des valeurs dans la table services
INSERT INTO services (title, paragraphe) VALUES
('Révision de voiture', 'L''intervalle entre deux révisions de votre voiture dépend inévitablement de la marque de la voiture et de sa motorisation. Le carnet d''entretien fourni par le constructeur doit vous indiquer à quel moment réaliser une révision ou une intervention d...'),
('Réparation mécanique', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.'),
('Entretien régulier', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.');

-- Création de la table temoignages
CREATE TABLE temoignages (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255),
  commentaire TEXT,
  note INT(11),
  valide INT(11)
);

-- Insertion des valeurs dans la table temoignages
INSERT INTO temoignages (nom, commentaire, note, valide) VALUES
('Mr Bean''s', 'Il a rien dit mais semblé être ravis', 5, 1),
('Jamis LT', 'Trés bon garage !', 4, 1),
('Pat Olive', 'Très bonne adresse', 3, 1),
('Pitch Oune', 'Merci beaucoup vous êtes tous super aimable', 5, 1),
('Jacki Chan', 'On ne m''a pas laisser faire de cascade mais le service reste très agréable, je recommande !', 3, 1),
('Mickel Sch', 'Les voitures d''occasion proposé sont très bien entretenu', 4, 1),
('Harricot Beurre', 'Une qualité de service envoutante !', 3, 1),
('Yod hah', 'Très bon, ce garage il est', 4, 1),
('Luffy M.D', 'Une belle surprise les véhicule d''occasion !', 3, 1),
('Saitama', 'J''avais détruit ma voiture et ils l''ont réparé en un coup de main !', 4, 1),
('Jacques Poireau', 'Les cacahouètes sont excellente a l''accueille', 3, 1),
('Tonton F', 'Vous êtes aux top continué comme ça !', 5, 1),
('Olive & T', 'Service a la hauteur de nos attente, merci l''équipe !', 4, 0),
('Forrest Gump', 'C''est du rapide', 3, 0),
('Ally McBeal', 'Ce garage est tout simplement incroyable ! Un service impeccable, des mécaniciens compétents et des tarifs compétitifs. Je ne pourrais pas être plus satisfaite de mes visites ici. Recommandé à 100%', 4, 0);

-- Création de la table vente_occasion
CREATE TABLE vente_occasion (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  marque VARCHAR(255),
  modele VARCHAR(255),
  prix DECIMAL(10, 2),
  annee INT(11),
  kilometrage INT(11),
  image LONGBLOB,
  carburant VARCHAR(255),
  couleur VARCHAR(255),
  boite_de_vitesse VARCHAR(255),
  liste_equipements TEXT,
  gallery1 LONGBLOB,
  gallery2 LONGBLOB,
  gallery3 LONGBLOB
);

-- Insertion des valeurs dans la table vente_occasion
INSERT INTO vente_occasion (marque, modele, prix, annee, kilometrage, image, carburant, couleur, boite_de_vitesse, liste_equipements, gallery1, gallery2, gallery3) VALUES
('', '', 50000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Mc Laren', '', 20000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Toyota', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Volkswagen', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Ford', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Honda', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Chevrolet', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Nissan', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('BMW', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Mercedes-Benz', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Audi', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Hyundai', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Kia', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Tesla', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Subaru', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Mazda', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Fiat', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Renault', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Peugeot', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Jaguar', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Land Rover', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Volvo', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Porsche', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Aston Martin', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Ferrari', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Lamborghini', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Rolls-Royce', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Bentley', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Maserati', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Mini', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Alfa Romeo', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Lexus', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Tesla', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Alpine', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Création de la table voiture_occasion
CREATE TABLE voitures_occasion (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  marque VARCHAR(45),
  modele VARCHAR(45),
  prix DECIMAL(10, 2),
  image longblob,
  annee INT(11),
  kilometrage INT(11)
);

INSERT INTO voitures_occasion (id, marque, modele, prix, image, annee, kilometrage)
VALUES
(1, 'McLaren', '', 50000.00, '', 2000, 20000),
(2, 'Toyota', '', 20000.00, '', 1000, 10000),
(3, 'Volkswagen', '', 0.00, '', 0, 0),
(4, 'Ford', '', 0.00, '', 0, 0),
(5, 'Honda', '', 0.00, '', 0, 0),
(6, 'Chevrolet', '', 0.00, '', 0, 0),
(7, 'Nissan', '', 0.00, '', 0, 0),
(8, 'BMW', '', 0.00, '', 0, 0),
(9, 'Mercedes-Benz', '', 0.00, '', 0, 0),
(10, 'Audi', '', 0.00, '', 0, 0),
(11, 'Hyundai', '', 0.00, '', 0, 0),
(12, 'Kia', '', 0.00, '', 0, 0),
(13, 'Tesla', '', 0.00, '', 0, 0),
(14, 'Subaru', '', 0.00, '', 0, 0),
(15, 'Mazda', '', 0.00, '', 0, 0),
(16, 'Fiat', '', 0.00, '', 0, 0),
(17, 'Renault', '', 0.00, '', 0, 0),
(18, 'Peugeot', '', 0.00, '', 0, 0),
(19, 'Jaguar', '', 0.00, '', 0, 0),
(20, 'Land Rover', '', 0.00, '', 0, 0),
(21, 'Volvo', '', 0.00, '', 0, 0),
(22, 'Porsche', '', 0.00, '', 0, 0),
(23, 'Aston Martin', '', 0.00, '', 0, 0),
(24, 'Ferrari', '', 0.00, '', 0, 0),
(25, 'Lamborghini', '', 0.00, '', 0, 0),
(26, 'Rolls-Royce', '', 0.00, '', 0, 0),
(27, 'Bentley', '', 0.00, '', 0, 0),
(28, 'Maserati', '', 0.00, '', 0, 0),
(29, 'Mini', '', 0.00, '', 0, 0),
(30, 'Alfa Romeo', '', 0.00, '', 0, 0),
(31, 'Lexus', '', 0.00, '', 0, 0),
(32, 'Tesla', '', 0.00, '', 0, 0),
(33, 'Alpine', '', 0.00, '', 0, 0);
>>>>>>> d3203bb596ba6cb178ed12b4f2ceaef7d151a66c
