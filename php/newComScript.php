<?php session_start(); 
if (!(isset($_SESSION['question']) && $_SESSION['question'] != '')) 
{
    header ("Location: login.php");
}
echo 'Session : ' . $_SESSION['username'] . "actor cest" . $_GET['actoris'];

//connexion à la BDD
$objetPdo = new PDO('mysql:hostname=localhost;dbname=projettroisbdd','root','');

//préparation de la requete d'insetion
$pdoStatement = $objetPdo->prepare('INSERT INTO post VALUES (NULL, :id_user, :id_actor, NOW(), :post )');

// on récupère les infos
$id_user = $_GET;
$id_actor = $_GET['actoris'];
$post = $_POST['post'];

// on lie les marqueurs
$pdoStatement->bindValue(':id_user', $id_user, PDO::PARAM_INT);
$pdoStatement->bindValue(':id_actor', $id_actor, PDO::PARAM_INT);
$pdoStatement->bindValue(':post', $post, PDO::PARAM_STR);

//éxécution de la requete préparée 
$insertIsOk = $pdoStatement->execute();

 // Redirection du visiteur vers la page home
header('Location: ../html/home.php');
?>