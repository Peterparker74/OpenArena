<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['data'])) {
        // Échapper correctement les données pour éviter les injections de commande
        $data = escapeshellarg($_POST['data']);
        // Phrases à supprimer (anciennes configurations)
        $phrasesToRemove = [
            "bind LEFTARROW \"+left\"",
            "bind RIGHTARROW \"+right\"",
            "bind UPARROW \"+forward\"",
            "bind DOWNARROW \"+back\""
        ];
        // Chemin du fichier de configuration
        $filePath = '/home/dide/.openarena/baseoa/q3config.cfg';
        // Vérifiez si le fichier existe
        if (file_exists($filePath)) {
            $contenu_fichier = file_get_contents($filePath);
            $lines = explode("\n", $contenu_fichier);
            $filteredLines = [];
            // Filtrer les lignes, enlever les anciennes configurations
            foreach ($lines as $line) {
                $shouldRemove = false;
                foreach ($phrasesToRemove as $phrase) {
                    if (strpos($line, $phrase) !== false) {
                        $shouldRemove = true;
                        break;
                    }
                }
                if (!$shouldRemove) {
                    $filteredLines[] = $line;
                }
            }
            // Réécrire le fichier avec les lignes filtrées et les nouvelles données
            file_put_contents($filePath, implode("\n", $filteredLines) . "\n" . trim($data, "'"), LOCK_EX);
            echo "Données enregistrées avec succès dans le fichier.";
        } else {
            echo "Le fichier spécifié n'existe pas.";
        }
    } else {
        echo "Aucune donnée à enregistrer.";
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>