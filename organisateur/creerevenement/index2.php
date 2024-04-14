<?php
    require_once '../../config.php'; // On inclu la connexion à la bdd
    require("../../requetes.php");
    session_start();

    $touslesjoueurs=affichertouslesjoueurs();
    verifierconnexionorganisateur();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titre de la page</title>
    <!-- Lien vers votre fichier CSS externe (facultatif) -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div id="tetedepage" style="display: flex;justify-content: space-between;align-items: center;background-color: red;">

        <a href="../accueil/index.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-house-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/> <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/> </svg></a>

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

    <form style="" onsubmit="return validerFormulaire()">

        <div class="form-group" style="display: flex;align-items: center;justify-content: center;margin-top: 20px;">
                    <img id="resultataffichage" style="height: 100px;width: 100px;border-radius: 50%;border: 1px solid lightgray;object-fit: cover;" src="">
                    <svg style="position: absolute;margin-left: 80px;margin-top: 48px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="blue" class="bi bi-plus-circle-fill" viewBox="0 0 16 16"> <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/> </svg>
                    <input style="width: 100px;position: absolute;height: 100px;left: 50%;transform: translateX(-50%);opacity: 0;" id="fileInput" name="fileInput" type="file" accept="image/png" onchange="affichageImage();">
                    
        </div>

        <div style="font-size: 28px;text-align: center;padding: 20px 50px 30px 50px;">Veuillez sélectionner les joueurs qui participeront à l'évènement</div>

        <div style="display: flex;flex-wrap: wrap;justify-content: space-evenly;">

            <?php foreach ($touslesjoueurs as $unjoueur): ?>

            <div class="item" style="flex-shrink: 0; width: 120px;height: 180px;border: 1.5px solid lightgray;border-radius: 10px;display: flex;flex-direction: column;justify-content: center;align-items: center;margin-right: 80px;margin-bottom: 30px;text-align: center;">
                <img src="../../photodeprofils/<?=$unjoueur->photo_de_profil?>" style="width: 80px;height: 80px;margin-bottom: 5px;border: 1px solid lightgray;border-radius: 50%;">
                <div style="font-weight: bold;font-size: 18px;"><?= $unjoueur->nom_utilisateur?></div>
                <input type="checkbox" class="checkbox" style="margin-top: 15px;">
                <input type="hidden" name="pseudo" value="<?=$unjoueur->pseudo?>">
            </div>

            <?php endforeach; ?>
        </div>

        <div style="display: flex;justify-content: flex-start;margin-bottom: 50px;width: 30%;position: relative;margin-left: auto;margin-right: auto;">
            <button type="submit" style="background-color: green;border: none;color: white;border-radius: 3px;height: 38px;margin-right: 25px;font-size: 20px;width: 100%;">Terminé</button>

        </div>
    </form>

    <script type="text/javascript" src="../../jquery-3.7.0.js"></script>

    <!-- Lien vers votre fichier JavaScript externe (facultatif) -->
    <script>

        const boutons=document.querySelectorAll("button");
        const checkboxs=document.querySelectorAll(".checkbox");

        function validerFormulaire() {
            // Ajoutez ici votre logique de validation
            // Retournez false pour empêcher la soumission du formulaire
            return false;
        }

        boutons.item(0).addEventListener("click", function traitementajouterjoueurs(e) {

                for(const checkbox of checkboxs){

                    var pseudo = checkbox.parentElement.children[3].value;

                    var formData = new FormData();

                    // Ajouter la chaîne de caractères à envoyer à l'objet FormData
                    formData.append("pseudo", pseudo);

                    if (checkbox.checked==true) {
                
                        $.ajax({
                            type: "POST",
                            url: "index2traitement.php" ,
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                               window.location.href="sucess.php";
                                
                            },
                            error: function() {
                                
                            }
                        });

                    }
                }
            
                
                
            });
    </script>
</body>
</html>
