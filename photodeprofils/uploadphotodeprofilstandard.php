<?php

session_start();

require_once '../config.php'; // On inclu la connexion à la bdd
require("../requetes.php");

    //vérifier si l'utilisateur est un homme
    $check = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
    $check->execute(array($_SESSION['pseudo']));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($data['sexe']=="Masculin") {
        mettreajourphotodeprofil("uploads/photoprofilhomme.jpg") ;

        
    }else{
        mettreajourphotodeprofil("uploads/photoprofilfemme.jpg") ;
    }

    header('Location: ../accueil/accueil.php'); 
    
    session_destroy();


    
        
    
?>