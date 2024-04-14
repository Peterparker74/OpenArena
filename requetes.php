<?php 

function verificationconnexionpersonne()
{

	if (require("config.php")) {

		$sql = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
        $sql->execute(array($_SESSION['pseudo']));
        $result = $sql->fetch()['type'];

		if(!isset($_SESSION['pseudo']) | empty($_SESSION['pseudo']) | $result!="personne"){
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

function verifierconnexionorganisateur()
{

	if (require("config.php")) {

		$sql = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
        $sql->execute(array($_SESSION['pseudo']));
        $result = $sql->fetch()['type'];

		if(!isset($_SESSION['pseudo']) | empty($_SESSION['pseudo']) | $result!="organisateur"){
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

	if (require("config.php")) {

		$sql = $bdd->prepare("SELECT * FROM personne WHERE pseudo = :pseudo");
        $pseudo = $_SESSION['pseudo'];
        $sql->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        $sql->closeCursor();
        return $result;

	}

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

	function affichertouteslesmaps()
	{
	if (require("config.php")) {

			$sql=$bdd->query("SELECT * FROM map ;") ;				
			$result=$sql->fetchAll(PDO::FETCH_OBJ);
			return $result ;
			$sql->closeCursor();
		
	}

	}

	function afficherlamap()
	{
	if (require("config.php")) {

			$sql=$bdd->query("SELECT * FROM map WHERE id_map ='".$_GET['id']."';") ;				
			$result=$sql->fetchAll(PDO::FETCH_OBJ);
			return $result ;
			$sql->closeCursor();
		
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
