

<?php
// Connexion à la base de données
require_once '../config.php';
require("../requetes.php");

session_start();
    
verifierconnexionorganisateur();

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

/** */
#wrapper{
    background-color: white;    
    width:80%;
    position: absolute;
    top: 0;
    right: 0;
    height: 400vh;
    display: none;
    transition: transform 0.3s ease-in-out;
    z-index: 2;
    }
    #affichagepubwrapper{
        overflow: hidden;
        display: flex;
        width: 100%;
    }

    #souswrapper a{
        text-decoration: none;
    }

    #souswrapper .titredesouswrapper{
        height: 30px;
        margin-left: 10px;
        font-family: 'Tiro Devanagari Sanskrit', serif;
        font-size: 20px;

    }
    #souswrapper .instruction{
        margin-bottom: 20px;
        font-size: 20px;
        border-radius: 1px;
        justify-content: center;
        text-align: end;
        margin-right: 15px;
    }
</style>
</head>
<body>

<div id="tetedepage" style="display: flex;justify-content: space-between;align-items: center;background-color: red;">

        <a href="./accueil/index.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-house-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/> <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/> </svg></a>

        <a href="../../jeux/jeux.php"><svg xmlns="http://www.w3.org/2000/svg" fill="white" width="35" height="35" viewBox="0 0 512 512"><title>ionicons-v5-g</title><path d="M478.07,356.88,439,151c-8.86-40.35-23-71-88-71H145c-66,0-79.14,30.65-88,71L18,356.88C11,391,22.43,418.13,51.37,428.69S103,423,119.18,391.3l15.42-30.52A16,16,0,0,1,148.88,352H347.16a16,16,0,0,1,14.28,8.78l15.42,30.52c16.14,31.7,38.88,48,67.81,37.39S485,391,478.07,356.88ZM224,240H176v48H144V240H96V208h48V160h32v48h48Zm68,4a20,20,0,1,1,20-20A20,20,0,0,1,292,244Zm44,44a20,20,0,1,1,20-20A20,20,0,0,1,336,288Zm0-88a20,20,0,1,1,20-20A20,20,0,0,1,336,200Zm44,44a20,20,0,1,1,20-20A20,20,0,0,1,380,244Z"/></svg></a>

        <a href="../../resultats/resultats.php"><svg xmlns="http://www.w3.org/2000/svg" fill="white" width="30" height="30" viewBox="0 0 24 24"> <g> <path fill="none" d="M0 0h24v24H0z"/> <path d="M19 22H5a3 3 0 0 1-3-3V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v7h4v9a3 3 0 0 1-3 3zm-1-10v7a1 1 0 0 0 2 0v-7h-2zM5 6v6h6V6H5zm0 7v2h10v-2H5zm0 3v2h10v-2H5zm2-8h2v2H7V8z"/> </g> </svg></a>

        <svg id="menu" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><line x1="40" y1="128" x2="216" y2="128" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/><line x1="40" y1="64" x2="216" y2="64" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/><line x1="40" y1="192" x2="216" y2="192" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/></svg>
        
    </div>

    <div style="display: flex;align-items: center;justify-content: space-between;background-color: red;">
        <div style="color: white;">Accueil</div>
        <div style="color: white;">Jeux</div>
        <div style="color: white;">Résultats</div>
        <div style="color: white;">Menu</div>
    </div>

    <div style="box-shadow: -100px -100px 100px 100px lightgray;display:none;" id="wrapper">
            
            <div id="affichagepubwrapper" style="display: flex; justify-content: flex-start;align-items: center;position: relative;border-bottom: 2px solid lightgray;padding: 10px 0 15px 0;">

                <div style="display: flex;margin-left: 15px;margin-top: 10px;" id="nometphotodeprofilwrapper">
                
                    
                    <img style="height: 40px;width: 40px;border-radius: 50%;object-fit: cover;border: 2px solid lightgray;margin-right: 5px;" src="/photodeprofils/<?=affichermaphotodeprofil(); ?>">
                </div>
                
                <div id="fermerwrapper" style="height: 25px;width: 25px;display: flex;justify-content: center;align-items: center;position: absolute;right: 10px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-x-lg" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/> <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/> </svg>
                </div>

            </div>

            <div style="display: flex;justify-content: end;margin-bottom: 25px;margin-right: 15px;">
                <div style="color: red;font-size: 14px;display: flex;justify-content: end;padding-bottom: 10px;border-bottom: 3px solid gray;width: 75%;display: none;">Votre profil n'est pas vérifié</div>
            </div>

            <div id="souswrapper">
                

                    <div class="titredesouswrapper" style="display: flex;justify-content: end;align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="darkgray" class="bi bi-pencil-fill" viewBox="0 0 16 16"> <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/> </svg>
                       
                        
                    </div>
        
                    
                    <div id="conteneurtextareaetbouton" style="display: none;">
                        <textarea id="textareafeel" cols="20" rows="20" wrap="hard" maxlength="200" style="height:60px; width: 90%;margin-left: auto;margin-right: auto;overflow: hidden;color: gray;border: 1px solid lightgray;font-size: 15px;"></textarea>
                        <div id="textareafeelenvoyer" style="display: flex;justify-content: end;"><button  style="height:30px;border-radius: 10px;margin-right: 15px;margin-bottom: 30px;font-weight: bold;">Envoyer</button></div>
                    </div>
                    <a id="redirectionpagedaccueil" style="display: flex;align-items: center;justify-content: flex-start;" href="">
                        <svg style="margin: 0px 10px 30px 25px ;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="25" height="25"><rect width="256" height="256" fill="none"/><path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.5a8.3,8.3,0,0,1,2.6-5.9l80-72.7a8,8,0,0,1,10.8,0l80,72.7a8.3,8.3,0,0,1,2.6,5.9V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/></svg>
                        
                        <div class="instruction">Accueil</div>
                        
                        
                    </a>
                    <a style="display: flex;align-items: center;justify-content: flex-start;" href="">
                        <svg style="margin: 0px 10px 30px 25px ;" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/> </svg>
                        
                        <div class="instruction">Aide et Support</div>
                        
                        
                    </a>
                    <a style="display: flex;align-items: center;justify-content: flex-start;" href="">
                        <svg style="margin: 0px 10px 30px 23px ;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="27" height="27"> <g> <path fill="none" d="M0 0h24v24H0z"/> <path d="M3.34 17a10.018 10.018 0 0 1-.978-2.326 3 3 0 0 0 .002-5.347A9.99 9.99 0 0 1 4.865 4.99a3 3 0 0 0 4.631-2.674 9.99 9.99 0 0 1 5.007.002 3 3 0 0 0 4.632 2.672c.579.59 1.093 1.261 1.525 2.01.433.749.757 1.53.978 2.326a3 3 0 0 0-.002 5.347 9.99 9.99 0 0 1-2.501 4.337 3 3 0 0 0-4.631 2.674 9.99 9.99 0 0 1-5.007-.002 3 3 0 0 0-4.632-2.672A10.018 10.018 0 0 1 3.34 17zm5.66.196a4.993 4.993 0 0 1 2.25 2.77c.499.047 1 .048 1.499.001A4.993 4.993 0 0 1 15 17.197a4.993 4.993 0 0 1 3.525-.565c.29-.408.54-.843.748-1.298A4.993 4.993 0 0 1 18 12c0-1.26.47-2.437 1.273-3.334a8.126 8.126 0 0 0-.75-1.298A4.993 4.993 0 0 1 15 6.804a4.993 4.993 0 0 1-2.25-2.77c-.499-.047-1-.048-1.499-.001A4.993 4.993 0 0 1 9 6.803a4.993 4.993 0 0 1-3.525.565 7.99 7.99 0 0 0-.748 1.298A4.993 4.993 0 0 1 6 12c0 1.26-.47 2.437-1.273 3.334a8.126 8.126 0 0 0 .75 1.298A4.993 4.993 0 0 1 9 17.196zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/> </g> </svg>
                        
                        <div class="instruction">Mes préférences</div>
                        
                        
                    </a>
                    
                    <a style="display: flex;align-items: center;justify-content: flex-start;border-top: 2px solid lightgray;padding-top: 15px;" href="../../deconnexion.php">
                        <svg style="margin: 0px 10px 30px 23px ;" height="27" viewBox="0 0 21 21" width="27" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" transform="matrix(-1 0 0 1 18 3)"><path d="m10.595 10.5 2.905-3-2.905-3"/><path d="m13.5 7.5h-9"/><path d="m10.5.5-8 .00224609c-1.1043501.00087167-1.9994384.89621131-2 2.00056153v9.99438478c.0005616 1.1043502.8956499 1.9996898 2 2.0005615l8 .0022461"/></g></svg>
                        
                        <div class="instruction">Se déconnecter</div>
                        
                        
                    </a>
            </div>

    </div>

    <div style="height: 20px;background-color: rgb(60, 179, 113);font-style: italic;font-size: 14px;padding: 2px 0 2px 20px;color: white;">Vous etes connecté en tant qu'organisateur</div>



    <div style="height: 40px;background-color: blue;display: flex;align-items: center;">
