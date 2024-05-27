<?php 
    require_once 'config.php'; // On inclut la connexion à la base de données
    session_start(); // Démarrage de la session
    

    if(!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
        // Patch XSS
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $motdepasse = htmlspecialchars($_POST['motdepasse']);
        

        //On vérifie s'il est dans l'AD
        // Paramètres de connexion à l'Active Directory
        $ldap_host = "ldap://195.221.40.66"; // Utilisation de LDAP (non sécurisé) ou ldaps:// pour sécurisé
        $base_dn = "DC=openarena-paris,DC=fr";
        
        // Vérifie si le formulaire de connexion a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupération des données du formulaire
            $pseudo = $_POST["pseudo"];
            $motdepasse = $_POST["motdepasse"];
        
            // Connexion à l'Active Directory
            $ldap_conn = ldap_connect($ldap_host);
            ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($ldap_conn, LDAP_OPT_REFERRALS, 0);
        
            // Tentative de liaison avec l'Active Directory en utilisant les identifiants fournis
            $ldap_bind = ldap_bind($ldap_conn, $pseudo, $motdepasse);
        
            // Vérifie si la liaison a réussi
            if ($ldap_bind) {

                echo "Utilisateur connecté";

                if (filter_var($pseudo, FILTER_VALIDATE_EMAIL)) {
                    // Si c'est une adresse e-mail, récupérer la partie avant le "@"
                    $pseudo_parts = explode('@', $pseudo);
                    $pseudo = $pseudo_parts[0]; // Utiliser la partie avant le "@"
                }
                // Liaison réussie, vérifier les groupes
                $_SESSION["pseudo"] = $pseudo;
        
                // Recherche des groupes de l'utilisateur
                $search_filter = "(sAMAccountName=$pseudo)";
                $search_result = ldap_search($ldap_conn, $base_dn, $search_filter);
        
                if ($search_result) {
                    $entries = ldap_get_entries($ldap_conn, $search_result);
        
                    if ($entries["count"] > 0) {
                        $dn = $entries[0]["dn"]; // DN de l'utilisateur

                        
        
                        // Vérifier si l'utilisateur appartient au groupe "openarena"
                        $openarena_search_filter = "(&(objectClass=group)(cn=openarena)(member=$dn))";
                        $openarena_search_result = ldap_search($ldap_conn, $base_dn, $openarena_search_filter);
                        $openarena_entries = ldap_get_entries($ldap_conn, $openarena_search_result);
                        $is_openarena_member = $openarena_entries["count"] > 0;
        
                        // Vérifier si l'utilisateur appartient au groupe "organisateur"
                        $organisateur_search_filter = "(&(objectClass=group)(cn=organisateurs)(member=$dn))";
                        $organisateur_search_result = ldap_search($ldap_conn, $base_dn, $organisateur_search_filter);
                        $organisateur_entries = ldap_get_entries($ldap_conn, $organisateur_search_result);
                        $is_organisateur_member = $organisateur_entries["count"] > 0;
        
                        if ($is_openarena_member) {
                            // On regarde si l'utilisateur est inscrit dans la table utilisateurs
                            $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
                            $check->execute([$_SESSION["pseudo"]]);
                            $data = $check->fetch();
                            $row = $check->rowCount();
                            if($row == 0)
                            {
                                //L'utilisateur n'est pas dans la base de données, dans la table utilisateurs
                                //On enregistre son pseudo dans cette table pour pouvoir ajouter ou récupérer ses commandes
                                $stmt = $bdd->prepare('INSERT INTO utilisateurs (pseudo) VALUES (?)');
                                $stmt->execute([ $_SESSION["pseudo"]]);

                            }
                            echo "L'utilisateur appartient au groupe OpenArena.<br>";
                            $_SESSION["groupe"] = "openarena";
                            header('Location: /OpenArena/joueur/accueiljoueur.php');
                            die();
                        }
        
                        if ($is_organisateur_member) {
                            echo "L'utilisateur appartient au groupe Organisateur.<br>";
                            $_SESSION["groupe"] = "organisateur";
                            header('Location: /OpenArena/organisateur/accueil/index.php');
                            die();
                        }
        
                        // Redirige vers la page de bienvenue après une connexion réussie
                        //header("Location: welcome.php");
                        //exit;
                    } else {
                        echo "Utilisateur non trouvé.";
                    }
                } else {
                    echo "Erreur lors de la recherche de l'utilisateur.";
                }
        
            } else {
                $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        
            // Fermeture de la connexion LDAP
            ldap_close($ldap_conn);
        }
        
        if (isset($error_message)) {
            echo $error_message;
        }
        /*
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
                        header('Location: /OpenArena/admin/accueil/index.php');
                        die();
                    }
                    else if($typeutilisateur=='organisateur'){
                        header('Location: /OpenArena/organisateur/accueil/index.php');
                        die();

                    }
                    else if($typeutilisateur=='personne'){
                        header('Location: /OpenArena/joueur/accueiljoueur.php');
                        die();

                    }
                }else{ header('Location: index.php?login_err=password'); die(); }
            
        }else{ header('Location: /OpenArena/index.php?login_err=already'); die(); }*/
    }//else{ header('Location: /OpenArena/index.php'); die();} // si le formulaire est envoyé sans aucune données
?>

