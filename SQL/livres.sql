USE bibliotheque;

CREATE TABLE IF NOT EXISTS livres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    auteur VARCHAR(255) NOT NULL,
    date_sortie DATE NOT NULL,
    genre VARCHAR(100),
    description TEXT,
    disponible BOOLEAN DEFAULT TRUE,
    date_ajout TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO livres (titre, auteur, date_sortie, genre, description) VALUES
('1984', 'George Orwell', '1949-06-08', 'Dystopie', 'Un roman dystopique sur une société totalitaire sous surveillance.'),
('Harry Potter à l\'école des sorciers', 'J.K. Rowling', '1997-06-26', 'Fantasy', 'Le premier tome des aventures de Harry Potter.'),
('Les Misérables', 'Victor Hugo', '1862-04-03', 'Roman historique', 'Un classique de la littérature française sur la vie des pauvres au XIXe siècle.'),
('Moby Dick', 'Herman Melville', '1851-10-18', 'Aventure', 'L\'histoire du capitaine Ahab et de sa quête pour capturer une baleine blanche géante.'),
('Le Petit Prince', 'Antoine de Saint-Exupéry', '1943-04-06', 'Conte', 'Un conte poétique et philosophique sur un petit prince venant d\'une autre planète.'),
('Crime et Châtiment', 'Fiodor Dostoïevski', '1866-01-01', 'Roman philosophique', 'L\'histoire d\'un jeune homme pauvre qui commet un meurtre et en subit les conséquences psychologiques.'),
('La Métamorphose', 'Franz Kafka', '1915-01-01', 'Nouvelle', 'L\'histoire de Gregor Samsa, qui se réveille transformé en un insecte géant.'),
('L\'Étranger', 'Albert Camus', '1942-01-01', 'Roman philosophique', 'Un roman sur l\'absurdité de la vie et l\'indifférence de l\'univers.'),
('À la recherche du temps perdu', 'Marcel Proust', '1913-11-14', 'Roman', 'Une exploration de la mémoire et de la société française à travers les souvenirs du narrateur.'),
('Le Nom de la rose', 'Umberto Eco', '1980-01-01', 'Roman historique', 'Un roman médiéval combinant un mystère de meurtre avec une réflexion sur la philosophie et la religion.'),
('Le Vieil Homme et la Mer', 'Ernest Hemingway', '1952-09-01', 'Aventure', 'L\'histoire d\'un vieux pêcheur cubain et de sa lutte épique avec un marlin géant.'),
('Fahrenheit 451', 'Ray Bradbury', '1953-10-19', 'Science-fiction', 'Un roman sur un futur où les livres sont interdits et brûlés par les pompiers.'),
('Don Quichotte', 'Miguel de Cervantes', '1605-01-16', 'Roman', 'Les aventures de Don Quichotte, un noble espagnol qui se prend pour un chevalier errant.'),
('Le Comte de Monte-Cristo', 'Alexandre Dumas', '1844-01-01', 'Roman d\'aventure', 'L\'histoire de la vengeance d\'Edmond Dantès, injustement emprisonné.'),
('Jane Eyre', 'Charlotte Brontë', '1847-10-16', 'Roman', 'Le parcours d\'une orpheline qui devient gouvernante et tombe amoureuse de son employeur, M. Rochester.');
