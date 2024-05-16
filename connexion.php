<?php 
    require_once 'config.php'; // On inclut la connexion à la base de données
    session_start(); // Démarrage de la session
    

    if(!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
        // Patch XSS
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $motdepasse = htmlspecialchars($_POST['motdepasse']);
        
        
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ? or adresse_email = ?');
        $check->execute(array($pseudo,$pseudo));
        $data = $check->fetch();
        $row = $check->rowCount();

        $typeutilisateur = $data['type'];
        
        

        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {
        
            // Si le mot de passe est le bon
                if(password_verify($motdepasse, $data['mot_de_passe']))
                {
                    $_SESSION['pseudo'] = $data['pseudo'];


                    if($typeutilisateur=='admin'){
                        header('Location: admin/accueil/index.php');
                        die();
                    }
                    else if($typeutilisateur=='organisateur'){
                        header('Location: organisateur/accueil/index.php');
                        die();

                    }
                    else if($typeutilisateur=='personne'){
                        header('Location: joueur/accueiljoueur.php');
                        die();

                    }
                }else{ header('Location: index.php?login_err=password'); die(); }
            
        }else{ header('Location: index.php?login_err=already'); die(); }
    }else{ header('Location: index.php'); die();} // si le formulaire est envoyé sans aucune données
?>

