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
    <title>Formation&Co</title>
</head>
<body>
    <div id="container">
    <?php require 'header.php'; ?>
        <div id="actor-top">
            <div>
                <p>
                    <img src="../ressources/logo-formation-co.png" alt="Logo de Formation&Co"/>
                </p>
            </div>
            <h2>Formation&co</h2>
            <a href="https://www.formationsco.com/.fr">Vers Formation&Co</a>
            <p>Formation&co est une association française présente sur tout le territoire.
                Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.<br/>
                Notre proposition : <br/>
                - Un financement jusqu’à 30 000€ ;<br/>
                - Un suivi personnalisé et gratuit ;<br/>
                - Une lutte acharnée contre les freins sociétaux et les stéréotypes.<br/>
                Le financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées.
                Vous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous."
            </p>
        </div>
        <div id="actor-bot">
            <div id="actor-bot-info">
                <div id="comments-counter">
                    <?php 
                    // récupère le nombre d'apparition de l'id actor3
                    $count = $bdd->query('SELECT COUNT(id_actor) FROM post WHERE id_actor = 1'); 
                    // Puis on l'affiche
                    $count->execute();
                    $result = $count->fetchColumn();
                    echo ($result) ;        
                    ?>
                     COMMENTAIRE(S)
                </div>
                <div id="like-programs">
                    <a href="newCom.php?actoris=1" target="_blank" id="add-comment-button" class="button" >                   
                        Nouveau commentaire
                    </a>
                    <div id="like-or-dislike">
                        <?php 
                        $likes = $bdd->prepare('SELECT id_vote FROM vote WHERE id_actor = 1 AND choice = 1');
                        $likes->execute();
                        $likes = $likes->rowCount();
                        $dislikes = $bdd->prepare('SELECT id_vote FROM vote WHERE id_actor = 1 AND choice = 2');
                        $dislikes->execute();
                        $dislikes = $dislikes->rowCount();
                        ?>
                        <span class="number-of-likes"> (<?= $likes ?>) </span>
                        <a href="../php/like.php?vote=1&actoris=1"> <img src="../ressources/like.png" alt="image like"/></a>
                        <span class="number-of-likes"> (<?= $dislikes ?>)  </span>
                        <a href="../php/like.php?vote=2&actoris=1"> <img src="../ressources/dislike.png" alt="image dislike"/></a>
                    </div>
                </div>
            </div>

            <?php
            // Récupération des derniers messages dans la BDD
            $reponse = $bdd->query('SELECT post.id_user, post.date_add, post.post, account.username 
            FROM post 
            INNER JOIN account
            ON post.id_user = account.id_user
            WHERE id_actor = 1 
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