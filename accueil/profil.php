<?php
    require_once '../config.php'; // On inclu la connexion à la bdd
    require("../requetes.php");
    session_start();
    $mafficher = mafficher();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil du Joueur</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Profil du Joueur</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="informations-tab" data-bs-toggle="tab" data-bs-target="#informations" type="button" role="tab" aria-controls="informations" aria-selected="true">Mes Informations</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="commandes-tab" data-bs-toggle="tab" data-bs-target="#commandes" type="button" role="tab" aria-controls="commandes" aria-selected="false">Mes Commandes</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="scores-tab" data-bs-toggle="tab" data-bs-target="#scores" type="button" role="tab" aria-controls="scores" aria-selected="false">Mes Scores</button>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="../index.php">Se déconnecter</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="informations" role="tabpanel" aria-labelledby="informations-tab">
                <h2 class="mt-4">Mes Informations</h2>
                <p>Bienvenue, <?= $_SESSION['pseudo']; ?> !</p>
            </div>
            <?php foreach ($mafficher as $unmafficher) :?>
            
            <div class="tab-pane fade" id="commandes" role="tabpanel" aria-labelledby="commandes-tab">
                <h2 class="mt-4">Mes Commandes</h2>
                <form action="" method="post">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Fonction</th>
                                    <th>Commande actuelle</th>
                                    <th>Nouvelle commande</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Avancer</td>
                                    <td><?= $unmafficher->avancer ?></td>
                                    <td><input type="text" class="form-control new-command" name="avancer" placeholder="Nouvelle commande"></td>
                                </tr>
                                <tr>
                                    <td>Reculer</td>
                                    <td><?= $unmafficher->reculer ?></td>
                                    <td><input type="text" class="form-control new-command" name="reculer" placeholder="Nouvelle commande"></td>
                                </tr>
                                <tr>
                                    <td>Aller à gauche</td>
                                    <td><?= $unmafficher->tourner_gauche ?></td>
                                    <td><input type="text" class="form-control new-command" name="gauche" placeholder="Nouvelle commande"></td>
                                </tr>
                                <tr>
                                    <td>Aller à droite</td>
                                    <td><?= $unmafficher->tourner_droite ?></td>
                                    <td><input type="text" class="form-control new-command" name="droite" placeholder="Nouvelle commande"></td>
                                </tr>
                                <tr>
                                    <td>Sauter</td>
                                    <td><?= $unmafficher->sauter ?></td>
                                    <td><input type="text" class="form-control new-command" name="sauter" placeholder="Nouvelle commande"></td>
                                </tr>
                                <tr>
                                    <td>Tirer</td>
                                    <td><?= $unmafficher->tirer ?></td>
                                    <td><input type="text" class="form-control new-command" name="tirer" placeholder="Nouvelle commande"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
           <?php endforeach ; ?>
            <div class="tab-pane fade" id="scores" role="tabpanel" aria-labelledby="scores-tab">
                <h2 class="mt-4">Mes Scores</h2>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01/05/2024</td>
                            <td>2500</td>
                        </tr>
                        <tr>
                            <td>28/04/2024</td>
                            <td>2100</td>
                        </tr>
                        <tr>
                            <td>20/04/2024</td>
                            <td>1800</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const newCommandFields = document.querySelectorAll('.new-command');

            newCommandFields.forEach(function (field) {
                field.addEventListener('keydown', function (event) {
                    event.preventDefault();
                    this.value = event.key.toUpperCase();
                });
            });
        });
    </script>
</body>
</html>
