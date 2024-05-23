<?php
    require_once '../config.php'; // On inclu la connexion à la bdd
    require("../requetes.php");

    session_start();
    
    verificationconnexionpersonne();

?>
<!DOCTYPE html>
<html style="height: 100%;width: 100%;" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titre de la page</title>
    <!-- Lien vers votre fichier CSS externe (facultatif) -->
    <link rel="stylesheet" href="../admin/accueil/style/style.css">
    <link rel="stylesheet" type="text/javascript" href="../admin/accueil/script/script.js">
</head>
<body style="height: 100%;width: 100%;margin: 0;padding: 0;">


    <div>Accueil joueur</div>
    <a href="profil.php">Mon profil</a>
</body>
</html>
