<?php session_start(); 
if (!(isset($_SESSION['question']) && $_SESSION['question'] != '')) 
{
    header ("Location: login.php");
}
echo 'Session : ' . $_SESSION['username'] . " LE ID de l'user est "  . $_SESSION['id_user'] . "  L'ACTEUR EST " . $_GET['actoris'] . " LE VOTE EST  " . $_GET['vote'];

//connexion à la BDD
$bdd = new PDO('mysql:hostname=localhost;dbname=projettroisbdd','root','');

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
        $insert = $bdd->prepare('INSERT INTO vote (id_actor, id_user, choice) VALUES (?, ?, ?)');
        $insert->bindValue(1, $getActor, PDO::PARAM_INT);
        $insert->bindValue(2, $_SESSION['id_user'], PDO::PARAM_INT);
        $insert->bindValue(3, $voteLike, PDO::PARAM_INT);   
        //éxécution de la requete préparée 
        $insertExecute = $insert->execute();
    // si c'est un dislike       
       } elseif($getVote == 2) {
        $insert = $bdd->prepare('INSERT INTO vote (id_actor, id_user, choice) VALUES (?, ?, ?)');
        $insert->bindValue(1, $getActor, PDO::PARAM_INT);
        $insert->bindValue(2, $_SESSION['id_user'], PDO::PARAM_INT);
        $insert->bindValue(3, $voteDislike, PDO::PARAM_INT);   
        //éxécution de la requete préparée 
        $insertExecute = $insert->execute();   
    // si c'est un dislike        
        }
       /* header('Location: ../html/actorDSA.php');*/
       } else {
           exit('erreur');
        }
       
?>


