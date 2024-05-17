<?php

	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	
	/*require_once '../config.php'; // On inclu la connexion à la bdd
	require("../requetes.php");

	session_start();
	    
	verifierconnexionpersonne(); */

	include '../vendor/autoload.php';

	use \phpseclib3\Net\SSH2;

	$ssh = new SSH2($_SESSION['ipAddress']);

	if (!$ssh->login($_SESSION['login'],$_SESSION['mdp'])){
		exit('Login Failed');
		
	}else{
		//echo 'Connexion réussie';
		$output = [];
		$return_val = 0;
		
		header('Location: jeuencoursjoueur.php');
		
		$ssh->exec("export DISPLAY=:0; openarena +set name $_SESSION['pseudo']");
		$ssh->disconnect();
		

		
		foreach($output as $line){
		echo $line . PHP_EOL;
		}
		
		if($return_val!==0){
			echo "La commande a échoué";
		}
		
		
		
	
			
	}
		
	
?>
