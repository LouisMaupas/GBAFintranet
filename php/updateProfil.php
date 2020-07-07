<?php session_start(); 
if (!(isset($_SESSION['question']) && $_SESSION['question'] != '')) 
{
    header ("Location: login.php");
}
echo 'Session : ' . $_SESSION['username'];

// Connexion à la BDD
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
}
    catch (Exception $e)
{
        die('Erreur lors de la connexion à la base de données');
}


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

    echo "$id_user + $fname + $lname + $username + $password + $question + $answer + $mail";


    // mise à jour de la bdd
    $req = $bdd->prepare('UPDATE account(fname, lname, username, mail, password, question, answer) 
    WHERE id_user = :id_user 
    VALUES (:fname, :lname, :username, :password, :question, :answer)');
    $req->execute(array(
        'id_user' => $id_user,
        'fname' => $fname,
        'lname' => $lname,
        'username' => $username,
        'password' => $password,
        'question' => $question,
        'answer' => $answer));

    echo ' ça marche';