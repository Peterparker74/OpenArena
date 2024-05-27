<?php 




require_once 'config.php'; // On inclut la connexion à la BDD
require("requetes.php");

session_start();

// Si les variables existent et ne sont pas vides
if (!empty($_POST['nom'])) {
    // Patch XSS
    $pseudo = str_replace(" ", "", htmlspecialchars(strtolower($_POST['prenom']))) . "_" . str_replace(" ", "", htmlspecialchars(strtolower($_POST['nom'])));
    $nomdutilisateur = str_replace(" ", "", htmlspecialchars($_POST['nom']));
    $prenom = str_replace(" ", "", htmlspecialchars($_POST['prenom']));
    $ville = str_replace(" ", "", htmlspecialchars($_POST['ville']));
    $sexe = str_replace(" ", "", htmlspecialchars($_POST['sexe']));
    $motdepasse = htmlspecialchars($_POST['motdepasse']);
    $motdepasse_retype = htmlspecialchars($_POST['motdepasse_retype']);

    if($motdepasse === $motdepasse_retype)
    {
        
            // Connexion au serveur distant
            $connection = ssh2_connect('195.221.40.66', 22);
            if (!$connection) {
                echo "Échec de la connexion au serveur";
                exit;
            } else {
                echo "Connexion au serveur réussie<br>";
            }

            // Authentification
            if (!ssh2_auth_password($connection, 'Administrateur', 'Admin24&')) {
                echo "Échec de l'authentification";
                exit;
            } else {
                echo "Authentification réussie<br>";
            }

            // Construire la commande dsadd user avec les valeurs des variables du formulaire
            $command = 'dsadd user "CN=' . $prenom . ' ' . $nomdutilisateur . ',OU=openarena,DC=openarena-paris.fr,DC=fr" -samid "' . $prenom . '" -upn "' . $prenom . '@openarena-paris.fr" -pwd "' . $motdepasse . '" -fn "' . $prenom . '" -ln "' . $nomdutilisateur . '" -office "' . $ville . '" -desc "' . $sexe . '"';

            // Exécuter la commande dsadd user
            $stream = ssh2_exec($connection, $command);
            stream_set_blocking($stream, true);
            $output = stream_get_contents($stream);

            // Afficher la sortie de la commande
            echo "Sortie de la commande : <br>";
            echo $output;

            // Fermeture de la connexion SSH
            ssh2_disconnect($connection);
    }

}


    /*require_once 'config.php'; // On inclu la connexion à la bdd
    require("requetes.php");

    session_start();

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['nom']) )
    {
        // Patch XSS
        $pseudo = str_replace(" ","",htmlspecialchars(strtolower($_POST['prenom'])))."_".str_replace(" ","",htmlspecialchars(strtolower($_POST['nom'])));
        $nomdutilisateur = str_replace(" ","",htmlspecialchars($_POST['nom']));
        $prenom = str_replace(" ","",htmlspecialchars($_POST['prenom']));
        $ville = str_replace(" ","",htmlspecialchars($_POST['ville']));
        $sexe = str_replace(" ","",htmlspecialchars($_POST['sexe']));
        
        $check = $bdd->prepare("SELECT * FROM utilisateurs WHERE nom_utilisateur = ? and prenom = ?");
        $check->execute(array($nomdutilisateur,$prenom));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        if($row>0){
            $pseudo=$pseudo.$row;
            $_SESSION['pseudo']=$pseudo;
        }else{
            $_SESSION['pseudo']=$pseudo;

        }
        $check->closeCursor();
        
        $email = str_replace(" ","",htmlspecialchars(strtolower($_POST['prenom']))).".".str_replace(" ","",htmlspecialchars(strtolower($_POST['nom'])))."@open-arena.fr";
        $motdepasse = htmlspecialchars($_POST['motdepasse']);
        $motdepasse_retype = htmlspecialchars($_POST['motdepasse_retype']);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
        $check->execute(array($pseudo));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..

        $dateactuelle= new \DateTime();
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row >=0){ 
            if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($motdepasse === $motdepasse_retype){ // si les deux mdp saisis sont bon

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $motdepasse = password_hash($motdepasse, PASSWORD_BCRYPT, $cost);
                            
                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(
                                                pseudo, 
                                                nom_utilisateur,
                                                prenom, 
                                                adresse_email,
                                                ville,
                                                sexe,
                                                mot_de_passe,
                                                date_inscription, 
                                                type
                                            ) VALUES(
                                                :pseudo,
                                                :nom_utilisateur,
                                                :prenom,
                                                :adresse_email,
                                                :ville,
                                                :sexe,
                                                :mot_de_passe,
                                                :date_inscription,
                                                :type
                                            )');
                                            
                                            $insert->execute(array(
                                                'pseudo' => $pseudo,
                                                'nom_utilisateur' => $nomdutilisateur,
                                                'prenom' => $prenom,
                                                'adresse_email' => $email,
                                                'ville' => $ville,
                                                'sexe' => $sexe,
                                                'mot_de_passe' => $motdepasse,
                                                'date_inscription' => $dateactuelle->format('Y/m/d H:i:s'),
                                                'type' => 'personne'
                                            ));



                                                // On redirige avec le message de succès
                                                header('Location:inscription2.php');
                                                die();
                                            }else{ header('Location: inscription.php?reg_err=motdepasse'); die();}
                                        }else{ header('Location: inscription.php?reg_err=email'); die();}
                                    }else{ header('Location: inscription.php?reg_err=email_length'); die();}
                                }else{ header('Location: inscription.php?reg_err=pseudo_length'); die();}
                            }else{ header('Location: inscription.php?reg_err=already'); die();}

}*/

       
?>
