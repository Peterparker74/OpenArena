<?php 
    require_once '../../config.php'; // On inclu la connexion à la bdd
    require("../../requetes.php");

    session_start();
    verifierconnexionadmin();

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['nomorganisateur']) )
    {
        // Patch XSS
        $nomdutilisateur = str_replace(" ","",htmlspecialchars(strtolower($_POST['nomorganisateur'])));
        $prenom = str_replace(" ","",htmlspecialchars(strtolower($_POST['prenomorganisateur'])));
        $pseudo = $prenom."_".$nomdutilisateur;
        
        $check = $bdd->prepare("SELECT * FROM utilisateurs WHERE nom_utilisateur = ? and prenom = ?");
        $check->execute(array($nomdutilisateur,$prenom));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        if($row>0){
            $pseudo=$pseudo.$row;
            
        }else{
            

        }
        $check->closeCursor();
        
        $email = $prenom.".".$nomdutilisateur."@open-arena.fr";
        $motdepasse = htmlspecialchars('passwordorganisateur');

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare("SELECT pseudo, adresse_email, mot_de_passe FROM utilisateurs WHERE pseudo = ?");
        $check->execute(array($pseudo));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row >=0){ 
            if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $motdepasse = password_hash($motdepasse, PASSWORD_BCRYPT, $cost);
                            
                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(
                                                pseudo, 
                                                nom_utilisateur, 
                                                adresse_email, 
                                                mot_de_passe,  
                                                type
                                            ) VALUES(
                                                :pseudo,
                                                :nom_utilisateur,
                                                :adresse_email,
                                                :mot_de_passe,
                                                :type
                                            )');
                                            
                                            $insert->execute(array(
                                                'pseudo' => $pseudo,
                                                'nom_utilisateur' => $nomdutilisateur,
                                                'adresse_email' => $email,
                                                'mot_de_passe' => $motdepasse,
                                                'type' => 'organisateur'
                                            ));



                                                // On redirige avec le message de succès
                                                header('Location:sucess.php');
                                                die();
                                }else{ header('Location: inscription.php?reg_err=pseudo_length'); die();}
                            }else{ header('Location: inscription.php?reg_err=already'); die();}

 }

       

