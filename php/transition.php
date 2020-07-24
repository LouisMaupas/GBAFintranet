<?php
session_start(); 
// Stockage de l'ID et du MDP depuis login.php
$username = $_POST['username'];
$password = $_POST['password-login'];


// Connexion à la BDD
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur lors de la connexion à la base de données');
}

// Récupération de l'utilisateur
$req = $bdd->prepare('SELECT id_user, password, answer, fname, lname FROM account WHERE username = :username');
$req->execute(array(
    'username' => $username
));
$result = $req->fetch();
// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($password, $result['password']);

//Verification que l'user ait deja un profil COMPLET avec la réponse secrete
$verifyAnswerNull = $result['answer'];


if (!$result)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if($isPasswordCorrect)
    {
        if(empty($verifyAnswerNull)) {
            $_SESSION['id_user'] = $result['id_user'];
            header('Location: ../html/formFirstCo.php');
            exit;
        }
        else
        {
            session_start();
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['answer'] = $result['answer'];
            $_SESSION['lname'] = $result['lname'];
            $_SESSION['fname'] = $result['fname'];
            header('Location: ../html/home.php');
            exit;
        }
    }
    else
    {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}