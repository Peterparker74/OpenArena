<?php
    session_start();
    session_destroy();
    session_start();
     
?>
<!DOCTYPE html>
    <html lang="en" style="margin: 0;padding: 0;width: 100%,height: 100%;">
        <head>
            

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
            <meta name="author" content="NoS1gnal"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <title>Inscription</title>
        </head>
        <body style="overflow-y: scroll; margin: 0;width: 100%;overscroll-behavior-x: none;height:100%;background-image: url('https://png.pngtree.com/background/20210715/original/pngtree-yellow-gradient-simplified-background-picture-image_1277937.jpg');">
            
        
        <!--

        <div style="">
            <div style="display: flex;align-items: center;justify-content: center;font-size: 21px;font-weight: bold;padding: 2px;">Création de votre compte</div>
            <div style="display: flex;align-items: center;justify-content: center;font-size: 16px;font-weight: bold;padding: 2px;color: gray;">Etape 1 sur 3</div>
            
        </div>
        
        -->
        
        <div class="cookie-banner" style="display: none;">
          <div class="cookie-content">
            <p>Nous utilisons des cookies pour vous offrir la meilleure expérience et assurer la sécurité de nos utilisateurs. Les cookies non essentiels que nous utilisons sont uniquement pour les références personnelles. Vous pouvez voir notre <a href="#" style="color: red;">Politique de Cookies</a> et notre <a href="#" style="color: red;">Avis de Confidentialité</a> ici.</p>
            <div class="cookie-buttons">
              <button class="cookie-button button-customize">PERSONNALISER</button>
              <button class="cookie-button button-accept">ACCEPTER TOUS</button>
            </div>
          </div>
        </div>
        
        <div id="imagegame" style="display: flex; width: 200px;justify-content: space-between;position: absolute;top: 30px;left: 20px;">
                <img src="game1.jpg" style="height: 80px;width: 80px;">
                <img src="game2.jpg" style="height: 80px;width: 80px;">
            </div>
        
        <div style="display: flex;justify-content: flex-end;padding-right: 10px;padding-top: 20px;"><div style="height: 100px;width: 25%;font-size: 40px;">Open<br> Arena ®</div></div>
        
        <p style="font-size: 26px;padding: 0 80px 0 30px;">Inscrivez-vous pour pour jouer à des parties</p>
        
        <p style="font-size: 15px;padding: 0 80px 0 30px;font-weight: bold;margin: 0;">Création de votre compte</p>
        


        <div class="login-form">
            
            
            <form action="inscription_traitement.php" method="post">
                <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert-danger">
                                <i class="fa-solid fa-circle-check" style="color:green"></i>
                                <strong style="color:blue;">Inscription réussie</strong><br>
                                <span style="color:black;font-size: 14px;">Inscritption réussie. Vous pouvez maintenant vous <a href="index.php" style="text-decoration: none;color: blue;">connecter </a>.</span><br>
                            </div>
                        <?php
                        break;

                        case 'motdepasse':
                        ?>
                            <div class="alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color:red;"></i>
                                <strong>Mot de passe non identique</strong><br>
                                <span style="color:black;font-size: 14px;">Veuillez modifier vos sélections et réessayez.</span>
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color:red;"></i>
                                <strong>Adresse mail non valide</strong><br>
                                <span style="color:black;font-size: 14px;">Veuillez modifier vos sélections et réessayez.</span>
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color:red;"></i>
                                <strong>Adresse mail trop long</strong><br>
                                <span style="color:black;font-size: 14px;">Veuillez modifier vos sélections et réessayez.</span><br>
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color:red;"></i>
                                <strong>Pseudo trop long</strong><br>
                                <span style="color:black;font-size: 14px;">Veuillez modifier vos sélections et réessayez.</span>
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color:red;"></i>
                                <strong>Pseudo déja existant</strong><br>
                                <span style="color:black;font-size: 14px;">Veuillez modifier vos sélections et réessayez.</span>
                            </div>
                        <?php 

                    }
                }
                ?>
                
                <h2 class="text-center" style="display: none;">Inscription</h2>  
                
                <div style="position: relative;">
                    <label  style="font-weight: bold;">Nom</label>     
                    <div class="form-group">
                        <input type="text" id=nom name="nom" class="form-control" placeholder="Nom" autocomplete="off">
                        <span class="error" style="color: red;font-size: 14px;display: none;"></span><br>
                    </div>
                </div>

                <div style="position: relative;">
                    <label  style="font-weight: bold;">Prénom</label>     
                    <div class="form-group">
                        <input type="text" id=prenom name="prenom" class="form-control" placeholder="Prénom" autocomplete="off">
                        <span class="error" style="color: red;font-size: 14px;display: none;"></span><br>
                    </div>
                </div>

                <div style="position: relative">
                    <label  style="font-weight: bold;">Ville</label>  
                    <div class="form-group">
                        <select id="ville" name="ville" class="form-control" style="height: 40px;background-color: white;">
                           <option value="">Choisissez votre ville</option>
                            <option value="fr"><span class="flag-icon flag-icon-fr"></span> Paris</option>
                            <option value="pt"><span class="flag-icon flag-icon-pt"></span> GCGHZSCX</option>
                            <option value="es"><span class="flag-icon flag-icon-es"></span> EUGSDCV</option>
                            <option value="es"><span class="flag-icon flag-icon-es"></span> EUGSDCV</option>
                            <!-- Ajoutez d'autres options de pays avec leurs drapeaux -->
                        </select>
                        <span class="error" style="color: red;font-size: 14px;display: none;"></span><br>
                    </div>
                
                </div>

                <div style="position: relative">
                <label  style="font-weight: bold;">Sexe</label>  
                <div class="form-group">
                    <select id="sexe" name="sexe" class="form-control" style="height: 40px;background-color: white;">
                        <option value="">Sexe</option>
                        <option value="Masculin">Masculin</option>
                        <option value="Féminin">Féminin</option>
                    </select>
                    <span class="error" style="color: red;font-size: 14px;display: none;"></span><br>
                </div>
                </div>
                
                <div style="position: relative;">
                    <label  style="font-weight: bold;">Mot de passe</label>  
                    <div class="form-group">
                        <input type="password" id="motdepasse" name="motdepasse" class="form-control" placeholder="Mot de passe" autocomplete="off">
                        <span  class="error" style="color: red;font-size: 14px;display: none;"></span><br>
                    </div>
                </div>
                
                <div style="position: relative;">
                <label  style="font-weight: bold;">Confirmation de votre mot de passe</label>  
                <div class="form-group">
                    <input type="password" id="motdepasse_retype" name="motdepasse_retype" class="form-control" placeholder="Re-tapez votre mot de passe" autocomplete="off">
                    <span  class="error" style="color: red;font-size: 14px;display: none;"></span><br>
                </div>
                </div>
                
                <div style="margin-top: 45px;" class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Continuer</button>
                </div>   
                
            
                                
                <div style="text-align: center; color: gray;padding: 0 30px;">En appuyant sur Continuer, vous reconnaissez avoir lu notre <span style="color: rgb(255, 60, 100, 1.0);">Politique de confidentialité</span> et acceptez nos <span style="color: rgb(255, 60, 100, 1.0);">Conditions d'utilisation de service</span>.</div>
                
                <div class="forgot-signup" style="padding-top: 30px;diplay: flex;justify-content: center;text-align: center;">
                    <span>Vous avez déjà un compte ? </span> <a href="connexion.php" style="color: rgb(30, 120, 255);font-weight: 600;"> Se connecter</a>
                </div>
                
            </form>

        </div>
        
        <div id="bloc">
			<div class="blocfooter">
				<ul>
				    <a href="../politiquecookies/index.php" style="font-weight: bold;"><li>©2023 OpenArena</li><a>
					<a href="../politiquecookies/index.php"><li>Cookies</li><a>
					<a href="../politiquedeconfidentialite/index.php"><li>Confidentialité</li></a>
					<a href=""><li>Conditions d'utilisation</li></a>
				</ul>
			</div>
			<div class="blocfooter">
				<ul>
					<a href=""><li>Centre d'aide</li></a>
					<a href="../aproposdenous/index.php"><li>A propos de nous</li></a>
					<a href=""><li>Nous contacter</li></a>
				</ul>
			</div>
			<div class="blocfooter">
				<ul>
					<a href=""><li>Politique de cookies</li></a>
					<a href="../aproposdenous/index.php"><li>Confidentialité</li></a>
					<a href=""><li>Conditions d'utilisation</li></a>
					<a href=""><li>Termes et Services</li></a>
					<a href=""><li style="margin-top: 50px;">Sécurité OpenArena & Centre de Transparence</li></a>
				</ul>
			</div>
		</div>


        <style>
            .form-group {
                width:100%;
                margin-bottom: 30px;
                margin-left: auto;
                margin-right: auto;
            }
            .form-control {
                width: calc(100% - 75px);
                font-size: 16px;
                outline: none;
                font-weight: 400;
                padding: 8px 13px ;
                margin-left: 25px;
            }
            .login-form {
                margin-left: auto;
                margin-right: auto;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
                
            }
            .alert-danger{
                margin-bottom: 20px;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
                color: blue;
                background-color: rgba(255, 160, 0, 0.3);
                height: 60px;
                border-radius: 1px;
                padding: 5px;

            }
            
            label{
                position: absolute;
                color: rgb(30, 120, 255);
                font-size: 14px;
                top: -8px;
                margin-left: 40px;
                padding-left: 3px;
                padding-right: 3px;
                background-color: white;
                display: none;
             
            }
            .login-form form {
                margin-bottom: 15px;
                padding: 20px 0 30px 0;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                
                border: 1px solid lightgray;
                border-radius: 8px;
                height: 32px;
            }
            .btn {
                display: block;        
                font-size: 15px;
                font-weight: bold;
                width: 70%;
                margin-left: auto;
                margin-right: auto;
                border-radius: 30px;
                height: 38px;
                border: none;
                background-color: rgb(255, 60, 100, 1.0);
            }
            a{
                text-decoration: none;
                color: blue;
                font-weight: 500;
            }
            
            .cookie-banner { background-color: rgb(245, 245, 245); color: gray; padding: 5px; position: sticky; top: 0; width: 100%; box-shadow: 0 -2px 5px rgba(0,0,0,0.2); font-size: 13px;z-index: 1000; }
          .cookie-content { max-width: 1000px; margin: auto; text-align: center; }
          .cookie-buttons { margin-top: 2px; display: flex; justify-content: end;}
          .cookie-button { background-color: rgb(245, 245, 245); padding: 10px 20px; border: none; cursor: pointer; font-weight: 500;font-size: 14px; }
          .button-accept { color: red; }
          .button-customize { color: red; }
          
          .cookie-banner.hidden {
                animation: slide-up 1s forwards;
            }
            
            @keyframes slide-up {
                from {
                    transform: translateY(0);
                }
                to {
                    transform: translateY(-100%);
                    display: none;
                }
            }
            
            #bloc{
            	flex-shrink: 0;
            	align-items: center;
            	display: flex;
            	justify-content: space-evenly;
            
            }
            
            
            .blocfooter ul li {
            	margin-bottom: 10px;
            	color: gray;
            	list-style-type: none;
            	font-size: 13px;
            	margin-bottom: 15px;
            
            }
            
            ::-webkit-scrollbar{
            	display: none;
            }
        </style>

        <script type="text/javascript">
            const regexnom=/^[A-Za-z]+$/;
            const regexprenom=/^[A-Za-z]+$/;
            const errors=document.querySelectorAll(".error");
            const form=document.querySelector("form");
            const pseudo=document.querySelector("#pseudo");
            const nom=document.querySelector("#nom");
            const ville=document.querySelector("#ville");
            const sexe=document.querySelector("#sexe");
            const motdepasse=document.querySelector("#motdepasse");
            const motdepasseretype=document.querySelector("#motdepasse_retype");
            
            const formcontrols = document.querySelectorAll('.form-control');
            
            var cookieBanner = document.querySelector('.cookie-banner');
            var customizeBtn = document.querySelector('.button-customize');
            var acceptBtn = document.querySelector('.button-accept');
        
            // Fonction pour masquer la bannière des cookies
            function hideCookieBanner() {
                cookieBanner.style.display = 'none';
            }
        
            // Écouteur d'événement pour le clic sur le bouton "Accepter tous"
            acceptBtn.addEventListener('click', function() {
                // Code pour accepter tous les cookies (à adapter selon vos besoins)
                // Ici, nous appelons simplement la fonction pour masquer la bannière
                setTimeout(hideCookieBanner, 1000); // 1000 ms = 1 seconde
            });
        
            // Écouteur d'événement pour le clic sur le bouton "Personnaliser"
            customizeBtn.addEventListener('click', function() {
                // Code pour personnaliser les paramètres de cookies (à adapter selon vos besoins)
                // Vous pouvez ajouter ici une logique pour afficher une fenêtre modale ou une page de paramètres de cookies
                console.log("Personnalisation des paramètres de cookies...");
            });
    
            
            for (const formcontrol of formcontrols) {
                formcontrol.addEventListener('focus', function () {
                    formcontrol.parentElement.parentElement.children[0].style.display = 'block';
                    formcontrol.parentElement.parentElement.children[0].style.color = 'rgb(30, 120, 255)';
                    
                });
    
                formcontrol.addEventListener('blur', function () {
                  if (!formcontrol.value.trim()) {
                    formcontrol.parentElement.parentElement.children[0].style.display = 'none';
                    formcontrol.style.border='1px solid #ccc';
                    formcontrol.parentElement.parentElement.children[0].style.color = 'lightgray';
                  }else{
                    formcontrol.parentElement.parentElement.children[0].style.display = 'block';
                    formcontrol.style.border='1px solid #ccc';
                    formcontrol.parentElement.parentElement.children[0].style.color = 'lightgray';
    
                  }
                });
            }

            function verifier5() {
                if (motdepasse.value.trim()=="") {
                    errors.item(4).innerHTML="Ce champ est requis !";
                    errors.item(4).style.color="red";
                    errors.item(4).style.display="block";
                }

                else if(motdepasse.value.length<8){
                    errors.item(4).innerHTML="Mot de passe trop court !";
                    errors.item(4).style.color="red";
                    errors.item(4).style.display="block";

                }

                else{
                    errors.item(4).style.display='none';
                }
            }

            function verifier6() {
                if (motdepasseretype.value.trim()=="") {
                    errors.item(5).innerHTML="Ce champ est requis !";
                    errors.item(5).style.color="red";
                    errors.item(5).style.display="block";
                }

                else if(motdepasseretype.value!=motdepasse.value){
                    errors.item(5).innerHTML="Mots de passe non identiques !";
                    errors.item(5).style.color="red";
                    errors.item(5).style.display="block";

                }

                else{
                    errors.item(5).style.display='none';
                }
            }
            
            function verifier1() {
                if (nom.value.trim()=="") {
                    errors.item(0).innerHTML="Ce champ est requis !";
                    errors.item(0).style.color="red";
                    errors.item(0).style.display="block";
                }

                else if(nom.value.length<3){
                    errors.item(0).innerHTML="Nom d'utilisateur trop court !";
                    errors.item(0).style.color="red";
                    errors.item(0).style.display="block";
                    nom.value=nom.value.toLowerCase();

                }

                else if(regexnom.test(nom.value.trim())==false){
                    errors.item(0).innerHTML="Caractere non pris en charge !";
                    errors.item(0).style.color="red";
                    errors.item(0).style.display="block";
                    nom.value=nom.value.toLowerCase();

                }

                else if(regexnom.test(nom.value.trim())==true){
                    errors.item(0).style.display='none';
                    nom.value=nom.value.toLowerCase();
                    
                    

                }
            }

            function verifier2() {
                if (prenom.value.trim()=="") {
                    errors.item(1).innerHTML="Ce champ est requis !";
                    errors.item(1).style.color="red";
                    errors.item(1).style.display="block";
                }

                else if(prenom.value.length<3){
                    errors.item(1).innerHTML="Nom d'utilisateur trop court !";
                    errors.item(1).style.color="red";
                    errors.item(1).style.display="block";
                    prenom.value=prenom.value.toLowerCase();

                }

                else if(regexprenom.test(prenom.value.trim())==false){
                    errors.item(1).innerHTML="Caractere non pris en charge !";
                    errors.item(1).style.color="red";
                    errors.item(1).style.display="block";
                    prenom.value=prenom.value.toLowerCase();

                }

                else if(regexnom.test(nom.value.trim())==true){
                    errors.item(1).style.display='none';
                    prenom.value=prenom.value.toLowerCase();
                    
                    

                }
            }

            function verifier3() {
                if (ville.value.trim()=="") {
                    errors.item(2).innerHTML="Ce champ est requis !";
                    errors.item(2).style.color="red";
                    errors.item(2).style.display="block";
                }

                else{
                    errors.item(2).style.display='none';

                }
            }

            function verifier4() {
                if (sexe.value.trim()=="") {
                    errors.item(3).innerHTML="Ce champ est requis !";
                    errors.item(3).style.color="red";
                    errors.item(3).style.display="block";
                }

                else{
                    errors.item(3).style.display='none';

                }
            }


            form.addEventListener("submit", function(e){

                if (/*pseudo.value.trim()=="" | pseudo.value.length<3 | regexpseudo.test(pseudo.value.trim())==false | */ nom.value.trim()=="" | regexnom.test(nom.value.trim())==false | ville.value.trim()=="" | sexe.value.trim()=="" |motdepasse.value.trim()=="" |motdepasse.value.length<8 |motdepasseretype.value.trim()=="" |motdepasseretype.value!=motdepasse.value){

                    e.preventDefault();
                    verifier1();
                    verifier2();
                    verifier3();
                    verifier4();
                    verifier5();
                    verifier6();

                        
                }
                else{

                }

            });

        </script>


        </body>
</html>
