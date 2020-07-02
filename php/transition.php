<?php
session_start(); 

// Stockage de l'ID et du MDP depuis login.php
$username = $_POST['username'];
$motDePasse = $_POST['password-login'];

/*echo $identifiant + $motDePasse; */

// Connexion à la BDD
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Récupération de l'utilisateur
$req = $bdd->prepare('SELECT id_user, password, question FROM account WHERE username = :username');
$req->execute(array(
    'username' => $username
));
$result = $req->fetch();
// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($motDePasse, $result['password']);


//Voyons si l'user a deja un profil COMPLET enregistré dans la BDD, pour ça on vérifie si question secrete associé à l'user posté est pas vide
$verifyQuestionNull = $result['question'];
// echo $verifyQuestionNull; renvoi bien "couleur" pour ADRPEL

if (!$result)
{
    echo 'Mauvais identifiant ou mot de passe (USERNAME INTROUVABLE) !';
}
else
{
    if($isPasswordCorrect)
    {
        if(empty($verifyQuestionNull)) {
            header('Location: ../html/formFirstCo.php');
        }
        else
        {
            session_start();
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['username'] = $username;
            header('Location: ../html/home.php');
            exit;
        }
    }
    else
    {
        echo 'Mauvais identifiant ou mot de passe ! (MOT DE PASSE INCORRECTE)';
    }
}