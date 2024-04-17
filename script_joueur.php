<?php
// Connexion au serveur distant
$connection = ssh2_connect('195.221.40.1', 22);
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

// Vérifier si un bouton a été cliqué
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Si le bouton "Démarrer serveur" a été cliqué
    if (isset($_POST["start"])) {
        $command = 'export DISPLAY=:0; openarena +connect 195.221.40.66:27960';
        $stream = ssh2_exec($connection, $command);
        stream_set_blocking($stream, true);
        $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
        $output = stream_get_contents($stream_out);

        
    }
    
   
}

// Fermeture de la connexion SSH
ssh2_disconnect($connection);
header ('Location: index_joueur.php');
exit;
?>
