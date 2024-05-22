<?php
// Vérifier si un joueur a été sélectionné
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Si les joueurs ont été sélectionnés
    if (isset($_POST["joueur1"]) && isset($_POST["joueur2"])) {
        $joueur1 = $_POST["joueur1"];
        $joueur2 = $_POST["joueur2"];
        
        // Connexion au raspberry1
        $connection1 = ssh2_connect('195.221.40.1', 22);
        if (!$connection1) {
            echo "Échec de la connexion au serveur 1";
            exit;
        } else {
            echo "Connexion au serveur 1 réussie<br>";
        }

        // Authentification
        if (!ssh2_auth_password($connection1, 'rt', 'rt')) {
            echo "Échec de l'authentification";
            exit;
        } else {
            echo "Authentification réussie<br>";
        }

        // Exécuter sudo su joueur1 sur le raspberry1
        /*$stream1 = ssh2_exec($connection1, 'sudo su ' . $joueur1);
        stream_set_blocking($stream1, true);
        $stream_out1 = ssh2_fetch_stream($stream1, SSH2_STREAM_STDIO);
        $output1 = stream_get_contents($stream_out1);*/

        // Démarrer le jeu sur le raspberry1
        $command1 = 'export DISPLAY=:0; openarena +connect 195.221.40.129:27960';
        $stream1 = ssh2_exec($connection1, $command1);
        stream_set_blocking($stream1, true);
        $stream_out1 = ssh2_fetch_stream($stream1, SSH2_STREAM_STDIO);
        $output1 = stream_get_contents($stream_out1);

        // Fermeture de la connexion SSH sur le serveur 1
        ssh2_disconnect($connection1);

       
        // Redirection vers la page index_joueur.php
        header ('Location: lancement.php');
        exit;
    }
}
?>
