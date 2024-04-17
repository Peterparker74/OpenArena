<?php
// Connexion au serveur distant
$connection = ssh2_connect('195.221.40.129', 22);
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
        // Exécution de la commande "sudo systemctl start openarena-server"
        $stream = ssh2_exec($connection, 'sudo /usr/bin/systemctl start openarena-server');
        stream_set_blocking($stream, true);
        $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
        $output = stream_get_contents($stream_out);

        // Vérification si la commande a réussi
        if (strpos($output, 'Started OpenArena server') !== false) {
            echo "Serveur lancé avec succès";
        } else {
            echo "Échec du lancement du serveur";
        }
    }
    // Si le bouton "Arrêter serveur" a été cliqué
    elseif (isset($_POST["stop"])) {
        // Exécution de la commande "sudo systemctl stop openarena-server"
        $stream = ssh2_exec($connection, 'sudo /usr/bin/systemctl stop openarena-server');
        stream_set_blocking($stream, true);
        $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
        $output = stream_get_contents($stream_out);

        // Vérification si la commande a réussi
        if (strpos($output, 'Stopped OpenArena server') !== false) {
            echo "Serveur arrêté avec succès";
        } else {
            echo "Échec de l'arrêt du serveur";
        }
    }
}

// Fermeture de la connexion SSH
ssh2_disconnect($connection);
header ('Location: index.php');
exit;
?>
