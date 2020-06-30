<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>page acteur</title>
</head>
<body>
    <div id="container">
    <?php require 'header.html'; ?>
        <div id="actor-top">
            <div>
                <p>
                    <img src="../ressources/logo-dsa-france.png" alt="Logo de GBAF"/>
                </p>
            </div>
            <h2>Titre H2 : DSA FRANCE </h2>
            <a href="www.google.com">Lien</a>
            <p>contenu textuel : Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.
                Nous accompagnons les entreprises dans les étapes clés de leur évolution.
                Notre philosophie : s’adapter à chaque entreprise.
                Nous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises
                </p>
        </div>

        <div id="actor-bot">
            <div id="actor-bot-info">
                <div id="comments-counter">
                    X COMMENTAIRES
                </div>
                <div id="like-programs">
                    <button id="add-comment-button" class="button">Nouveau <br/> commentaire</button>
                    <div id="like-or-dislike">
                        <span id="number-of-likes"> 0 </span>
                        <input class="button-like" type="button" name="like" value="like">
                        <input class="button-dislike" type="button" name="like" value="dislike">

                    </div>
                </div>
            </div>
            <div id="actor-bot-coms">
                <div class="com">
                    Prénom<br/>
                    Date<br/>
                    Texte 
                </div>
                <div class="com">
                    Prénom<br/>
                    Date<br/>
                    Texte 
                </div>
                <div class="com">
                    Prénom<br/>
                    Date<br/>
                    Texte 
                </div>
            </div>
        </div>
        <?php require 'C:\wamp64\www\projet3\html\footer.php'; ?>
    </div>
</body>
</html>