<?php session_start(); 
if (!(isset($_SESSION['answer']) && $_SESSION['answer'] != '')) 
{
    header ("Location: login.php");
}

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
    <link rel="stylesheet" media="all and (max-width: 650px)" href="../css/stylePhone.css" />
    <link rel="stylesheet" media="all and (min-width: 651px) and (max-width: 1223px)" href="../css/stylePad.css" />
    <link rel="stylesheet" media="all and (min-width: 1224px)" type="text/css" href="../css/style.css">
    <title>Protect people</title>
</head>
<body>
    <div id="container">
    <?php require 'header.php'; ?>
        <div id="actor-top">
            <div>
                <p>
                    <img src="../ressources/logo-protect-people.png" alt="Logo de Protect people"/>
                </p>
            </div>
            <h2>Protect people</h2>
            <a href="https://www.un.org/en/sections/what-we-do/protect-human-rights/">Vers Protect people</a>
            <p> Protectpeople finance la solidarité nationale.
                Nous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.

                Chez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.
                Proectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.
                Nous garantissons un accès aux soins et une retraite.
                Chaque année, nous collectons et répartissons 300 milliards d’euros.
                Notre mission est double :
                sociale : nous garantissons la fiabilité des données sociales ;
                économique : nous apportons une contribution aux activités économiques.
            </p>
        </div>
        <div id="actor-bot">
            <div id="actor-bot-info">
                <div id="comments-counter">
                    <?php 
                    // récupère le nombre d'apparition de l'id actor
                    $count = $bdd->query('SELECT COUNT(id_actor) FROM post WHERE id_actor = 2'); 
                    // Puis on l'affiche
                    $count->execute();
                    $result = $count->fetchColumn();
                    echo ($result) ;        
                    ?>
                     COMMENTAIRE(S)
                </div>
                <div id="like-programs">
                    <a href="newCom.php?actoris=2" target="_blank" id="add-comment-button" class="button" >                   
                        Nouveau commentaire
                    </a>
                    <div id="like-or-dislike">
                        <?php 
                        $likes = $bdd->prepare('SELECT id_vote FROM vote WHERE id_actor = 2 AND choice = 1');
                        $likes->execute();
                        $likes = $likes->rowCount();
                        $dislikes = $bdd->prepare('SELECT id_vote FROM vote WHERE id_actor = 2 AND choice = 2');
                        $dislikes->execute();
                        $dislikes = $dislikes->rowCount();
                        ?>
                        <span class="number-of-likes"> (<?= $likes ?>) </span>
                        <a href="../php/like.php?vote=1&actoris=2"> <img src="../ressources/like.png" alt="image like"/></a>
                        <span class="number-of-likes"> (<?= $dislikes ?>)  </span>
                        <a href="../php/like.php?vote=2&actoris=2"> <img src="../ressources/dislike.png" alt="image dislike"/></a>
                    </div>
                </div>
            </div>

            <?php
            // Récupération des derniers messages dans la BDD
            $reponse = $bdd->query('SELECT post.id_user, post.date_add, post.post, account.username 
            FROM post 
            INNER JOIN account
            ON post.id_user = account.id_user
            WHERE id_actor = 2
            ORDER BY date_add DESC 
            LIMIT 0, 10') or die(print_r($bdd->errorInfo()));
                       
            // Affichage message 
            ?> 
            <div id="actor-bot-coms">
                <?php          
                while ($datas = $reponse->fetch())
                {
                    echo '
                        <div class="com">
                            <p class="p-com">
                                <b>' . 
                                htmlspecialchars($datas['username']) . 
                                "</b>" . 
                                '<br/>' . 
                                htmlspecialchars($datas['date_add']) . 
                                "<br/>" . 
                                htmlspecialchars($datas['post']) . 
                            '</p>
                        </div>';
                }
                $reponse->closeCursor();
                ?>
            </div>
        </div>
        <?php require 'C:\wamp64\www\projet3\html\footer.php'; ?>
    </div>
</body>
</html>