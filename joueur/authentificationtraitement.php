_<?php
require_once '../vendor/autoload.php';
require_once '../config.php'; // On inclu la connexion à la bdd
require("../requetes.php");

session_start();

verifierconnexionpersonne();

use \phpseclib3\Net\SSH2;
ini_set('display_errors',1);
error_reporting(E_ALL);
$_SESSION['ipAddress']=$_POST['ipAddress'];
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

    if($_SESSION['ipAddress'] == '192.168.10.3'){
	$_SESSION['login']='rp';
	$_SESSION['mdp']='a';
    }elseif($_SESSION['ipAddress'] == '192.168.10.4'){
	$_SESSION['login']='rp2';
	$_SESSION['mdp']='a';
    }

    if(isset($_SESSION['login']) && $ssh->login($_SESSION['login'],$_SESSION['mdp'])){
        header('Location: menu.php');
	$_SESSION['ipAddress'] = $_POST['ipAddress'];
    }else{
	
	
    }
	
} else {
    // Redirection si aucun formulaire n'a été soumis
    header('Location: index_joueur.php');
    exit;
}
?>
