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
    <link rel="stylesheet" media="all and (max-width: 650px)" href="../css/stylePhone.css" />
    <link rel="stylesheet" media="all and (min-width: 651px) and (max-width: 1223px)" href="../css/stylePad.css" />
    <link rel="stylesheet" media="all and (min-width: 1224px)" type="text/css" href="../css/style.css">
    <title>Mot de passe oublié</title>
</head>
<body>
    <div id="container">
    <?php require 'headerUnlock.php'; ?>
        <div id="index-main">
            <div class="forms form-login">
            <span class="title-one">
                <?php echo "Bonjour " . $_SESSION['username'] ?>
                veuillez répondre à la question secrète afin de vérfier votre identité
            </span>
            <?php 
            echo "La question est : " . $_SESSION['question'] ?>
                <form method="POST" action="../php/newPassQuestionScript.php" class="form">
                    <p class="title-two">
                        <label for="answer"></label>
                        <br/>
                        <input type="password" name="answer" id="answer" required>
                        <input type="submit" value="Envoyer" class="form-button-send">
                    </p>                    
                </form>            
            </div>
        </div>  
       <?php require 'footer.php'; ?>
    </div>    
</body>
</html>