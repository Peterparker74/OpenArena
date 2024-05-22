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
    <title>Boutons de Commande</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        button {
            background-color: #4CAF50; /* Vert */
            border: none;
            color: white;
            padding: 20px 40px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 10px;
            cursor: pointer;
            border-radius: 10px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049; /* Un peu plus foncé */
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="configurationcommande.php"><button>Configurer mes commandes</button></a>
        <a href="modeversus.php"><button>Mode Versus</button></a>
    </div>
</body>
</html>
