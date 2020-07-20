<?php session_start(); 
if (!(isset($_SESSION['answer']) && $_SESSION['answer'] != '')) 
{
    header ("Location: login.php");
}
echo 'Session : ' . $_SESSION['username'];

// Connexion à la BDD
try
{
$bdd = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
}
catch (Exception $e)
{
die('Erreur lors de la connexion à la base de données');
}
?>
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
    <?php require 'header.php'; ?>
        <div id="actor-top">
            <div>
                <p>
                    <img src="../ressources/logo-dsa-france.png" alt="Logo de GBAF"/>
                </p>
            </div>
            <h2>Titre H2 : DSA FRANCE </h2>
            <a href="www.google.com">Lien</a>
            <p> Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.
                Nous accompagnons les entreprises dans les étapes clés de leur évolution.
                Notre philosophie : s’adapter à chaque entreprise.
                Nous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises
                </p>
        </div>
        <div id="actor-bot">
            <div id="actor-bot-info">
                <div id="comments-counter">
                    <?php 
                    // récupère le nombre d'apparition de l'id actor3
                    $count = $bdd->query('SELECT COUNT(id_actor) FROM post WHERE id_actor = 3'); 
                    // Puis on l'affiche
                    $count->execute();
                    $result = $count->fetchColumn();
                    echo ($result) ;        
                    ?>
                     COMMENTAIRES
                </div> <!-- PENSER A CHANGER LE NOM like-programs par un truc + parlatn + global-->
                <div id="like-programs">
                    <!-- penser a rempalcer selon l'acteur voulu par href="newCom.php?actoris=3"  -->
                    <a href="newCom.php?actoris=3" target="blank" id="add-comment-button"class="button" >
                        Nouveau commentaire
                    </a>
                    <div id="like-or-dislike">
                        <!-- penser a changer l'ID actor -->
                        <?php 
                        $likes = $bdd->prepare('SELECT id_vote FROM vote WHERE id_actor = 3 AND choice = 1');
                        $likes->execute();
                        $likes = $likes->rowCount();
                        $dislikes = $bdd->prepare('SELECT id_vote FROM vote WHERE id_actor = 3 AND choice = 2');
                        $dislikes->execute();
                        $dislikes = $dislikes->rowCount();
                        ?>
                        <span id="number-of-likes"> (<?= $likes ?>) </span>
                        <!-- penser a rempalcer selon l'acteur voulu -->
                        <a href="../php/like.php?vote=1&actoris=3"> <img src="#" alt="image like"/></a>
                        <span id="number-of-likes"> (<?= $dislikes ?>)  </span>
                        <a href="../php/like.php?vote=2&actoris=3"> <img src="#" alt="image dislike"/></a>
                    </div>
                </div>
            </div>

            <?php
            // Récupération des derniers messages dans la BDD
            $reponse = $bdd->query('SELECT post.id_user, post.date_add, post.post, account.username 
            FROM post 
            INNER JOIN account
            ON post.id_user = account.id_user
            WHERE id_actor = 3 
            ORDER BY date_add DESC 
            LIMIT 0, 10') or die(print_r($bdd->errorInfo()));
            
            // Affichage message 
            while ($datas = $reponse->fetch())
            {
                echo '<p><b>' . htmlspecialchars($datas['username']) . " <br/> " . '</b> ' . htmlspecialchars($datas['date_add']) . "  <br/> " . htmlspecialchars($datas['post']) . '</p>';
            }

            $reponse->closeCursor();
            ?>


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