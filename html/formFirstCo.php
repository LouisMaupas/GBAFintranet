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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>connexion</title>
</head>
<body>
    <div id="container">
    <?php require 'C:\wamp64\www\projet3\html\header.php'; ?>
        <div class="forms form-subscribe">
            <span class="title-one">Première connexion</span>
            <p>
                Comme c'est votre première connexion veuillez <span class="text-red">renseigner les informations</span> ci-dessous.
            </p>
            <form method="POST" action="C:\wamp64\www\projet3\php\updateProfil.php" class="form">
                <p class="title-two">
                    <label for="mail">e-mail</label>
                    <br />
                    <input type="mail" id="mail">
                    <br />
                    <label for="question">Choisissez une question secrète qui vous sera demmandé en cas d'oubli de votre mot de passe</label>
                    <br />
                    <input type="text" id="question">
                    <br />
                    <label for="answer">Choisissez la réponse à votre question secrète </label>
                    <br />
                    <input type="text" name="answer" id="answer">
                    <input type="submit" value="Envoyer" class="form-button-send">
                </p>
            </form>
        </div>
        <?php require 'C:\wamp64\www\projet3\html\footer.php'; ?>
    </div>
</body>
</html>