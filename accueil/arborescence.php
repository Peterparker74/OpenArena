<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Arborescence du tournoi</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f0f0;
    }
    canvas {
        display: block;
        margin: auto;
        border: 2px solid #333;
        background-color: #fff;
    }
    .scoreInput {
        width: 40px;
        height: 20px;
        position: absolute;
    }
</style>
</head>
<body>

<canvas id="tournamentTree" width="900" height="700"></canvas>
<?php 
    require_once '../config.php';
    $tournoiID = 1;
    
      // Requête pour récupérer les matchs du tournoi sélectionné
      $stmt = $bdd->prepare('SELECT * FROM matchs WHERE id_tournoi = ? ORDER BY FIELD(phase, \'finale\', \'demi-finale\', \'quart de finale\')');
      $stmt->execute([$tournoiId]);
      $matchs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<script>
    // Obtention du contexte du canvas
    const canvas = document.getElementById('tournamentTree');
    const ctx = canvas.getContext('2d');

    // Fonction pour dessiner un rectangle avec du texte au centre et une zone de texte pour le score
    function drawRectWithScore(x, y, width, height, playerName) {
        // Dessiner le rectangle pour le joueur
        ctx.fillStyle = '#007bff';
        ctx.fillRect(x, y, width, height);
        ctx.strokeStyle = '#0056b3';
        ctx.lineWidth = 2;
        ctx.strokeRect(x, y, width, height);
        ctx.fillStyle = '#fff';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.font = 'bold 16px "Segoe UI", Tahoma, Geneva, Verdana, sans-serif';
        ctx.fillText(playerName, x + width / 2, y + height / 2);

        // Ajouter une zone de texte pour le score à côté du rectangle du joueur
        /*const scoreInput = document.createElement('input');
        scoreInput.type = 'text';
        scoreInput.className = 'scoreInput';
        scoreInput.style.left = x + width + 270 + 'px'; // Position horizontale ajustée
        scoreInput.style.top = y + height / 2 -10 + 'px'; // Position verticale centrée
        document.body.appendChild(scoreInput);*/
    }

    // Fonction pour dessiner une ligne entre deux points
    function drawLine(x1, y1, x2, y2) {
        ctx.beginPath();
        ctx.moveTo(x1, y1);
        ctx.lineTo(x2, y2);
        ctx.strokeStyle = '#333';
        ctx.lineWidth = 3;
        ctx.stroke();
    }

    // Positions des équipes et des tours
    const xQuarters = 100;
    const xSemiFinals = 300;
    const xFinal = 500;
    const ySpacing = 75;
    const yFirstRound = 100;
    const rectWidth = 120;
    const rectHeight = 40;
    const xVainqueur = 700;
    
    $q1="J1";
    $q2="J2";
    $q3="";
    $q4="";
    $q5="";
    $q6="";
    $q7="";
    $q8="";
    $d1="";
    $d2="";
    $d3="";
    $d4="";
    $f1="";
    $f2="";
    $v="";

    

    drawRectWithScore(xQuarters - rectWidth / 2, yFirstRound - rectHeight / 2, rectWidth, rectHeight, $q1);
    drawRectWithScore(xQuarters - rectWidth / 2, yFirstRound + ySpacing - rectHeight / 2, rectWidth, rectHeight, $q2);
    drawRectWithScore(xQuarters - rectWidth / 2, yFirstRound + 2 * ySpacing - rectHeight / 2, rectWidth, rectHeight, $q3);
    drawRectWithScore(xQuarters - rectWidth / 2, yFirstRound + 3 * ySpacing - rectHeight / 2, rectWidth, rectHeight, $q4);
    drawRectWithScore(xQuarters - rectWidth / 2, yFirstRound + 4*ySpacing - rectHeight / 2, rectWidth, rectHeight, $q5);
    drawRectWithScore(xQuarters - rectWidth / 2, yFirstRound + 5*ySpacing - rectHeight / 2, rectWidth, rectHeight, $q6);
    drawRectWithScore(xQuarters - rectWidth / 2, yFirstRound + 6*ySpacing - rectHeight / 2, rectWidth, rectHeight, $q7);
    drawRectWithScore(xQuarters - rectWidth / 2, yFirstRound + 7*ySpacing - rectHeight / 2, rectWidth, rectHeight, $q8);
    drawRectWithScore(xSemiFinals - rectWidth / 2, yFirstRound + 0.5 * ySpacing - rectHeight / 2, rectWidth, rectHeight, $d1);
    drawRectWithScore(xSemiFinals - rectWidth / 2, yFirstRound + 2.5 * ySpacing - rectHeight / 2, rectWidth, rectHeight, $d2);
    drawRectWithScore(xSemiFinals - rectWidth / 2, yFirstRound + 4.5 * ySpacing - rectHeight / 2, rectWidth, rectHeight, $d3);
    drawRectWithScore(xSemiFinals - rectWidth / 2, yFirstRound + 6.5 * ySpacing - rectHeight / 2, rectWidth, rectHeight, $d4);
    drawRectWithScore(xFinal - rectWidth / 2, yFirstRound + 1.5 * ySpacing - rectHeight / 2, rectWidth, rectHeight, $f1);
    drawRectWithScore(xFinal - rectWidth / 2, yFirstRound + 5.5 * ySpacing - rectHeight / 2, rectWidth, rectHeight, $f2);
    drawRectWithScore(xVainqueur - rectWidth / 2, yFirstRound + 3.5 * ySpacing - rectHeight / 2, rectWidth, rectHeight, $v);

    // Dessiner les lignes entre les équipes et les vainqueurs
    drawLine(xQuarters + rectWidth / 2, yFirstRound, xSemiFinals - rectWidth / 2, yFirstRound + 0.5 * ySpacing);
    drawLine(xQuarters + rectWidth / 2, yFirstRound + ySpacing, xSemiFinals - rectWidth / 2, yFirstRound + 0.5 * ySpacing);
    drawLine(xQuarters + rectWidth / 2, yFirstRound + 2 * ySpacing, xSemiFinals - rectWidth / 2, yFirstRound + 2.5 * ySpacing);
    drawLine(xQuarters + rectWidth / 2, yFirstRound + 3 * ySpacing, xSemiFinals - rectWidth / 2, yFirstRound + 2.5 * ySpacing);
    drawLine(xQuarters + rectWidth / 2, yFirstRound + 4 * ySpacing, xSemiFinals - rectWidth / 2, yFirstRound + 4.5 * ySpacing);
    drawLine(xQuarters + rectWidth / 2, yFirstRound + 5 * ySpacing, xSemiFinals - rectWidth / 2, yFirstRound + 4.5 * ySpacing);
    drawLine(xQuarters + rectWidth / 2, yFirstRound + 6* ySpacing, xSemiFinals - rectWidth / 2, yFirstRound + 6.5 * ySpacing);
    drawLine(xQuarters + rectWidth / 2, yFirstRound + 7 * ySpacing, xSemiFinals - rectWidth / 2, yFirstRound + 6.5 * ySpacing);

    // Dessiner les lignes entre les vainqueurs et la finale vainqueur
    drawLine(xSemiFinals + rectWidth / 2, yFirstRound + 0.5 * ySpacing, xFinal - rectWidth / 2, yFirstRound + 1.5 * ySpacing);
    drawLine(xSemiFinals + rectWidth / 2, yFirstRound + 2.5 * ySpacing, xFinal - rectWidth / 2, yFirstRound + 1.5 * ySpacing);
    drawLine(xSemiFinals + rectWidth / 2, yFirstRound + 4.5 * ySpacing, xFinal - rectWidth / 2, yFirstRound + 5.5 * ySpacing);
    drawLine(xSemiFinals + rectWidth / 2, yFirstRound + 6.5 * ySpacing, xFinal - rectWidth / 2, yFirstRound + 5.5 * ySpacing);

    // Dessiner les lignes entre les finalistes et le vainqueur
    drawLine(xFinal + rectWidth / 2, yFirstRound + 1.5 * ySpacing, xVainqueur - rectWidth / 2, yFirstRound + 3.5 * ySpacing);
    drawLine(xFinal + rectWidth / 2, yFirstRound + 5.5 * ySpacing, xVainqueur - rectWidth / 2, yFirstRound + 3.5 * ySpacing);

</script>

</body>
</html>
