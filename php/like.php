<?php session_start(); 
if (!(isset($_SESSION['question']) && $_SESSION['question'] != '')) 
{
    header ("Location: login.php");
}
echo 'Session : ' . $_SESSION['username'] . "  actor cest " . $_GET['actoris'] . "   " . $_GET['vote'];

//connexion à la BDD
$bdd = new PDO('mysql:hostname=localhost;dbname=projettroisbdd','root','');

//vote systm
if(isset($_GET['vote'],$_GET['actoris']) AND !empty($_GET['vote']) AND !empty($_GET['actoris'])) {
    $getVote = (int) $_GET['vote'];
    $getActor = (int) $_GET['actoris'];
    $check = $bdd->prepare('SELECT id_vote FROM vote WHERE id_actor = ? AND id_user = ?');
    $check->execute(array($getVote,($_SESSION['id_user'])));
    // si c'est un like
       if($getVote == 1) {
        $insert = $bdd->prepare('INSERT INTO vote (id_actor, id_user) VALUES (?, ?)');
        $insert->execute(array($getActor, $_SESSION['id_user']));   
    // si c'est un dislike       
       } elseif($getVote == 2) {
        $insert = $bdd->prepare('INSERT INTO vote (id_actor, id_user) VALUES (?, ?)');
        $insert->execute(array($getActor, $_SESSION['id_user']));
        }
       /* header('Location: ../html/actorDSA.php');*/
       } else {
           exit('erreur');
        }

        
?>


