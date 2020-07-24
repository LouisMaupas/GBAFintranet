<?php session_start(); 
// Connexion à la BDD
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
}
    catch (Exception $e)
{
        die('Erreur lors de la connexion à la base de données');
}

if(!isset($_POST['submit'])){

// récupération de l'id user
$id_user = ($_SESSION['id_user']);
// recuperation des infos
$mail = $_POST['mail'];
$question = $_POST['question-secret'];
$answer = $_POST['answer-secret'];

//MAJ BDD
    $req = $bdd->prepare('UPDATE account SET 
    mail = :mail, 
    question = :question, 
    answer = :answer
    WHERE id_user = :id_user');
    $req->execute(array(
        'mail' => $mail,
        'question' => $question,
        'answer' => $answer,
        'id_user' => $id_user));
       header ("Location: ../html/login.php");
       
} else {
    echo "erreur critique";
}

?>