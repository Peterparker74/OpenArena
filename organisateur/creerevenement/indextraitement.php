<?php 
    require_once '../../config.php'; // On inclu la connexion à la bdd
    require("../../requetes.php");

    session_start();
    verifierconnexionorganisateur();

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['nomevenement']) && !empty($_POST['modedejeux']))
    {
        // Patch XSS
        $nomevenement = str_replace(" "," ",htmlspecialchars(strtolower($_POST['nomevenement'])));
        $modedejeux = str_replace(" ","",htmlspecialchars($_POST['modedejeux']));

        $datedebut = str_replace(" ","",htmlspecialchars($_POST['datedebut']));

        $createur = str_replace(" ","",htmlspecialchars($_SESSION['pseudo']));

        $dateactuelle= new \DateTime();

    
                            
                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO evenement(
                                                id_evenement, 
                                                nom_evenement, 
                                                modedejeux,  
                                                date_creation,
                                                date_debut,
                                                pseudo_createur
                                            ) VALUES(
                                                :id_evenement, 
                                                :nom_evenement, 
                                                :modedejeux,  
                                                :date_creation,
                                                :date_debut,
                                                :pseudo_createur
                                            )');
                                            
                                            $insert->execute(array(
                                                'id_evenement' => '',
                                                'nom_evenement' => $nomevenement,
                                                'modedejeux' => $modedejeux,
                                                'date_creation' => $dateactuelle->format('Y/m/d H:i:s'),
                                                'date_debut' => $datedebut,
                                                'pseudo_createur' => $createur
                                            ));



                                                // On redirige avec le message de succès
                                                header('Location:index2.php');
                                                die();
                                            
                                    

}else{
    header('Location: index.php'); die();
}

       

