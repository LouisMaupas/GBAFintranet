<?php session_start(); 
if (!(isset($_SESSION['answer']) && $_SESSION['answer'] != '')) 
{
    header ("Location: login.php");
}

//connexion à la BDD
    $objetPdo = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
// Ajout de commenaire - recuperation des données
if(isset($_POST['post'],$_GET['actoris'])) {
    $post = $_POST['post'];
    $id_actor = $_GET['actoris'];
    $id_user = $_SESSION['id_user'];
    $check = $objetPdo->prepare('SELECT COUNT(id_post) AS post FROM post WHERE id_actor = ? AND id_user = ?');
    $check->execute(array($id_actor, $id_user));
    $donnees = $check->fetch();
    $check->closeCursor();
    $check = $donnees['post'];
    // on verifie qu'il n'y ait pas déjà un commentaire
           if($check >= 1) {
            $insert = $objetPdo->prepare('UPDATE post SET
            date_add = NOW(),
            post = :post          
            WHERE id_user = :id_user
            AND id_actor = :id_actor');
            $insert->execute(array(
                'id_user' => $id_user,
                'id_actor' => $id_actor,
                'post' => $post));
           } elseif($check == 0) {
     $insert = $objetPdo->prepare('INSERT INTO post (id_user, id_actor, date_add, post) VALUES (?, ?, NOW() , ?)');
     $insert->bindValue(1, $id_user, PDO::PARAM_INT);
     $insert->bindValue(2, $id_actor, PDO::PARAM_INT);
     $insert->bindValue(3, $post, PDO::PARAM_STR);   
     $insert->execute();
           }
       header('Location: ../html/home.php');
       } else {
           echo "erreur";
        }
         // Redirection du visiteur vers la page home
header('Location: ../html/home.php');
?>