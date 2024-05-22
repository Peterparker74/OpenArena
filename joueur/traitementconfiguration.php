<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

require_once '../config.php'; // On inclu la connexion à la bdd
require("../requetes.php");

session_start();

verificationconnexionpersonne();
use \phpseclib3\Net\SSH2;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['data'])) {

	$ssh = new SSH2($_SESSION['ipAddress']);

	if (isset($_SESSION['login']) && $ssh->login($_SESSION['login'],$_SESSION['mdp'])) {

       		 // Échapper correctement les données pour éviter les injections de commande
       		 $data = escapeshellarg($_POST['data']);
        	 // Phrases à supprimer (anciennes configurations)
        	 $phrasesToRemove = [
                 "bind LEFTARROW \"+left\"",
                 "bind RIGHTARROW \"+right\"",
                 "bind UPARROW \"+forward\"",
                 "bind DOWNARROW \"+back\""
        	 ];
        	// Chemin du fichier de configuration
		if($_SESSION['ipAddress'] == '192.168.10.3'){
        		$filePath = '.openarena/baseoa/q3config.cfg';
		}elseif($_SESSION['ipAddress'] == '192.168.10.4'){
			$filePath = '.openarena/baseoa/q3config.cfg';
		}
        	// Vérifiez si le fichier existe
        	if (file_exists($filePath)) {
        	/*
            		$contenu_fichier = file_get_contents($filePath);
            		$lines = explode("\n", $contenu_fichier);
            		$filteredLines = [];
            		// Filtrer les lignes, enlever les anciennes configurations
            		foreach ($lines as $line) {
                	$shouldRemove = false;
                	foreach ($phrasesToRemove as $phrase) {
                    	if (strpos($line, $phrase) !== false) {
                        $shouldRemove = true;
                        break;
                    	}
                    	
                    	if (!$shouldRemove) {
		            $filteredLines[] = $line;
		        }
		        }}
		        
		        // Réécrire le fichier avec les lignes filtrées et les nouvelles données
            		file_put_contents($filePath, implode("\n", $filteredLines) . "\n" . trim($data, "'"), LOCK_EX); */
                }else {
		    echo "Le fichier spécifié n'existe pas.";
		}
                

            echo "Données enregistrées avec succès dans le fichier.";
 
	    header('Location: configurationcommandesucces.php');
	    $ssh->exec("sudo printf $data > $filePath");
	} else{
	    echo 'Connexion échouée';
	}
    } else {
        echo "Aucune donnée à enregistrer.";
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>
