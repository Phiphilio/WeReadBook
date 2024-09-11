<?php
require_once(__DIR__ . "/../../backend/connexionDb.php");
$postDonnees = $_POST;

if (empty($postDonnees["email"]) && empty($postDonnees["mdp"]) && empty($postDonnees["verificationMdp"])) {
    echo "tous les champs doivent êtres remplis";
    exit();
}

if (!isset($postDonnees["email"]) && !isset($postDonnees["mdp"]) && !isset($postDonnees["verificationMdp"])) {
    echo ("le formulaire n'est pas complet");
    exit();
}

if (!filter_var($postDonnees["email"], FILTER_VALIDATE_EMAIL)) {
    echo "l'adresse email n'est pas valide";
    exit();
}

if ($postDonnees["mdp"] !== $postDonnees["verificationMdp"]) {
    echo "les deux mot de passe doivent se correspondre";
    exit();
}

foreach ($listeUser as $user) {
    if ($user["email"] === $postDonnees["email"]) {
        echo "cette adresse est déjà utilisée";
        exit();
    }
}

if (strlen($postDonnees["mdp"]) < 6) {
    echo "le mot de passe est trop petit";
    exit();
}

$inscriptionStatement = $mySql->prepare($requeteInscription);

$inscriptionStatement->execute([
    ":nom" => $postDonnees["nom"],
    ":email" => $postDonnees["email"],
    ":motDePasse" => $postDonnees["mdp"],
]);
