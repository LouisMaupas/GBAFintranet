<?php
// connexoin bdd
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur lors de la connexion à la base de données');
}

//recuperation des infos associés à l'username
$username = $_POST['username'];
$log = $bdd->prepare('SELECT * from account where username = :username');
$log->execute(array('username' => $username));
$result = $log->fetch();

//creation d'une session avec la question et l'username stockés
session_start();
$_SESSION['question'] = $result['question'];
$_SESSION['username'] = $result['username'];
header('Location: ../html/newPassQuestion.php');
?>