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

//récupeartion du answaire dans la bdd
$username = $_SESSION['username'];
echo "premier echo" . $username . "         ";

// MAJ du mot de passe
$password = $_POST['password']; 
$newPassword = password_hash($password, PASSWORD_DEFAULT);

// MAJ du mdp
$insert = $bdd->prepare('UPDATE account SET
password = :password    
WHERE username = :username');
$insert->execute(array(
'password' => $newPassword,
'username' => $username));


echo "2eme echo" . $username . "       " . $password . "       " . $newPassword;


?>


