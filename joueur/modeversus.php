<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
/*require_once '../config.php'; // On inclu la connexion à la bdd
require("../requetes.php");
    
verifierconnexionpersonne(); */
session_start(); 

include '../vendor/autoload.php';

use \phpseclib3\Net\SSH2;

if(!isset($_SESSION['ipAddress'])){
	header('Location: authentification.php');
}

if(isset($_POST['test'])){
	$ssh = new SSH2('192.168.10.2');

	if (!$ssh->login('ub','a')){
		exit('Login Failed');
		$_POST['test']="false";
	}else{
		//echo 'Connexion réussie';
		$_POST['test']="true";
	}

	$ssh->disconnect();

	$ssh = new SSH2('192.168.10.3');

	if (!$ssh->login('rp','a')){
		exit('Login Failed');
	}else{
		//echo 'Connexion réussie';
	}

}

if(isset($_POST['lancerpartiemultijoueur'])){
	include 'lancerpartie.php';

}

if(isset($_POST['lancerpartiebot'])){
	include 'lancerpartiebot.php';

}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport">
	<title></title>
	
	<body style="display: flex; justify-content: center;flex-direction: column;background-image:  url('../accueil/img/map4.jpg');background-size: cover;">
		<form action="modeversus.php" method="POST">
		<?php if(isset($_POST['test'])){ 
		 if($_POST['test'] =='true'){ ?>
		<button style="width: 60%;background-color: green;border: none; border-radius: 15px; color: white;padding: 10px 0 10px 0;font-size: 20px;font-weight: bold;margin-left: auto;margin-right: auto;">Connexion réussie</button>
		<?php }else{ ?>
		<button style="width: 60%;background-color: red;border: none; border-radius: 15px; color: white;font-size: 20px;font-weight: bold;padding: 10px 0 10px 0;margin-left: auto;margin-right: auto;">Echec de la connexion avec le serveur</button>
		<?php }}else{ ?>
		<button type="submit" style="width: 60%;background-color: black;border: none; border-radius: 15px; color: white;font-size: 20px;font-weight: bold;padding: 10px 0 10px 0;margin-left: auto;margin-right: auto;">Tester la connexion au serveur</button>
		<?php } ?>
		<input type="hidden" name="test" value="" />
		</form>
		
		<?php if(!isset($_POST['lancerpartiemultijoueur']) || !isset($_POST['lancerpartiebot'])){ ?>
		<div style="display: flex; justify-content: space-between;width: 100%;">
		<form action="modeversus.php" method="POST" style="width: 40%;height: 250px;flex-shrink: 0;">
		<button type="submit" style="background-color: brown;width: 100%;margin-left: auto;margin-right: auto; margin-top: 100px;height: 200px;border: 5px solid lightgray;border-radius: 15px;color: white;font-size: 25px;font-weight: bold;">Lancer la partie en mode Mutijoueur</button>
		<input class="deuxboutonslancer" type="hidden" name="lancerpartiemultijoueur" value="" />
		</form>
		
		<form action="modeversus.php" method="POST" style="width: 40%;height: 250px;flex-shrink: 0;">
		<button type="submit" style="background-color: brown;width: 100%;margin-left: auto;margin-right: auto; margin-top: 100px;height: 200px;border: 5px solid lightgray;border-radius: 15px;color: white;font-size: 25px;font-weight: bold;">Lancer la partie avec un bot</button>
		<input class="deuxboutonslancer" type="hidden" name="lancerpartiebot" value="" />
		</form>
		</div>
		<?php } ?>
		
		<audio id="myAudio" controls autoplay style='visibility: hidden;'>
			<source src="audiosuspens.mp3" type="audio/mpeg">
		</audio>
		
		<script>
		
			const deuxboutonslancer = document.querySelectorAll('.deuxboutonslancer');
			
			for(const unboutonlancer of deuxboutonslancer){
				unboutonlancer.onclick = function disparaitre(){
					unboutonlancer.parentElement.parentElement.setAttribute('display','none');
				}
			}
		
			var audio = document.getElementById("myAudio");
			audio.click();
			audio.play();
		</script>
	</body>
</head>
</html>
