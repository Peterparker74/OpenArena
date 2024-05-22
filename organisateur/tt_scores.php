<?php
// Connexion à la base de données
require_once '../config.php';
require_once 'match.php';


// Vérifier si le formulaire de saisie des scores a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $matchId = $_POST['id_matchs'];
    $scoreJoueur1 = $_POST['score_joueur1'];
    $scoreJoueur2 = $_POST['score_joueur2'];
    $id_tournoi = $_POST['id_tournoi'];
    $phase = $_POST['phase'];


    

    // Comparer les scores et déterminer le vainqueur
    $stmtMatch = $bdd->prepare('SELECT joueur1, joueur2 FROM matchs WHERE id_matchs = ?');
    $stmtMatch->execute([$matchId]);
    $match = $stmtMatch->fetch(PDO::FETCH_ASSOC);

    $vainqueur = ($scoreJoueur1 > $scoreJoueur2) ? $match['joueur1'] : $match['joueur2'];

    // Préparer la requête d'insertion des scores et du vainqueur
    $stmtUpdate = $bdd->prepare('UPDATE matchs SET score_joueur1 = ?, score_joueur2 = ?, vainqueur = ? WHERE id_matchs = ?');

    // Exécuter la requête avec les données soumises
    $stmtUpdate->execute([$scoreJoueur1, $scoreJoueur2, $vainqueur, $matchId]);

    //Le vainqueur étant déterminé, on l'ajoute dans la table de participation
    //en lui faisant changé de phase. Ex: quart_de_finale=>demi_finale
    if($phase=="quart de finale"){
        $requete = $bdd->prepare('INSERT INTO participations (id_tournoi, phase, joueurs) VALUES (?, ?, ?)');
        $nouvellephase = "demi-finale";
        $requete->execute([$id_tournoi, $nouvellephase, $vainqueur]);
    
    
        //Après l'insertion du vainqueur et des scores, on vérifie si tous les scores 
        //de cette phase du tournoi ont été saisis afin de passer à une autre phase
        // Requête pour récupérer les matchs du tournoi sélectionné
      $stmt = $bdd->prepare('SELECT * FROM matchs WHERE id_tournoi = ? AND phase = ? ORDER BY phase');
      $stmt->execute([$id_tournoi,$phase]);
      $matchs = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //On vérifie si tous les matchs ont un vainqueur
      $phaseterminee = true;
      foreach ($matchs as $match) {
        if (empty($match['vainqueur'] ) ) {
            $phaseterminee = false;
            break;
        }
            
        }
        //Si c'est le cas, la phase est terminée, on génère le match de la phase suivante
      if ($phaseterminee)
        genererEtStockerMatchsAleatoires($id_tournoi, $nouvellephase);
        
        
    }

    //Pareil pour les autres phases:
    if($phase=="demi-finale"){
        $requete = $bdd->prepare('INSERT INTO participations (id_tournoi, phase, joueurs) VALUES (?, ?, ?)');
        $nouvellephase = "finale";
        $requete->execute([$id_tournoi, $nouvellephase, $vainqueur]);
    
    
        //Après l'insertion du vainqueur et des scores, on vérifie si tous les scores 
        //de cette phase du tournoi ont été saisis afin de passer à une autre phase
        // Requête pour récupérer les matchs du tournoi sélectionné
      $stmt = $bdd->prepare('SELECT * FROM matchs WHERE id_tournoi = ? AND phase = ? ORDER BY phase');
      $stmt->execute([$id_tournoi,$phase]);
      $matchs = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //On vérifie si tous les matchs ont un vainqueur
      $phaseterminee = true;
      foreach ($matchs as $match) {
        if (empty($match['vainqueur'] ) ) {
            $phaseterminee = false;
            break;
        }
            
        }
        //Si c'est le cas, la phase est terminée, on génère le match de la phase suivante
      if ($phaseterminee)
        genererEtStockerMatchsAleatoires($id_tournoi, $nouvellephase);
        
        
    }
    if($phase=="finale"){
        //On insère le vainqueur du match de la finale dans la table tournoi
        $requete = $bdd->prepare('UPDATE tournoi SET vainqueur = ? WHERE id_tournoi = ?');
        $requete->execute([$vainqueur,$id_tournoi]);
        
    }
    // Rediriger vers la page précédente après avoir soumis les scores
    header('Location: affichage.php'); die();
   exit;
   
}
?>
