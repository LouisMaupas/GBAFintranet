<?php session_start(); 
if (!(isset($_SESSION['question']) && $_SESSION['question'] != '')) 
{
    header ("Location: login.php");
}
//connexion à la BDD
    $bdd = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
//Recuperation du session id pour limiter le nombre de like par pers
$sessionId = $_SESSION['id_user'];

//vote systm
if(isset($_GET['vote'],$_GET['actoris']) AND !empty($_GET['vote']) AND !empty($_GET['actoris'])) {
    $getVote = (int) $_GET['vote'];
    $getActor = (int) $_GET['actoris'];
    $check = $bdd->prepare('SELECT id_vote FROM vote WHERE id_actor = ? AND id_user = ?');
    $check->execute(array($getVote,($_SESSION['id_user'])));
    //les varaibles des marqueurs à lier
    $voteLike = 1;
    $voteDislike = 2;
        // si c'est un like
       if($getVote == 1) {
           // on recupere les infos 
           $checkLike = $bdd->prepare('SELECT COUNT(id_user) AS user FROM vote WHERE id_actor = ? AND id_user = ?');
           $checkLike->execute(array($getActor, $sessionId));
           $donnees = $checkLike->fetch();
            $checkLike->closeCursor();
            $checkLike = $donnees['user'];
           // on verifie que user a pas deja like ou dislike
           if($checkLike == 0) {
               // on ajoute le like
            $insert = $bdd->prepare('INSERT INTO vote (id_actor, id_user, choice) VALUES (?, ?, ?)');
            $insert->bindValue(1, $getActor, PDO::PARAM_INT);
            $insert->bindValue(2, $_SESSION['id_user'], PDO::PARAM_INT);
            $insert->bindValue(3, $voteLike, PDO::PARAM_INT);   
            $insert->execute();
           } else {
                $del = $bdd->prepare('DELETE FROM vote WHERE id_actor = ? AND id_user = ?');
                $del->bindValue(1, $getActor, PDO::PARAM_INT);
                $del->bindValue(2, $_SESSION['id_user'], PDO::PARAM_INT);
                $del->execute();
           }
        // si c'est un dislike       
       } elseif($getVote == 2) {
           // on recupere les infos 
           $checkLike = $bdd->prepare('SELECT COUNT(id_user) AS user FROM vote WHERE id_actor = ? AND id_user = ?');
           $checkLike->execute(array($getActor, $sessionId));
           $donnees = $checkLike->fetch();
            $checkLike->closeCursor();
            $checkLike = $donnees['user'];
           // on verifie que user a pas deja like ou dislike 
           if($checkLike == 0) {
               // on ajoute le dislike
            $insert = $bdd->prepare('INSERT INTO vote (id_actor, id_user, choice) VALUES (?, ?, ?)');
            $insert->bindValue(1, $getActor, PDO::PARAM_INT);
            $insert->bindValue(2, $_SESSION['id_user'], PDO::PARAM_INT);
            $insert->bindValue(3, $voteDislike, PDO::PARAM_INT);   
            $insert->execute();
           } else {
                $del = $bdd->prepare('DELETE FROM vote WHERE id_actor = ? AND id_user = ?');
                $del->bindValue(1, $getActor, PDO::PARAM_INT);
                $del->bindValue(2, $_SESSION['id_user'], PDO::PARAM_INT);
                $del->execute();
           }
        }
       header('Location: ../html/login.php');
       } else {
           exit('erreur');
        };
