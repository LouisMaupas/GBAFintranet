<?php session_start(); 
//ini_set('display_errors', 'Off'); //PENSER A LE REACTIVER
if ((isset($_SESSION['answer']) && $_SESSION['answer'] != '')) 
{
    header ("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>connexion</title>
</head>
<body>
    <div id="container">
    <?php require 'header.php'; ?>
        <div id="index-main">
            <div class="forms form-login">
                <span class="title-one">Se connecter</span>
                <form method="POST" action="../php/transition.php" class="form">
                    <p class="title-two">
                        <label for="username">Identifiant</label>
                        <br/>
                        <input type="text" name="username" id="username" required>
                        <br/>
                        <label for="password-login">Mot de passe </label>
                        <br/>
                        <input type="password" name="password-login" id="password-login" required>
                        <br/>
                        <input type="checkbox" name="stay-connected" id="stay-connected" /> <label for="stay-connected">Rester connecté</label><br /> 
                        <input type="submit" value="Envoyer" class="form-button-send">
                    </p>                    
                </form>  
                <a href="newPass.php" target="blank">
                    Mot de passe oublié
                </a>                
            </div>
        </div>  
       <?php require 'footer.php'; ?>
    </div>    
</body>
</html>