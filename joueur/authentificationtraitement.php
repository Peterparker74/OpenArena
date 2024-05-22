<?php

ini_set('display_errors',1);
error_reporting(E_ALL);
require '../vendor/autoload.php';
require_once '../config.php'; // On inclu la connexion à la bdd
require("../requetes.php");

session_start();

verificationconnexionpersonne();

use \phpseclib3\Net\SSH2;

$_SESSION['ipAddress']=$_POST['ipAddress'];
$_POST['login']=$_POST['login'];
$_SESSION['mdp']=$_POST['mdp'];
// Vérifier si un bouton a été cliqué
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["ipAddress"])) {

    try {
    $ssh = new SSH2($_SESSION['ipAddress']);
    if(!$ssh){
    	throw new Execption("Impossible de se connecter a la station de jeu");
    }
    }catch (Exception $e){
    header('Location: errorauthentification.php');
    
    }

    if(isset($_SESSION['login']) && $ssh->login($_SESSION['login'],$_SESSION['mdp'])){
        header('Location: configurationcommandercpd.php');
	$_SESSION['ipAddress'] = $_POST['ipAddress'];
    }else{
	
	    header('Location: configurationcommande.php');
    }
	
} else {
    // Redirection si aucun formulaire n'a été soumis
    header('Location: index_joueur.php');
    exit;
}
?>
