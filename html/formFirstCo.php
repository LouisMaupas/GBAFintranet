<?php session_start();
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
    <?php require 'C:\wamp64\www\projet3\html\headerUnlock.php'; ?>
        <div class="forms form-login">
            <span class="title-one">Première connexion</span>
                Comme c'est votre première connexion veuillez <span class="text-red">renseigner les informations</span> ci-dessous.
                <br/>
            <form method="POST" action="../php/firstCoFormScript.php" class="form">
                <p class="title-two">
                    <label for="mail">e-mail</label>
                    <br />
                    <input type="mail" id="mail" name="mail">
                    <br />
                    <label for="question-secret">Choisissez une question secrète qui vous sera demmandé en cas d'oubli de votre mot de passe</label>
                    <br />
                    <input type="text" id="question-secret" name="question-secret">
                    <br />
                    <label for="answer-secret">Choisissez la réponse à votre question secrète </label>
                    <br />
                    <input type="password" name="answer-secret" id="answer-secret" name="answer-secret" required>
                    <br/>
                    <input type="submit" value="Envoyer" class="form-button-send">
                </p>
            </form>
        </div>
        <?php require 'C:\wamp64\www\projet3\html\footer.php'; ?>
    </div>
</body>
</html>