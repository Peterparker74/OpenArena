<?php
require_once '../config.php'; // On inclu la connexion à la bdd
require("../requetes.php");

session_start();

verificationconnexionpersonne();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de Connexion Serveur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        label {
            font-size: 16px;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 300px;
            padding: 8px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Tester la connexion a la machine joueur</h1>
    <form action="authentificationtraitement.php" method="POST"> <!-- Mettre à jour l'attribut action avec la destination du formulaire -->
    
        <br>

        <div id="lesmachines" style="display: flex;width: 100%;justify-content: space-between;">
            <div class="unemachine">
                <svg xmlns="http://www.w3.org/2000/svg" width="312" height="312" viewBox="0 0 512 512"><title>ionicons-v5-h</title><path d="M480,48H32A16,16,0,0,0,16,64V384a16,16,0,0,0,16,16H200v32H128v32H384V432H312V400H480a16,16,0,0,0,16-16V64A16,16,0,0,0,480,48ZM460,84V300H52V84ZM240.13,354.08a16,16,0,1,1,13.79,13.79A16,16,0,0,1,240.13,354.08Z"/></svg>
                <div style="font-weight: bold;font-size: 24px;text-align: center;width: 100%;">Poste 1</div>
                <input type="hidden" name="" value="195.221.40.1">
            </div>

            <div class="unemachine">
                <svg xmlns="http://www.w3.org/2000/svg" width="312" height="312" viewBox="0 0 512 512"><title>ionicons-v5-h</title><path d="M480,48H32A16,16,0,0,0,16,64V384a16,16,0,0,0,16,16H200v32H128v32H384V432H312V400H480a16,16,0,0,0,16-16V64A16,16,0,0,0,480,48ZM460,84V300H52V84ZM240.13,354.08a16,16,0,1,1,13.79,13.79A16,16,0,0,1,240.13,354.08Z"/></svg>
                <div style="font-weight: bold;font-size: 24px;text-align: center;width: 100%;">Poste 2</div>
                <input type="hidden" name="" value="195.221.40.2">
            </div>
        </div>

        <div id="leslogins" style="display: flex;flex-direction: column;width: 100%;justify-content: center;">
            <label style="width: 40%;flex-shrink: 0;display: block;">Login</label>
            <input style="width: 40%;flex-shrink: 0;display: block;height: 35px;" type="text" id="lelogin" name="login" required>

            <label style="width: 40%;flex-shrink: 0;display: block;">Password</label>
            <input style="width: 40%;flex-shrink: 0;display: block;height: 35px;" type="password" id="lemdp" name="mdp" required>
        </div>

        <div style="width: 100%;display: flex;justify-content: center;margin-top: 30px;"><input style="margin-left: auto;margin-right: auto;" type="submit" value="Tester la connexion"></div>

        <input type="hidden" id="ipAddress" name="ipAddress" value="">
    </form>

    <script type="text/javascript">
        const leslogins = document.querySelector("#leslogins");
        const ladresseip = document.querySelector("#ipAddress");
        const deuxmachines = document.querySelectorAll(".unemachine");
        const form = document.querySelector("form");

        leslogins.style.display="none";

        for (const unemachine of deuxmachines) {
            unemachine.onclick = function() {
                leslogins.style.display="flex";
                ladresseip.value = unemachine.children[2].value;            }
        }

        // Ajouter un écouteur d'événement pour le submit
        form.addEventListener('submit', function(event) {
            const lelogin = document.querySelector("#lelogin");
            const lemdp = document.querySelector("#lemdp");

            // Vérifier s'il y a des doublons
            if (ladresseip.value=="" || lelogin.value=="" || lemdp.value=="") {
                event.preventDefault();
            } else {
                
            }
        });
    </script>
</body>
</html>
