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
/*$joueur1 = "joueur1";
$joueur2 = "joueur 2";
$joueur3 = "joueur 3";
$joueur4 = "joueur 4";
$joueur5 = "joueur 5";
$joueur6 = "joueur 6";
$joueur7 = "joueur 7";
$joueur8 = "joueur 8";
$GQ1 = "gagnant Q1";
$GQ2 = "gagnant Q2";
$GQ3 = "gagnant Q3";
$GQ4 = "gagnant Q4";
$GD1 = "gagnant D1";
$GD2 = "gagnant D2";*/
?>
<div class="container">
<h1>compétition</h1>
<h2>quart de final</h2>
<form  method="POST" action="test.php">
    <div class="container">
        <div class="row my-3">
            <div class="col-md-6">
                <label for="joueur1" class="form-label">joueur1</label>
                <input type="text" class="form-control " id="joueur1" name="joueur1" placeholder="Joueur1..." required>
            </div>
            <div class="col-md-6">
                <label for="joueur2" class="form-label">joueur2</label>
                <input type="text" class="form-control " id="joueur2" name="joueur2" placeholder="Joueur2..." required> 
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6">
                <label for="joueur3" class="form-label">joueur2</label>
                <input type="text" class="form-control " id="joueur3" name="joueur3" placeholder="Joueur3..." required>
            </div>
            <div class="col-md-6">
                <label for="joueur4" class="form-label">joueur4</label>
                <input type="text" class="form-control " id="joueur4" name="joueur4" placeholder="Joueur4..." required> 
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6">
                <label for="joueur5" class="form-label">joueur5</label>
                <input type="text" class="form-control " id="joueur5" name="joueur5" placeholder="Joueur5..." required>
            </div>
            <div class="col-md-6">
                <label for="joueur6" class="form-label">joueur6</label>
                <input type="text" class="form-control " id="joueur6" name="joueur6" placeholder="Joueur6..." required> 
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6">
                <label for="joueur7" class="form-label">Joueur 7</label>
                <input type="text" class="form-control " id="joueur7" name="joueur7" placeholder="Joueur7..." required>
            </div>
            <div class="col-md-6">
                <label for="joueur8" class="form-label">joueur8</label>
                <input type="text" class="form-control " id="joueur8" name="joueur8" placeholder="joueur8..." required> 
            </div>
        </div>
        <div class="row my-3">   
            <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-primary" type="submit">Valider</button></div>   
        </div>
    </div>
</form>
<h2> Demi final </h2>
<form  method="POST" action="test.php">
    <div class="container">
        <div class="row my-3">
            <div class="col-md-6">
                <label for="D1" class="form-label">demi-finaliste 1</label>
                <input type="text" class="form-control " id="D1" name="D1" placeholder="Demi finaliste 1..." required>
            </div>
            <div class="col-md-6">
                <label for="D2" class="form-label">demi-finaliste 2</label>
                <input type="text" class="form-control " id="D2" name="D2" placeholder="Demi finaliste 2..." required> 
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6">
                <label for="D3" class="form-label">demi-finaiste 3</label>
                <input type="text" class="form-control " id="D3" name="D3" placeholder="Demi finaliste 3..." required>
            </div>
            <div class="col-md-6">
                <label for="D4" class="form-label">demi-finaliste 4</label>
                <input type="text" class="form-control " id="D4" name="D4" placeholder="demi-finaliste 4..." required> 
            </div>
        </div>
        <div class="row my-3">   
            <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-primary" type="submit">Valider</button></div>   
        </div>
    </div>
</form>
</div>
