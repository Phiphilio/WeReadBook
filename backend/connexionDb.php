<?php
require_once(__DIR__ . "/mysql.php");
try {
    $mySql = new PDO(
        // dans la chaine de connexion du pdo les espaces autour du "=" peuvent créer des erreurs
        'mysql:host='.$hostName.'; dbname='.$dbname.'; charset=utf8',
        $dbId ,
        $mdp,
    );
} catch (EXCEPTION $e) {
    die("erreur" . $e->getMessage());
}

$requete = "SELECT titre, auteur FROM `livres` WHERE disponible = 1";

$livreStatement = $mySql->prepare($requete);

$livreStatement->execute();

$listeLivre = $livreStatement->fetchAll();

var_dump($listeLivre);
