<?php session_start(); 
if (!(isset($_SESSION['answer']) && $_SESSION['answer'] != '')) 
{
    header ("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all and (max-width: 650px)" href="../css/stylePhone.css" />
    <link rel="stylesheet" media="all and (min-width: 651px) and (max-width: 1223px)" href="../css/stylePad.css" />
    <link rel="stylesheet" media="all and (min-width: 1224px)" type="text/css" href="../css/style.css">
    <title>Profil</title>
</head>
<body>
    <div id="container">
    <?php require 'C:\wamp64\www\projet3\html\header.php'; ?>
        <div id="profile-main">
            <div class="forms form-infos">
            <span class="title-one">Mes informations</span>
                <form method="POST" action="../php/updateProfil.php">
                    <p class="title-two">
                        <br/>
                        <label for="last-name">Nom</label>
                        <br/>
                        <input type="text" id="last-name" name="last-name" required>
                        <br/>
                        <label for="first-name">Prénom</label>
                        <br/>
                        <input type="text" name="first-name" id="first-name" required>
                        <br/>
                        <label for="username">Nom d'utilisateur</label>
                        <br/>
                        <input type="text" id="username" name="username" required>
                        <br/>
                        <label for="mail">E-mail</label>
                        <br/>
                        <input type="email" id="mail" name="mail" required>
                        <br/>                      
                        <label for="password">Mot de passe </label>
                        <br/>
                        <input type="password" name="password" id="password" required>
                        <br/>
                        <label for="question-secret">Question secrète</label>
                        <br/>
                        <input type="text" name="question-secret" id="question-secret" required>
                        <br/>
                        <label for="answer-secret">Réponse secrète</label>
                        <br/>
                        <input type="text" name="answer-secret" id="answer-secret" required>
                        <br/>
                        <input type="submit" value="Envoyer" class="form-button-send">
                    </p>
                </form>
            </div>            
        </div>  
        <?php require 'C:\wamp64\www\projet3\html\footer.php'; ?>
    </div>    
</body>
</html>