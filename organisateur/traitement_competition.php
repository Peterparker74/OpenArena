<?php

require_once '../config.php'; // On inclut la connexion à la base de données
require_once 'match.php';
// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $nom_tournoi = $_POST['nom_tournoi'];
    $date_tournoi = $_POST['date_tournoi'];
    $joueurs = $_POST['joueurs_quart'];  // Tableau des pseudos des joueurs

    // Insertion des données dans la table competition
    $requete = $bdd->prepare('INSERT INTO tournoi (nom_tournoi, date_tournoi) VALUES (?, ?)');
    $requete->execute([$nom_tournoi, $date_tournoi]);

    // Récupération de l'ID du tournoi créé
    $id_tournoi = $bdd->lastInsertId();
    $phase = "quart de finale";
    // Insertion des participants dans la table participations
    foreach ($joueurs as $pseudo) {
        // Préparer la requête pour insérer chaque joueur. Supposons que le score initial soit 0
        $requete = $bdd->prepare('INSERT INTO participations (id_tournoi,phase, joueurs) VALUES (?,?, ?)');
        $requete->execute([$id_tournoi,$phase, $pseudo]);
    }
    //Création et insertion des matchs
    genererEtStockerMatchsAleatoires($id_tournoi, $phase);
    // Redirection ou message de confirmation
    echo "Tournoi créé avec succès et joueurs inscrits.";
} else {
    // Gestion de l'erreur si le formulaire n'a pas été soumis
    echo "Erreur: Le formulaire n'a pas été soumis.";
}
header('Location: competition.php'); die();
?>
