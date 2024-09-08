USE bibliotheque;

CREATE TABLE IF NOT EXISTS info_livres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    livre_id int,
    url_livre VARCHAR (225) NOT NULL,
    livre_description TEXT,
    FOREIGN KEY (livre_id) REFERENCES livres(id)
);