<?php
//je stocke les noms de l'hote et de la DB dans des variables
$hostName = "localhost";
$dbname = "bibliotheque";

//je stocke l'identifiant et le mdp dans des variables
$mdp = "";
$dbId = "root";

// on stocke la requête sql
$requeteRecup = "SELECT * FROM `livres`";

//requete pour tous les utilisateurs
$requeteUser = "SELECT * FROM users";

//requête inscription
$requeteInscription = "INSERT INTO users (nom, email, motDePasse) VALUE ( :nom , :email,:motDePasse )";

// requete pour la jointure sql
$jointure = "SELECT url_livre, livre_id, livre_description FROM info_livres INNER JOIN livres ON info_livres.livre_id = livres.id";
