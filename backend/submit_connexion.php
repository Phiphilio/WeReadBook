<?php 
session_start();

require_once(__DIR__ . "/connexionDb.php");
require_once(__DIR__ . "/fonctions.php");

//envoie des informations d'identification
var_dump($_POST);
if (
    !isset($_POST["email"]) || !isset($_POST["motDePasse"])

) {
if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    echo "erreur de fonctionnement";
    
}
}

$requeteRecuUtilisateur = "SELECT nom, user_id FROM users WHERE email= :email AND motDePasse= :motDePasse";

$infoUtilisateurStatement = $mySql->prepare($requeteRecuUtilisateur);

$infoUtilisateurStatement->execute([
    ":email" => $_POST["email"],
    ":motDePasse" => $_POST["motDePasse"],
]);

$infoUtulisateur = $infoUtilisateurStatement->fetch();

$_SESSION["nom"] = $infoUtulisateur["nom"] ;
$_SESSION["email"] = $_POST["email"];
$_SESSION["motDePasse"] =$_POST["motDePasse"] ;
$_SESSION["user_id"] = $infoUtulisateur["user_id"] ;

redirectTo("http://wereadbookbackend.local/HTML_+_CSS/");
?>