<a href="#"><button style="background: black;border: none;color: white;border-radius: white;height: 25px;border-radius: 5px;margin-left: 30px;">Définir un evenement</button></a>
<a href="index.php"><button style="background: black;border: none;color: white;border-radius: white;height: 25px;border-radius: 5px;margin-left: 30px;">Serveur Openarena</button></a>
<a href="index_servers.php"><button style="background: black;border: none;color: white;border-radius: white;height: 25px;border-radius: 5px;margin-left: 30px;">Autres serveurs</button></a>
<a href="affichage.php"><button style="background: black;border: none;color: white;border-radius: white;height: 25px;border-radius: 5px;margin-left: 30px;">Tournois</button></a>
<a href="competition.php"><button style="background: black;border: none;color: white;border-radius: white;height: 25px;border-radius: 5px;margin-left: 30px;">Créer tournoi</button></a>
</div>

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
        echo '<button style="background-color: green;" class="lancerOpenArenaBtn" data-joueur1="' . $match['joueur1'] . '" data-joueur2="' . $match['joueur2'] . '">Lancer la partie</button>';
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

// Gérer le lancement du jeu sur les Raspberry
var lancerBtns = document.getElementsByClassName("lancerOpenArenaBtn");

// Ajouter le gestionnaire d'événements à chaque bouton
for (var i = 0; i < lancerBtns.length; i++) {
    lancerBtns[i].addEventListener("click", function(){
        var joueur1 = this.getAttribute('data-joueur1');
        var joueur2 = this.getAttribute('data-joueur2');

        alert("Lancement du jeu pour:\nRaspberry 1: " + joueur1 + "\nJRaspberry 2: " + joueur2);

        var params1 = "joueur=" + encodeURIComponent(joueur1);
        var params2 = "joueur=" + encodeURIComponent(joueur2);

       var xhr1 = new XMLHttpRequest();
        xhr1.open("GET", "http://195.221.40.1:5000/lancer_openarena?" +params1 , true); 
        xhr1.send();
        xhr2 = new XMLHttpRequest();
        xhr2.open("GET", "http://195.221.40.2:5000/lancer_openarena?" +params2, true); 
        xhr2.send();
    });
}

// Fonction pour afficher le formulaire de saisie des scores
function showScoreForm(matchId) {
    var scoreForm = document.getElementById('scoreForm_' + matchId);
    if (scoreForm.style.display === 'none') {
        scoreForm.style.display = 'block';
    } else {
        scoreForm.style.display = 'none';
    }
}

</script>

</body>
</html>
