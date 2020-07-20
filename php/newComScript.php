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
if(isset($_POST['post'],$_GET['actoris'])) {
    $post = $_POST['post'];
    $id_actor = $_GET['actoris'];
    $id_user = $_SESSION['id_user'];
    $check = $objetPdo->prepare('SELECT COUNT(id_post) AS post FROM post WHERE id_actor = ? AND id_user = ?');
    $check->execute(array($id_actor, $id_user));
    $donnees = $check->fetch();
    $check->closeCursor();
    $check = $donnees['post'];
    echo "<br/> dans check = donnees['post'] on a  " . $check . "  et dans post on a "  . $post ; 
    // on verifie qu'il n'y ai pas déjà un commentaire
    var_dump($check);
           if($check >= 1) { //du plus complexe au général
            echo "nous sommes dans le cas 1";
            $insert = $objetPdo->prepare('UPDATE post 
            SET
            date_add = NOW(),
            post = :post 
            VALUES (?, ?, NOW() , ?)
            WHERE id_user = :id_user
            AND id_actor = :id_actor');
            $insert->execute(array(
                'id_user' => $id_user,
                'id_actor' => $id_actor,
                'post' => $post));
           } elseif($check == 0) { //update
            // prevenir usager qu'il a deja laissé un com
     echo "nous sommes dans le cas 2"; 
     $insert = $objetPdo->prepare('INSERT INTO post (id_user, id_actor, date_add, post) VALUES (?, ?, NOW() , ?)');
     $insert->bindValue(1, $id_user, PDO::PARAM_INT);
     $insert->bindValue(2, $id_actor, PDO::PARAM_INT);
     $insert->bindValue(3, $post, PDO::PARAM_STR);   
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