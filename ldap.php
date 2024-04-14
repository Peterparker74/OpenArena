<?php
   // Fichier de configuration pour l'interface PHP
   //  de notre annuaire LDAP
   $server = "localhost";

   $port = "389";

   $racine = "o=commentcamarche, c=fr";

   $rootdn = "cn=ldap_admin, o=commentcamarche, c=fr";

   $rootpw = "secret";

echo "Connexion...<br>";

$ds=ldap_connect($server);

if ($ds==1)
	{
		$r=ldap_bind($ds,$rootdn,$rootpw);

	// Ici les opérations à effectuer
	echo "Déconnexion...<br>";

	ldap_close($ds);

	}
else {
	echo  "Impossible de se connecter au serveur LDAP";

	 }
?>