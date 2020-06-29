<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>connexion</title>
</head>
<body>
    <div id="container">
    <?php require 'C:\wamp64\www\projet3\html\header.html'; ?>
        <div id="index-main">
            <div class="forms form-login">
                <span class="title-one">Se connecter</span>
                <form method="POST" action="./php/transition.php" class="form">
                    <p class="title-two">
                        <label for="id">Identifiant</label>
                        <br/>
                        <input type="text" name="id" id="id">
                        <br/>
                        <label for="password">Mot de passe </label>
                        <br/>
                        <input type="password" name="password" id="password-login">
                        <br/>
                        <input type="checkbox" name="stay-connected" id="stay-connected" /> <label for="stay-connected">Rester connecté</label><br /> 
                        <input type="submit" value="Envoyer" class="form-button-send">
                    </p>                    
                </form>                
            </div>
        </div>  
        <?php require 'C:\wamp64\www\projet3\html\footer.php'; ?>
    </div>    
</body>
</html>