<?php
    require_once '../config.php'; // On inclu la connexion à la bdd
	require("../requetes.php");

	session_start();

	verifierconnexionpersonne();

	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	include '../vendor/autoload.php';

	use \phpseclib3\Net\SSH2;

	$ssh = new SSH2($_SESSION['ipAddress']);

	if (!$ssh->login($_SESSION['login'],$_SESSION['mdp'])){
		exit('Login Failed');
		$_POST['test']="false";
	}else{
		//echo 'Connexion réussie';
		$_POST['test']="true";
	}
	
	$output = [];
	$return_val = 0;

	$ssh->exec("export DISPLAY=:0; openarena +connect 192.168.10.2:27960 +set name $_SESSION['pseudo']");
	
	foreach($output as $line){
	echo $line . PHP_EOL;
	}
	
	if($return_val!==0){
		echo "La commande a échoué";
	}
?>
