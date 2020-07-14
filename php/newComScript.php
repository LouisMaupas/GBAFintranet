<?php session_start(); 
if (!(isset($_SESSION['question']) && $_SESSION['question'] != '')) 
{
    header ("Location: login.php");
}
echo 'Session : ' . $_SESSION['username'] . "actor cest" . $_GET['actoris'];

//connexion à la BDD
$objetPdo = new PDO('mysql:hostname=localhost;dbname=projettroisbdd','root','');


//////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<br/>post post on a " . $_POST['post'] . " avec get actoris on a  " . $_GET['actoris'] . "  c'est tout";
//vote systm
if(isset($_POST['post'],$_GET['actoris']) AND !empty($_GET['actoris'])) {
    $post = (int) $_POST['post'];
    $id_actor = (int) $_GET['actoris'];
    $id_user = $_SESSION['id_user'];
    $check = $objetPdo->prepare('SELECT COUNT(id_post) AS post FROM post WHERE id_actor = ? AND id_user = ?');
    $check->execute(array($id_actor, $id_user));
    $donnees = $check->fetch();
    $check->closeCursor();
    $check = $donnees['post'];
    echo "<br/> dans check on a" . $check . "et dans id_user on a "  . $id_user ; 
    // on verifie qu'il n'y ai pas déjà un commentaire
           if($check == 0) {
               // on l'ajoute
            $insert = $objetPdo->prepare('INSERT INTO post (id_user, id_actor, date_add, post) VALUES (?, ?, NOW() , ?)');
            $insert->bindValue(1, $id_user, PDO::PARAM_INT);
            $insert->bindValue(2, $id_actor, PDO::PARAM_INT);
            $insert->bindValue(3, $post, PDO::PARAM_INT);   
            $insert->execute();
           } else {
            $del = $objetPdo->prepare('DELETE post WHERE id_actor = ? AND id_user = ?');
            $del->bindValue(1, $id_actor, PDO::PARAM_INT);
            $del->bindValue(2, $id_user, PDO::PARAM_INT);
            $del->execute();
            $insert = $objetPdo->prepare('INSERT INTO post (id_user, id_actor, date_add, post) VALUES (?, ?, NOW() , ?)');
            $insert->bindValue(1, $id_user, PDO::PARAM_INT);
            $insert->bindValue(2, $id_actor, PDO::PARAM_INT);
            $insert->bindValue(3, $post, PDO::PARAM_INT);   
            $insert->execute();
           }
       // header('Location: ../html/actorDSA.php');
       } else {
           exit('erreur');
        }
         // Redirection du visiteur vers la page home
//header('Location: ../html/home.php');



//////////////////////////////////////////////////////////////////////////////////////////////////////
/*
//préparation de la requete d'insetion
$pdoStatement = $objetPdo->prepare('INSERT INTO post VALUES (NULL, :id_user, :id_actor, NOW(), :post )');


//éxécution de la requete préparée 
$insertIsOk = $pdoStatement->execute();



*/
?>