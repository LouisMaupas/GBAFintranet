<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>connexion</title>
</head>
<body>
    <div id="container">
        <?php require './html/header.html'; ?>
        <div class="forms form-subscribe">
            <span class="title-one">Première connexion</span>
            <p>
                Comme c'est votre première connexion veuillez <span class="text-red">renseigner les informations</span> ci-dessous.
            </p>
            <form method="POST" action="" class="form">
                <p class="title-two">
                    <label for="id">Identifiant</label>
                    <br />
                    <input type="text" id="id-first-co">
                    <br />
                    <label for="last-name">Nom</label>
                    <br />
                    <input type="text" id="lname-first-co">
                    <br />
                    <label for="first-name">Prénom</label>
                    <br />
                    <input type="text" name="first-name" id="fname-first-co">
                    <br />
                    <label for="password">Mot de passe </label>
                    <br />
                    <input type="password" name="password" id="password-subscribe">
                    <br />
                    <label for="password-confirm">Confirmez le mot de passe </label>
                    <br />
                    <input type="password" name="password-two" id="password-subscribe-confirm">
                    <br />
                    <input type="submit" value="Envoyer" class="form-button-send">
                </p>
            </form>
        </div>
        <?php require './html/footer.php'; ?>
    </div>
</body>
</html>