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
    <h1>Contrôle du serveur OpenArena</h1>
    <form action="script.php" method="post">
        <?php
        // Statut du serveur (démarré ou arrêté)
        $server_status = "Démarré-Arrêté";

        // Afficher le statut du serveur
        echo "<p>Statut du serveur : $server_status</p>";

        // Désactiver le bouton "Démarrer serveur" si le serveur est déjà démarré
       // if ($server_status === "Démarré") {
         //   echo '<button type="submit" name="start" class="start" disabled>Démarrer serveur</button>';
       // } else {
            echo '<button type="submit" name="start" class="start">Démarrer serveur</button>';
       // }

        // Désactiver le bouton "Arrêter serveur" si le serveur est déjà arrêté
        //if ($server_status === "Arrêté") {
          //  echo '<button type="submit" name="stop" class="stop" disabled>Arrêter serveur</button>';
       // } else {
            echo '<button type="submit" name="stop" class="stop">Arrêter serveur</button>';
       // }
        ?>
    </form>
</body>
</html>
