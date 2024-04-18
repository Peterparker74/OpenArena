<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrôle du serveur OpenArena</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        button.start {
            background-color: #4caf50; /* Green */
            color: white;
        }

        button.stop {
            background-color: #f44336; /* Red */
            color: white;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div id="tetedepage" style="display: flex; justify-content: space-between; align-items: center; background-color: #333; padding: 10px;">

        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#fff" class="bi bi-house-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/> <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/> </svg></a>

        <a href="./jeux/jeux.php"><svg xmlns="http://www.w3.org/2000/svg" fill="#fff" width="35" height="35" viewBox="0 0 512 512"><title>ionicons-v5-g</title><path d="M478.07,356.88,439,151c-8.86-40.35-23-71-88-71H145c-66,0-79.14,30.65-88,71L18,356.88C11,391,22.43,418.13,51.37,428.69S103,423,119.18,391.3l15.42-30.52A16,16,0,0,1,148.88,352H347.16a16,16,0,0,1,14.28,8.78l15.42,30.52c16.14,31.7,38.88,48,67.81,37.39S485,391,478.07,356.88ZM224,240H176v48H144V240H96V208h48V160h32v48h48Zm68,4a20,20,0,1,1,20-20A20,20,0,0,1,292,244Zm44,44a20,20,0,1,1,20-20A20,20,0,0,1,336,288Zm0-88a20,20,0,1,1,20-20A20,20,0,0,1,336,200Zm44,44a20,20,0,1,1,20-20A20,20,0,0,1,380,244Z"/></svg></a>

        <a href="./resultats/resultats.php"><svg xmlns="http://www.w3.org/2000/svg" fill="#fff" width="30" height="30" viewBox="0 0 24 24"> <g> <path fill="none" d="M0 0h24v24H0z"/> <path d="M19 22H5a3 3 0 0 1-3-3V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v7h4v9a3 3 0 0 1-3 3zm-1-10v7a1 1 0 0 0 2 0v-7h-2zM5 6v6h6V6H5zm0 7v2h10v-2H5zm0 3v2h10v-2H5zm2-8h2v2H7V8z"/> </g> </svg></a>

        <svg id="menu" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><line x1="40" y1="128" x2="216" y2="128" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/><line x1="40" y1="64" x2="216" y2="64" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/><line x1="40" y1="192" x2="216" y2="192" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/></svg>
        
    </div>

    <h1>Rejoindre une partie</h1>
    <form action="script_joueur.php" method="post">
        <?php
        // Statut du serveur (démarré ou arrêté)
        $server_status = "Jeu OpenArena";

        // Afficher le statut du serveur
        echo "<p>Rejoindre une partie</p>";

        // Désactiver le bouton "Démarrer serveur" si le serveur est déjà démarré
       // if ($server_status === "Démarré") {
         //   echo '<button type="submit" name="start" class="start" disabled>Démarrer serveur</button>';
       // } else {
            echo '<button type="submit" name="start" class="start">Lancer openarena</button>';
       // }

        // Désactiver le bouton "Arrêter serveur" si le serveur est déjà arrêté
        //if ($server_status === "Arrêté") {
          //  echo '<button type="submit" name="stop" class="stop" disabled>Arrêter serveur</button>';
       // } else {
           // echo '<button type="submit" name="stop" class="stop">Arrêter serveur</button>';
       // }
        ?>
    </form>
</body>
</html>
