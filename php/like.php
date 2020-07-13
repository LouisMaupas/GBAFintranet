<?php session_start(); 
if (!(isset($_SESSION['question']) && $_SESSION['question'] != '')) 
{
    header ("Location: login.php");
}
echo 'Session : ' . $_SESSION['username'] . " LE ID de l'user est "  . $_SESSION['id_user'] . "  L'ACTEUR EST " . $_GET['actoris'] . " LE VOTE EST  " . $_GET['vote'];

//connexion à la BDD
$bdd = new PDO('mysql:hostname=localhost;dbname=projettroisbdd','root','');

//Recuperation du session id pour limiter le nombre de like par pers => plus utilisé a supr
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
           //condition pour limiter le nombre de like
           // on recupere 
           $checkLike = $bdd->prepare('SELECT COUNT(id_user) FROM vote WHERE id_actor = ? AND id_user = ?');
           $checkLike->execute(array($getActor, $sessionId));
           // la condition
           echo " <br/> le CheckLike est egale à : " . $checkLike->fetchColumn() . ". Si il est <=1 on va dans if pour ajouter+1 sinon on va dans else pour-1 <br/> ";
           if($checkLike->fetchColumn()<=1) {
               // on ajoute le like
            echo "On est dans la boucle if et checklike est egal à : " . $checkLike->fetchColumn() . " . Voila ";
            $insert = $bdd->prepare('INSERT INTO vote (id_actor, id_user, choice) VALUES (?, ?, ?)');
            $insert->bindValue(1, $getActor, PDO::PARAM_INT);
            $insert->bindValue(2, $_SESSION['id_user'], PDO::PARAM_INT);
            $insert->bindValue(3, $voteLike, PDO::PARAM_INT);   
            $insert->execute();
           } else {
            echo "On est dans la boucle else et le compte checkLike est de : " . $checkLike->fetchColumn() . " . Voila";
                // on supprime le like
                $del = $bdd->prepare('DELETE FROM vote WHERE id_actor = ? AND id_user = ?');
                $del->bindValue(1, $getActor, PDO::PARAM_INT);
                $del->bindValue(2, $_SESSION['id_user'], PDO::PARAM_INT);
                $del->execute();
           }
        // si c'est un dislike       
       } elseif($getVote == 2) {
           //condition pour limiter le nombre de like
           // on recupere 
           $checkLike = $bdd->prepare('SELECT id_user FROM vote WHERE id_actor = ? AND id_user = ?');
           $checkLike->execute(array($getActor, $sessionId));
           // la condition
           if($checkLike->fetchColumn()>=1) {
               // on supprime le dilike
               $del = $bdd->prepare('DELETE FROM vote WHERE id_actor = ? AND id_user = ?');
               $del->bindValue(1, $getActor, PDO::PARAM_INT);
               $del->bindValue(2, $_SESSION['id_user'], PDO::PARAM_INT);
               $del->execute();
           } else {
               // on ajoute le like
            $insert = $bdd->prepare('INSERT INTO vote (id_actor, id_user, choice) VALUES (?, ?, ?)');
            $insert->bindValue(1, $getActor, PDO::PARAM_INT);
            $insert->bindValue(2, $_SESSION['id_user'], PDO::PARAM_INT);
            $insert->bindValue(3, $voteDislike, PDO::PARAM_INT);   
            $insert->execute();
           }

        //éxécution de la requete préparée 
        $insertExecute = $insert->execute();  
        }
       /* header('Location: ../html/actorDSA.php');*/
       } else {
           exit('erreur');
        }
       
?>




