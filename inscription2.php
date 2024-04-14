<?php
    session_start();
    
    
    if(empty($_SESSION['pseudo']) ) {
        header('Location: index.php'); 
        die();
    }

    
    

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>
            <link rel="stylesheet" type="text/javascript" src="jquery-3.7.0.js">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <title>Inscription</title>
        </head>
        <body style="display: flex;flex-direction: column;background-image: url('https://png.pngtree.com/background/20210715/original/pngtree-yellow-gradient-simplified-background-picture-image_1277937.jpg');">

        <div class="cookie-banner">
          <div class="cookie-content">
            <p>Nous utilisons des cookies pour vous offrir la meilleure expérience et assurer la sécurité de nos utilisateurs. Les cookies non essentiels que nous utilisons sont uniquement pour les références personnelles. Vous pouvez voir notre <a href="#" style="color: red;">Politique de Cookies</a> et notre <a href="#" style="color: red;">Avis de Confidentialité</a> ici.</p>
            <div class="cookie-buttons">
              <button class="cookie-button button-customize">PERSONNALISER</button>
              <button class="cookie-button button-accept">ACCEPTER TOUS</button>
            </div>
          </div>
        </div>
        
        <!--

        <div style="">
            <div style="display: flex;align-items: center;justify-content: center;font-size: 21px;font-weight: bold;padding: 2px;">Création de votre compte</div>
            <div style="display: flex;align-items: center;justify-content: center;font-size: 16px;font-weight: bold;padding: 2px;color: gray;">Etape 1 sur 3</div>
            
        </div>
        
        -->
        
        <div id="imagegame" style="display: flex; width: 200px;justify-content: space-between;position: absolute;top: 30px;left: 20px;">
                <img src="game1.jpg" style="height: 80px;width: 80px;">
                <img src="game2.jpg" style="height: 80px;width: 80px;">
            </div>
        
        <div style="display: flex;justify-content: flex-end;padding-right: 10px;padding-top: 20px;"><div style="height: 100px;width: 25%;font-size: 40px;">Open<br> Arena ®</div></div>
        
        <p style="font-size: 15px;padding: 0 80px 0 30px;font-weight: bold;margin: 0;">Création de votre compte</p>



        <div class="login-form" style="flex: 1;">
            
            
            <form onsubmit="return validerFormulaire()">

                <h2 class="text-center" style="display: none;">Inscription</h2>  
                <div  style="font-weight: bold;font-size: 20px;text-align: center;width: 100%;">Ajoutez une photo de profil</div>     
                <div class="form-group" style="display: flex;align-items: center;justify-content: center;margin-top: 20px;">
                    <img id="resultataffichage" style="height: 100px;width: 100px;border-radius: 50%;border: 1px solid lightgray;object-fit: cover;" src="">
                    <svg style="position: absolute;margin-left: 80px;margin-top: 48px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="blue" class="bi bi-plus-circle-fill" viewBox="0 0 16 16"> <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/> </svg>
                    <input style="width: 100px;position: absolute;height: 100px;left: 50%;transform: translateX(-50%);opacity: 0;" id="fileInput" name="fileInput" type="file" accept="image/png" onchange="affichageImage();">
                    
                </div>
                <span class="error" style="color: red;font-size: 14px;display: none;text-align: center;"></span><br>
    
                <div style="margin-top: 25px;" class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
                </div>

                

            </form>
            
            <button style="margin: 120px 0 30px 0;margin-left: auto;margin-right: auto;background-color: blue;color: white;border: none;" class="btn btn-primary btn-block">Ignorer</button>

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
                width: 100%;
                font-size: 15px;
            }
            .login-form {
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
                width: 90%;
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
            .login-form form {
                margin-bottom: 15px;
                background-color: rgba(250, 250, 250, 0.5);
                box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.3);
                padding: 20px 30px 20px 30px;
                border-radius: 10px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border: 1px solid lightgray;
                border-radius: 20px;
            }
            .btn {
                display: block;        
                font-size: 15px;
                font-weight: bold;
                width: 80%;
                margin-left: auto;
                margin-right: auto;
                border-radius: 15px;
                height: 40px;
                border: none;
                background-color: rgb(255, 60, 100, 1.0);
            }
            a{
                text-decoration: none;
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
            
             .cookie-banner { background-color: rgb(245, 245, 245); color: gray; padding: 5px; position: sticky; top: 0; width: 100%; box-shadow: 0 -2px 5px rgba(0,0,0,0.2); font-size: 13px; }
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
        </style>

        <script type="text/javascript" src="jquery-3.7.0.js"></script>

        <script type="text/javascript">
            const fileInput=document.querySelector("#fileInput");
            const resultataffichage=document.querySelector("#resultataffichage");
            const form=document.querySelector("form");
            const errors=document.querySelectorAll(".error");
            const boutons=document.querySelectorAll("button");
            
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
            
            function validerFormulaire() {
                // Ajoutez ici votre logique de validation
                // Retournez false pour empêcher la soumission du formulaire
                return false;
            }

            function verifier1() {

                if (fileInput.length ==0) {
                    errors.item(0).innerHTML="Aucune image n'a été ajoutée !";
                    errors.item(0).style.color="red";
                    errors.item(0).style.display="block";
                }

                else if(resultataffichage.getAttribute("src") ==0){
                    errors.item(0).innerHTML="Aucune image n'a été ajoutée !";
                    errors.item(0).style.color="red";
                    errors.item(0).style.display="block";
                }

                else{
                    errors.item(0).style.display='none';

                }
            }

            function affichageImage() {
                var fileInput=document.querySelector("#fileInput");
                var resultataffichage=document.querySelector("#resultataffichage");
                if (fileInput.files.length >0) {

                    const lecturefileInput= new FileReader();
                
                        lecturefileInput.onload=function(event){
                            document.querySelector("#resultataffichage").setAttribute("src",event.target.result);

                        };
                        lecturefileInput.readAsDataURL(fileInput.files[0]);

                    

                }
                if (fileInput.files.length ==0) {
                    errors.item(0).innerHTML="Aucune image n'a été ajoutée !";
                    errors.item(0).style.color="red";
                    errors.item(0).style.display="block";
                }

                else{
                    errors.item(0).style.display='none';

                }
            }

            boutons.item(2).addEventListener("click", function uploadImage(e) {
                var fileInput = document.getElementById("fileInput");
                if (fileInput.files.length>0){
                    var file = fileInput.files[0];
                    var formData = new FormData();
                    formData.append("image", file);

                    // Envoyer l'image au serveur via une requête AJAX
                    $.ajax({
                        type: "POST",
                        url: "photodeprofils/uploadphotodeprofil.php" ,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            window.location.href="index.php";
                            
                           
                            
                        },
                        error: function() {

                            
                        }
                    });
                }else{


                    e.preventDefault();
                    verifier1();
                        
                
                }
                
                
            });

            boutons.item(3).addEventListener("click", function uploadImagestandard(e) {
                
                    $.ajax({
                        type: "POST",
                        url: "photodeprofils/uploadphotodeprofilstandard.php" ,
                        success: function(response) {
                            window.location.href="index.php";
                            
                        },
                        error: function() {
                            
                        }
                    });
            
                
                
            });

            

            

        </script>

        </body>
</html>
