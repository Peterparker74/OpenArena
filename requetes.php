<?php 

function verificationconnexionpersonne()
{

	if (require("config.php")) {

		$sql = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
        $sql->execute(array($_SESSION['pseudo']));
        $result = $sql->fetch()['type'];

		if(!isset($_SESSION['pseudo']) | empty($_SESSION['pseudo']) | $result!="personne"){
		    header('Location:/OpenArena/index.php');
		    die();
		}
		else{
		

			// On récupere les données de l'utilisateur
			$sql = $bdd->query("SELECT * FROM utilisateurs WHERE pseudo ='".$_SESSION['pseudo']."' ;");
			$result=$sql->fetch()['pseudo'];
			$pseudo=$result;
	

		}
	}

}

function verifierconnexionorganisateur()
{

	if (require("config.php")) {

		$sql = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
        $sql->execute(array($_SESSION['pseudo']));
        $result = $sql->fetch()['type'];

		if(!isset($_SESSION['pseudo']) | empty($_SESSION['pseudo']) | $result!="organisateur"){
		    header('Location:/OpenArena/index.php');
		    die();
		}
		else{
		

			// On récupere les données de l'utilisateur
			$sql = $bdd->query("SELECT * FROM utilisateurs WHERE pseudo ='".$_SESSION['pseudo']."' ;");
			$result=$sql->fetch()['pseudo'];
			$pseudo=$result;
	

		}
	}

}

function verifierconnexionadmin()
{

	if (require("config.php")) {

		$sql = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
        $sql->execute(array($_SESSION['pseudo']));
        $result = $sql->fetch()['type'];

		if(!isset($_SESSION['pseudo']) | empty($_SESSION['pseudo']) | $result!="admin"){
		    header('Location:/openarena/accueil/accueil.php');
		    die();
		}
		else{
		

			// On récupere les données de l'utilisateur
			$sql = $bdd->query("SELECT * FROM utilisateurs WHERE pseudo ='".$_SESSION['pseudo']."' ;");
			$result=$sql->fetch()['pseudo'];
			$pseudo=$result;
	

		}
	}

}

function mafficher()
{
    require("config.php");

    if ($bdd) {
        $sql = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
        $pseudo = $_SESSION['pseudo'];
        $sql->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_OBJ); // Fetch all results as an array of objects
        return $result;
        $sql->closeCursor();
    }

    return false; // Return false if connection fails or $bdd is not defined
}


	function affichertouslesjoueurs()
	{
	if (require("config.php")) {

			$sql=$bdd->query("SELECT * FROM utilisateurs WHERE type ='personne';") ;				
			$result=$sql->fetchAll(PDO::FETCH_OBJ);
			return $result ;
			$sql->closeCursor();
		
	}

	}

	function ajoutercommandesbdd($avancer, $reculer, $tournergauche, $tournerdroite, $sauter, $tirer)
	{
		if (require("config.php")) {
			$update=$bdd->prepare("UPDATE utilisateurs SET avancer=?, reculer=?, tourner_gauche=?, tourner_droite=?, sauter=?, tirer=? WHERE pseudo= ?; ") ;					
									$update->execute(array($avancer,$reculer,$tournergauche,$tournerdroite,$sauter,$tirer,$_SESSION['pseudo']));
		}
	}

	
	function affichertouteslesmaps()
	{
		if (require("config.php")) {
			$sql = $bdd->query("SELECT * FROM map;");
			$result = $sql->fetchAll(PDO::FETCH_OBJ);
	
			// Ajouter le chemin de l'image à chaque objet dans le résultat
			foreach ($result as $map) {
				// Modifier le chemin de l'image en fonction de l'emplacement sur votre serveur
				$map->chemin_image = "accueil/img/". $map->photo_map;
			}
	
			$sql->closeCursor();
			return $result;
		}
	}

	

	

	function affichertouslesevenements()
	{
	if (require("config.php")) {

			$sql=$bdd->query("SELECT * FROM evenement;") ;				
			$result=$sql->fetchAll(PDO::FETCH_OBJ);
			return $result ;
			$sql->closeCursor();
		
	}

	}

	function affichermonpseudo()
	{
	if (require("config.php")) {

			$sql=$bdd->query("SELECT * FROM utilisateurs WHERE pseudo ='".$_SESSION['pseudo']."';") ;				
			$result=$sql->fetch()["pseudo"];
			return $result ;
			$sql->closeCursor();
		
	}

	}

	function affichermonnom()
	{
	if (require("config.php")) {

			$sql=$bdd->query("SELECT * FROM utilisateurs WHERE pseudo ='".$_SESSION['pseudo']."';") ;				
			$result=$sql->fetch()["nom_utilisateur"];
			return $result ;
			$sql->closeCursor();
		
	}

	}

	function affichermaphotodeprofil()
	{
	if (require("config.php")) {

			$sql=$bdd->query("SELECT * FROM utilisateurs WHERE pseudo ='".$_SESSION['pseudo']."';") ;				
			$result=$sql->fetch()['photo_de_profil'] ;
			return $result ;
			$sql->closeCursor();
		
	}

	}

	
	
	
?>
