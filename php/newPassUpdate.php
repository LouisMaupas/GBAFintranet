<?php 
session_start(); 
// connexion bdd
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur lors de la connexion à la base de données');
}

//récuperation du answer dans la bdd
$username = $_SESSION['username'];

// recup du mot de passe
$password = $_POST['password']; 
$newPassword = password_hash($password, PASSWORD_DEFAULT);

// MAJ du mdp
$insert = $bdd->prepare('UPDATE account SET
password = :password    
WHERE username = :username');
$insert->execute(array(
'password' => $newPassword,
'username' => $username));

echo "Votre mot de passe a bien été changé, vous allez être redirigé vers l'accueil dans quelques secondes ...";
header('refresh: 5; url=../index.php');



?>


