<?php

session_start();

require_once '../../config.php'; // On inclu la connexion à la bdd
require("../../requetes.php");

verifierconnexionorganisateur();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pseudo']) ) {

    $pseudo = $_POST['pseudo'];


        // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateur_evenement(
                                                pseudo, 
                                                id_evenement
                                            ) VALUES(
                                                :pseudo,
                                                :id_evenement
                                            )');
                                            
                                            $insert->execute(array(
                                                'pseudo' => $pseudo,
                                                'id_evenement' => $bdd->query("SELECT * FROM evenement ORDER BY id_evenement DESC LIMIT 1 ;" )->fetch()['id_evenement']
                                            ));

    
        
}

?>