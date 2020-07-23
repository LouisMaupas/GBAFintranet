<?php session_start(); 
if (!(isset($_SESSION['answer']) && $_SESSION['answer'] != '')) 
{
    header ("Location: login.php");
}

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
$fname = $_POST['first-name'];
$lname = $_POST['last-name'];
$username = $_POST['username'];
$mail = $_POST['mail'];
$question = $_POST['question-secret'];
$answer = $_POST['answer-secret'];

//hachage du mdp
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT); 

    // mise à jour de la bdd
    $req = $bdd->prepare('UPDATE account SET 
    fname = :fname, 
    lname = :lname, 
    username = :username, 
    mail = :mail, 
    password = :password, 
    question = :question, 
    answer = :answer
    WHERE id_user = :id_user');
    $req->execute(array(
        'id_user' => $id_user,
        'fname' => $fname,
        'lname' => $lname,
        'username' => $username,
        'mail' => $mail,
        'password' => $password,
        'question' => $question,
        'answer' => $answer));
        header ("Location: ../html/login.php");
} else {
    echo "erreur critique";
}
?>