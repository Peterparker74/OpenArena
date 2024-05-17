<?php
// Connexion à la base de données
require_once '../config.php';

// Définition de la fonction pour générer et stocker les matchs aléatoires
function genererEtStockerMatchsAleatoires($id_tournoi, $phase) {
    global $bdd; // Pour accéder à la variable $bdd à l'intérieur de la fonction

    // Récupération des participants depuis la base de données
    $stmt = $bdd->prepare('SELECT joueurs FROM participations WHERE id_tournoi = ? AND phase = ?');
    $stmt->execute([$id_tournoi,$phase]);
    $participants = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Mélange aléatoire des participants
    shuffle($participants);

    // Génération des paires de matchs
    $matches = [];
    for ($i = 0; $i < count($participants); $i += 2) {
        $match = [$participants[$i], $participants[$i + 1]];
        $matches[] = $match;
    }

    // Insertion des matchs dans la base de données
    foreach ($matches as $index => $match) {
        $stmt = $bdd->prepare('INSERT INTO matchs (id_tournoi, phase, joueur1, joueur2) VALUES (?, ?, ?, ?)');
        $stmt->execute([$id_tournoi, $phase, $match[0], $match[1]]);
    }

    // Retourner les matchs générés
    return $matches;
}


?>
