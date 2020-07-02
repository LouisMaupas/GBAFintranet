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
$resultat = $req->fetch();
// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($motDePasse, $resultat['password']);


//Voyons si l'user a deja un profil COMPLET enregistré dans la BDD, pour ça on vérifie si question secrete associé à l'user posté est pas vide
$verifyQuestionNull = $resultat['question'];
// echo $verifyQuestionNull; renvoi bien "couleur" pour ADRPEL



if (!$resultat)
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
            $_SESSION['id_user'] = $resultat['id_user'];
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



/* 
if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id_user'] = $resultat['id_user'];
        $_SESSION['username'] = $username;
        header('Location: ../html/home.php');
        exit;
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}

*/



// système de redirection depuis l'index vers home / formulaire / bloqué
/*
if ((isset($identifiant)) AND $identifiant == "un") {

} elseif ((isset($identifiant)) AND $identifiant == "deux") {
    header('Location: ../html/formFirstCo.php');
    exit;
} else {
    header('Location: ../html/accessDenied.php');
    exit;
}
?>*/