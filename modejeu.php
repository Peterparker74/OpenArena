<?php
    require_once 'C:\Users\Guionnet\Documents\XAMPP\htdocs\OpenArena\config.php'; // On inclut la connexion à la base de données
    session_start();
?>  

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenArena - Modes de Jeu</title>
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
            
        </ul>
    </header>

    <div class="container mt-5">
        <h2 class="mb-4">Modes de Jeu</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mode</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>DeathMatch</td>
                    <td>Chaque joueur se bat pour lui-même, le but étant de marquer le plus de frags possible en éliminant les autres joueurs.</td>
                </tr>
                <tr>
                    <td>Team DeathMatch</td>
                    <td>Les joueurs sont divisés en équipes et s'affrontent pour marquer des frags, en coopération avec leurs coéquipiers.</td>
                </tr>
                <tr>
                    <td>Capture the Flag</td>
                    <td>Les équipes s'affrontent pour capturer le drapeau de l'équipe adverse et le ramener à leur propre base tout en défendant le drapeau.</td>
                </tr>
                <tr>
                    <td>Duel</td>
                    <td>Un mode 1 contre 1 où deux joueurs s'affrontent pour voir qui est le meilleur.</td>
                </tr>
                <tr>
                    <td>Free for All</td>
                    <td>Similaire au Deathmatch, mais sans équipes. Chaque joueur est pour lui-même.</td>
                </tr>
                <tr>
                    <td>Instagib</td>
                    <td>Les joueurs disposent d'un seul type d'arme qui tue instantanément, rendant le gameplay très rapide et intense.</td>
                </tr>
                <tr>
                    <td>Rocket Arena</td>
                    <td>Les joueurs s'affrontent avec des lance-roquettes dans des duels rapides et intenses.</td>
                </tr>
                <tr>
                    <td>Clan Arena</td>
                    <td>Un mode par équipe où les joueurs n'ont qu'une seule vie par manche, favorisant la coopération et la stratégie.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p>&copy; 2024 OpenArena. Tous droits réservés.</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

