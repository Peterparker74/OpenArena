<?php
require_once '../config.php'; // On inclu la connexion à la bdd
require("../requetes.php");

session_start();

verifierconnexionpersonne();
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
        <label for="ipAddress">Adresse IP du serveur:</label>
        <select id="ipAddress" name="ipAddress" required>
        	<option >Sélectionner votre sation de jeu</option>
        	<option value="192.168.10.1">195.221.40.1</option>
        	<option value="192.168.10.2">195.221.40.2</option>
        </select>
        <br>
        <input type="submit" value="Tester la connexion">
    </form>
</body>
</html>
