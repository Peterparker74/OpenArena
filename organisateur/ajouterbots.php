<?php
// Connexion au serveur distant
$connection = ssh2_connect('195.221.40.131', 22);
if (!$connection) {
    echo "Échec de la connexion au serveur";
    exit;
} else {
    echo "Connexion au serveur réussie<br>";
}

// Authentification
if (!ssh2_auth_password($connection, 'rt', 'rt')) {
    echo "Échec de l'authentification";
    exit;
} else {
    echo "Authentification réussie<br>";
}


    // Exécution de la commande "sudo systemctl start openarena-server"
        $stream = ssh2_exec($connection, "echo -e '\xff\xff\xff\xffrcon serveropenarena addbot grunt 4 ' | nc -u 195.221.40.129 27960 ");
        stream_set_blocking($stream, true);
        $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
        $output = stream_get_contents($stream_out);

        
   

// Fermeture de la connexion SSH
ssh2_disconnect($connection);
header ('Location: index.php');
exit;
?>
