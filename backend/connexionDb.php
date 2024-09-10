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
//requête sql récupérée depuis mysql.php
$requete = $requeteRecup;

//methode prepare pour préparer et sécuriser la requête.
//un objet PDOStatement est généré puis stocké dans $livreStatement
$livreStatement = $mySql->prepare($requete);

//la requête est exécutée. les informations non exploitables sont dans l'objet
//$livreStatement
$livreStatement->execute();

//l'ensemble des informations sont récupérées dans un tableau associatif
//le tableau est stocké dans $listeLivre
$listeLivre = $livreStatement->fetchAll();


//récupère les données de la table info-livres
$RequeteJointure = $jointure;

$infoLivresStatement = $mySql->prepare($RequeteJointure);

$infoLivresStatement->execute();

$infoLivres = $infoLivresStatement->fetchAll(PDO::FETCH_ASSOC);
