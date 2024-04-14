<?php

session_start();

require_once '../config.php'; // On inclu la connexion à la bdd
require("../requetes.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['image']) && !empty($_FILES['image']) ) {

    $uploadedfilename = $_FILES['image'];

    $originalnamefile = $uploadedfilename["name"];
    $extensionfile = pathinfo($originalnamefile, PATHINFO_EXTENSION);
    $counter = 1;
    $uniquenamefile = $originalnamefile;
    $targetDirectory = "uploads/"; // Répertoire de stockage des images


    while (file_exists($targetDirectory . $uniquenamefile)) {
        $uniquenamefile = pathinfo($originalnamefile, PATHINFO_FILENAME) . '_' . $counter . '.' . $extensionfile;
        $counter++;
    }

    $targetFile = $targetDirectory . $uniquenamefile;

    if (move_uploaded_file($uploadedfilename["tmp_name"], $targetFile)) {
        // L'image a été téléchargée avec succès, vous pouvez maintenant stocker le chemin du fichier dans la base de données MySQL
        // Connectez-vous à votre base de données et exécutez une requête SQL pour insérer le chemin du fichier
        
        mettreajourphotodeprofil($targetFile) ;
        

       
    } 
    
}else {
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

    
        
}

header('Location: ../accueil/accueil.php'); 

session_destroy();

?>