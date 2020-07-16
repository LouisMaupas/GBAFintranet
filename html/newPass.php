<?php session_start(); 
echo 'Session : ' . $_SESSION['username'];
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
            <span class="title-one">Entrez votre identifiant</span>
                <form method="POST" action="../php/transition.php" class="form">
                    <p class="title-two">
                        <label for="username">Vous recevrez votre nouveau mot de passe dans votre boite mail </label>
                        <br/>
                        <input type="text" name="username" id="username" required>
                        <input type="submit" value="Envoyer" class="form-button-send">
                    </p>                    
                </form>            
            </div>
        </div>  
       <?php require 'footer.php'; ?>
    </div>    
</body>
</html>