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
            <span class="title-one">Repondez à la question secrete pour recevoir votre nouveau mot de passe par mail</span>
            <?php 
            $question = "Quel est votre couleur pref ?";
            echo $question ?>
                <form method="POST" action="#" class="form">
                    <p class="title-two">
                        <label for="answer"></label>
                        <br/>
                        <input type="text" name="answer" id="answer" required>
                        <input type="submit" value="Envoyer" class="form-button-send">
                    </p>                    
                </form>            
            </div>
        </div>  
       <?php require 'footer.php'; ?>
    </div>    
</body>
</html>