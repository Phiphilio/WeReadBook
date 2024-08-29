<?php
//on récupère les infos venu à la DB
require_once(__DIR__ . "/connexionDb.php");

//on recupère une fonction
require_once(__DIR__ ."/fonctions.php");
$postData = $_POST;

var_dump($postData);

//on vérifie les informations envoyées par l'utilisateur (toujours)
if (!isset($postData) || is_numeric($postData)) {
    
    redirectTo("http://wereadbookbackend.local/HTML_+_CSS/");
}
//on transforme les informations de $postData en int pour qu'elles soient reconnues par la DB
$id = (int)$postData["id"];
echo $id;
//on envoie la requete sql
$idRequete = "UPDATE `livres` SET disponible = NOT disponible WHERE `id`= :id";

$idSatement = $mySql->prepare($idRequete);
$idSatement->execute([
    ":id"=>$id,
    //rappel : c'est la notation "paramètre nommé" si j'amais j'ai besoin de revenir dessus
]);
redirectTo("http://wereadbookbackend.local/HTML_+_CSS/");