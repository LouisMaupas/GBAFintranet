<?php session_start(); 
ini_set('display_errors', 'Off');
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
    <link rel="stylesheet" media="all and (max-width: 650px)" href="../css/stylePhone.css" />
    <link rel="stylesheet" media="all and (min-width: 651px) and (max-width: 1223px)" href="../css/stylePad.css" />
    <link rel="stylesheet" media="all and (min-width: 1224px)" type="text/css" href="../css/style.css">
    <title>Connexion intranet GBAF</title>
</head>
<body>
    <div id="container">
    <?php require 'headerUnlock.php'; ?>
        <div id="index-main">
            <div class="forms form-login">
                <span class="title-one">Se connecter</span>
                <form method="POST" action="../php/transition.php" class="form">
                    <p>
                        <label for="username">Identifiant</label>
                        <br/>
                        <input type="text" name="username" id="username" required>
                        <br/>
                        <label for="password-login">Mot de passe </label>
                        <br/>
                        <input type="password" name="password-login" id="password-login" >
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