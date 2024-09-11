<?php
require_once __DIR__ . "/mysql.php";
try {
    $mySql = new PDO(
        // dans la chaine de connexion du pdo les espaces autour du "=" peuvent créer des erreurs
        'mysql:host=' . $hostName . '; dbname=' . $dbname . '; charset=utf8',
        $dbId,
        $mdp,
    );
} catch (EXCEPTION $e) {
    die("erreur" . $e->getMessage());
}

//récupère les livres de la DB
$requete = $requeteRecup;

$livreStatement = $mySql->prepare($requete);

$livreStatement->execute();


$listeLivre = $livreStatement->fetchAll();


//récupère les données de la table info-livres
$RequeteJointure = $jointure;

$infoLivresStatement = $mySql->prepare($RequeteJointure);

$infoLivresStatement->execute();

$infoLivres = $infoLivresStatement->fetchAll(PDO::FETCH_ASSOC);

//écupère les utilisateurs

$userStatement = $mySql->prepare($requeteUser);

$userStatement->execute();

$listeUser = $userStatement->fetchAll(PDO::FETCH_ASSOC);
