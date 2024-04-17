<?php 
    //require_once 'C:\Users\guill\Downloads\UwAmp\UwAmp\www\OpenArena\resultats'
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau HTML</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<?php  
/*$joueur2 = "joueur 2";
$joueur3 = "joueur 3";
$joueur4 = "joueur 4";
$joueur5 = "joueur 5";
$joueur6 = "joueur 6";
$joueur7 = "joueur 7";
$joueur8 = "joueur 8";*/
$joueur1 = htmlentities($_POST['joueur1']);
$joueur2 = htmlentities($_POST['joueur2']);
$joueur3 = htmlentities($_POST['joueur3']);
$joueur4 = htmlentities($_POST['joueur4']);
$joueur5 = htmlentities($_POST['joueur5']);
$joueur6 = htmlentities($_POST['joueur6']);
$joueur7 = htmlentities($_POST['joueur7']);
$joueur8 = htmlentities($_POST['joueur8']);
$GQ1 = "gagnant Q1";
$GQ2 = "gagnant Q2";
$GQ3 = "gagnant Q3";
$GQ4 = "gagnant Q4";
$GD1 = "gagnant D1";
$GD2 = "gagnant D2";

/*if (empty($joueur1)) {
    $joueur1 = "joueur1";
}
if (empty($joueur2)) {
    $joueur2 = "joueur2";
}
if (empty($joueur3)) {
    $joueur3 = "joueur3";
}
if (empty($joueur4)) {
    $joueur4 = "joueur4";
}
if (empty($joueur5)) {
    $joueur5 = "joueur5";
}
if (empty($joueur6)) {
    $joueur6 = "joueur6";
}
if (empty($joueur7)) {
    $joueur7 = "joueur7";
}
if (empty($joueur8)) {
    $joueur8 = "joueur8";
}*/
?>
<body>
    <h1> arbres des compétitions </h1>
    <h2> Compétition 1 </h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Quart</th>
                <th>demi</th>
                <th>final</th>
                <th>gagnant</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>Q1:<?php echo $joueur1; ?> vs <?php echo $joueur2; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>D1:<?php echo $GQ1; ?> vs <?php echo $GQ2; ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Q2:<?php echo $joueur3; ?> vs <?php echo $joueur4; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><?php echo $GD1; ?> vs <?php echo $GD2; ?></td>
                <td>gagnant du tournoi: </td>
            </tr>
            <tr>
                <td>Q3:<?php echo $joueur5; ?> vs <?php echo $joueur6; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>D2: <?php echo $GQ3; ?> vs <?php echo $GQ4; ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Q4:<?php echo $joueur7; ?> vs <?php echo $joueur8; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            
        </tbody>
    </table>
</body>
</html>
