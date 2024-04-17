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


//Lien entre l'AD et le site web

<?php
$ldapServer = 'ldap://localhost';
$ldapBaseDN = 'dc=openarena-paris,dc=fr';

$ldapConn = ldap_connect($ldapServer);
if (!$ldapConn) {
    die("Connexion LDAP impossible");
}

ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);

$ldapBind = ldap_bind($ldapConn, $_POST['username'] . '@openarena-paris.fr', $_POST['password']);
if (!$ldapBind) {
    die("Authentification LDAP échouée");
} else {
    echo "Authentification LDAP réussie";
}

ldap_close($ldapConn);
?>
