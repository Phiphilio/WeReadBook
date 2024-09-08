<?php

require_once __DIR__ . "/connexionDb.php";

if (!$listeLivre || !$infoLivres) {
    http_response_code(500); // Statut HTTP 500 pour erreur serveur
    echo json_encode(["error" => "Erreur lors de la récupération des données."]);
    exit;
}

header('Content-Type: application/json');

// je réunis les deux tableaux dans un seul
$response = [
    //livres
    "livres" => $listeLivre,
    // données de ma jointure
    "infoLivres" => $infoLivres,
];

echo json_encode($response);
