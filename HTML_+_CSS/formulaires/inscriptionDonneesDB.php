<?php
require_once(__DIR__ . "/../../backend/connexionDb.php");
$postDonnees = $_POST;

//on me conseille de nettoyer les nformations entrées dans les inputs
$nom = trim($postDonnees["nom"]);
$email = trim($postDonnees["email"]);
$mdp = trim($psotDonnees["mdp"]);
$verificationMdp = trim($psotDonnees["verificationMdp"]);


if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('HTTP/1.1 400 bad Request');
    echo json_encode("l'adresse email n'est pas valide");
    exit();
}

foreach ($listeUser as $user) {
    if ($user["email"] === $postDonnees["email"]) {
        header('HTTP/1.1 403 Forbidden');
        echo json_encode("cette adresse est deja utilise");
        exit();
    }
}

if (
    empty($mdp) || empty($postDonnees["verificationMdp"])
) {
    echo json_encode("les deux champs doivent contenir le même mot de passe");
    exit();
}

if ($mdp !== $psotDonnees["verificationMdp"]) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode("les deux mots de passe doivent correspondre");
    exit();
}
if (
    empty($nom) || strlen($nom) > 50
) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode("entrez un nom d'utilisateur pas trop long");
    exit();
}

if (strlen($postDonnees["mdp"]) < 6) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode("le mot de passe est trop petit");
    exit();
}

$inscriptionStatement = $mySql->prepare($requeteInscription);

$inscriptionStatement->execute([
    ":nom" => htmlspecialchars($postDonnees["nom"]),
    ":email" => htmlspecialchars($postDonnees["email"]),
    ":motDePasse" => $postDonnees["mdp"],
]);
