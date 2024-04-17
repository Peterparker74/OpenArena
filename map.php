<?php
    require_once 'C:\Users\Guionnet\Documents\XAMPP\htdocs\OpenArena\config.php'; 
    require_once 'C:\Users\Guionnet\Documents\XAMPP\htdocs\OpenArena\requetes.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenArena - Maps</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">OpenArena</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="\OpenArena\accueil\accueil.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\OpenArena\modejeu.php">Modes de Jeu</a>
            </li>
        </ul>
    </header>

    <div class="container mt-5">
        <h2 class="mb-4">Maps</h2>
        <div class="mb-3">
            <!-- Bouton déroulant pour trier par mode -->
            <select class="form-select" id="triParMode">
                <option value="tous">Tous</option>
                <option value="DeathMatch">DeathMatch</option>
                <option value="Team DeathMatch">Team DeathMatch</option>
                <option value="Capture the Flag">Capture the Flag</option>
                <option value="Duel">Duel</option>
                <option value="Free for all">Free for All</option>
                <option value="Instagib">Instagib</option>
                <option value="Rocket Arena">Rocket Arena</option>
                <option value="Clan Arena">Clan Arena</option>
                
            </select>
        </div>
        <div id="cartesContainer" class="row">
            <?php
            // Récupérer toutes les cartes depuis la base de données
            $maps = affichertouteslesmaps();

            // Vérifier si des cartes ont été récupérées
            if (!empty($maps)) {
                // Afficher chaque carte avec son image
                foreach ($maps as $map) {
                    echo '<div class="col-md-3 mb-3">';
                    echo '<div class="card">';
                    echo '<img src="' . $map->chemin_image . '.jpg" class="card-img-top" alt="' . $map->nom_map . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $map->nom_map . '</h5>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "Aucune carte trouvée.";
            }
            ?>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p>&copy; 2024 OpenArena. Tous droits réservés.</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

</body>
</html>
