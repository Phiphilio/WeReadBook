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
    // j'informe le côté client que la réponse sera au format json
    //ce n'est pas indispensable, mais ça rend le tout plus clair pour le navigatuer
    header('content-Type : application/json'); 
    echo json_encode(["error"=>"l'adresse email n'est pas valide"]);
    exit();
}

foreach ($listeUser as $user) {
    if ($user["email"] === $postDonnees["email"]) {
        header('HTTP/1.1 403 Forbidden');
        echo json_encode(["error"=>"cette adresse est deja utilise"]);
        exit();
    }
}

if (
    empty($mdp) || empty($verificationMdp)
) {
    echo json_encode(["error"=>"les deux champs doivent contenir le même mot de passe"]);
    exit();
}

if ($mdp !== $verificationMdp) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(["error" =>"les deux mots de passe doivent correspondre"]);
    exit();
}
if (
    empty($nom) || strlen($nom) > 50
) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(["error"=>"entrez un nom d'utilisateur pas trop long"]);
    exit();
}

if (strlen($mdp) < 6) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(["error" =>"le mot de passe est trop petit"]);
    exit();
}

try {$inscriptionStatement = $mySql->prepare($requeteInscription);

$inscriptionStatement->execute([
    ":nom" => htmlspecialchars($postDonnees["nom"]),
    ":email" => htmlspecialchars($postDonnees["email"]),
    ":motDePasse" => $postDonnees["mdp"],
]);

}catch ()