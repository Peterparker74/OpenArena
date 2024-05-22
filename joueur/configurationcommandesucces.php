<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	require_once '../config.php'; // On inclu la connexion à la bdd
    require("../requetes.php");
    session_start(); 
    
    verificationconnexionpersonne(); 
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	include '../vendor/autoload.php';

	use \phpseclib3\Net\SSH2;

	$ssh = new SSH2($_SESSION['ipAddress']);

	if (!$ssh->login($_SESSION['login'],$_SESSION['mdp'])){
		exit('Login Failed');
		
	}else{
		//echo 'Connexion réussie';
		
	}
	
	
	$command = 'pgrep openarena';
	$output = $ssh->exec($command);
	
	/*var_dump($output);
	
	if(!empty($output)){
		echo $output;
	}else{
		echo $output;
	}*/

	$ssh->disconnect();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Configuration Commande</title>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
            padding: 20px;
        }
        .header {
            color: #007bff;
            font-size: 24px;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .sub-header {
            color: #007bff;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .controls, .actions {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .control {
            margin: 0 10px;
            padding: 10px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .title {
            background-color: #ff6347; /* Tomato red */
            color: white;
            padding: 5px;
            margin-bottom: 5px;
        }
        button {
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:active {
            transform: scale(0.98);
        }
        .advanced-options {
            margin-top: 20px;
            background-color: #8a2be2;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .advanced-options:hover {
            background-color: #7a1be0;
        }
</style>
</head>
<body>

<div class="header" style="margin-bottom: 60px;">Configuration commande</div>
<div class="sub-header" style="margin-bottom: 40px;">Les commandes du joueur <?=$_SESSION['pseudo'] ?> ont été modifié avec succès sur la station de jeu <span style="font-weight: bold;font-size: 25px;color: green;"><?=$_SESSION['ipAddress'] ?></span>.<br> Dès que vous démarrez une partie, elle se lancera sous le nom de <span style="font-weight: bold;font-size: 2Épx;color: red;"><?=$_SESSION['pseudo'] ?>.</span><br> Voulez vous lancer une partie?</div>

<a href="demarrerjeujoueur.php"><button class="advanced-options">Démarrer une partie</button></a>
<button class="advanced-options" style="background-color: red;">Démarrer avec option map</button>
 
<div id="error" style="color: red;"></div>

</body>
</html>
