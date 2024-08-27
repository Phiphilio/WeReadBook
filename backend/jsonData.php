<?php 
require_once(__DIR__ . "/connexionDb.php");
//pour récupérer les données en json depuis mon script javascript
//le echo permet de faire en sorte que le javascript interprète l'info
echo json_encode($listeLivre);
/**
 * j'ai mis le "echo " pour pouvoir exécuter le fetch de mon javascript vers ici.
 * si je l'avais mis dans connexionDB.php, le echo s'afficherait aussi dans le fichier
 * index.php
 */
?>