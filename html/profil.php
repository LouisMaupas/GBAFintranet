<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Profil</title>
</head>
<body>
    <div id="container">
    <?php require 'C:\wamp64\www\projet3\html\header.html'; ?>
        <div id="profile-main">
            <div class="forms form-infos">
            <span class="title-one">Mes informations</span>
                <form method="POST" action="" class="">
                    <p class="title-two">
                        <br/>
                        <label for="last-name">Nom</label>
                        <br/>
                        <input type="text" id="last-name" name="last-name">
                        <br/>
                        <label for="first-name">Prénom</label>
                        <br/>
                        <input type="text" name="first-name" id="first-name">
                        <br/>
                        <label for="mail">E-mail</label>
                        <br/>
                        <input type="email" id="mail" name="mail"/>
                        <br/>
                        <label for="mail">Confirmez votre e-mail</label>
                        <br/>
                        <input type="email" name="mail-confirm" id="mail-confirm"/>
                        <br/>
                        <label for="password">Mot de passe </label>
                        <br/>
                        <input type="password" name="password" id="password">
                        <br/>
                        <label for="password-confirm">Confirmez le mot de passe </label>
                        <br/>
                        <input type="password" name="password-confirm" id="password-confirm">
                        <br/>
                        <label for="question-secret">Question secrète</label>
                        <br/>
                        <input type="text" name="question-secret" id="question-secret">
                        <br/>
                        <label for="answer-secret">Réponse secrète</label>
                        <br/>
                        <input type="text" name="answer-secret" id="answer-secret">
                        <br/>
                        <input type="submit" value="Envoyer" class="form-button-send">
                    </p>
                </form>
            </div>            
                <div class="forms form-activites">
                    <div id="form-activites-title">
                        <span class="title-one">Mes activités</span>
                    </div>
                    <div id="form-activites-content">
                        <div id="profile-main-activites-comments" class="forms">
                            Mes commentaires
                        </div>
                        <div class="profile-main-activites forms">
                            Mes likes
                        </div>
                    </div>
                </div>
            <div class="forms form-picture">
            <span class="title-one">Photo de profil</span>
                <form method="POST" action="" class="">
                    <p>La photo de profil doit être <br/> au format .jpeg et inférieur à 1mo</p>
                    <p class="title-two">
                        <img src="../ressources/photo-profil.png" alt="votre photo de profil">
                        <br/>
                        <label for="id">Sélectionnez votre photo de profil</label>
                        <br/><br/>
                        <input type="file" name="photo-profil" id="id">
                        <br/>
                        <input type="submit" value="Envoyer la photo" class="form-button-send">
                    </p>
                </form>
            </div>
        </div>  
        <?php require 'C:\wamp64\www\projet3\html\footer.php'; ?>
    </div>    
</body>
</html>