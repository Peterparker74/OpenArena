<!DOCTYPE html>
    <html lang="en" style="height: 100%;width: 100%;margin: 0;padding: 0;">
        <head>
             
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
            <meta name="author" content="NoS1gnal"/>
            <link rel="stylesheet" type="text/javascript" src="jquery-3.7.0.js">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&family=Merriweather&family=Roboto:ital,wght@0,700;1,300&display=swap" rel="stylesheet">
            <title>Connexion</title>
        </head>
        <body id="swup" class="transition-fade" style="height: 100%;width: 100%;position: relative;margin: 0;padding: 0;background-image: url('https://png.pngtree.com/background/20210715/original/pngtree-yellow-gradient-simplified-background-picture-image_1277937.jpg');">

            <div id="imagegame" style="display: flex; width: 200px;justify-content: space-between;position: absolute;top: 30px;left: 20px;">
                <img src="game1.jpg" style="height: 80px;width: 80px;">
                <img src="game2.jpg" style="height: 80px;width: 80px;">
            </div>
        
        <div style="display: flex;justify-content: flex-end;padding-right: 10px;padding-top: 20px;"><div style="height: 100px;width: 25%;font-size: 40px;">Open<br> Arena ®</div></div>
        
        <p style="font-size: 28px;padding: 0 80px 0 30px;">Rejoignez et suivez des parties épiques</p>
        
        <p style="font-size: 15px;padding: 0 80px 20px 30px;font-weight: bold;margin: 0;">Connectez-vous</p>

        <!--

                <div class="text-center" style="display: flex;justify-content: center;height: 20%;align-items: center;">
                  <img src="user.png"
                    style="width: 80px;height: 80px;object-fit: cover;border: 1px solid lightgray;border-radius: 50%;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1"></h4>

                </div>
        -->

                <section class="h-100 gradient-form">
                  <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                      <div class="col-xl-10">
                        <div class="card rounded-3 text-black">
                          <div class="row g-0">
                            <div class="col-lg-6">
                              <div class="card-body p-md-5 mx-md-4">

                                <form method="POST" action="connexion.php" style="display: flex;flex-direction: column;">

                                  <?php 
                                    if(isset($_GET['login_err']))
                                    {
                                        $err = htmlspecialchars($_GET['login_err']);

                                        switch($err)
                                        {
                                            case 'password':
                                            ?>
                                                <div class="alert-danger">
                                                    <i class="fa-solid fa-circle-exclamation" style="color: red;"></i>
                                                    <strong>Mot de passe invalide</strong><br>
                                                    <span style="color:black;font-size: 14px;">Les identifiants entrés sont incorrects. Veuillez vérifier et réessayer.</span>
                                                </div>
                                            <?php
                                            break;

                                            case 'email':
                                            ?>
                                                <div class="alert-danger">
                                                    <i class="fa-solid fa-circle-exclamation" style="color: red;"></i>
                                                    <strong>Adresse mail incorrecte</strong>
                                                    <span style="color:black;font-size: 14px;">Les identifiants entrés sont incorrects. Veuillez vérifier et réessayer.</span>
                                                </div>
                                            <?php
                                            break;

                                            case 'already':
                                            ?>
                                                <div class="alert-danger">
                                                    <i class="fa-solid fa-circle-exclamation" style="color: red;"></i>
                                                    <strong>Compte inexistant</strong><br>
                                                    <span style="color:black;font-size: 14px;">Les identifiants entrés sont incorrects. Veuillez vérifier et réessayer.</span>
                                                </div>
                                            <?php
                                            break;
                                        }
                                    }
                                  ?> 
                 
                                <div style="position: relative;">
                                  
                                    <label class="form-label" for="form2Example11">Pseudo ou Adresse e-mail</label>
                                    <input id="pseudo" name="pseudo" class="form-control"
                                      placeholder="Pseudo ou adresse email" />
                                    
                                  
                                </div>

                                <div style="position: relative;">
                                  
                                    <label class="form-label" for="form2Example22">Mot de passe</label>
                                    <input type="password" id="motdepasse" name="motdepasse" class="form-control" placeholder="Mot de passe" />
                                    
                                  
                                </div>  

                                  <div class="text-center pt-1 mb-5 pb-1">
                                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" style="width: 90%;" type="submit">Se connecter</button>
                                    
                                  </div>

                                  <div class="text-container">
                                      <a href="#" >Mot de passe oublié ?</a>
                                      <span> · </span>
                                      <a href="inscription.php">Inscrivez-vous sur OpenArena</a>
                                  </div>
                                  
                                  <button class="google-btn">
                                      <div class="google-icon-wrapper">
                                        <img style="margin-left: 10px;" src="data:image/png;base64,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" class="google-icon"/>
                                      </div>
                                      SE CONNECTER AVEC GOOGLE
                                  </button>
                                                     
                                  </div>

                                </form>

                              </div>
                            </div>
                            
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                
                <div id="bloc">
        			<div class="blocfooter">
        				<ul>
        				    <a href="../politiquecookies/index.php" style="font-weight: bold;"><li>©2023 Delivery</li><a>
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
        					<a href=""><li style="margin-top: 50px;">Sécurité Delivery & Centre de Transparence</li></a>
        				</ul>
        			</div>
        		</div>

        <style>
        
        .transition-fade{
        	transition: 0.4s;
        	transform: translateX(0);
        }
        
        html.is-animating .transition-fade{
        	transform: translateX(-100%);
        }
        
            .titreconnexion {
                color: blue;
            }
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
                padding: 2px 13px ;
                margin-left: 25px;
                margin-bottom: 25px;

            }

            .form-outline{
               
                width: 85%;
                transform: translateX(-5px);
                margin-right: auto;
                margin-left: auto;
            }
    
            .login-form {
                margin-left: auto;
                margin-right: auto;
                width: 90%;
                margin-left: auto;
                margin-right: auto;
                position: absolute;
                bottom: 50px;
                left: 50%;
                transform: translateX(-50%);
            }
            .alert-danger{
                margin-bottom: 10px;
                width: 90%;
                margin-left: auto;
                margin-right: auto;
                color: blue;
                background-color: rgba(255, 160, 0, 0.3);
                height: 60px;
                border-radius: 8px;
                padding: 5px;

            }
            .login-form form {
                margin-bottom: 15px;
                background-color: rgba(250, 250, 250, 0.5);
                padding: 0 30px 0 30px;
            }
            .login-form h2 {
               ing-l
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 10px;
                border: 1px solid lightgray;
            }
            .form-control, .btn2 {
                min-height: 45px;
                border-radius: 10px;
                border: 1px solid lightgray;
            }
            .btn {
                display: block;        
                font-size: 15px;
                font-weight: bold;
                width: 80%;
                margin-left: auto;
                margin-right: auto;
                border-radius: 50px;
                height: 38px;
                border: none;
                color: white;
                background-color: lightgray;

            }
            .btn2 {
                display: block;        
                font-size: 15px;
                font-weight: bold;
                width: 80%;
                margin-left: auto;
                margin-right: auto;
                border-radius: 20px;
                height: 38px;
                border: 1px solid red;
                color: white;
                background-color: red;

            }
            .titresinscrire {
                
                font-size: 18px;
                font-weight: bold;
                text-align: center;
                width: 50%;
                border-right: 1px solid lightgray;
                border-left: 1px solid lightgray;
            }
            .titresmdpoublié {
           
                font-size: 18px;
                font-weight: bold;
                text-align: center;
                width: 50%;
            }
            .titresinscrire a {
                text-decoration: none;
            }
            .titresmdpoublié a {
                text-decoration: none;
            }
            
            input{
                outline: none;
                
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
                font-weight: 600;
             
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
            
            .text-container {
                font-family: Arial, sans-serif;
                color: #0056b3;
                text-align: center;
                padding: 20px 0 20px 0;
            }
            .text-container a {
                font-size: 13px;
                color: rgb(255, 50, 0);
                text-decoration: none;
                font-weight: 500;
            }
            .text-container a:hover {
                text-decoration: underline;
            }
            
            .google-btn {
                position: relative;
                background-color: rgb(0, 103, 255);
                margin-top: 30px;
                margin-bottom: 30px;
                color: white;
                width: 80%;
                padding: 0px 20px;
                border: none;
                border-radius: 35px;
                font-family: Arial, sans-serif;
                font-size: 14px;
                margin-left: auto;
                margin-right: auto;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 2px 4px rgba(0,0,0,0.2);
                padding: 10px;
              }
              .google-icon-wrapper {
                position: absolute;
                left: 3px;
                background-color: white;
                border-top-left-radius: 35px;
	            border-bottom-left-radius: 35px;
                margin-right: 10px;
                
              }
              .google-icon {
                display: block;
                width: 30px;
                height: 30px;
               
               
              }
              .google-btn:hover {
                background-color: #357AE8;
              }
              
              .cookie-banner { background-color: rgb(245, 245, 245); color: gray; padding: 5px; position: sticky; top: 0; width: 100%; box-shadow: 0 -2px 5px rgba(0,0,0,0.2); font-size: 13px;z-index: 1000; }
          .cookie-content { max-width: 1000px; margin: auto; text-align: center; }
          .cookie-buttons { margin-top: 2px; display: flex; justify-content: end;}
          .cookie-button { background-color: rgb(245, 245, 245); padding: 10px 20px; border: none; cursor: pointer; font-weight: 500;font-size: 14px; }
          .button-accept { color: red; }
          .button-customize { color: red; }
          
          .cookie-banner.hidden {
                animation: slide-up 50ms forwards;
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
              
              ::-webkit-scrollbar{
            	display: none;
              }
             
             

        
            
        </style>
        
        <script>
            var formcontrols = document.querySelectorAll('.form-control');
            
            for (const formcontrol of formcontrols) {
                formcontrol.addEventListener('focus', function () {
                    formcontrol.parentElement.children[0].style.display = 'block';
                    formcontrol.parentElement.children[0].style.color = 'rgb(30, 120, 255)';
                    
                });
    
                formcontrol.addEventListener('blur', function () {
                  if (!formcontrol.value.trim()) {
                    formcontrol.parentElement.children[0].style.display = 'none';
                    formcontrol.style.border='1px solid #ccc';
                    formcontrol.parentElement.children[0].style.color = 'lightgray';
                  }else{
                    formcontrol.parentElement.children[0].style.display = 'block';
                    formcontrol.style.border='1px solid #ccc';
                    formcontrol.parentElement.children[0].style.color = 'lightgray';
    
                  }
                });
            }
            
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
                setTimeout(hideCookieBanner, 50); // 1000 ms = 1 seconde
            });
        
            // Écouteur d'événement pour le clic sur le bouton "Personnaliser"
            customizeBtn.addEventListener('click', function() {
                // Code pour personnaliser les paramètres de cookies (à adapter selon vos besoins)
                // Vous pouvez ajouter ici une logique pour afficher une fenêtre modale ou une page de paramètres de cookies
                console.log("Personnalisation des paramètres de cookies...");
            });
        </script>
        </body>
</html>