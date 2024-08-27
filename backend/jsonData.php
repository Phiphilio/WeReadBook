<?php 
/**pour que les éléments affichés par javascript gardent la même cohérence que ceux affiché depuis php
j'ai préféré utiliser les informations de la base de donnée*/
require_once(__DIR__ . "/connexionDb.php");
//pour récupérer les données en json depuis mon script javascript
//le echo permet de faire en sorte que le javascript interprète l'info
//la fonction json_encode crée un tableau qui contient des objets correspondant à chaque sous tableau
echo json_encode($listeLivre);
/**
 * j'ai mis le "echo " pour pouvoir exécuter le fetch de mon javascript vers ici.
 * si je l'avais mis dans connexionDB.php, le echo s'afficherait aussi dans le fichier
 * index.php
 */
?>