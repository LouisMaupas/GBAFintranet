<?php session_start(); 
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
    <?php require 'headerUnlock.php'; ?>
        <div id="index-main">
            <div class="forms form-login">
            <span class="title-one">Entrez votre identifiant</span>
                <form method="POST" action="../php/newPassScript.php" class="form">
                    <p class="title-two">
                        <label for="username"></label>
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