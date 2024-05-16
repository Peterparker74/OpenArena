<?php
// Connexion à la base de données
require_once '../config.php';

// Récupérer les tournois depuis la base de données
$stmt = $bdd->query('SELECT id_tournoi, nom_tournoi FROM tournoi');
$tournois = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Afficher les matchs par tournoi</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f8f9fa;
  }
  h2 {
    margin-bottom: 20px;
    color: #007bff;
  }
  form {
    margin-bottom: 20px;
  }
  label {
    font-weight: bold;
    color: #343a40;
  }
  select {
    width: 300px;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
  }
  input[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #0056b3;
  }
  #matchsContainer {
    margin-top: 20px;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    margin-bottom: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }
  button {
    padding: 8px 20px;
    font-size: 14px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px;
  }
  button:hover {
    background-color: #0056b3;
  }
  form.scoreForm {
    margin-top: 10px;
  }
  form.scoreForm input[type="text"] {
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    margin-right: 10px;
  }
  form.scoreForm input[type="submit"] {
    padding: 8px 20px;
    font-size: 14px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  form.scoreForm input[type="submit"]:hover {
    background-color: #218838;
  }
</style>
</head>
<body>

<h2>Choisissez un tournoi :</h2>

<form action="" method="post">
  <label for="tournoiSelect">Tournoi :</label>
  <select id="tournoiSelect" name="tournoi_id">
   <?php
    foreach ($tournois as $tournoi) {
        // Vérifie si l'ID du tournoi correspond à celui sélectionné
        $selected = ($tournoi['id_tournoi'] == $_POST['tournoi_id']) ? 'selected' : '';
        echo '<option value="' . $tournoi['id_tournoi'] . '" ' . $selected . '>' . $tournoi['nom_tournoi'] . '</option>';
    }
    ?>
  </select>
  <input type="submit" value="Afficher les matchs">
</form>

<div id="matchsContainer">
  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
    <?php
    // Vérifier si un tournoi a été sélectionné
    if (isset($_POST['tournoi_id'])) {
      $tournoiId = $_POST['tournoi_id'];

      //On récupère les participations pour voir si il ya un champion:
      $stmtChampion = $bdd->prepare('SELECT * FROM tournoi  WHERE id_tournoi = ?');
      $stmtChampion->execute([$tournoiId]);
      $championRow = $stmtChampion->fetch(PDO::FETCH_ASSOC);
      if ($championRow['vainqueur']!= "") {
        // Il y a une participation à la phase "champion"
        // Récupérez la colonne "joueurs"
        echo '<h2>Vainqueur :</h2>';
        echo '<ul>';
        echo '<li>Le vainqueur de ce tournoi est <strong>'.$championRow['vainqueur'].'</strong> </li>';
      }
    

      // Requête pour récupérer les matchs du tournoi sélectionné
      $stmt = $bdd->prepare('SELECT * FROM matchs WHERE id_tournoi = ? ORDER BY FIELD(phase, \'finale\', \'demi-finale\', \'quart de finale\')');
      $stmt->execute([$tournoiId]);
      $matchs = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Affichage des matchs par section
      $currentPhase = '';
      foreach ($matchs as $match) {
        if ($match['phase'] !== $currentPhase) {
          echo '<h2>' . $match['phase'] . ' :</h2>';
          echo '<ul>';
          $currentPhase = $match['phase'];
        }
        
        echo '<li>' . $match['joueur1'] . ' VS ' . $match['joueur2'] . ' ';
        echo '<form action="script_lancement.php" method="post">';
        echo '<input type="hidden" name="joueur1" value="chancel">';
        echo '<input type="hidden" name="joueur2" value="a">';
        echo '<input type="hidden" name="ip" value="' . $match['ip_serveur'] . '">';
        echo '<button onclick="disableButton(this);">Lancer la partie</button>';
        echo '</form>';
        if($match['score_joueur1']!=0 || $match['score_joueur2']!=0)
            echo 'Résultats: '.$match['score_joueur1'].'-'.$match['score_joueur2'];
        else{
            echo '<button onclick="showScoreForm(' . $match['id_matchs'] . ')">Saisir les scores</button>';
            echo '<form id="scoreForm_' . $match['id_matchs'] . '" class="scoreForm" style="display: none;" action="tt_scores.php" method="post">';
            echo '<input type="text" name="score_joueur1" placeholder="Score joueur 1">';
            echo '<input type="text" name="score_joueur2" placeholder="Score joueur 2">';
            //On envoie de manière cachée l'id du match, la phase et l'id du tournoi
            echo '<input type="hidden" name="id_matchs" value="' . $match['id_matchs'] . '">';
            echo '<input type="hidden" name="phase" value="' . $match['phase'] . '">';
            echo '<input type="hidden" name="id_tournoi" value="' . $match['id_tournoi'] . '">';
            echo '<input type="submit" value="Valider">';
        }
       
        echo '</form></li>';
      }
      echo '</ul>';
    } else {
      echo '<p>Veuillez sélectionner un tournoi.</p>';
    }
    ?>
  <?php endif; ?>
</div>

<script>
  // Fonction pour afficher le formulaire de saisie des scores
  function showScoreForm(matchId) {
    var scoreForm = document.getElementById('scoreForm_' + matchId);
    if (scoreForm.style.display === 'none') {
      scoreForm.style.display = 'block';
    } else {
      scoreForm.style.display = 'none';
    }
  }

  // Fonction pour désactiver le bouton une fois qu'il est cliqué
  function disableButton(button) {
    button.disabled = true;
  }
</script>
</body>
</html>
