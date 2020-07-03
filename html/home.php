<?php session_start(); 
if (!(isset($_SESSION['question']) && $_SESSION['question'] != '')) 
{
    header ("Location: login.php");
}
echo 'Session : ' . $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Accueil</title>
</head>
<body>
    <div id="container">
    <?php require 'C:\wamp64\www\projet3\html\header.html'; ?>
        <!-- MAIN 1/2-->
        <div id="home-presentation">
            <div>
                <h1>
                    Groupement Banque-Assurance Français
                </h1>
                <p id="home-presentation-text">
                    Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
                    les axes de la réglementation financière française. Sa mission est de promouvoir
                    l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
                    pouvoirs publics.
                </p>
            </div>
            <div>
                <img src="../ressources/illustration.jpg" alt="illustration de GBAF" />
            </div>
        </div>
        <!-- MAIN 1/2-->
        <!-- MAIN 2/2-->
        <section id="home-actors">
            <div>
                <h2>Les produits et services bancaires sont nombreux et très variés.
                    Afin de renseigner au mieux les clients, voici une base de données pour chercher des informations de
                    manière fiable et rapide ou pour donner son avis sur les partenaires et acteurs, produits et services du groupe.                   
                    Chaque salarié peut ainsi poster un commentaire et donner son avis.
                    </h2>
            </div>
            <!--OUTIL DE TRI DES ACTEURS-->
                <label for="actor-select">Trier par :</label>
                    <select name="actor" id="actor-select">
                        <option value="">-- Veuillez choisir une option --</option>
                        <option value="most-comment">Le plus de commentaires en premier</option>
                        <option value="most-like">Le plus de likes en premier</option>
                        <option value="less-comment">Le moins de commentaires en premier</option>
                        <option value="less-like">Le moins de likes en premier</option>
                        <option value="alphabetical">Par ordre alphabétique</option>
                        <option value="alphabetical-reverse">Par ordre alphabétique inversé</option>
                    </select>
            <div id="home-list-actors">
                <div class="home-actor">
                    <div class="home-actor-logo-plus-text">
                        <img class="home-actor-logo" src="../ressources/logo-formation-co.png" alt="logo F&CO"/>
                        <div class="home-actor-text">
                            <h3>
                                Formation&co est une association française présente sur tout le territoire.<br/>
                                Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.
                            </h3>
                            <a href="https://www.formationsco.com/">formationsco.com</a>
                        </div>   
                    </div>
                    <div class="home-actor-button ">
                        <a href="C:\wamp64\www\projet3\html\actorDSA.php">
                            Lire la suite
                        </a>
                    </div>
                </div>
                <div class="home-actor">
                    <div class="home-actor-logo-plus-text">
                        <img class="home-actor-logo" src="../ressources/logo-protect-people.png" alt="logo Protectpeople"/>
                        <div class="home-actor-text">
                            <h3>
                                Protectpeople finance la solidarité nationale. <br/>
                                Nous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.
                            </h3>
                            <a href="https://www.un.org/en/sections/what-we-do/protect-human-rights/">Protectpeople.com</a>
                        </div>   
                    </div>
                    <div class="home-actor-button ">
                        <a href="C:\wamp64\www\projet3\html\actorDSA.php">
                            Lire la suite
                        </a>
                    </div>
                </div>



                <div class="home-actor">
                    <div class="home-actor-logo-plus-text">
                        <img class="home-actor-logo" src="../ressources/logo-dsa-france.png" alt="logo DSAFrance"/>
                        <div class="home-actor-text">
                            <h3>
                                Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales. <br/>
                                Nous accompagnons les entreprises dans les étapes clés de leur évolution.
                            </h3>
                            <a href="http://www.dsafrance.fr/">DSAFrance.fr</a>
                        </div>   
                    </div>
                    <div class="home-actor-button ">
                        <a href="C:\wamp64\www\projet3\html\actorDSA.php">
                            Lire la suite
                        </a>
                    </div>
                </div>

                <div class="home-actor">
                    <div class="home-actor-logo-plus-text">
                        <img class="home-actor-logo" src="../ressources/logo-cde.png" alt="logo CDE"/>
                        <div class="home-actor-text">
                            <h3>
                                La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. 
                            </h3>
                            <a href="https://www.cci.fr/web/auto-entrepreneur">CDE.fr</a>
                        </div>   
                    </div>
                    <div class="home-actor-button ">
                        <a href="C:\wamp64\www\projet3\html\actorDSA.php">
                            Lire la suite
                        </a>
                    </div>
                </div> 
             </div>     
        </section>
        <!-- MAIN 2/2-->
        <?php require 'C:\wamp64\www\projet3\html\footer.php'; ?>
    </div>
</body>
</html>